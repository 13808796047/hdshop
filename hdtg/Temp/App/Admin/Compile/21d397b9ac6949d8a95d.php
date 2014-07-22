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
	<span class='title'>修改分类</span>
</div>
<div id="content">
	<form  class='hd-form' onsubmit="return hd_submit(this,'<?php echo U(index);?>')"  method="post">
	<input type='hidden'  name='lid' value='<?php echo $field['lid'];?>'>
		<table class='table1'>
		
			<tbody>
				<tr>
					<td >所属分类</td>
					<td>
		 			<select name='pid'>
		 			<option value='0'>== 一级栏目 == </option>
		 			<?php $hd["list"]["c"]["total"]=0;if(isset($locality) && !empty($locality)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($locality));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($locality,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

		 				<option value='<?php echo $c['lid'];?>' <?php echo $c['selected'];?> <?php echo $c['disabled'];?>><?php echo $c['_name'];?></option>
		 			<?php $hd["list"]["c"]["first"]=false;
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
						<input type="text" name="lname" value='<?php echo $field['lname'];?>' />
					</td>
				</tr>
				
				<tr>
					<td>分类排序</td>
					<td>
						<input name="sort" type="text" value='<?php echo $field['sort'];?>'/>
					</td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<?php if($field['display']){?>

						<lable>
							<input type="radio" checked="true" name="display" value="1"/>
							<span>显示</span>
						</lable>
						<lable>
							<input type="radio" name="display" value="0"/>
							<span>隐藏</span>
						</lable>
						<?php  }else{ ?>
						<lable>
							<input type="radio" checked="true" name="display" value="1"/>
							<span>显示</span>
						</lable>
						<lable>
							<input type="radio" name="display"  checked="true" value="0"/>
							<span>隐藏</span>
						</lable>
					<?php }?>
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