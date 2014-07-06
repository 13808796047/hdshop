<?php
Class localityModel extends Model{
	//默认操作的表
	Public $table = 'locality';
	/**
	 * 查询所有的地区数据
	 */
	
	/**
	 * 添加地区
	 */
	Public function addlocality($data){
		
		if($this->add($data)){
			return $this->update_cache();
		}
	}
				//修改栏目
	Public function edit_locality(){
			

				if($this->save()) {
					//更新缓存
					return $this->update_cache();
				}
				
			
		}
			//删除栏目
		Public function del_category(){
			$lid=Q('lid');
			
			//判断当前要删除的栏目有没有子栏目
			if($this->where('pid='.$lid)->find()){
				$this->error='请先删除子地区';
			}else{
			if($this->del($lid)) {
					//更新缓存
					return $this->update_cache();
				}
			}
		}
	//更新地区数据缓存
	Public function update_cache(){
			//获得表中的所有地区数据
			$locality =Data::tree($this->all(),'lname','lid');
			
			return F('locality',$locality);//file_put_contents()储存文件缓存
		}

	/**
	 * 获得父级地区信息
	 */
	Public function getParentInfo($lid){
		$result = $this->field('lname,lid')->where(array('lid'=>$lid))->find();
		return $result?$result:array('lname'=>'顶级地区','lid'=>0);
	}
}