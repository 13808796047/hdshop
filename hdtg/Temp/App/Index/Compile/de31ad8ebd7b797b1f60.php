<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="http://127.0.0.1/hdshop/Public/css/reset.css" type="text/css" rel="stylesheet" >
<link href="http://127.0.0.1/hdshop/Public/css/common.css" type="text/css" rel="stylesheet" >
<script type='text/javascript' src='http://127.0.0.1/hdshop/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>

<script type='text/javascript' src='http://127.0.0.1/hdshop/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://127.0.0.1/hdshop/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/hdshop/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://127.0.0.1/hdshop/hdphp/../hdjs/js/slide.js'></script>
<script src='http://127.0.0.1/hdshop/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
HDPHP = '<?php echo $GLOBALS['user']['HDPHP'];?>';
HDPHPDATA = '<?php echo $GLOBALS['user']['HDPHPDATA'];?>';
HDPHPTPL = '<?php echo $GLOBALS['user']['HDPHPTPL'];?>';
HDPHPEXTEND = '<?php echo $GLOBALS['user']['HDPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
HTTPREFERER = '<?php echo $GLOBALS['user']['HTTPREFERER'];?>';
</script>
<script type="text/javascript" src="http://127.0.0.1/hdshop/Public/js/common.js"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo $webInfo['title'];?></title>

</head>
<body>
	<!-- 顶部开始 -->
	<div id="top">
		<div class='position'>
			<div class='left'>
				
			</div>
			<div class='right'>
				<a href="javascript:addFavorite2();">收藏</a>
			</div>
		</div>
	</div>
	<!-- 顶部结束 -->
	<!-- 头部开始 -->
	<div id="header">
		<div class='position'>
			<div class='logo'>
				<a style="line-height:60px;" href="http://127.0.0.1/hdshop">今日团购</a>
				<a style="font-size:16px;" href="http://127.0.0.1/hdshop">www.51v2.com</a>
			</div>
			<div class='search'>
				<div class='item'>
					<a href="">小时代</a>
					<a href="">KTV</a>
					<a href="">电影</a>
					<a href="">全聚德</a>
				</div>
				<div class='search-bar'>
					<input class='s-text' type="text" name="keywords" value="请输入商品名称，地址等">
					<input class='s-submit' type="submit" value='搜索'>
				</div>
			</div>
			<div class='commitment'>
				
			</div>
		</div>
	</div>
	<!-- 头部结束 -->
	<!-- 导航开始-->
	<div id="nav">
		<div class='position'>
			<!-- 分类相关 -->
			<div class='category'>
				<a class='active' href="http://127.0.0.1/hdshop">首页</a>
				<?php if(is_array($nav)):?><?php  foreach($nav as $v){ ?>
					<a  href="<?php echo U('Index/Index/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a>
				<?php }?><?php endif;?>
			</div>
			<!-- 用户相关 -->
			<div id="user-relevance" class='user-relevance'>
				<?php if($userIsLogin){?>
				<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Login/quit');?>">退出</a>
						<!--我的团购 -->	
					
					</div>
					<div class='user-nav my-hdtg '>
						<a class='title' href="">我的团购</a>
						<ul class="menu">
							<li><a href="">我的订单</a></li>	
							<li><a href="">我的评价</a></li>
							<li><a href="">我的收藏</a></li>
							<li><a href="">我的成长</a></li>
							<li><a href="">账户余额</a></li>
							<li><a href="">账户充值</a></li>
							<li><a href="">账户设置</a></li>
						</ul>
					</div>
				<?php  }else{ ?>
				<!--登录注册-->
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Reg/index');?>">注册</a>
					</div>
					<div class='user-nav login-reg'>	
						<a class='title' href="<?php echo U('Member/Login/index');?>">登录</a>
					</div>
				
				<?php }?>
			
			
					<div  class='user-nav recent-view ' url='<?php echo U('Member/Index/getRecentView');?>' goodUrl='<?php echo U('Index/Detail/index');?>' clearView='<?php echo U('Member/Index/clearRecentView');?>'>
						<a class='title' href="">最近浏览</a>
						<ul class="menu">
							
						
						
						</ul>
					</div>
					<!-- 购物车-->
					<div  class='user-nav my-cart ' id='my-cart' url='<?php echo U('Member/Cart/index');?>' goodUrl='<?php echo U('Index/Detail/index');?>' delCartUrl='<?php echo U('Member/Cart/del');?>'>
						<a class='title' href="<?php echo U('Member/Cart/index');?>"><i>&nbsp;</i>购物车</a>
						<ul class="menu">
							
							<p>正在加载</p>
						</ul>
					</div>
			</div>
		</div>
	</div> 
	<!-- 导航结束 -->
	
