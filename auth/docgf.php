<?php
require_once "../core/load/mod.php";
EC::A();
Load::loadmod("3s");
Load::loadmod("Security.L");
Load::loadmod("User");
//die((string)((int)date("idHm")));
if(!isset($_REQUEST['login'])){
	header("Location: cgp.php?act=nf");
}else{	
	$npss = $_REQUEST['passwd'];
	$title = Sec::A($_REQUEST['title']);
	if($npss == NULL||$title == NULL){
		header("Location: cgp.php?act=mis");
		die();
	}
	if($npss != $title){
		// cuowu 
		header("Location: cgp.php?act=not");
		die();
	}
	$krx = new BPUB();
	$user = $krx->G_ID($_SESSION['uid']);
	if($user == NULL || $krx->shift_user == null){
		header("Location: cgp.php?act=nf");
		die();
	}
	error_reporting(E_ALL);
	$n = $krx->S("pss",base64_encode($npss));
	if($n != BPUB::$C_OK){
		header("Location: cgp.php?act=db");
		die();
	}else{
		errs("修改成功","您可以<a href=\"../login.html\">用新密码登录</a>了");
		die();	
	}
	//WRITE REF LIMIT
}

function errs($an){
	?>
	<!DOCTYPE html>
<!-- saved from url=(0040)http://niimei.com/wind/admin.php?a=login -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="./error_files/admin_style.css" rel="stylesheet">
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "dev/",																									//js目录
	JS_VERSION : "20130227",																										//js版本号
	TOKEN : '880da8cd1bbe1b79',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',																													//后台登录地址
		IMAGE_RES: 'images',																										//图片目录
		REGION : 'http://niimei.com/wind/index.php?m=misc&c=webData&a=area',					//地区
		SCHOOL : 'http://niimei.com/wind/index.php?m=misc&c=webData&a=school'				//学校
	}
};
</script>
<script src="./error_files/wind.js"></script>
<script src="./error_files/jquery.js"></script>

<style type="text/css">/* This is not a zero-length file! */</style><style type="text/css">/* This is not a zero-length file! */</style></head>
<body>
<div class="wrap">
	<div id="error_tips">
		<h2>信息提示</h2>
		<div class="error_cont">
			<ul>
								<li>注册成功</li>
								<li>您可以前往<a href="../login.html">登录</a>了</li>
							</ul>
						<div class="error_return"><a href="javascript:window.history.go(-1);" class="btn">返回</a></div>
					</div>
	</div>
</div>
<script src="./error_files/common.js"></script>

</body></html>
<?php
	}

?>

