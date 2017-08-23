function n_vi_code(msgt){
	switch(msgt){
	case "EXIST":dfv = "用户已存在";break;
	case "UNAUTH":dfv =  "非法访问";break;
	case "INT":dfv = "内部错误";break;
	case "NONE":dfv = "没有数据或长度过短";break;
	case "EXT-1006":dfv="数据不合法";break;
	case "EXT-1007":dfv="数据不完整";break;
	default:dfv = "未知错误：ERR"+msgt;}
	return dfv;
}
function getpos(){
	if (loginxhr.readyState==4 && loginxhr.status==200)
    {
		if(loginxhr.responseText == "" || !loginxhr.response || loginxhr.responseText == null){
			showd("无法读取登录信息");	
		}
		var pdd = loginxhr.responseText;
		if(pdd.slice(0,3)=="ERR"){
			showd(n_errlogc(pdd.slice(3)));
		}else if(pdd.slice(0,3)=="ULS"){
			var sid = new Array();
			sid = pdd.split("---");
			if(sid[0] == "ULS" && sid[1].length == 80){
				var out = n_set_cookie("ucid",1,sid[1]);
				if(out == true){
					setTimeout(chrr,3000);
				}else{
					var fq = n_cookerrt(out);
					showd(fq);}
			}else{
				showd("无法识别登陆返回信息");}	
		}
	}
	if(loginxhr.readyState==2){
		log_msg("正在响应");
	}else if(loginxhr.readyState==3){
 		log_msg("正在处理");	
	}
	if(loginxhr.readyState==4 && loginxhr.status == 404){
		showd("很抱歉,<br>未找到登陆中心");
	}
block = false;
}


function n_errlogc(ttt){
	if(ttt.substr(0,3) == "INT" || ttt.substr(0,3) == "EXT") {
		dfv = "内部错误" + ttt.substr(3);
		return dfv;
		}
switch (ttt){
	case "NOUSN":dfv = "用户不存在";break;
	case "UNAUTH":dfv =  "非法访问";break;
	case "LEN":dfv = "用户名或密码过短";break;
	case "PASS":dfv = "密码不匹配";break;
	default:dfv = "未知错误：ERR"+ttt;}
return dfv;
}
function n_showd(tex){
	var scf;
	if(!tex){top.location.href="/help/co.php?code=ERRTEX"}
	showd(tex["code1"],tex["code2"],tex["show"]);
}

function n_reg_geterr(msgt){
	if(ttt.substr(0,3) == "INT" || ttt.substr(0,3) == "EXT") {
		dfv = "内部错误" + ttt.substr(3);
		return dfv;
	}switch (msgt){
	case "NOUSN":dfv = "用户名不完整";break;
	case "NOPSS":dfv = "密码不完整";break;
	case "NOEMI":dfv = "邮箱不完整";break;
	case "NOQQ":dfv = "QQ不完整";break;
	case "UNAUTH":dfv =  "非法访问";break;
	case "LEN":dfv = "数据过短";break;
	case "USNDU":dfv = "用户名已存在";break;
	case "QQDU":dfv = "QQ已存在";break;
	case "EMIDU":dfv = "邮箱已存在";break;
	default:dfv = "未知错误：ERR"+ttt;}return dfv;
}


function n_set_cookie(cnn,cexp,cco){
	var exdate=new Date();
	if(cexp && cexp > 0){
		exdate.setDate(exdate + cexp);
	}else{
		exdate.setDate(exdate + 1);
	}
	exdate.setDate(exdate + 1);
	
	if(exdate.getHours() == 23){
		exdate.setDate(exdate.getDate() + 1)
	}else{
		exdate.setHours(exdate.getHours()+1);
		}
	document.cookie = cnn + "=" +escape(cco)+";path=/";
	return ((n_get_cookie(cnn) == cco)? true:n_get_cookie(cnn));
	
}
var E_NOSUB = 3094;
var E_NOANYCOOKIE = 3095;
function n_cookerrt(enums){
	switch(enums){
	 case E_NOSUB:
		return "值没有信息";
	 case E_NOANYCOOKIE:
	    return "没有cookie";
	 default:
	 	return "未知COOK错误";
	}
}
function n_get_cookie(cnn){
	if (document.cookie.length>0){
  		c_start=document.cookie.indexOf(cnn+"=");
  		if (c_start==-1){return}
    		c_start=c_start + (cnn+"=").length;
    		c_end=document.cookie.indexOf(";",c_start);
    	if (c_end==-1){c_end=document.cookie.length}
		//GET COOKIE
    	if(null == unescape(document.cookie.substring(c_start,c_end))){
			return E_NOSUB;
		}else{
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}else{
		return E_NOANYCOOKIE;	
	}
}

