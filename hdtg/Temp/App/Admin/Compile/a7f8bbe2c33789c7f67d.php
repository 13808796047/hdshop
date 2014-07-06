<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/css/base.css" type="text/css" rel="stylesheet">
<link href="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/css/index.css" type="text/css" rel="stylesheet">
<link href="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/css/reset.css" type="text/css" rel="stylesheet">
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
</script>
<script	type="text/javascript" src="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/js/index.js"></script>

<base target="showContent" />
<title>团购</title>

</head>
<body style="overflow:hidden;" scroll="no">

<div id="header">
	<div class='hd-box'>
		<div class='hd-top'>
			<div class="logo">
				<a href="http://127.0.0.1/hdshop/index.php/Admin"><img src="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/images/logo.png"/></a>
			</div>
			<div class='logout'>
				<a style='color:#FFF;' href="">站点主页</a>
				<a href="">退出登录</a>
			</div>
		</div>
		<div class='bar'>
			<div class='home'>
				<a href="http://127.0.0.1/hdshop/index.php/Admin"></a>
			</div>
			<div class="nav">
				
				<a href="javascript:void(0);">会员管理</a>
				
				<a href="javascript:void(0);">地区管理</a>
				
				<a href="javascript:void(0);">分类管理</a>
			
				<a href="javascript:void(0);">商铺管理</a>
				
				<a href="javascript:void(0);">商品管理</a>
				
				<a  href="javascript:void(0);">订单管理</a>
				
				<a class='active' href="javascript:void(0);">站点概要</a>
			</div>
		</div>
	</div>
</div>
<div id="box">
	<div id="sidebar">
		<!-- 会员管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">会员管理</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
		<!-- 地区管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">地区管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Locality/add');?>">添加地区</a></li>
					<li><a href="<?php echo U('Admin/Locality/index');?>">地区列表</a></li>
					<li><a href="<?php echo U('Admin/Locality/update_cache');?>">更新地区数据缓存</a></li>
				</ul>
			</div>
		</div>
		<!-- 分类管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">分类管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Category/add');?>">添加分类</a></li>
					<li><a href="<?php echo U('Admin/Category/index');?>">分类列表</a></li>
					<li><a href="<?php echo U('Admin/Category/update_cache');?>">更新栏目缓存</a></li>
				</ul>
			</div>
		</div>
		<!-- 商铺管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">商铺管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Shop/add');?>">添加商铺</a></li>
					<li><a href="<?php echo U('Admin/Shop/index');?>">商铺列表</a></li>
				</ul>
			</div>	
		</div>	
		<!-- 商品管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">商品管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Goods/add');?>">添加商品</a></li>
					<li><a href="<?php echo U('Admin/Goods/index');?>">商品列表</a></li>
				</ul>
			</div>	
		</div>
		<!-- 订单管理 -->
		<div class='menuItem'>
			<div class='menu'>	
				<a class='title' href="javascript:void(0);">订单管理</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
		<!-- 站点概要 -->
		<div class='menuItem' style="display:block;">
			<div class='menu'>	
				<a class='title' href="javascript:void(0);">站点概要</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="content">
		 <iframe id="iContent" name='showContent' scrolling="auto" height="100%" width="100%" frameborder="0" src="http://127.0.0.1/hdshop/index.php/Admin/Index/welcome" >
     		  
	 	</iframe>
	</div>
</div>
</body>
</html>