<?php
Class LocalityModel extends Model{
	Public $table = 'locality';
	/**
	 * 按等级获得分类数据
	 * @return [type] [description]
	 */
	Public function getLocalityLevel($pid){
		return $this->field('lname,lid')->where(array('pid'=>$pid,'display'=>1))->order('sort ASC')->all();
	}
	Public function getLocalityPid($lid){
		$result = $this->field('pid')->where(array('lid'=>$lid))->find();
		return $result['pid'];
	}
	/**
	 * 获取所有的子地区
	 * 
	 */
	Public function getSonLocality($lid){
		$result = $this->field('lid')->where(array('pid'=>$lid))->all();
		if(is_null($result)){
			$result = array(array('lid'=>$lid));
		}
		return $result;
	}
}