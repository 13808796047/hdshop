<?php
Class CommonControl extends Control{
	protected $db;//数据连接
	//初始化
	Public function __init(){
		if(method_exists($this, '__auto()')){
			$this->__auto();
		}
	}
}