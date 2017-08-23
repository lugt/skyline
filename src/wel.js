var cnow = "log";
function findpass(){
	top.location.href="/uc/get_acc.php"+location.search;
}
function get_ar2(){
var url=location.search; 
var Request = new Object(); 
if(url.indexOf("?")!=-1){ 
var str = url.substr(1) //去掉?号 
strs = str.split("&"); 
for(var i=0;i<strs.length;i++){ 
Request[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]); 
} 
} 
return Request;
} 
var args_page = get_ar2();
function n_ajax_init()
{
if (window.XMLHttpRequest)
{
	return new XMLHttpRequest();
}
 else
{
	return new XMLHttpRequest();
}
}
function getpos2(){
		if (regxhr.readyState==4 && regxhr.status==200)
    	{
			block = false;
			if(regxhr.responseText == "" || regxhr.responseText == null){
				showd("无法读取注册信息");	
			}
			var pdd = regxhr.responseText;
			if(pdd.slice(0,3)=="ERR"){
				var csq = n_reg_geterr(pdd.slice(3));
				showd(csq);
				return;
			}else if(pdd.slice(0,2) == "OK" && pdd.slice(2).length == 80){
				
				var out = n_set_cookie("ucid",1,pdd.slice(2));
				log_msg("您好，您已注册成功，我们将为您跳转。");
				if(out == true){
					setTimeout(chrr,3000);
				}else{
					var qc =  n_cookerrt(out);
					showd(qc);
				}
				return;
			}else{
				showd("无法识别注册返回<br/>" + pdd);
				return;
			}	
		}
	if(regxhr.readyState == 1){
	log_msg("正在连接登录服务器");
	return;
	}else if(regxhr.readyState==2){
		log_msg("正在响应");
		return;
	}else if(regxhr.readyState==3){
 		log_msg("正在处理");	
		return;
	}
	
	if(regxhr.readyState==4 && regxhr.status == 404){
		showd("未找到登陆中心");
		return;
	}

}
var home_pass = false;
var OK_PNG = '<img src="images/s_c/success.png" class="spppd">';
var tmp = new Array();
var q = Array();
function n_reg_vile(thing){
	if(thing == _id("spd")){
		n_ajax_get("/uc/vi.php?token=happy&usn="+encodeURIComponent(thing.value),"user",reqq);	
	}
	if(thing == _id("pss")){
		n_ajax_get("/uc/vi.php?token=happy&pss="+encodeURIComponent(thing.value),"pass",reqq);
	}
	if(thing == _id("comf")){
		if(thing.value == _id("pss").value && home_pass == true){
			_id("commsg").innerHTML = OK_PNG;
			vile["com"] = "yes";
		}else{
			_id("commsg").innerHTML = ERR_PNG + "密码不匹配或格式非法";
			vile["com"] = "no";
		}
	}
	
	if(thing == _id("emi")){
		n_ajax_get("/uc/vi.php?token=happy&emi="+encodeURIComponent(thing.value),"email",reqq);	
	}
	if(thing == _id("qq_")){
		n_ajax_get("/uc/vi.php?token=happy&qq="+encodeURIComponent(thing.value),"qq",reqq);	
	}
	
}
var reqq = function(nim,mm){
	switch(mm){
		case "user":
		ccd="user";
		cva="usn";
		break;
		case "email": 
		ccd="email";
		cva="emi";
		break; 
		case"pass": 
		ccd="pass";
		cva="pss";
		break;
		case "qq":
		ccd="qq";
		cva="qq";
		break;
		default:
		_id("msgc").innerHTML = ERR_PNG + nim;
		return;
		}
		if(nim == "OK"){
			if(ccd == "pass"){home_pass = true;}
			_id(ccd+"msg").innerHTML = OK_PNG;
			vile[cva] = "yes";
		}else{
			if(ccd == "pass"){home_pass = false;}
			_id(ccd+"msg").innerHTML = ERR_PNG + n_vi_code(nim.substr(3));
			vile[cva] = "no";
		}
		if(ccd == "pass"){
			if(_id("comf").value == _id("pss").value && home_pass == true){
				_id("commsg").innerHTML = OK_PNG;		     			vile["com"] = "yes";
				}else{
				_id("commsg").innerHTML = ERR_PNG + "验证或格式不正确";
				vile["com"] = "no";
			}	
		}	
		
}
var froo = Array();



