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

<script type="text/javascript" src='http://127.0.0.1/hdshop/hdtg/App/Admin/Tpl/Public/js/category.js'></script>
<div id="map">
	<span class='title'>添加分类</span>
</div>
<div id="content">
	<form  onsubmit="return hd_submit(this,'<?php echo U(index);?>')" class='hd-form' method="post">
		<table class='table1'>

			<tbody>
				<tr>
					<td >所属分类</td>
					<td>

						<select name='pid'>

							<option value='<?php echo $parent['cid'];?>' ><?php echo $parent['cname'];?></option>
							<option value='0'>顶级分类</option>
							<?php $hd["list"]["v"]["total"]=0;if(isset($level) && !empty($level)):$_id_v=0;$_index_v=0;$lastv=min(1000,count($level));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($level,0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

							
								<option value='<?php echo $v['cid'];?>'><?php echo $v['_name'];?></option>
							<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</select>
					</td>
				</tr>
				<tr>
					<td >分类名称</td>
					<td>
						<input type="text" name="cname" />
					</td>
				</tr>
				<tr>
					<td>分类标题</td>
					<td>
						<input type ='text' name='title'></td>
				</tr>
				<tr>
					<td>分类关键字</td>
					<td>
						<input type='text' name ='keywords' class='w300'></td>
				</tr>
				<tr>
					<td>分类描述</td>
					<td>
						<textarea  class='w300 h100' name="description"></textarea>
					</td>
				</tr>
				<tr>
					<td>分类排序</td>
					<td>
						<input name="sort" type="text" />
					</td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<lable>
							<input type="radio" checked="true" name="display" value="1"/>
							<span>显示</span>
						</lable>
						<lable>
							<input type="radio" name="display" value="0"/>
							<span>隐藏</span>
						</lable>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type='submit'  class='btn1'></td>

				</tr>
			</tbody>

		</table>

	</form>

</div>
</body>
</html>