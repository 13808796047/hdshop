<?php
class BuyControl extends CommonControl{
	
	/**
	 * 订单提交页
	 */
	public function index(){
		//分配收货地址
		$db = K('user');
		$address = $db->getAddress($this->uid);
		$this->address = $address;
		/**
		 * 处理订单
		 * @var [type]
		 */
		$gid = Q('gid',NULL,'intval');
		$db = K('goods');
		$goods = $db->getGoodsFind($gid);
		$this->goods = $goods;
		$this->display();
	}
	/**
	 * 付款页 
	 */
	public function payment(){
		if(IS_POST){
			if(is_array($_POST['gid'])){
			$data = $_POST;
			foreach ($data['gid'] as $k => $v) {
				$_POST['gid'] = $v;
				$_POST['price'] = $data['price'][$k];
				$_POST['goods_num'] = $data['goods_num'][$k];
				$_POST['addressid'] = $data['addressid'];
			if(!$this->addOrder()) throw new Exception("订单提交失败", 1);
			}
		}else{
			if(!$this->addOrder()) throw new Exception("订单提交失败", 1);
		}
		
		}
		
		$order = $this->getOrderData();
		$sumArr = array();
		foreach ($order as $v) {
			$sumArr[] = $v['price']*$v['goods_num'];
		}
		$this->sumPrice = array_sum($sumArr);
		$this->order = $order;
		$db = K('user');
		$this->balance = $db->getUserBalance($this->uid);
		$this->display();
	}
	/**
	 * 获取订单数据
	 * @return [type] [description]
	 */
	Private function getOrderData(){
		$db = K('order');
		$order = $db->getOrderData($this->uid);
		return $order;
	}
	/**
	 * 添加订单数据
	 */
	Private function addOrder(){
		$data = array();
		$data['user_id'] = $this->uid;
		$data['goods_id'] = $_POST['gid'];
		$data['goods_num'] = $_POST['goods_num'];
		$data['addressid'] = $_POST['addressid'];
		$data['total_money'] = $data['goods_num']*$_POST['price'];
		$db = K('order');
		$where = array('user_id'=>$this->uid,'goods_id'=>$data['goods_id'],'status'=>1);
		if(!$db->checkOrder($where)){
			return $db->addOrder($data);
		}
		return true;
	}
	/**
	 * 购买成功
	 */
	public function buysuccess($orders){
		$this->display();
	}
	/**
	 * 验证购物信息
	 * @return [type] [description]
	 */
	Public function checkBuy(){
		if(IS_POST){
			$orders = $_POST['orderid'];
			
			$db = K('order');
			$data = $db->getOrder($orders);
			$sumArr = array();
		foreach ($data as $v) {
			$sumArr[] = $v['price']*$v['goods_num'];
		}
		$totalPrice = array_sum($sumArr);
		$db = K('user');
		$balance = $db->getUserBalance($this->uid);
			if($balance<$totalPrice){
				$this->error('付款失败,请充值！','Member/Account/index');
			}else{
				$this->buysuccess($orders);
			}
		}else{
			exit;
		}
	}
}












?>