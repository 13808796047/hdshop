<?php
Class ShopModel extends Model{
	Public $table = 'shop';
	Public function addShop($data){
		if($this->add($data)){
			return $this->update_cache();
		}

	}
	Public function edit_shop(){
		if($this->save()){
			return $this->update_cache();
		}
	}
				//删除栏目
		Public function del_shop(){
			$shopid=Q('shopid');
			
			//判断当前要删除的栏目有没有子栏目
			
			if($this->del($shopid)) {
					//更新缓存
					return $this->update_cache();
				}
			
		}
	Public function update_cache(){
		$shop = $this->all();
		return F('shop',$shop);
	}
}