<?php
/**
 * 用户模型
 */
Class UserModel extends Model{
	Public $table='user';
	/**
	 * 验证字段是否存在
	 * @param  [type] $field [description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	Public function check($field,$value){

		return $this->where(array($field=>$value))->count();
	}
	/**
	 * 添加用户
	 */
	Public function addUser($data){
		return $this->add($data);
	}
	/**
	 * 获取
	 */
	Public function getUser($where){
		return $this->where($where)->find();
	}
	/**
	 * 读取收货地址
	 * @return [type] [description]
	 */
	Public function getAddress($uid){
		return $this->table('user_address')->where(array('user_id'=>$uid))->all();
	}
	/**
	 * 获取用户的余额
	 */
	Public function getUserBalance($uid){
		$result = $this->field('balance')->table('userinfo')->where(array('user_id'=>$uid))->find();
		return $result['balance'];
	}
}