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
	<span class='title'>编辑商品</span>
</div>
<div id="content">
	<form  onsubmit="return hd_submit(this,'<?php echo U(index);?>')" class='hd-form' method="post">
	<input type='hidden' name='gid' value='<?php echo $goods['gid'];?>'/>
		<table class='table1'>

			<tbody>

				<tr>
					<td >所属商家</td>
					<td>
						
						<input type="hidden" name="shopid" value='<?php echo $goods['shopid'];?>'/>
						<?php echo $goods['shopname'];?>
					</td>
					
					
					
				</tr>
				<tr>
				
					<td>所属分类</td>
					<td>
						
						<select name='cid'>
						<option value='<?php echo $goods['cid'];?>'><?php echo $goods['cname'];?></option>
						<?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

							<option value='<?php echo $c['cid'];?>'><?php echo $c['_name'];?></option>
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
					<td>所在地区</td>
					<td>
						<select name='lid'>
						<option value='<?php echo $goods['lid'];?>'><?php echo $goods['lname'];?></option>
						<?php $hd["list"]["l"]["total"]=0;if(isset($locality) && !empty($locality)):$_id_l=0;$_index_l=0;$lastl=min(1000,count($locality));
$hd["list"]["l"]["first"]=true;
$hd["list"]["l"]["last"]=false;
$_total_l=ceil($lastl/1);$hd["list"]["l"]["total"]=$_total_l;
$_data_l = array_slice($locality,0,$lastl);
if(count($_data_l)==0):echo "";
else:
foreach($_data_l as $key=>$l):
if(($_id_l)%1==0):$_id_l++;else:$_id_l++;continue;endif;
$hd["list"]["l"]["index"]=++$_index_l;
if($_index_l>=$_total_l):$hd["list"]["l"]["last"]=true;endif;?>

							<option value='<?php echo $l['lid'];?>'><?php echo $l['_name'];?></option>
						<?php $hd["list"]["l"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</select>
					</td>
				</tr>
					<tr>
					<td>商品主标题</td>
					<td>
					<input type='text' name='main_title' class='w200' value='<?php echo $goods['main_title'];?>'/>
					</td>
				</tr>
						<tr>
					<td>商品副标题</td>
					<td>
					
					<textarea name='sub_title' class='w300 h100' ><?php echo $goods['sub_title'];?></textarea>
					</td>
				</tr>
						<tr>
					<td>现价</td>
					<td>
					<input type='text' name='price' value='<?php echo $goods['price'];?>'/>
					</td>
				</tr>
						<tr>
					<td>原价</td>
					<td>
					<input type='text' name='old_price' value='<?php echo $goods['old_price'];?>'/>
					</td>
				</tr>
				<tr>
					<td>上架时间</td>
					<td>
						<input type='text' readonly="readonly" id='begin_time' name='begin_time' value="<?php echo date('Y-m-d H:i:s',$goods['begin_time']);?>" />
					</td>
				</tr>

				<tr>
					<td>下架时间</td>
					<td>
						<input type='text' readonly="readonly" id='end_time' name='end_time' value="<?php echo date('Y-m-d H:i:s',$goods['end_time']);?>"/>
					</td>
				</tr>
				<script>
 					$('#begin_time').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
		 			$('#end_time').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
 				</script>
				<tr>
					<td>商品展示图</td>
					<td>
						<link rel="stylesheet" type="text/css" href="http://127.0.0.1/hdshop/hdphp/Extend/Org/Uploadify/uploadify.css" />
            <script type="text/javascript" src="http://127.0.0.1/hdshop/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "http://127.0.0.1/hdshop/index.php?a=Admin&c=Goods&gid=&m=keditor_upload&g=App";
            var UPLOADIFY_URL    = "http://127.0.0.1/hdshop/hdphp/Extend/Org/Uploadify/";
            var HDPHP_UPLOAD_THUMB    ="460,280,200,100,310,190,90,55";
HDPHP_UPLOAD_TOTAL = 0</script>
            <script type="text/javascript" src="http://127.0.0.1/hdshop/hdphp/Extend/Org/Uploadify/hd_uploadify.js"></script>
<script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;
        hd_uploadify_options.fileSizeLimit  ="5MB";
        hd_uploadify_options.fileTypeExts   ="*.jpg;*.png;*.gif";
        hd_uploadify_options.queueID        ="hd_uploadify_goods_img_queue";
        hd_uploadify_options.showalt        =true;
        hd_uploadify_options.uploadLimit    =1;
        hd_uploadify_options.input_type    ="input";
        hd_uploadify_options.elem_id    ="";
        hd_uploadify_options.upload_img_max_width    ="1000";
        hd_uploadify_options.upload_img_max_    ="1000";
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData ={water : "1",upload_img_max_width:"1000",upload_img_max_height:"1000",fileSizeLimit:5242880, someOtherKey:1,PHPSESSID:"0jdd2vbdemd15eae4hkat4btj7",upload_dir:"",hdphp_upload_thumb:"460,280,200,100,310,190,90,55"};
        hd_uploadify_options.thumb_width =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;
        $("#hd_uploadify_goods_img").uploadify(hd_uploadify_options);
        });
