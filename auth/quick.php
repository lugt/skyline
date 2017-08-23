<?php
session_cache_limiter('private');
session_start();
@require realpath("../core/load/mod.php");
//Load::loadmod("Header");
Load::loadmod("Kern.Set");
Load::loadmod("Security.L");
Load::loadmod("User");
EC::R();
date_default_timezone_set('PRC'); 
if(!isset($_REQUEST['login']) || !isset($_REQUEST['passwd'])){
	errs("你的输入不完整！");	
}

$usn = $_REQUEST['login'];
$pss = $_REQUEST['passwd'];
function checkchar($usn,$lee=22){
	$_illegalChar = array("'", '"','\\');
	foreach($_illegalChar as $cchar){
		//echo $cchar;
		if(strpos($usn,$cchar) != FALSE){
	//		echo $cchar;
			return NULL;
		}
	}
	if(strlen($usn) > $lee){
		return NULL;
	}
	if(strlen($usn) < 2){
		return NULL;	
	}
	return $usn;
}
$usn = checkchar($usn);
$pss = checkchar($pss);

if($usn == NULL || $pss == NULL){
	errs("ERRINT-1007");	
}

$ub = new BPUB();
$rs = $ub->G_USN($usn);
if($rs != NULL){
		if($ub->Pass($pss)){
			//USER VERIFIED
			//echo 'ULS---'; //Login Successful	
			//GENERATE SESX
			$_SESSION['user'] = $ub->shift_user->usn;
			$_SESSION['uid'] = $ub->shift_user->uid;
			$_SESSION['name'] = $ub->shift_user->name;
			$_SESSION['title'] = $ub->shift_user->title;
			$_SESSION['priv'] = $ub->shift_user->priv;
			$_SESSION['memo'] = $ub->shift_user->memo;
			$_SESSION['phone'] = $ub->shift_user->phone;				
			$sesc = "APL".date("Ymd").time();
			//TRANSPORT TO MYSQL : SESC
			$ub->S("sess",$sesc);
			echo "<script>window.location.href=\"/skyline/index.php?login=yes\";</script>正在为您<a href=\"/skyline/index.php?login-yes\">跳转</a>，请稍候！";
		}else{
			errs("密码验证不通过");
		}
}else{
	errs('用户不存在'); //用户不存在
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
								<li>账号或密码错误，请重新登录</li>
								<li>错误代码：<?php echo $an;?></li>
							</ul>
						<div class="error_return"><a href="javascript:window.history.go(-1);" class="btn">返回</a></div>
					</div>
	</div>
</div>
<script src="./error_files/common.js"></script>

</body></html>
<?php
	die();
	}

?>