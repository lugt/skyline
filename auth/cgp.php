<?php session_start(); ?>
<!DOCTYPE html>
<!-- saved from url=(0032)http://niimei.com/wind/admin.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<title>请假通 - 密码修改</title>
		<meta name="robots" content="noindex,nofollow">
		<link href="../login_files/admin_login.css" rel="stylesheet">
	</head>
<body>
	<div class="wrap" style="margin-top:40px;">
		
		<form action="docgp.php" method="post">
			
			<div style="top:-100px;background:#fff;padding:20px;height:40px;">
				<h2>密码修改</h2>
			</div>
			<div class="login">
				<ul>
					<?php if(isset($_REQUEST['act'])){
						if($_REQUEST['act'] == "db"){
						echo "<li style=\"color:#f33\">修改失败，请联系管理员！</li>";
						}else if($_REQUEST['act'] == "not"){
						echo "<li style=\"color:#f33\">两次密码输入不匹配</li>";
						}else if($_REQUEST['act'] == "nf"){
						echo "<li style=\"color:#f33\">请重新输入，或重新登录后再试</li>";
						}else if($_REQUEST['act'] == "mis"){
						echo "<li style=\"color:#f33\">输入不完整</li>";
						}
					}
					?>
					<li>
						<input class="input" id="login" required="" name="login" type="text" value="用户名:<?php echo $_SESSION['user'];?>" title="帐号名" readonly="readonly">
					</li>
					<li>
						<input class="input" id="passwd" type="password" required="" name="passwd" placeholder="新密码" title="新密码">
					</li>
					<li>
						<input class="input" id="title" type="password" required="" name="title" placeholder="确认密码" title="确认密码">
					</li>					
				</ul>
				<input type="submit" name="submit" class="btn" value="修改">
			</div>
		</form>
	</div>

<script>
var GV = {
	JS_ROOT : "http://niimei.com/wind/res/js/dev/",																									//js目录
	JS_VERSION : "20130227",																										//js版本号
	TOKEN : '880da8cd1bbe1b79'	//token ajax全局
};
</script>
<script src="../login_files/wind.js"></script>
<script src="../login_files/jquery.js"></script></body></html>