</script>
<input type="file" name="up" id="hd_uploadify_goods_img"/>
<div class="hd_uploadify_goods_img_msg num_upload_msg" style="display:block">
<input type="checkbox" id="add_upload_water" uploadify_id="hd_uploadify_goods_img" checked='checked'/><strong style="color:#03565E">是否添加水印</strong><span></span>单文件最大<strong>5MB，允许上传类型*.jpg;*.png;*.gif</strong>
</div>

<div id="hd_uploadify_goods_img_queue"></div>
<div class="hd_uploadify_goods_img_files uploadify_upload_files" input_file_id ="hd_uploadify_goods_img">
    <ul></ul>
    <div style="clear:both;"></div>
</div>
						<img width='200' src='http://127.0.0.1/hdshop/<?php echo $goods['goods_img'];?>'/>
						<input type='hidden' name='old_img' value='<?php echo $goods['goods_img'];?>'/>
					</td>
				</tr>
				<tr>
					<td>商品服务</td>
					<td>
						<?php if(is_array($server)):?><?php  foreach($server as $k=>$v){ ?>
						<?php if(in_array($k,$goods['goods_server'])){?>
							
						<input type="checkbox" checked=true name='goods_server[]' value='<?php echo $k;?>'/>
						<?php echo $v['name'];?>
						<?php  }else{ ?>
						
						<input type="checkbox"  name='goods_server[]' value='<?php echo $k;?>'/>
						<?php echo $v['name'];?>
						
					<?php }?>
						<?php }?><?php endif;?>
					</td>
				</tr>
				<tr>
					<td>商品细节展示</td>
					<td>
						<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/hdshop/hdphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://127.0.0.1/hdshop/hdphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://127.0.0.1/hdshop/hdphp/Extend/Org/Ueditor/"</script><script id="hd_detail" name="detail" type="text/plain"><?php echo $goods['detail'];?></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('hd_detail',{
                imageUrl:'http://127.0.0.1/hdshop/index.php?a=Admin&c=Goods&gid=&m=ueditor_upload&g=App&water=1&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
                ,zIndex : 0
                ,autoClearinitialContent:false
                ,initialFrameWidth:"800" //宽度1000
                ,initialFrameHeight:"200" //宽度1000
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,maximumWords:2000 //允许的最大字符数
                ,readonly : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false
                ,wordCount:true //是否开启字数统计
                ,imagePath:''//图片修正地址
                , toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe','insertcode', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars',  'wordimage', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                'print', 'preview', 'searchreplace']
            ]//工具按钮
                , initialStyle:'p{line-height:1em; font-size: 14px; }'
            });
        })
        </script>
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