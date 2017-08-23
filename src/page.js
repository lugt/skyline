// JavaScript Document
var loading = '<div class="wtti2 fo-xl"><img src="/images/login/ajax-loader.gif" width="32" height="32" id="imsg"/></div><div class="fo-xl wtti" id="wwwi"></div>';
var reg_page = '<form novalidate action="#2" method="POST" name="f1" target="fr99"><div class="section" >\
 <div id="idTd_Tile_Error" aria-live="assertive" aria-relevant="text" aria-atomic="true" style="display: none;"><div class="errorDiv first" id="idTd_Tile_ErrorMsg_Login"></div></div><div id="idTd_PWD_Error" aria-live="assertive" aria-relevant="text" aria-atomic="true" style="display: none;"><div class="errorDiv first" id="idTd_PWD_ErrorMsg_Username">Generic Password Error Message</div></div><div id="idTd_PWD_UsernameLbl" class="row label"><span id="idLbl_PWD_Username" role="heading">Niimei 帐户 <a id="idA_MSAccLearnMore" href="http://go.microsoft.com/fwlink/?LinkID=254486" target="_blank">这是什么?</a></span></div><div id="idDiv_PWD_UsernameTb" class="row textbox"><div style="position: relative; width: 100%;"><input onBlur="ph_Out(event,this)" onfocus="ph_Click(event,this)" type="text" name="usn" id="i0116" maxlength="113" lang="en" class="ltr_override" aria-labelledby="idLbl_PWD_Username"><div onclick="ph_Click(event,this)" class="phholder" style="" id="h0116"><div id="idDiv_PWD_UsernameExample" class="placeholder ltr_override" aria-hidden="true" style="cursor: text;">用户名 3+</div></div></div></div><div id="idTd_PWD_Error_Password" aria-live="assertive" aria-relevant="text" aria-atomic="true" style="display: none;"><div class="errorDiv" id="idTd_PWD_ErrorMsg_Password"></div></div>\
          <div id="idDiv_PWD_PasswordTb" class="row textbox"><div style="position: relative; width: 100%;"><input name="passwd" onfocus="ph_Click(event,this)" onBlur="ph_Out(event,this)" type="password" id="i0118" autocomplete="on" aria-labelledby="idDiv_PWD_PasswordExample">\
			<div onclick="ph_Click(event,this)" class="phholder"  id="h0118" style="position: absolute; top: 0px; left: 0px; z-index: 5; width: 100%;"><div id="idDiv_PWD_UsernameExample" class="placeholder ltr_override" aria-hidden="true" style="cursor: text;">密码 4+</div></div>\
</div>\
</div>\
<div id="idDiv_PWD_PasswordTb" class="row textbox"><div style="position: relative; width: 100%;"><input onBlur="ph_Out(event,this)" onfocus="ph_Click(event,this)" name="repas" type="password" id="i0119" autocomplete="on" aria-labelledby="idDiv_PWD_PasswordExample">\
			<div class="phholder" onclick="ph_Click(event,this)" id="h0119" style="position: absolute; top: 0px; left: 0px; z-index: 5; width: 100%;"><div id="idDiv_PWD_UsernameExample" class="placeholder ltr_override" aria-hidden="true" style="cursor: text;">确认密码</div></div>\
</div>\
</div>\
<div id="idDiv_PWD_PasswordTb" class="row textbox"><div style="position: relative; width: 100%;"><input name="passwd" type="email" onfocus="ph_Click(event,this)" onBlur="ph_Out(event,this)" id="i0120" autocomplete="on" aria-labelledby="idDiv_PWD_PasswordExample">\
			<div class="phholder" onclick="ph_Click(event,this)" id="h0120" style="position: absolute; top: 0px; left: 0px; z-index: 5; width: 100%;"><div id="idDiv_PWD_UsernameExample" class="placeholder ltr_override" aria-hidden="true" style="cursor: text;">邮箱 5+</div></div>\
</div>\
</div>\
<div id="idDiv_PWD_PasswordTb" class="row textbox"><div style="position: relative; width: 100%;"><input onBlur="ph_Out(event,this)" name="passwd" type="text" id="i0121" autocomplete="on" onfocus="ph_Click(event,this)" aria-labelledby="idDiv_PWD_PasswordExample">\
<div class="phholder" onclick="ph_Click(event,this)" id="h0121"><div id="idDiv_PWD_UsernameExample" class="placeholder ltr_override" aria-hidden="true" style="cursor: text;">QQ</div></div></div></div>\
</div><div id="idTd_PWD_SubmitCancelTbl" class="section"><input type="submit" name="SI" id="idSIButton9" value="注册" class="default" onclick="doreg()"></div>\
<div style="display:none"><input name="passwd" type="password" id="i0118" autocomplete="off" aria-labelledby="idDiv_PWD_PasswordExample">\
<input name="repasswd" type="password" id="i0118" autocomplete="off" aria-labelledby="idDiv_PWD_PasswordExample">\
<input type="email" name="email" id="i0116" maxlength="113" lang="en" class="ltr_override" aria-labelledby="idLbl_PWD_Username">\
<input type="number" name="qq" id="i0116" maxlength="113" lang="en" class="ltr_override" aria-labelledby="idLbl_PWD_Username"></div>\
<div class="section"><div id="idDiv_PWD_ForgotPassword" class="row small"><a href="/uc/get_acc.php" id="idA_PWD_ForgotPassword">无法访问你的帐户?</a></div><div id="idTD_PWD_SwitchToOTCLink" class="row small"><a href="#" id="idA_PWD_SwitchToOTC">使用授权码或VIP代码注册</a></div></div></form>';
	var login_page_name = "rightTD";
	var login_page = "";
	
