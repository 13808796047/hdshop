$(function(){
	$("form").validate({
	 	lname: {
	 rule: {
	 	maxlen: 10,
	 	required: true
	 },
		 error: {
		 maxlen: " 不能大于10 个字符 ",
	 	required: " 地区名称不能为空 "
	 },
		 message: " 地区名称长度 1 到 10 位 ",
		 success: " 地区名称正确 "
	 },
	 	sort: {
	 rule: {
	 	num: "1,100",
	 	required: true
	 },
		 error: {
		 num: " 排序不能大于100 ",
	 	required: " 排序不能为空 "
	 },
		 message: " 排序长度 1 到 100 的数字 ",
		 success: " 排序填写正确 "
	 }
	})

})