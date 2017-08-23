<?php

function starter(){
	
	?>
	
	<!DOCTYPE html>
<html style="font-size:22px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="home_files/admin_style.css" rel="stylesheet">
</head>
<body>
	
	<?php
	
	}

function Global_None(){

starter();

?>

<div class="wrap">
	<div id="home_toptip"></div>
	<h2 class="h_a">欢迎回来</h2>
	<div class="home_info">
		<ul>
			<li>
				<em>服务</em>
				<span><?php if(strpos($_SESSION['priv'],"leave") !== FALSE){
					    	echo "可预约 ";
					    }
					    if(strpos($_SESSION['priv'],"auth") !== FALSE){
                                            	echo "可接收预约";
                                            }else{
					    }
					   ?></span>
			</li>
			<!-- 
			<li>
				<em>账户状态</em>
				<span>正常</span>
			</li>
			 -->
			<li>
				<em>预约项目</em>
				<span><?php echo "Arduino 课程  /    创新英语"?></span>
			</li>
			<li>
				<em>用户</em>
				<span><?php echo $_SESSION['name']; ?></span>
			</li>
            <li>
				<em>手机号码</em>
				<span><?php echo $_SESSION['phone'];?></span>
			</li>
			<li>
				<em>服务支持</em>
				<span>闲鱼/淘宝 <a href="https://s.2.taobao.com/list/list.htm?spm=2007.1000261.0.0.4wVOUB&usernick=lugtjack009">lugtjack009</a> ！</span>
			</li>
            <li> <em>QQ</em>
            <span><a href="http://wpa.qq.com/msgrd?v=3&uin=2328440013&site=qq&menu=yes">2328440013</a></span></li>
  			<li>
				<em>系统时间</em>
				<span><?php date_default_timezone_set('PRC'); echo date("Y-m-d H:i:s"); ?></span>
			</li>

		</ul>
	</div>
	<h2 class="h_a">运营维护</h2>
	<div class="home_info" id="home_devteam">
	  <p>系统管理：阿里云服务中心</p>
	  <p>内部联系（世界）：ETID_1003 </p>
	  <p>点这里下载<a href="https://niimei.wicp.net/earth/">世界</a></p>
	</div>
</div>
</div>

<?php

ender();

}

function ender(){
echo "</body></html>";
}

?>
								
								