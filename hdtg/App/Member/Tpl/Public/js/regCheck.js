
var checkForm={
	'email':{
		 preg:/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i,
		focus:'如:xxxx@123.com',
		empty:'请填写邮箱地址!！',
		error:'邮箱格式错误！'
	},
	'username':{
		preg:/^[a-z]\w{5,15}$/i,
		focus:'4-16个字符,不能以数字开头,一个汉字为两个字符!',
		empty:'请填写用户名！',
		error:'用户名格式错误！'
	},
	'password':{
		preg:/^\S{6,32}$/,
		focus:'6-12个字符,可以使用字母,数字以及符号的任意组合!',
		empty:'请填写密码！',
		error:'密码格式错误！'
	},
	'password_d':{
		preg:/^\S{6,32}$/,
		focus:'请确认你的密码!',
		empty:'请确认你的密码！',
		error:'密码不一致！'
	},
	'code':{
		preg:/^[a-z0-9]{4}$/i,
		focus:'请输入图片中的字符,不区分大小写！',
		empty:'请输入验证码!',
		error:'验证码格式错误！'
	}
}


$(function(){
	check();
	$('#regForm').submit(function(){
		
		for (var i = 0;i<aEls.length;i++) {
			0[i]
			if(aEls[i].status==false){
				return false;
			}
		}
	})

})
var aEls=[];
function check(){
	var aMust = $('#regForm .must');	

	aMust.each(function(){
		
		aEls.push(this);
		this.status = false;
	})
	for (var i = 0; i < aEls.length; i++) {
		aEls[i].onfocus = function(){
			var name = this.name;
			var msg = checkForm[name]['focus'];
			showFocus.call(this,msg);
			this.onblur = function(){
				var val = this.value;
				if(val == ''){
					var msg = checkForm[name]['empty'];
					showError.call(this,msg);
					return;
				}
				if(name=='password_d'){
					if($('#password').val()!=val){
						var msg = checkForm[name]['error'];
						showError.call(this,msg);
						return;
					}

				}else{
					var preg = checkForm[name]['preg'];
					if(!preg.test(val)){
						var msg = checkForm[name]['error'];
						showError.call(this,msg);
						return;
					}
				}
				//需要ajax校验的
				if($(this).attr('ajax')==1){
					
					var url = __JSCONTROL__+'/check';
					var self = this;
					$.ajax({
						url:url,
						type:'POST',
						data:name+'='+val,
						dataType:'json',
						success:function(result){
							if(result.state == true){
								showSuccess.call(self,'');
							}else{
								showError.call(self,result.msg);
							}

						}
					})
				}else{
					showSuccess.call(this,'');	
				}
				
			}
		}
	}
	
}
/**
 * 显示获得焦点
 * @param  {[type]} msg [description]
 * @return {[type]}     [description]
 */
function showFocus(msg){
	var parent =$(this).parents('dl');

	var Oprompt = parent.find('.prompt');

	parent.attr('class','focus');

	Oprompt.html(msg);

}
/**
 * 显示错误
 * @param  {[type]} msg [description]
 * @return {[type]}     [description]
 */
function showError(msg){
	var parent =$(this).parents('dl');

	var Oprompt = parent.find('.prompt');

	parent.attr('class','error');

	Oprompt.html(msg);
	this.status = false;

}
/**
 * 显示成功
 * @param  {[type]} msg [description]
 * @return {[type]}     [description]
 */
function showSuccess(msg){
	var parent =$(this).parents('dl');

	var Oprompt = parent.find('.prompt');

	parent.attr('class','success');

	Oprompt.html(msg);
	this.status = true;

}
