<?php
Class GoodsModel extends ViewModel{
	Public $table = 'goods';
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
	//更新地区数据缓存
	Public function update_cache(){
			//获得表中的所有地区数据
			$goods =$this->all();
			
			return F('goods',$goods);//file_put_contents()储存文件缓存
		}
	/**
	 * 添加商品
	 */
	Public function addGoods($data){

		$gid = $this->table('goods')->add($data['goods']);
		$data['goods_detail']['goods_id'] = $gid;
		return $this->table('goods_detail')->add($data['goods_detail']);
	}
		
	Public function editGoods($data,$gid){
		$count = 0;
		$this->table('goods')->where(array('gid'=>$gid))->save($data['goods']);
		$count += $this->getAffectedRows();
		$this->table('goods_detail')->where(array('goods_id'=>$gid))->save($data['goods_detail']);
		$count += $this->getAffectedRows();
		if($count>0){
			return $this->update_cache();
		}
	}
	Public function delGoods(){
		$gid = Q('gid');
		$count = 0;
		$count+= $this->table('goods_detail')->where(array('goods_id'=>$gid))->del();
		
		$count+= $this->table('goods')->where(array('gid'=>$gid))->del();
		return $count;
	}

}