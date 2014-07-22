<?php
/**
 * 购物车模型
 */
Class CartModel extends ViewModel{
	Public $table = 'cart';
	/**
	 * 获取商品的数据
	 * @return [type] [description]
	 */
	Public function getGoods($where){
		$fields = array(
			'main_title',
			'gid',
			'goods_img',
			'price',
			'end_time'
			);
		return $this->table('goods')->field($fields)->where($where)->find();
	}
	/**
	 * 添加购物车
	 */
	Public function addCart($data){
		return $result = $this->add($data);
		
	}
	/**
	 * 验证购物车信息是否存在
	 * @return [type] [description]
	 */
	Public function checkCart($where){
		 $result = $this->field('cart_id')->where($where)->find();
		 return isset($result['cart_id'])?$result['cart_id']:null;
	}
	/**
	 * 自增购物车
	 * @return [type] [description]
	 */
	Public function incCart($id,$num){
		return $this->inc('goods_num','cart_id='.$id,$num);
	}
	/**
	 * 统计购物车总数
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	Public function countCart($where){
		return $this->where($where)->count();
	}
	/**
	 * 更新购物车商品的数量
	 * @return [type] [description]
	 */
	Public function updateCartNum($where,$num){
		$this->where($where)->save(array('goods_num'=>$num));
		return $this->getAffectedRows();
	}
	/**
	 * 获取所有购物车数据
	 * @return [type] [description]
	 */
	Public function getCartAll($uid){
		$this->view = array(
			'goods' => array(
				'type' => INNER_JOIN,
				'on' => 'goods.gid = cart.goods_id' 
				)
			);
		$fields = array(
			'main_title',
			'gid',
			'goods_img',
			'price',
			'end_time',
			'cart_id',
			'goods_num',
			'old_price'
			);
		return $this->field($fields)->where(array('user_id'=>$uid))->all();
	}
	Public function delCart($where){
		return $this->where($where)->del();
	}
}