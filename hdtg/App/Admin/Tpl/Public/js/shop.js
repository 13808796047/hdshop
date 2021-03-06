$(function(){
	$("form").validate({
	 	shopname: {
	 rule: {
	 	maxlen: 20,
	 	required: true
	 },
		 error: {
		 maxlen: " 不能大于20个字符 ",
	 	required: " 商铺名称不能为空 "
	 },
		 message: " 商铺名称长度1到20位 ",
		 success: " 商铺名称正确 "
	 },
	 	shopaddress: {
	 rule: {
	 	maxlen: 40,
	 	required: true
	 },
		 error: {
		 maxlen: "不能大于40个字符",
	 	required: "商铺地址不能为空"
	 },
		 message: "商铺地址长度1到40的数字 ",
		 success: "商铺地址填写正确"
	 },
	 metroaddress: {
	 rule: {
	 	maxlen: 40,
	 	required: true
	 },
		 error: {
		 maxlen: "不能大于40个字符",
	 	required: "地铁地址不能为空"
	 },
		 message: "地铁地址长度1到40的数字 ",
		 success: "地铁地址填写正确"
	 },
	 shoptel: {
	 rule: {
	 	tel: true,
	 	required: true
	 },
		 error: {
		 maxlen: "不符合电话号码",
	 	required: "电话不能为空"
	 },
		 message: "请填写正确的电话号码 ",
		 success: "电话号码填写正确"
	 },
	 

	})
/**
	 * 点击获取坐标
	 */
	$('#getPoint').click(function(){
		if($('#shopcoord').val() == ''){
			alert('请填写一个地址')
		}
		var adds = $('#shopcoord').val();
		getPoint(adds);
	})
})
function getPoint(adds){
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint(adds, function(point){
		$('#shopcoord').val(JSON.stringify(point));
	}, "北京市");
}