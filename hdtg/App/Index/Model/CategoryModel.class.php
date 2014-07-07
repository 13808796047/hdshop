<?php
Class CategoryModel extends Model{
	Public $table='category';
	/**
	 * 按等级获得分类数据
	 * @return [type] [description]
	 */
	Public function getCategoryLevel($pid){
		return $this->field('cname,cid')->where(array('pid'=>$pid,'display'=>1))->order('sort ASC')->all();
	}
	Public function getCategoryPid($cid){
		$result = $this->field('pid')->where(array('cid'=>$cid))->find();
		return $result['pid'];
	}
		/**
	 * 获取所有的子分类
	 */
	Public function getSonCategory($cid){
		$result = $this->field('cid')->where(array('pid'=>$cid))->all();
		if(is_null($result)){
			$result = array(array('cid'=>$cid));
		}
		return $result;
	}
}