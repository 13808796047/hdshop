<?php
Class CommonControl extends Control{
	protected $db;//数据连接
	//初始化
	Public function __init(){
		if(method_exists($this, '__auto()')){
			$this->__auto();
		}
		$this->db=K('goods');
		$this->setNav();
		$this->userIsLogin = isset($_SESSION[C('RBAC_AUTH_KEY')]);
	}
	
	private function setNav(){
		$db=K('category');
		$this->nav = $db->getCategoryLevel(0);
	}
}