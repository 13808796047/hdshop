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
	
	<!-- 载入公共头部文件-->
	<!-- 载入商品筛选-->
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- 商品过滤开始 -->
	<div id="filter">
		<div class='hots'>
			<span>热门团购：</span>
			<div class='box'>	
				<a href="">电影</a><a href="经济型酒店">经济型酒店</a><a href="自助餐">自助餐</a><a href="KTV">KTV</a><a href="火锅">火锅</a><a href="烧烤烤肉">烧烤烤肉</a><a href="本地/周边游">本地/周边游</a>
			</div>	
		</div>
		
		<div class='filter-box'>
			<div class='category filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>分类：</span>
					<div class='box'>
						<?php if(is_array($topCategory)):?><?php  foreach($topCategory as $v){ ?>
							<?php echo $v;?>
						<?php }?><?php endif;?>
					</div>
				</div>
				<?php if($sonCategory){?>
				<div class='filter-label-level-2'>
					<div class='box'>
						<?php if(is_array($sonCategory)):?><?php  foreach($sonCategory as $v){ ?>
							<?php echo $v;?>
						<?php }?><?php endif;?>
					</div>
				</div>
				<?php }?>
			</div>
			<div class='locality filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>区域：</span>
					<div class='box'>
						<?php if(is_array($topLocality)):?><?php  foreach($topLocality as $v){ ?>
							<?php echo $v;?>
						<?php }?><?php endif;?>
					</div>
				</div>
				<?php if($sonLocality){?>
					<div class='filter-label-level-2'>
						<div class='box'>
							<?php if(is_array($sonLocality)):?><?php  foreach($sonLocality as $v){ ?>
								<?php echo $v;?>
							<?php }?><?php endif;?>
						</div>
					</div>
				<?php }?>
			</div>
			<div class='price filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>价格：</span>
					<div class='box'>
						<?php if(is_array($price)):?><?php  foreach($price as $v){ ?>
							<?php echo $v;?>
						<?php }?><?php endif;?>
					</div>
				</div>
			</div>	
			<div class='screen'>
				<div>
					<a class='active' href="<?php echo $orderUrl['d'];?>">默认排序</a>
					<a href="<?php echo $orderUrl['b'];?>">销量<b></b></a>
					<a href="<?php echo $orderUrl['p_d'];?>">价格<b></b></a>
					<a href="<?php echo $orderUrl['p_a'];?>">价格<b style="background-position:-45px -16px;"></b></a>
					<a style="border:0;" href="<?php echo $orderUrl['t'];?>">发布时间<b></b></a>
				</div>
			</div>
		</div>	
	</div>
	<!-- 商品过滤结束 -->
	<link href="http://127.0.0.1/hdshop/hdtg/App/Index/Tpl/Public/css/index.css" type="text/css" rel="stylesheet" >
	<!-- 页面主体开始 -->
	<div id="main">
		<div class='content'>
			<?php $hd["list"]["v"]["total"]=0;if(isset($goods) && !empty($goods)):$_id_v=0;$_index_v=0;$lastv=min(1000,count($goods));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($goods,0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

			<div class='item'>
				<div class='cover'>
					<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="<?php echo $v['goods_img'];?>"/></a>
				</div>
				<a class='link' href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>">
					<h3><?php echo $v['main_title'];?></h3>
					<p class='describe'><?php echo $v['sub_title'];?></p>
				</a>
				<p class='detail'>
					<strong>¥<?php echo $v['price'];?></strong>
					<span>门店价<span>-</span><del><?php echo $v['old_price'];?></del></span>
					<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"></a>
				</p>
				<p class='total'>
					<strong><?php echo $v['buy'];?></strong>
					人已参与
				</p>
			</div>
			<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			<div class='c'></div>
			<div class='page'>
				<?php echo $page;?>
			</div>
		</div>
		<div class='sidebar'>
			<div class='hot-products'>
				<h3>热卖商品</h3>
				<ul>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
					<li>
						<h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
						<a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
						<div class='info'>
							<em>¥30</em>
							<p>每天<span>231</span>人团购</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class='c'></div>
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>
</body>
</html>