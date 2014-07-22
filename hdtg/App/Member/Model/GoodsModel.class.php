<?php
Class GoodsModel extends Model{
	Public $table = 'goods';
	
	Public function getGoods($in){
		$fields = array(
			'main_title',
			'gid',
			'goods_img',
			'price',
			'end_time',
			'old_price'
			);
		return $this->in(array('gid'=>$in))->all();
	}
	/**
	 * 查询商品的记录
	 * @return [type] [description]
	 */
	Public function getGoodsFind($gid){
		$fields = array(
			'main_title',
			'gid',
		
			'price'
			
			);
		return $this->field($fields)->where(array('gid'=>$gid))->find();
	}
}