<!-- 载入公共头部文件结束 -->
	<link href="http://127.0.0.1/hdshop/hdtg/App/Index/Tpl/Public/css/detail.css" type="text/css" rel="stylesheet" >
	<div id="map" class='position'>
		<a href="<?php echo U('Index/index/index');?>/lid/<?php echo $detail['lid'];?>"><?php echo $detail['lname'];?></a><span>>></span><a href="<?php echo U('Index/index/index');?>/cid/<?php echo $detail['cid'];?>"><?php echo $detail['cname'];?></a><span>>></span><?php echo $detail['shopname'];?>
	</div>
	<div id="content" class='position' style="height:3000px;">
		<div class='content-left'>
			<div class="goods-intro">
				<div class='goods-title'>
					<h1><?php echo $detail['main_title'];?></h1>
					<h3><?php echo $detail['sub_title'];?></h3>
				</div>
				<div class='deal-intro'>
					<div class='buy-intro'>
						<div class='price'>
							<div class='discount-price'>
								<span>¥</span><?php echo $detail['price'];?>
							</div>
							<div class='cost-price'>
								<span class='discount'><?php echo $detail['zhekou'];?>折</span>
								门店价¥<del><?php echo $detail['old_price'];?></del>
							</div>
						</div>
						<div class='deal-buy-cart'>
							<a href="<?php echo U('Member/Buy/index');?>/gid/<?php echo $detail['gid'];?>" class='buy'></a>
							<a href="javascript:void(0);" url="<?php echo U('Member/Cart/add');?>/gid/<?php echo $detail['gid'];?>" id='addCart' class='cart'></a>
						</div>
						<div class='purchased'>
							<p class='people'>
								<span><?php echo $detail['buy'];?></span>人已团购
							</p>
							<p class='time'>
								<?php echo $detail['end_time'];?>
							</p>
						</div>
						<ul class='refund-intro'>
						<?php $hd["list"]["v"]["total"]=0;if(isset($detail['server']) && !empty($detail['server'])):$_id_v=0;$_index_v=0;$lastv=min(1000,count($detail['server']));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($detail['server'],0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

							<li>
								<span class='ico'><?php echo $v['img'];?></span>
								<span class='text'><?php echo $v['name'];?></span>
							</li>
						<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</ul>
					</div>
					<div class='image-intro'>
						<img src="<?php echo $detail['goods_img'];?>"/>
					</div>
				</div>
				<div class='collect'>
					<a class='collect-link' href=''><i></i>收藏本单</a>
					
					<div class='share'>
						
					</div>
					
				</div>
			</div>
			<div class='detail'>
				<ul class='plot-points'>
					<li class='active'><a href="#shop-site">商家位置</a></li>
					<li><a href="#details">本单详情</a></li>
					<li><a href="#comment">消费评价</a></li>
				</ul>
				<div id="shop-site" class='shop-site'>
					<p class='site-title'>商家位置</p>
					<div class='box'>
						<div id='bMap' class='map'>
							
						</div>
						<div class='info'>
							<h3><?php echo $detail['shopname'];?></h3>
							<dl>
								<dt>地址:</dt>
								<dd><?php echo $detail['shopaddress'];?></dd>
							</dl>
							<dl>
								<dt>地铁:</dt>
								<dd><?php echo $detail['metroaddress'];?></dd>
							</dl>
							<dl>
								<dt>电话:</dt>
								<dd><?php echo $detail['shoptel'];?></dd>
							</dl>
						</div>
					</div>
				</div>
				<div id="details"  class='details'>
					<?php echo $detail['detail'];?>
				</div>
				<div id="comment" class='comment'>
					<div class='comment-list-title'>
						<span>全部评价</span>
						<a class='order-time' href="">按时间<i></i></a>
					</div>
					<div class='comment-list'>
						<div class='list-con'>
							<div class='con-top'>
								<span class='username'>sdas</span>
								<span class='time'>评价于:<em>2013-08-04</em></span>
							</div>
							<p>
								说是香草拿铁不是很苦，结果根本不是想象中的味道！像速溶冲调！还要另加五元？有此一说吗？银座店环境一般！
							</p>
						</div>
						
					</div>
					<div class='comment-page'>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
					</div>
				</div>
			</div>
		
		</div>
		<div class='content-right'>
			<div class='recommend'>
				<h3 class='recommend-title'>
					看过本团购的用户还看了
				</h3>
				<div class='recommend-goods'>
					<a class='goods-image' href="">
						<img alt="图像加载失败.." src="http://p0.meituan.net/200.121/deal/__5738304__3391447.jpg">
					</a>
					<h4>
						<a href="">【五道口】上岛咖啡：双人下午茶套餐，美味齐分享</a>
					</h4>
					<p>
						<strong>¥39.8</strong>
						<span class='cost-price'>门店价<del>144</del></span>
						<span class='num'>
							<span>173</span>
							 人已团购
						</span>
					</p>
				</div>
			</div>
		</div>

		
		
	</div>		
<!-- 购物车JS -->
	<div class="c"></div>
	<div id="cover"></div>
	<div id="infoWindow">
		
	</div>
	<script src="http://127.0.0.1/hdshop/hdtg/App/Index/Tpl/Public/js/detail.js"> </script>
	<script>
		var cartSucc = "<div class='colse'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>添加成功!</h3>\
				<p>购物车内共有<span id='total'></span>种商品</p>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href='<?php echo U('Member/Cart/index');?>'>查看购物车</a>\
		</div>";
		var collectSucc = "<div class='colse'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>收藏成功!</h3>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href='<?php echo U('Member/Index/collect');?>'>查看我的收藏</a>\
		</div>";
		var userIsLogin = false;
		<?php if($userIsLogin){?>
			userIsLogin = true;
		<?php }?>
	</script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AC37be9efe7459c38f04c34a964155a2"></script>
<script >
	var shopcoord = <?php echo $detail['shopcoord'];?>;
	//百度地图API
	var map = new BMap.Map('bMap');
	var point = new BMap.Point(shopcoord.lng,shopcoord.lat);
	map.centerAndZoom(point,15);
	map.enableScrollWheelZoom();
	map.addControl(new BMap.NavigationControl( {anchor: BMAP_ANCHOR_TOP_RIGHT, offset: new BMap.Size(10, 10)}));
	var marker = new BMap.Marker(point);        // 创建标注

	map.addOverlay(marker);                     // 将标注添加到地图中
	
</script>











<!-- 载入公共头部文件开始 --> 
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>
<!-- 载入公共头部文件结束 -->