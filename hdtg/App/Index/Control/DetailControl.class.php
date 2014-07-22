<?php
Class DetailControl extends CommonControl{
	Public function __auto(){
		$this->db=K('goods');
		$this->setRecentView();
	}
	Public function index(){
	
		$gid=Q('gid',NULL,'intval');
		$detail=$this->db->getGoodsDetail($gid);
		
		$this->detail=$this->disDetailData($detail);

		$this->display();
	}
	/**
	 * 处理商品细节数据 
	 * @return [type] [description]
	 */
	Private function disDetailData($detail){
		$detail['zhekou'] = round(($detail['price']/$detail['old_price']*10),1);
		 $pathInfo = pathinfo($detail['goods_img']);
         $detail['goods_img'] = __ROOT__.'/'.$pathInfo['dirname'].'/'.$pathInfo["filename"].'_460x280.'.$pathInfo['extension'];
         if($detail['end_time']-time()>(pow(60,2)*24*3)){
         	$detail['end_time'] = '剩余<span>3</span>天以上';
         }else{
         	$detail['end_time'] = date('Y-m-d H:i:s').'下架';
         }
		$goodsServer = array_slice(unserialize($detail['goods_server']),0,2);
		$server = C('goods_server');
		$detail['server'] = array(
				$server[$goodsServer[0]],
				$server[$goodsServer[1]],
			);

		return $detail;
	}
	/**
	 * 设置最近浏览
	 */
	Private function setRecentView(){
		$key = encrypt('recent-view');
		$value = isset($_COOKIE[$key])?unserialize(decrypt($_COOKIE[$key])):array();
		
		if(!in_array(Q('gid',NULL,'intval'),$value)){
			array_unshift($value,Q('gid',NULL,'intval'));
		}
		

		setcookie($key,encrypt(serialize($value)),time()+86400,'/');
		
	}
}