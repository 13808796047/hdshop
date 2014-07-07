<?php
Class GoodsModel extends ViewModel{
	Public $table = 'goods';
	Public $cids = array();
	Public $lids = array();
	Public $price ='';
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
		}else{
			if(!empty($this->cids)){
			$count=$this->table('goods')->where($where)->in($this->cids)->count();
		}
		if(!empty($this->lids)){
			$count=$this->table('goods')->where($where)->in($this->lids)->count();
		}
	}
		
		return $count;
	}
	/**
	 * 查询商品
	 */
	Public function getGoods(){
		$result=null;

		$where = rtrim('end_time>'.time().' and '.$this->price,' and ');
		
		if(!empty($this->cids)&&!empty($this->lids)){
			$result=$this->table('goods')->field('cid,lid,gid')->where($where)->in($this->cids)->in($this->lids)->all();
		}else{
			if(!empty($this->cids)){
			$result=$this->table('goods')->field('cid,lid,gid')->where($where)->in($this->cids)->all();
		}
		if(!empty($this->lids)){
			$result=$this->table('goods')->field('cid,lid,gid')->where($where)->in($this->lids)->all();
		}
	}
		
		return $result;
	}

}