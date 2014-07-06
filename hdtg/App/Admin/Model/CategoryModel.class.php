<?php
Class CategoryModel extends Model{
	//默认操作的表
	Public $table = 'category';
	/**
	 * 获得所有分类数据
	 */

	
	Public function addCategory($data){
		if($this->add($data)){
			return $this->update_cache();
		}
	}
	/**
	 * 获得父类的信息
	 */
	Public function getParentInfo($cid){
		$result = $this->field(array('cid','cname'))->where(array('cid'=>$cid))->find();
		
		if($result){
			return $result;
		}else{
			return array(
				'cid'=>0,
				'cname'=>'顶级分类'
				);
		}
	}
	/**
	 * 获取单条的分类数据
	 * @return [type] [description]
	 */
	Public function getCategoryFind($cid){
		
		return $this->where(array('cid'=>$cid))->find();

	}
	/**
	 * 编辑分类
	 */
	Public function editCategory(){
		return $this->save();
	}
	//删除栏目
		Public function del_category(){
			$cid=Q('cid');
			$category = $this->all();
			//判断当前要删除的栏目有没有子栏目
			if($this->where('pid='.$cid)->find()){
				$this->error='请先删除子栏目';
			}else{
			if($this->del($cid)) {
					//更新缓存
					return $this->update_cache();
				}
			}
		}
			//更新栏目缓存
		Public function update_cache(){
			//获得表中的所有栏目数据
			$category = Data::tree($this->all(),'cname');
			return F('category',$category);//file_put_contents()储存文件缓存
		}
}