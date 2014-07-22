<?php
Class GoodsModel extends ViewModel{
	Public $table = 'goods';
	Public $cids = array();
	Public $lids = array();
	Public $price ='';
	Public $order='';
	Public $view = array(
		'category'=>array(
			'type'=>INNER_JOIN,
			'on' => 'goods.cid=category.cid',
 			),
		'locality'=>array(
			'type'=>INNER_JOIN,
			'on' => 'goods.lid=locality.lid',
 			),
		'shop'=>array(
			'type'=>INNER_JOIN,
			'on' => 'goods.shopid=shop.shopid',
 			),
		'goods_detail'=>array(
			'type'=>INNER_JOIN,
			'on' => 'goods.gid=goods_detail.goods_id'
 			)

		);
	Public function getTotal(){
		$count=0;

		$where = rtrim('end_time>'.time().' and '.$this->price,' and ');

		if(!empty($this->cids)&&!empty($this->lids)){
			$count=$this->table('goods')->where($where)->in($this->cids)->in($this->lids)->count();
		}
		if(!empty($this->cids)){
			$count=$this->table('goods')->where($where)->in($this->cids)->count();
		}
		if(!empty($this->lids)){
			$count=$this->table('goods')->where($where)->in($this->lids)->count();
		}
		if(empty($this->cids)&&empty($this->lids)){
			$count=$this->table('goods')->where($where)->count();
		}
	
		
		return $count;
	}
	/**
	 * 查询商品
	 */
	Public function getGoods($limit){

		$result=null;

		$where = rtrim('end_time>'.time().' and '.$this->price,' and ');
		$field=array(
			'gid',
			'goods_img',
			'main_title',
			'sub_title',
			'price',
			'old_price',
			'buy'
			);
		
		if(!empty($this->cids)&&!empty($this->lids)){
			$result=$this->table('goods')->field($field)->where($where)->in($this->cids)->in($this->lids)->order($this->order)->limit($limit)->all();
		}
		if(!empty($this->cids)){
			$result=$this->table('goods')->field($field)->where($where)->in($this->cids)->limit($limit)->order($this->order)->all();
		}
		if(!empty($this->lids)){
			$result=$this->table('goods')->field($field)->where($where)->in($this->lids)->limit($limit)->order($this->order)->all();
		}
		if(empty($this->cids)&&empty($this->lids)){
			$result=$this->table('goods')->field($field)->where($where)->limit($limit)->order($this->order)->all();
		}

	

		return $result;
	}
	/**
	 * 查询商品细节数据
	 */
	Public function getGoodsDetail($gid){
		return $this->where(array('gid'=>$gid))->find();
	}
	
}