function n_ajax_get(addr,name,func){
	tmp[name] = n_ajax_init();
	n_ajax_start(tmp[name],"GET",function(){
		eval("n_req('"+name+"',"+func+");");
		},addr,null,false);
}



function n_req(name,func){
	if (tmp[name].readyState==4 && tmp[name].status==200)
    {
		if(tmp[name].responseText == "" || tmp[name].responseText == null){
			q[name] = "ERRUNKNOWN";
			func(q[name],name);
			return;
		}
		q[name] = tmp[name].responseText;
		func(q[name],name);
	}
}

function n_ajax_start(aobj,method,func,addr,post,away){
	ato = function(){};
	if(away == true || !away || away == null){
		aobj.open(method,addr);
	}else{
		ato = func;
		aobj.open(method.addr,away);
	}
	if(method == "POST"){
		aobj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	}
	aobj.onreadystatechange = func;
	aobj.send(post);
	ato();
}

function loading_(msg){
	_id('wwwi').innertHTML = msg;
	
}
var regxhr;
function doreg(){
	block = true;
	if(validate() != true){
		log_msg(ERR_PNG + validate());
		return ;
	}
	if(_id('spd') != null && _id('spd').value != null && localStorage != null){
	localStorage.setItem('regspd',_id('spd').value);}
	if(_id('emi') != null && _id('emi').value != null &&localStorage != null){localStorage.setItem('regemi',_id('emi').value);}
	if(_id('qq_') != null && _id('qq_').value != null &&localStorage != null){localStorage.setItem('regqq',_id('qq_').value);}
	regxhr = n_ajax_init();
	n_ajax_start(regxhr,"POST",getpos2,"/uc/reg.php?org=dor","usn=" + encodeURIComponent(_id("spd").value) + "&pss=" + encodeURIComponent(_id("pss").value) + "&email="+encodeURIComponent(_id("emi").value)+"&qq="+encodeURIComponent(_id("qq_").value));
	_id('ma-1').innerHTML = loading;
	loading_('正在为您注册');
}

var mf;
var msgg = _id('msgc');
function log_msg(msgtext){
	msgg = _id('msgc');	msgb = _id('wwwi');
	if(!msgg || msgg == null){
		msgg = msgb;
	}	
	if(msgtext != null){
		msgg.innerHTML = msgtext;
	}
}
var vile = {com:"no",pss:"no",emi:"no",qq:"no",usn:"no"};
function validate(){
	if(vile["com"] == "no"){
	return "验证密码不一致";}
	if(vile["pss"] == "no"){
	return "密码不正确";}
	if(vile["emi"] == "no"){
	return "邮箱不正确";}
	if(vile["qq"] == "no"){
	return "QQ不正确";}
	if(vile["usn"] == "no"){
	return "用户名不正确";}
	return true;
}
function vi(thgi){
	switch(thgi){
		case "user":
			break;
		case "pass":
			break;
		case "email":
			break;
		case "email":
			break;	
	}
}

