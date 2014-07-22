<?php
class RegControl extends CommonControl{

	/**
	 * 显示注册界面
	 */
	public function index(){
		$this->display();
	}
	
	
	Public function showCode(){
		$code = new Code();
		$code->show();
	}
	/**
	 * 验证表单
	 * @return [type] [description]
	 */
	Public function check(){
		$this->db = K('user');
		if(IS_AJAX == false) $this->error('请重新注册！','index');
		$key = addslashes(key($_POST));

		$value = $_POST[$key];

		switch ($key) {
				case 'email':
				if($this->db->check('email',$value)){
					$result = array('state'=>false,'msg'=>'该邮箱地址已经存在！');
				}else{
					$result = array('state'=>true);
				}
				break;
				case 'username':
				if($this->db->check('uname',$value)){
					$result = array('state'=>false,'msg'=>'该用户已经存在！');
				}else{
					$result = array('state'=>true);
				}
				break;
				case 'code':
				if($_SESSION['code'] !== strtoupper($value)){
					$result = array('state'=>false,'msg'=>'验证码输入错误!');
				}else{
					$result = array('state'=>true);
				}
				break;

		}

		exit(json_encode($result));
	}
	/**
	 * 添加用户
	 */
	Public function addUser(){
		if(IS_POST == false) throw new Exception("Error Processing Request", 1);
		$this->db = K('user');
		$data = array();
		$data['email'] = $_POST['email'];
		$data['uname'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$uid = $this->db->addUser($data);
		if($uid){
			$_SESSION[C('RBAC_AUTH_KEY')] = $uid;
			setcookie(session_name(),session_id(),time()+C('COOKIE_LIFE_TIME'),'/');
			$this->error('注册成功！',U('Index/Index/index'));
		}else{
			$this->error('注册失败！',U('Index/Index/index'));
		}
		
	}
	
	
	
	
}















?>