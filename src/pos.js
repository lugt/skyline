// JavaScript Document
var loading = '<div class="wtti2 fo-xl"><img src="images/load/128.gif" width="32" height="32" id="imsg"/></div><div class="fo-xl wtti" id="wwwi"></div>'
var log_ma = '  <div id="crr" class="img-1" style="width:500px;height:216px;"></div>\
  	<div id="log-fr" class="log-fr fo-xxl">登 录 中 心<p></p>\
    <p style="font-size:11px;"><a href="/wiki/UcenterHelp">错误百科</a>|<a href="/help/">帮助中心</a>|<a href="/">主页</a> </p>\
    <p></p>\
    <div class="fo-ml log-btn button" onMouseOver="this.style.backgroundColor=\'#FB0\'" onMouseOut="this.style.backgroundColor=\'#F90\'" onClick="gote();" id="log-btn">前往登陆</div>\
    <div class="fo-ml log-btn-2 button" onMouseOver="this.style.backgroundColor=\'#F66\'" onMouseOut="this.style.backgroundColor=\'#F36\'" onClick="regist();" id="log-btn2">这里注册</div>\
	<div class="fo-ml log-btn-3 button" onMouseOver="this.style.backgroundColor=\'#F66\'"\ onMouseOut="this.style.backgroundColor=\'#F36\'" onClick="findpass();" id="log-btn3">忘记密码</div>\
  </div>\
  <div id="log-fr2" class="log-fr2 fo-m">\
    <p>用户名:<br /><input type="text" id="spd" size="18"/></p>\
    <p>密码:<br/><input type="password" id="pss" size="18" /></p>\
    <p class="fo-m">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="save" ><span onClick="_id(\'save\').value=true;">保存</span>您的帐户信息</p><div id="msgc" class="msgc fo-ml"></div></div>';
var reg_ma = ' <div id="crr" class="img-1" style="width:500px;height:216px;"></div>\
  	<div id="log-fr" class="log-fr fo-xxl">登 录 中 心<p></p>\
    <p style="font-size:11px;"><a href="/wiki/UcenterHelp">错误百科</a>|<a href="/help/">帮助中心</a>|<a href="/">主页</a> </p>\
    <p></p>\
    <div class="fo-ml log-btn button" onMouseOver="this.style.backgroundColor=\'#FB0\'" onMouseOut="this.style.backgroundColor=\'#F90\'" onClick="retlogin();" id="log-btn">返回登陆</div>\
    <div class="fo-ml log-btn-2 button" onMouseOver="this.style.backgroundColor=\'#F66\'" onMouseOut="this.style.backgroundColor=\'#F36\'" onClick="doreg();" id="log-btn2">确认注册</div>\
	<div class="fo-ml log-btn-3 button" onMouseOver="this.style.backgroundColor=\'#F66\'"\ onMouseOut="this.style.backgroundColor=\'#F36\'" onClick="findpass();" id="log-btn3">忘记密码</div>\
  </div>\
  <div id="log-fr2" class="log-fr2 fo-m">\
  <p>注册即表示您已经阅读<br/>\
    并且同意遵守Niimei EULA</p><br/>\
    <p>*用户名:<br /><input onChange="n_reg_vile(this)" onBlur="n_reg_vile(this)" type="text" id="spd" size="20" /><span id="usermsg"></span></p>\
    <p>*密码:<br /><input onChange="n_reg_vile(this)" onBlur="n_reg_vile(this)" type="password" id="pss" size="20" /><span id="passmsg"></span></p>\
    <p>*确认密码：<br /><input onChange="n_reg_vile(this)" onBlur="n_reg_vile(this)" type="password" size="20" id="comf"/><span id="commsg"></span></p>\
    <p>*邮箱：<br /><input onChange="n_reg_vile(this)" onBlur="n_reg_vile(this)" type="email" size="20"  id="emi"/><span id="emailmsg"></span></p>\
    <p>*QQ：<br /><input  onChange="n_reg_vile(this)" onBlur="n_reg_vile(this)" id="qq_" size="20" type="text"/><span id="qqmsg"></span></p>\
    <div id="msgc" class="msgc fo-ml"></div>';