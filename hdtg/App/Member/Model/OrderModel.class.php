<?php
Class OrderModel extends ViewModel{
	Public $table = 'order';
	Public $view;
	Public function addOrder($data){
		return $this->add($data);
	}
	/**
	 * 获取订单数据
	 * @return [type] [description]
	 */
	Public function getOrderData($uid){
		$this->view = array(
			'goods'=>array(
				'type'=>INNER_JOIN,
				'on' => 'goods.gid=order.goods_id'
				)
			);
		$fields = array(
			'main_title',
			'price',
			'gid',
			'goods_num',
			'orderid'
			);

		return $this->field($fields)->where(array('user_id'=>$uid,'status'=>1))->all();
	}
	/**
	 * 验证订单是否存在
	 */
	public function checkOrder($where){
		return $this->where($where)->count();
	}
	/**
	 * 获得单条数据
	 * @param  [type] $orders [description]
	 * @return [type]         [description]
	 */
	Public function getOrder($orders){
		$this->view = array(
			'goods'=>array(
				'type'=>INNER_JOIN,
				'on' => 'goods.gid=order.goods_id'
				)
			);
		return $this->field(array('price','goods_num'))->in(array('orderid'=>$orders))->all();
	}
}