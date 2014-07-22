<?php

class IndexControl extends Control{

    
    /**
     * 用户收藏
     */
    public function collect(){
    	$this->display();
    }
    /**
     * 获取最近浏览
     * @return [type] [description]
     */
    Public function getRecentView(){
    	if(IS_AJAX==false) return false;
    	$key = encrypt('recent-view');
    	$result = array();
    	if(!isset($_COOKIE[$key])){
    		$result['status'] = false;
    		exit(json_encode($result));
    	}
    	//取得cookie的值
    	$value = unserialize(decrypt($_COOKIE[$key]));
		$db = K('goods');
		$data = $db->getGoods($value);
		if($data){
			$data = $this->disData($data);
			$result['status'] = true;
			$result['data'] = $data;
			exit(json_encode($result));
			

		}else{
			$result['status'] = false;
		}
		exit(json_encode($result));
    }
   	Private function disData($data){
   		foreach ($data as $k => $v) {
			
			$pathInfo = pathinfo($v['goods_img']);
            $data[$k]['goods_img'] = __ROOT__.'/'.$pathInfo['dirname'].'/'.$pathInfo["filename"].'_90x55.'.$pathInfo['extension'];
		}
		return $data;
   	}
    /**
     * 清空最近浏览
     * @return [type] [description]
     */
    Public function clearRecentView(){
        if(IS_AJAX == false) exit();
        $key = encrypt('recent-view');
        if(isset($_COOKIE[$key])){
            unset($_COOKIE[$key]);
        }
        setcookie($key,'',1,'/');
    }
}
?>