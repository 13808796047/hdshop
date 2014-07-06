<?php
class CategoryControl extends CommonControl{
	private $cid;
	   //目录缓存
    Private $_category;
	Public function __auto(){
		//实例模型
		$this->db = K('category');
		$this->cid = Q('cid',null,'intval');
		 //栏目缓存数据
		$this->_category = F('category');


	}
	/**
	 * 显示页面
	 */
	Public function index(){
		
		
		$this->data = $this->_category; 
		$this->display();
	}
	/**
	 * 添加分类的方法
	 */
	public function add(){
		if(IS_POST){
			 $data = $this->getData();
			 if($this->db->addCategory($data)){
			 	$this->ajax(array('state'=>1,'message'=>'栏目添加成功!'));	
			 }else{
			 	$this->ajax(array('state'=>0,'message'=>'栏目添加失败!'));
			 }
			

		}else{
			//获取父类
			$parent = $this->db->getParentInfo($this->cid);
			$this->parent = $parent;
			

			$this->level=$this->_category;
			$this->display();
			exit;
		}
	
    }
    Public function edit(){
    	if(IS_POST){
    		if($this->db->editCategory()){
                $this->ajax(array('state'=>1,'message'=>'栏目添加成功!'));
                //$this->success('');

            }else{
                $this->ajax(array('state'=>0,'message'=>'栏目添加失败!'));
                //$this->error($this->db->error) ;
            }
    	}else{
    		

			$this->level=$this->_category;
    		$category = $this->db->getCategoryFind($this->cid);
    		$parent = $this->db->getParentInfo($category['pid']);
			$this->parent = $parent;
    		$this->category = $category;
    		$this->display();
    	}
    	
    	
    }
	
  //删除栏目
        Public function del(){   
            if($this->db->del_category()){
                $this->ajax(array('state'=> 1,'message'=>'删除成功'));
            }else{
                $this->ajax(array('state'=> 0,'message'=>$this->db->error));
            }
        }
    //更新栏目缓存
        Public function update_cache(){
            if($this->db->update_cache()){
                $this->success('更新缓存成功!','index');
            }else{
                $this->error('缓存更新失败,请检查缓存目录'.CACHE_PATH.'写权限','index');
            }
        }

	/**
	 * 处理提交的数据
	 */
	Private function getData(){
		$data = array();
		$data['cname'] = data_format($_POST['cname'],'htmlspecialchars');
		$data['title'] = data_format($_POST['title'],'htmlspecialchars');
		$data['keywords'] = data_format($_POST['keywords'],'htmlspecialchars');
		$data['description'] = data_format($_POST['description'],'htmlspecialchars');
		$data['sort'] = data_format($_POST['sort'],'intval');
		$data['display'] = data_format($_POST['display'],'intval');
		$data['pid'] = data_format($_POST['pid'],'intval');
		return $data;
	}
}

?>