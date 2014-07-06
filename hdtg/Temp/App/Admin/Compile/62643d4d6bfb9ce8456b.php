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
<link href='http://127.0.0.1/hdshop/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/hdshop/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script>
                <!--[if lte IE 6]>
                <link rel="stylesheet" type="text/css" href="http://127.0.0.1/hdshop/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
                <![endif]-->
                <!--[if lt IE 9]>
                <script src="http://127.0.0.1/hdshop/hdphp/Extend/Org/bootstrap/js/html5shiv.min.js"></script>
                <script src="http://127.0.0.1/hdshop/hdphp/Extend/Org/bootstrap/js/respond.min.js"></script>
                <![endif]-->
<div id="map">
	<span class='title'>分类列表</span>
</div>
<div id="content">
	<table id="table" class='table1'>
		<thead>
			<tr>
				<th width="5%"></th>
				<th width="25%">分类名称</th>
				<th width="30%">分类标题</th>
				<th width="10%">分类排序</th>
				<th width="10%">是否显示</th>
				<th >操作</th>
			</tr>
		</thead>
		<tbody>
		<?php $hd["list"]["v"]["total"]=0;if(isset($data) && !empty($data)):$_id_v=0;$_index_v=0;$lastv=min(1000,count($data));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($data,0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

			<tr class="level_<?php echo $v['_level'];?> pid_<?php echo $v['pid'];?>" cid="<?php echo $v['cid'];?>" level="<?php echo $v['level'];?>">
				<td><a class='btn btn-xs btn-info unfold' style="font-size:16px;" href="">+</a></td>
				<td><?php echo $v['_name'];?></td>
				<td><?php echo $v['title'];?></td>
				<td><?php echo $v['sort'];?></td>
				<td>
					<?php if($v['display']){?>
						显示
						<?php  }else{ ?>
						隐藏
					<?php }?>
				</td>
				<td>
					<a class='btn btn-success btn-xs' href="<?php echo U(add,array('cid'=>$v['cid']));?>">添加子类</a>
					<a class='btn btn-danger btn-xs' href="<?php echo U(edit,array('cid'=>$v['cid']));?>">编辑</a>
					<a class='btn btn-warning btn-xs delAffirm' href="javascript:hd_ajax('<?php echo U(del);?>',{cid:<?php echo $v['cid'];?>})">删除</a>
				</td>
			</tr>
		<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</tbody>
	</table>
</div>
</body>
</html>