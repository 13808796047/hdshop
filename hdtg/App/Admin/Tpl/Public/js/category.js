$(function(){
	$("form").validate({
	 	cname: {
	 rule: {
	 	maxlen: 10,
	 	required: true
	 },
		 error: {
		 maxlen: " 不能大于10 个字符 ",
	 	required: " 分类名称不能为空 "
	 },
		 message: " 分类名称长度 1 到 10 位 ",
		 success: " 分类名称正确 "
	 },
	 	title: {
	 rule: {
	 	maxlen: "40",
	 	required: true
	 },
		 error: {
		 maxlen: " 不能大于40个字符 ",
	 	required: " 分类标题不能为空 "
	 },
		 message: " 分类标题长度 1 到 40 位 ",
		 success: " 分类标题正确 "
	 },
	 	keywords: {
	 rule: {
	 	maxlen: "60",
	 	required: true
	 },
		 error: {
		 maxlen: " 不能大于60个字符 ",
	 	required: " 关键字不能为空 "
	 },
		 message: " 关键字长度 1 到 60 位 ",
		 success: " 关键字正确 "
	 },
	 	description: {
	 rule: {
	 	maxlen: "80",
	 	required: true
	 },
		 error: {
		 maxlen: " 不能大于80个字符 ",
	 	required: " 分类描述不能为空 "
	 },
		 message: " 分类描述长度 1 到 80 位 ",
		 success: " 分类描述正确 "
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