<?php
class LoginControl extends Control{
	protected $db;
	/**
	 * 显示登录界面
	 */	
	public function index(){
		$this->display();
	}
	
	
	Public function login(){
		if(IS_POST==false) $this->error('请登录','index');
		$username = $_POST['username'];

		$password = md5($_POST['password']);
		$where = array('uname'=>$username,'or','email'=>$username);
		
		$this->db = K('user');
		$userinfo = $this->db->getUser($where);
		if($userinfo['password']==$password){
			$_SESSION[C('RBAC_AUTH_KEY')] = $userinfo['uid'];
			if(isset($_POST['auto_login'])){
				setcookie(session_name(),session_id(),time()+C('COOKIE_LIFE_TIME'),'/');
			}else{
				setcookie(session_name(),session_id(),-1,'/');
			}
			$this->success('登录成功！','Index/index/index');
		}else{
			$this->error('登录失败！','index');
		}
	}	
	/**
	 * 用户退出
	 * @return [type] [description]
	 */
	Public function quit(){
		setcookie(session_name(),session_id(),-1,'/');
		session_unset();
		session_destroy();
		$this->success('退出成功',__ROOT__);
	}
	
}














?>