function regist(){
	if(cnow == "log"){
	mf = _id('rightTD');
	login_page = mf.innerHTML;
	mf.innerHTML = reg_page;
	var txt1 = _id('i055');
	txt1.innerHTML = "已经有 Niimei 帐户?";
	_id('idA_SignUp').innerHTML = "立即登录";
	_id('SignUpTD').style.marginTop = "30px";
	cnow = "reg";
	_id('J_loginhead').innerHTML = "注册";
}else{
	cnow = "log"
	mf = _id('rightTD');
	mf.innerHTML = login_page;
	var txt1 = _id('i055');
	_id('J_loginhead').innerHTML = "登录";
	_id('idA_SignUp').innerHTML = "立即注册";
	_id('SignUpTD').style.marginTop = "0px";
	txt1.innerHTML = "没有 Niimei 帐户?";
}
}

function ph_Click(ev,th){
	
	console.error(th);
	console.error(th.id);
	if(th.id.substr(0,1) == "i"){
		th.focus;
		_id("h"+th.id.substr(1)).style.display = "none";		return;
	}
	switch(th.id){
		case "h0116":
		qrt = "i0116";break;
		case "h0118":
		qrt = "i0118";break;
		case "h0119":
		qrt = "i0119";break;
		case "h0120":
		qrt = "i0120";break;
		case "h0121":
		qrt = "i0121";break;
		default:return;break;
		}
	th.style.display = "none";
	_id(qrt).focus();
}

function  ph_Out(ev,th){
	/*switch(th.innerHTML){
		case "用户名":
		qrt = "i0116";break;
		case "密码":
		qrt = "i0118";break;
		case "确认密码":
		qrt = "i0119";break;
		case "邮箱":
		qrt = "i0120";break;
		case "QQ":
		qrt = "i0121";break;
	}*/
	qrt = th;
	if(qrt.value == "" || qrt.value == null){
		switch(qrt.id){
		case "i0116":
		qrt = "h0116";break;
		case "i0118":
		qrt = "h0118";break;
		case "i0119":
		qrt = "h0119";break;
		case "i0120":
		qrt = "h0120";break;
		case "i0121":
		qrt = "h0121";break;
		default:return;break;
		}
		_id(qrt).style.display = "block";
	}
}