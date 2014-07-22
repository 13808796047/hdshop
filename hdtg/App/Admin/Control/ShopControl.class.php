<?php
Class ShopControl extends CommonControl{
	Private $_shop;
	Public function __auto(){
		$this->db=K('shop');
		$this->_shop = F('shop');
	}
	Public function index(){
		$page = new Page($this->db->count(),5);
		$this->page = $page->show(2);

		$this->data = $this->db->limit($page->limit())->all();
		$this->display();
	}
	Public function add(){
		if(IS_POST){
			
			$data = $this->getData();
			 if($this->db->addShop($data)){
			 	$this->ajax(array('state'=>1,'message'=>'商铺添加成功!'));	
			 }else{
			 	$this->ajax(array('state'=>0,'message'=>'商铺添加失败!'));
			 }
		}else{
			$this->display();
		}
	}
	Public function edit(){
		$shopid = Q('shopid',NULL,'intval');
		//必须传递修改文章的id
		if(!$shopid)$this->error('参数传递错误!');
		if(IS_POST){
					//通过模型完成文章的修改
				if($this->db->edit_shop()){
						$this->ajax(array('state'=>1,'message'=>'商铺编辑成功!'));	
				}else{
					$this->ajax(array('state'=>0,'message'=>'商铺编辑失败!'));	
				}
				
				}else{
					$field=$this->db->find($shopid);
					$this->field = $field;
					
					$this->display();
				}
		}
		 //删除栏目
        Public function del(){   
            if($this->db->del_shop()){
                $this->ajax(array('state'=> 1,'message'=>'删除成功'));
            }else{
                $this->ajax(array('state'=> 0,'message'=>$this->db->error));
            }
        }

	Private function getData(){
		$data = array();
		$data['shopname'] = data_format($_POST['shopname'],'htmlspecialchars');
		$data['shopaddress'] = data_format($_POST['shopaddress'],'htmlspecialchars');
		$data['metroaddress'] = data_format($_POST['metroaddress'],'htmlspecialchars');
		$data['shopcoord'] = $_POST['shopcoord'];
		$data['shoptel'] = data_format($_POST['shoptel'],'htmlspecialchars');
		return $data;
	}
}