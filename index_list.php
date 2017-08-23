<!DOCTYPE html>
<!-- saved from url=(0039)http://niimei.com/wind/admin.php?c=role -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="home_files/admin_style.css" rel="stylesheet">
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "http://niimei.com/wind/res/js/dev/",																									//js目录
	JS_VERSION : "20130227",																										//js版本号
	TOKEN : '880da8cd1bbe1b79',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',																													//后台登录地址
		IMAGE_RES: 'http://niimei.com/wind/res/images',																										//图片目录
		REGION : 'http://niimei.com/wind/index.php?m=misc&c=webData&a=area',					//地区
		SCHOOL : 'http://niimei.com/wind/index.php?m=misc&c=webData&a=school'				//学校
	}
};
</script>
<script src="./index_list_files/wind.js"></script>
<script src="./index_list_files/jquery.js"></script>
<script type="text/javascript" src="./index_list_files/dialog.js"></script>

</head>
<body>
<div class="wrap">
	<!--角色管理: 列表-->
	<div class="nav">
		<ul class="cc">
			<li><a href="http://niimei.com/wind/admin.php?c=auth">后台用户</a></li>
			<li class="current"><a href="http://niimei.com/wind/admin.php?c=role">管理角色</a></li>
		</ul>
	</div>
	<div class="h_a">提示信息</div>
	<div class="mb10 prompt_text">
		<ol>
			<li>可以将某一类的后台管理权限归为一个角色，然后将角色赋予用户。如果角色权限改变，用户的后台权限也随之改变</li>
		</ol>
	</div>
	<div class="cc mb10"><a href="http://niimei.com/wind/admin.php?c=role&amp;a=add" class="btn"><span class="add"></span>添加角色</a></div>
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="140">角色名称</td>
					<td>操作</td>
				</tr>
			</thead>
				<tbody><tr>
				<td>管理员</td>
				<td>
					<a href="http://niimei.com/wind/admin.php?rid=1&amp;c=role&amp;a=edit" class="mr10">[编辑]</a>
					<a href="http://niimei.com/wind/admin.php?rid=1&amp;c=role&amp;a=del" class="mr10 J_ajax_del">[删除]</a></td>
			</tr>
			</tbody></table>
	</div>
</div>
<script src="./index_list_files/common.js"></script>

</body></html>