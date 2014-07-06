<?php
Class GoodsControl extends CommonControl{
	Private $_category;
	Private $_locality;
	Private $_goods;
	/**
	 * 添加商品
	 */
	Public function __auto(){
		 $this->_category = F('category');
		 $this->_locality = F('locality');
		 $this->_goods = F('goods');
		 $this->db = k('goods');
	}
	Public function index(){

		
		$page = new Page($this->db->count(),5);
		$this->page = $page->show(2);
		
		$this->goods = $this->db->limit($page->limit())->all();
		$this->display();
		 
	}

	Public function add(){
		if(IS_POST){
			$data = $this->getData();
			if($this->db->addGoods($data)){
 				$this->ajax(array('state'=>1,'message'=>'商品添加成功!'));	
			 }else{
			 	$this->ajax(array('state'=>0,'message'=>'商品添加失败!'));
			 }
			
		}else{
			$shopid = Q('$shopid',NULL,'intval');
			$db = K('shop');
			$shop=$db->find($shopid);
			$this->shop = $shop;
			$this->category = $this->_category;
			$this->locality = $this->_locality;
			$this->goods_server = C('goods_server');
			$this->display();
		}
		
	}
	Public function edit(){
		if(IS_POST){
			$data = $this->getData();
			if($this->db->editGoods($data,$_POST['gid'])){
				$this->ajax(array('state'=>1,'message'=>'商品修改成功!'));	
			}else{
				$this->ajax(array('state'=>0,'message'=>'商品修改失败!'));
			}
		}else{
			$goods = $this->db->find(Q('gid'));
			$this->category = $this->_category;
			$this->locality = $this->_locality;
			$this->server = C('goods_server');
			$goods['goods_server'] = unserialize($goods['goods_server']);
			$this->goods = $goods;
			$this->display();
		}
	}
	Public function del(){
		
		if($this->db->delGoods()){
			  $this->ajax(array('state'=> 1,'message'=>'删除成功'));
		}else{
			 $this->ajax(array('state'=> 0,'message'=>$this->db->error));
		}
	}
	Private function getData(){
		$data = array();
		$data['goods']['cid']= data_format($_POST['cid'],'intval');
		$data['goods']['lid']= data_format($_POST['lid'],'intval');
		$data['goods']['shopid']= data_format($_POST['shopid'],'intval');
		$data['goods']['main_title'] = data_format($_POST['main_title'],'htmlspecialchars');
		$data['goods']['sub_title'] = data_format($_POST['sub_title'],'htmlspecialchars');
		if(isset($_POST['goods_img'])){
			if(isset($_POST['old_img'])){
				$this->delOldFile($_POST['old_img']);
			}
			$data['goods']['goods_img'] = $_POST['goods_img'][1]['path'];
		}
		$data['goods']['end_time'] = data_format($_POST['end_time'],'strtotime');
		$data['goods']['begin_time'] = data_format($_POST['begin_time'],'strtotime');
		$data['goods']['price'] = $_POST['price'];
		$data['goods']['old_price'] = $_POST['old_price'];
		$data['goods_detail']['goods_server'] = serialize($_POST['goods_server']);
		$data['goods_detail']['detail'] = $_POST['detail'];
		return $data;


	}
	Private function delOldFile($img){
		$pathInfo = pathinfo($img);
	
		$oldFiles = array(
			ROOT_PATH.$img,
			ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_460x280.'.$pathInfo['extension'],
			ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_200x100.'.$pathInfo['extension'],
			ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_310x185.'.$pathInfo['extension'],
			ROOT_PATH.$pathInfo['dirname'].'/'.$pathInfo['filename'].'_90x55.'.$pathInfo['extension']
			);
		foreach ($oldFiles as $v) {
			if(file_exists($v)) unlink($v);
		}
	}
	
}