function regist(){
	mf = _id('ma-1');
	if(!mf){
		top.location.href="/help/co.php?code=ERRPAGEINT";
	}
	mf.innerHTML = reg_ma;
	var btn1 = _id('log-btn');
	var btn2 = _id('log-btn2');
	var btn3 = _id('log-btn3');
	btn3.innerHTML = "Nim中心"
	btn1.innerHTML = "确认注册";
	btn2.innerHTML = "返回登陆";
	btn1.onclick = doreg;
	btn2.onclick = retlogin;
	btn3.onclick = function(){
			top.location.href="/";	
	};
	mf.style.height = "240px";
	cnow = "reg";
}
function retlogin(){
	cnow = "log"
	var btn1 = _id('log-btn');
	var btn2 = _id('log-btn2');
	var btn3 = _id('log-btn3');
	btn2.innerHTML = "这里注册";
	btn1.innerHTML = "前往登陆";
	btn3.innerHTML = "Nim中心"
	btn3.onclick = function(){
			top.location.href="/";	
	};
	btn2.onclick = regist;
	btn1.onclick = gote;
	mf.innerHTML = log_ma;
}
function heart(){
	if(cnow == "log" && localStorage.getItem('usn') != null){
	_id("spd").value = localStorage.getItem('usn');
	_id("pss").value = localStorage.getItem('pss');
	}else{
	if(localStorage.getItem('regspd') != null){
	_id("spd").value = localStorage.getItem('regspd');}
	if(localStorage.getItem('regemi') != null){
	_id("emi").value = localStorage.getItem('regemi');}
	if(localStorage.getItem('regqq') != null){
	_id("qq_").value = localStorage.getItem('regqq');}
	}
}
function heart2(){
	_id('mask').style.display = "none";
	_id('log-fr').style.display = 'none';
	_id('log-fr2').style.display = 'none';
	heart();
}
function gotoLogin(){
	_id('cvf').style.display = 'none'; 
	_id('crr').style.height = '216px';
	_id('crr').style.width = '500px';
	_id('cr2').style.display='none';
	_id('crr').style.backgroundPosition = '-50px 0px';	setTimeout(chg,700);
}
var i = 0;
function chg(){
	//if(i>=6){
	cnow = "log";
	_id('log-fr').style.display = 'block';
	_id('log-fr2').style.display = 'block';
	_id('msgc').style.display = 'block';
}
function gote(){
	if(block == true){
		return;
		}
	//本地验证
	var x1 = _id('spd').value;
	var x2 = _id('pss').value;
	var x3 = _id('save').value;
	if(x1.length<4){
		logerr(1);
		return(0);
	}
	if(x1.length>=16){
		logerr(2);
		return(0);
	}
	//alert('gg21');
	if(x2.length<4){
		logerr(3);
		return(0);
	}
	if(x2.length>=22){
		logerr(4);
		return(0);
	}
	//在线验证 2.0
	
	//Submit
	//GOTO　AJAX
	loadXMLDoc(x1,x2,x3);
}
var ERR_PNG = "<img src='images/s/s_cancel.png' class='spppd'/>";
function logerr(i){
	switch(i){
	case 0:
		log_msg(ERR_PNG+"用户名长度过短");
		break;
	case 1:
		log_msg(ERR_PNG+"用户名长度过短");
		break;
	case 2:
		log_msg(ERR_PNG+"用户名长度过长");
		break;
	case 3:
		log_msg(ERR_PNG+"密码长度过短");
		break;
	case 4:
		log_msg(ERR_PNG+"密码长度过长");
	}
}
var loginxhr;	
var block = false;
//var tmpdd;



function n_gene_rand(max_){
	if(!max_){max_ = 100}
	nnn = new Date();
	return max_ * nnn.getUTCFullYear() + nnn.getUTCDate();
}
function loadXMLDoc(x1,x2,x3)
{
	block = true;
	loginxhr = n_ajax_init();
  	var nnn = new Date();
  	var dtpi = n_gene_rand(20);
  	log_msg("请稍候");
	_id('ma-1').innerHTML = loading;
	loading_("正在登陆");
	n_ajax_start(loginxhr,"POST",getpos,"/uc/login.php?v=0.1","pss="+encodeURIComponent(x1)+"&usn="+encodeURIComponent(x2),true);//+"&date="+dtpi,true);
//显示登陆等待框
if(x3 == "on"){
	//alert("ON");
	localStorage.setItem('usn',x1);
	localStorage.setItem('pss',x2);
	}
}	

function showd(code1,code2,code3){
	block = false;
	//alert("ccc0");
	if(cnow == "log"){
		_id('ma-1').innerHTML = log_ma;
		log_msg(ERR_PNG + "   "+code1);
		heart();
	}else{
		regist();
		heart();
		log_msg(ERR_PNG + "   "+code1);
	}
	
}
var pp;
function chrr(){
	//跳转
	
	if(!args_page.goto && !args_page.spm){
		top.location.href="/uc.php?tok=ok";
	}else if(args_page.spm == "bangpai"){
		//BANGBP_MODULE
		var scr =  document.createElement('script');
		scr.src = "http://"+args_page.server+"/g/bangpai/static/js/welcome.js";
		document.getElementById("cart").appendChild(scr);
		scr.src = "http://"+args_page.server+"/g/bangpai/static/js/welcome.js";
		return;
		//top.location.href = args_page.goto;
	}else{
		top.location.href = args_page.goto;
		
	}	
}
function _id(cc){
	return document.getElementById(cc);
}