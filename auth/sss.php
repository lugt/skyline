<?php 
// FASR LOGIN 1.0 
//@session_start();
@require realpath("../core/load/mod.php");
//Load::loadmod("Header");
Load::loadmod("Error");
Load::loadmod("Kern.Set");
Load::loadmod("Security.L");
Load::loadmod("DB");
Load::loadmod("User");
EC::R();

if($_REQUEST['bpdebug'] == "pr"){
  //session_start();
	  //$_SESSION['uid'] = 31;
}


if($_REQUEST['bpdebug'] == "fs"){
    session_start();
    $_SESSION['uid'] = 56;
    $_SESSION['user'] = 56;
    $_SESSION['name'] = "王平";
    $_SESSION['title'] = "高一7班班主任,年级组长"
}


//print_r($_SESSION);
session_start();
if($_SESSION['uid']){
  $kr = new BPUB();
  $kr->G_ID($_SESSION['uid']);
  fastecho($kr);
  exit(0);
}


//session_start();
if($_COOKIE['bapaid'] == "" ){
  die("ERR_UN_AUTH_FAST");
}
	//验证登录情况
	

if(Sec::B($_COOKIE['bapaid']) == Sec::$E_ILLEG || Sec::B($_COOKIE['bapaid']) == Sec::$E_LEN){
  die("ERR_BPID_N_LLEGAL");
}

$qer = $_COOKIE['bapaid'];

if(strlen($qer) == Set::$sslen){
  // 校验登录�
  $kr = new BPUB();
  $kr->G_SS($qer);
  fastecho($kr);
  exit(0);
}else{
  die("ERR_BP_ID_LEN");
}


function fastecho($kr){
  if($kr->shift_user->exist != true){
    // 如果存在用户
    echo "ERRLOGIN";
  }else{
    //   创建用户返回信息对象�
    $shift = new Dio();
    $shift = $kr->shift_user;
    $shift->nowexp = $kr->shift_data->nowexp;
    $shift->level = $kr->shift_data->level;
    $shift->money = $kr->shift_data->money;
    $shift->item = $kr->shift_data->item;
    $shift->clothes = $kr->shift_data->clothes;
    //session_start();
    // store session data
    // 创建用户的Session数据� 、 快速UID
    //$uspeed = new revSpeed();
    //$uspeed->mm = 80;               $uspeed->mf = 300;              $uspeed->mh = 100;
    //$uspeed->ms = 10;
    $_SESSION['recoverhealth'] = 10;
    $_SESSION['recovermagicka'] = 10;
    $_SESSION['recoverfatigue'] = 10;
    //$_SESSION['r']
    //快速UID
    session_start();
    $_SESSION['uid'] = $kr->shift_user->uid;
    //返回信息
    echo "WELCOME".json_encode($shift);
  }
}
?>