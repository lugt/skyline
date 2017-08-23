<?php
function leave_answ($zt,$an){
	?>
	<!DOCTYPE html>
<!-- saved from url=(0040)http://niimei.com/wind/admin.php?a=login -->
<html style="zoom:120%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="./auth/error_files/admin_style.css" rel="stylesheet">
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
		IMAGE_RES: './auth/images',																										//图片目录
		REGION : 'http://niimei.com/wind/index.php?m=misc&c=webData&a=area',					//地区
		SCHOOL : 'http://niimei.com/wind/index.php?m=misc&c=webData&a=school'				//学校
	}
};
</script>
<script src="./auth/error_files/wind.js"></script>
<script src="./auth/error_files/jquery.js"></script>

<style type="text/css">/* This is not a zero-length file! */</style><style type="text/css">/* This is not a zero-length file! */</style></head>
<body>
<div class="wrap">
	<div id="error_tips">
		<h2>信息提示</h2>
		<div class="error_cont">
			<ul>
								<li><?php echo $zt;?></li>
								<li><?php echo $an;?></li>
							</ul>
						<div class="error_return"><a 
							<?php
							if(!isset($_SESSION['HTTP_REFERER'])){
								echo "onclick=\"history.go(-1);\" ";
							}else{
								echo " href=\"".$_SESSION['HTTP_REFERER']."\" ";
							}
							?> class="btn">返回</a></div>
					</div>
	</div>
</div>
<script src="./auth/error_files/common.js"></script>

</body></html>
<?php
	}

?>