<?php session_start();?>
<!DOCTYPE html>
<!-- saved from url=(0032)http://niimei.com/wind/admin.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<title>请假通 - 登录</title>
		<meta name="robots" content="noindex,nofollow">
		<link href="../login_files/admin_login.css" rel="stylesheet">
	</head>
<body>
	<div class="wrap" style="margin-top:40px;">
		
		<form action="doreg.php" method="post">
			
			<div style="top:-100px;background:#fff;padding:20px;height:40px;">
				<h2>注册用户</h2>
			</div>
			<div class="login">
				<ul>
					<?php if(isset($_REQUEST['act'])){
						if($_REQUEST['act'] == "sq"){
						echo "<li style=\"color:#f33\">您的授权代码不正确</li>";
						}else if($_REQUEST['act'] == "sv"){
						echo "<li style=\"color:#f33\">输入不正确</li>";
						}else if($_REQUEST['act'] == "sh"){
						echo "<li style=\"color:#f33\">输入不完整</li>";
						}
					}
					?>
					<li>
						<input class="input" id="login" required="" name="login" type="text" placeholder="帐号名" title="帐号名">
					</li>
					<li>
						<input class="input" id="passwd" type="text" required="" name="passwd" placeholder="密码" title="密码">
					</li>
					
					<li>
						<input class="input" id="title" type="text" required="" name="title" placeholder="身份" title="职称">
					</li>
					
					<li>
						<input class="input" id="name" type="text" required="" name="name" placeholder="姓名" title="姓名">
					
					</li>
					
					<li>
						<input class="input" id="priv" type="text" required="" name="priv" placeholder="特权:leave" title="特权">
					</li>
					
					<li>
						<input class="input" id="phone" type="text" required="" name="phone" placeholder="手机" title="手机">
					</li>
					
					<li>
                                                <input class="input" id="otell" type="text" required="" name="otell" placeholder="办公电话" title="办公">
                                        </li>

					<?php
						if(strpos($_SESSION['priv'],"newreg") == FALSE){
							?>
							<li>
							<input class="input" id="quant" type="text" name="quant" placeholder="授权码" title="授权代码:<?php echo $_SESSION['priv']; ?>">
							</li>
							<?php
						}
					?>
					
					<li>
						<input class="input" id="memo" type="text" name="memo" placeholder="备注" title="备注:<?php echo $_SESSION['priv'];?>">
					</li>
										
				</ul>
				<input type="submit" name="submit" class="btn" value="注册">
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