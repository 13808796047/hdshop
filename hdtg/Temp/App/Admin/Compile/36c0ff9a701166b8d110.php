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
	<span class='title'>商品列表</span>
</div>
<div id="content">
	<table id="table" class='table1'>
		<thead>
			<tr>

				<th width="20%">商铺名称</th>
				<th width="20%">商品标题</th>
				<th width="8%">商品价格</th>
				<th width="8%">商品销量</th>
				<th width="10%">所在地区</th>
				<th width="8%">所属分类</th>
				<th width="15%">下架时间</th>
				<th >操作</th>
			</tr>
		</thead>
		<tbody>
			<?php $hd["list"]["g"]["total"]=0;if(isset($goods) && !empty($goods)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($goods));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($goods,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

				<tr>

					<td><?php echo $g['shopname'];?></td>
					<td><?php echo $g['main_title'];?></td>
					<td><?php echo $g['price'];?></td>
					<td><?php echo $g['buy'];?></td>
					<td><?php echo $g['lname'];?></td>
					<td><?php echo $g['cname'];?></td>
					<td><?php echo date('Y-m-d H:i:s',$g['end_time']);?></td>
					<td>
						
						<a class='btn btn-danger btn-xs' href="<?php echo U(edit,array('gid'=>$g['gid']));?>">编辑</a>
						<a class='btn btn-warning btn-xs delAffirm' href="javascript:hd_ajax('<?php echo U(del);?>',{gid:<?php echo $g['gid'];?>})">删除</a>
					</td>
				</tr>
			<?php $hd["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</tbody>
	</table>
	<div class='page1'><?php echo $page;?></div>
</div>
</body>
</html>