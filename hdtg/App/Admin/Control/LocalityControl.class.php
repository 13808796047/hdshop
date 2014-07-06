<?php
Class LocalityControl extends CommonControl{
	private $_locality;
	Private $lid;
	/**
	 * 添加地区
	 */
	Public function __auto(){
		$this->db = K('locality');
		$this->_locality = F('locality');
		$this->lid = Q('lid');

	}

	Public function add(){
		if(IS_POST){

		$data = $this->getData();
		
		 if($this->db->addLocality($data)){
			 	$this->ajax(array('state'=>1,'message'=>'地区添加成功!'));	
			}else{
			 	$this->ajax(array('state'=>0,'message'=>'地区添加失败!'));
		 }
		}else{

			$this->level =$this->_locality;
			$this->parent = $this->db->getParentInfo($this->lid);
			
			$this->display();
		}
		
	}
	Public function index(){
		$this->locality = $this->_locality;
		$this->display();

	}
	Public function edit(){
	  if(IS_POST){
           
            if($this->db->edit_locality()){
                $this->ajax(array('state'=>1,'message'=>'地区添加成功!'));
                //$this->success('');

            }else{
                $this->ajax(array('state'=>0,'message'=>'地区添加失败!'));
                //$this->error($this->db->error) ;
            }
    	}else{
    		//分配编辑栏目原数据
    		$field=$this->db->find(Q('lid'));
    		
    		//分配所有栏目
    		$locality = $this->_locality;
    		
    		foreach ($locality as $n => $v) {
                //将父级栏目添加selected选中状态
    			$v['selected']='';
    			if($field['pid']==$v['lid']){
    				$v['selected'] = ' selected="selected" ';
    			}
    			
                $locality[$n]=$v;
    		}
    		//分配当前栏目数据
    		$this->field=$field;
    		//分配栏目数据
    		$this->locality=$locality;
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
	   //更新地区缓存
        Public function update_cache(){
            if($this->db->update_cache()){
                $this->success('更新缓存成功!','index');
            }else{
                $this->error('缓存更新失败,请检查缓存目录'.CACHE_PATH.'写权限','index');
            }
        }
      Private function getData(){
		$data = array();
		$data['lname'] = data_format($_POST['lname'],'htmlspecialchars');
		$data['sort'] = data_format($_POST['sort'],'intval');
		$data['pid'] = data_format($_POST['pid'],'intval');
		$data['display'] = data_format($_POST['display'],'intval');
		return $data;

	}

}