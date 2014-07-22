<?php
class CartControl extends Control{
	private $uid=null;
		
	Public function __init(){
		if(isset($_SESSION[C('RBAC_AUTH_KEY')])){
			$this->uid = $_SESSION[C('RBAC_AUTH_KEY')];

			//把购物信息写入数据库
			$this->writeCart();
		}
		$this->setNav();
		$this->userIsLogin = isset($_SESSION[C('RBAC_AUTH_KEY')]);
	}

	/**
	 * 显示购物车页
	 */
	public function index(){
			//分配收货地址
		$db = K('user');
		$address = $db->getAddress($this->uid);
		$this->address = $address;
		$cart = $this->getCartData();
		$data = $this->disCart($cart);
		if(IS_AJAX == false){
			$this->cart = $data[0];
			$this->total = $data[1];
			$this->display();
		}else{
			if(isset($data[0])){
				exit(json_encode(array('status'=>true,'data'=>$data[0])));
			}else{
				exit(json_encode(array('status'=>false)));
			}
		}
		
	}
	private function setNav(){
		$db=K('category');
		$this->nav = $db->getCategoryLevel(0);
	}
	/**
	 * 读取购物车数据
	 * @return [type] [description]
	 */
	Private function getCartData(){
		$db = K('cart');
			$result = array();
		//用户没有登录
		if(is_null($this->uid)){
			if(!isset($_SESSION['cart']['goods'])) return;
			$carts = $_SESSION['cart']['goods'];
			foreach ($carts as $v) {
				$data = $db->getGoods(array('gid'=>$v['id']));
				$data['goods_num'] = $v['num'];
				
				$result[] = $data;
			}

		}else{
			$result = $db->getCartAll($this->uid);
		

		}
		return $result;
	}
	/**
	 * 处理数据
	 * @return [type] [description]
	 */
	Public function disCart($cart){
		if(empty($cart)) return false;
		$total = 0;
		foreach ($cart as $k => $v) {
			$cart[$k]['xiaoji'] = $v['goods_num']*$v['price'];
			$cart[$k]['status'] = $v['end_time']<time()?'已下架':'可购买';
			$total += $cart[$k]['xiaoji'];
			$pathInfo = pathinfo($v['goods_img']);
            $cart[$k]['goods_img'] = __ROOT__.'/'.$pathInfo['dirname'].'/'.$pathInfo["filename"].'_90x55.'.$pathInfo['extension'];
		}
		return array($cart,$total);
	}
	/**
	 * 添加购物车
	 */
	Public function add(){
		if(IS_AJAX==false) $this->error('请求错误！');
		$result = array();
		if(is_null($this->uid)){
			$data = array(
				'id' => Q('gid',NULL,'intval'),
				'name' => '',
				'num' => 1,
				'price'=>0,

				);
			Cart::add($data);
			$total = count($_SESSION['cart']['goods']); 
			//$_SESSION['cart'][] = Q('gid',NULL,'intval');
			$result = array('status'=>true,'total'=>$total);
		}else{
			$data = array();
			$data['goods_id'] = Q('gid',NULL,'intval');
			$data['user_id'] = $this->uid;
			$data['goods_num'] = 1;
		
			$result = $this->checkAdd($data);
			if($result){
				$db = K('cart');
				$where = array('user_id'=>$data['user_id']);
				$total = $db->countCart($where);
				$result = array('status'=>true,'total'=>$total);
			}
			
		}
		exit(json_encode($result));
	}
	/**
	 * 删除购物车
	 * @return [type] [description]
	 */
	Public function del(){
		if(IS_AJAX == false) exit;
		$gid = Q('gid',NULL,'intval');
		$result = array();
		$result['status'] = false;
		if(is_null($this->uid)){
				foreach($_SESSION['cart']['goods'] as $k=>$v){
					if($v['id']==$gid){
						unset($_SESSION['cart']['goods'][$k]);
						$result['status'] = true;
					}
					
				} 
		}else{
			$where = array('user_id'=>$this->uid,'goods_id'=>$gid);
			$db = K('cart');
			if($db->delCart($where)){
				$result['status'] = true;
			}
		}
		exit(json_encode($result));
	}
	/**
	 * 更新购物车商品数
	 * @return [type] [description]
	 */
	Public function updateGoodsNum(){
		$gid = Q('gid',NULL,'intval');
		$num = Q('num',NULL,'intval');
		$result = array();
		if(is_null($this->uid)){
			foreach ($_SESSION['cart']['goods'] as$k => $v) {
				if($v['id'] == $gid){
					$_SESSION['cart']['goods'][$k]['num'] = $num;
					$result = array(
						'status' => true,
						'num' => $num
						);
				}
			}
		}else{
			$db = K('cart');
			$where = array(
				'goods_id'=>$gid,
				'user_id' =>$this->uid
				);
			if($db->updateCartNum($where,$num)){
				$result = array(
						'status' => true,
						'num' => $num
						);
			}
		}
		exit(json_encode($result));

	}
	/**
	 * 把Session的数据，写入数据库
	 * @return [type] [description]
	 */
	Private function writeCart(){
		if(!isset($_SESSION['cart']['goods'])) return;
			$carts = $_SESSION['cart']['goods'];
			
		foreach ($carts as $v) {
			$data = array();
			$data['user_id'] = $this->uid;
			$data['goods_id'] = $v['id'];
			$data['goods_num'] = $v['num'];
			$this->checkAdd($data);
		}
		unset($_SESSION['cart']);

	}
	/**
	 * 验证添加 存在自增
	 * 不存在添加新数据
	 * @return [type] [description]
	 */
	Private function checkAdd($data){
		$where = array('user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']);
		$db = K('cart');
		$cart_id = $db->checkCart($where);
		
		if($cart_id){
			return $db->incCart($cart_id,$data['goods_num']);
		}else{
			return $db->addCart($data);
		}
	}
}
?>