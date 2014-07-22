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
	<link href="http://127.0.0.1/hdshop/hdtg/App/Member/Tpl/Public/css/buy.css" type="text/css" rel="stylesheet" >
	<div class='position'>
	<form action ='<?php echo U('Member/Buy/checkBuy');?>' method ='post'>
		<div id="main">
			<div class='step'>
				<ul>
					<li>1.查看购物车 </li>
					<li class='current'>2.选择支付方式 </li>
					<li>3.购买成功 </li>
				</ul>	
			</div>
			<ul class='buy-detail'>
			<?php $hd["list"]["v"]["total"]=0;if(isset($order) && !empty($order)):$_id_v=0;$_index_v=0;$lastv=min(1000,count($order));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($order,0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

			<input type='hidden' name='orderid[]' value ='<?php echo $v['orderid'];?>'
				<li>
				
					<p>
						<span>项目名称：</span>
						<?php echo $v['main_title'];?>
					</p>
					<p>
						<span>商品数量：</span> <?php echo $v['goods_num'];?>
					</p>
				</li>
			<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</ul>
			<div class='total'>
				<p>总价：<strong><?php echo $sumPrice;?></strong></p>
				<p>账户余额：<strong><?php echo $balance;?></strong></p>
			</div>	
			<!-- 订单提交 -->
			<div class='bottom'>
				<input type="submit" class='submit' value="确认支付">
			</div>
		</div>
	</form>
		</div>
		
</body>
</html>