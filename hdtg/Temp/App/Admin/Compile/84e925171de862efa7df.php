<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
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


<script type="text/javascript" src="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/js/common.js"> </script>
<link href="http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/css/common.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AC37be9efe7459c38f04c34a964155a2"></script>
<script type="text/javascript" src='http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/js/shop.js'></script>
<div id="map">
	<span class='title'>编辑商铺</span>
</div>
<div id="content">
	<form  onsubmit="return hd_submit(this,'<?php echo U(index);?>')"  class='hd-form' method="post">
	<input type='hidden' name='shopid' value='<?php echo $field['shopid'];?>'>
		<table class='table1'>

			<tbody>

				<tr>
					<td >商铺名称</td>
					<td>
						<input type="text" name="shopname" value='<?php echo $field['shopname'];?>' />
					</td>
				</tr>
				<tr>
					<td>商铺地址</td>
					<td>
						<input type ='text' class='w300' name='shopaddress' value='<?php echo $field['shopaddress'];?>'></td>
				</tr>
				<tr>
					<td>地铁地址</td>
					<td>
						<input type='text' name ='metroaddress' class='w300'  value='<?php echo $field['metroaddress'];?>'></td>
				</tr>
				<tr>
					<td>商铺电话</td>
					<td>
						<input type='text' name ='shoptel' class='w300' value='<?php echo $field['shoptel'];?>'></td>
				</tr>

				<tr>
					<td>商铺坐标</td>
					<td>
						<input id="shopcoord" name="shopcoord" type="text" value='<?php echo $field['shopcoord'];?>'/>
					<input id="getPoint" class='btn' type="button" value="获取坐标">
					</td>
				</tr>

				<tr>
					
					<td>
						<input type='submit'  class='btn1'></td>

				</tr>
			</tbody>

		</table>

	</form>

</div>
</body>
</html>