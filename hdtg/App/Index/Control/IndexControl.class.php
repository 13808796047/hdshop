<?php
/**
 * 首页控制器
 */
class IndexControl extends CommonControl{
	Public function __auto(){
        
		$this->db = K('goods');
        $this->setPrice();
        $this->setCategory();
        $this->setLocality();
        $this->setSearchWhere();
        $this->setOrderUrl();
        $this->setOrder();
        
	}
	

    Public function index(){
    	
    	
    	
    	
    	$total=$this->db->getTotal();
    	$page = new Page($total,10);
    	$data=$this->db->getGoods($page->limit());
        $this->goods = $this->disGoods($data);
    	$this->page = $page->show(2);
    	$this->display();
        
    }
    private function setOrder(){
        $order ='';
        $arr = explode('-',Q('order','t-desc'));
        switch ($arr[0]) {
            case 'd':
               $order = 'begin_time '.$arr[1];
                break;
            
            case 'b':
               $order = 'buy '.$arr[1];
                break;
            case 'p':
                $order = 'price '.$arr[1];
                break;
            case 'p':
                $order = 'price '.$arr[1];
                break; 
            case 't':
               $order = 'begin_time '.$arr[1];
                break;  
        }
        $this->db->order=$order;
    }
    /**
     * 设置排序模板
     */
    Private function setOrderUrl(){
        $url = url_param_remove('order',__URL__);
        $orderUrl = array();
        //default 默认
        $orderUrl['d']= $url.'/order/t-desc';
         //buy 销量
        $orderUrl['b']= $url.'/order/b-desc';
        //price 降序
        $orderUrl['p_d']= $url.'/order/p-desc';
         //price 升序
        $orderUrl['p_a']= $url.'/order/p-asc';
        //begin_time
        $orderUrl['t']= $url.'/order/t-desc';
        $this->orderUrl = $orderUrl;

    }
    /**
     * 处理查询结果
     */
    private function disGoods($data){
        if(!is_array($data)) return;
        foreach ($data as $k=>$v){
            $pathInfo = pathinfo($v['goods_img']);
            $data[$k]['goods_img'] = __ROOT__.'/'.$pathInfo['dirname'].'/'.$pathInfo["filename"].'_310x190.'.$pathInfo['extension'];
            $data[$k]['sub_title'] = mb_substr($v['sub_title'],0,30,'utf8');
        }
        return $data;
    }
    /**
     * 没有cid,只显示顶级分类
     * 有cid,显示顶级分类和它的子类
     */
    Public function setCategory(){

    	$url = url_param_remove('cid',__URL__);
    	$cid = Q('cid',NULL,'intval');
    	$db = K('category');
    	if(is_null($cid)){
    		$topCategory=$db->getCategoryLevel(0);
    		$tmpArr=array();
    		$tmpArr[] ='<a class="active" href="'.$url.'">全部</a>';
    		foreach ($topCategory as $v) {
    			$tmpArr[]='<a href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
    		}
    		$this->topCategory=$tmpArr;
    		return;
    	}
    	$pid = $db->getCategoryPid($cid);
    	$topCategory=$db->getCategoryLevel(0);
    		$tmpArr=array();
    		$tmpArr[] ='<a  href="'.$url.'">全部</a>';
    		foreach ($topCategory as $v) {
    			
    				if($pid ==$v['cid']||$cid ==$v['cid']){
    					$tmpArr[]='<a class="active" href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
    				}else{
    					$tmpArr[]='<a href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
    				}
    			
    		
    		}
    		$this->topCategory=$tmpArr;
    		if($pid==0){
    			$sonCategory = $db->getCategoryLevel($cid);
    			
    		}else{
    			$sonCategory = $db->getCategoryLevel($pid);
    		}
    		if(is_null($sonCategory)) return;

 			$tmpArr = array();
 			
 			if($pid==0){
 				$tmpArr[] = '<a class="active" href="'.$url.'/cid/'.$cid.'">全部</a>';
 			}else{
 				$tmpArr[] = '<a  href="'.$url.'/cid/'.$pid.'">全部</a>';
 			}
 			foreach ($sonCategory as $v) {
 				if($v['cid']==$cid){
 					$tmpArr[]='<a class="active" href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
 				}else{
 					$tmpArr[]='<a href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
 				}
 			}
 			$this->sonCategory = $tmpArr;

    }
    /**
     * 设置地区筛选模板
     */
    Private function setLocality(){
    	$url = url_param_remove('lid',__URL__);
    	$lid = Q('lid',NULL,'intval');
    	 $db = k('locality');
    	if(is_null($lid)){
    		$topLocality=$db->getLocalityLevel(0);
    		
    		$tmpArr=array();
    		$tmpArr[] ='<a class="active" href="'.$url.'">全部</a>';
    		foreach ($topLocality as $v) {
    			$tmpArr[]='<a href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
    		}
    		$this->topLocality=$tmpArr;
    		return;
    	}
    	/**
    	 * 有lid
    	 * @var [type]
    	 */
    	$pid = $db->getLocalityPid($lid);
    	$topLocality=$db->getLocalityLevel(0);
    		$tmpArr=array();
    		$tmpArr[] ='<a  href="'.$url.'">全部</a>';
    		foreach ($topLocality as $v) {
    			
    				if($pid ==$v['lid']||$lid ==$v['lid']){
    					$tmpArr[]='<a class="active" href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
    				}else{
    					$tmpArr[]='<a href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
    				}
    			
    		
    		}
    	
    	
    		$this->topLocality=$tmpArr;
    		if($pid==0){
    			$sonLocality = $db->getLocalityLevel($lid);
    			
    		}else{
    			$sonLocality = $db->getLocalityLevel($pid);
    		}
    		if(is_null($sonLocality)) return;

 			$tmpArr = array();
 			
 			if($pid==0){
 				$tmpArr[] = '<a class="active" href="'.$url.'/lid/'.$lid.'">全部</a>';
 			}else{
 				$tmpArr[] = '<a  href="'.$url.'/lid/'.$pid.'">全部</a>';
 			}
 			foreach ($sonLocality as $v) {
 				if($v['lid']==$lid){
 					$tmpArr[]='<a class="active" href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
 				}else{
 					$tmpArr[]='<a href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
 				}
 			}
 			$this->sonLocality = $tmpArr;

    }
    /**
     *设置价格筛选模板
     * 
     */
    Private function setPrice(){
    	$url = url_param_remove('price',__URL__);
    	$db=K('category');
    	$cid = Q('cid',NULL,'intval');
    	
    	$key = '';
    	if(is_null($cid)){
    		$key ='all';
    	}else{
    		$pid = $db->getCategoryPid($cid);
    		$key = $pid?$pid:$cid;
    	}
    	$prices = C('price');

    	$price = $prices[$key];
    	$tmpArr = array();

    	if(is_null( Q('price'))){
    		$tmpArr[] = '<a class="active" href="'.$url.'">全部</a>';
    	}else{
    		$tmpArr[] = '<a  href="'.$url.'">全部</a>';
    	}
    	foreach ($price as $v) {
    		if(Q('price') == $v[1]){
    			$tmpArr[] = '<a class="active" href="'.$url.'/price/'.$v[1].'">'.$v[0].'</a>';
    		}else{
    			$tmpArr[] = '<a  href="'.$url.'/price/'.$v[1].'">'.$v[0].'</a>';
    		}
    	}
    	$this->price = $tmpArr;

    }
    /**
     * 设置搜索条件
     */
    Public function setSearchWhere(){
    	//组合分类
    	if(!is_null(Q('cid',NULL,'intval'))){
    		$db = K('category');
    		$sonCids = $db->getSonCategory(Q('cid',NULL,'intval'));
    	
    		foreach ($sonCids as $v) {
    			$this->db->cids['cid'][]=$v['cid'];
    		}
    		
    	}
    	//组合地区条件
    	if(!is_null(Q('lid',NULL,'intval'))){
    		$db=K('locality');
    		$sonCids = $db->getSonLocality(Q('lid',NULL,'intval'));
    	
    		foreach ($sonCids as $v) {
    			$this->db->lids['lid'][]=$v['lid'];
    		}
    		
    	}
    	//组合价格条件
    	if(!is_null(Q('price'))){
    		$arr = explode('-', Q('price'));
    		if(isset($arr[1])){
    			$this->db->price = 'price>'.$arr[0].' and price<'.$arr[1];
    		}else{
    			$this->db->price= 'price>'.$arr[0];
    		}
    	}
    	
    }

}
?>