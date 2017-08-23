<?php
@require realpath("../core/load/mod.php");
//Load::loadmod("Header");
Load::loadmod("Error");
Load::loadmod("Kern.Set");
Load::loadmod("Security.L");
Load::loadmod("User");
EC::R();
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
	die("ERRINT-1007");	
}

$ub = new BPUB();
$rs = $ub->G_USN($usn);
if($rs != NULL){
		if($ub->Pass($pss)){
			//USER VERIFIED
			//echo 'ULS---'; //Login Successful	
			//GENERATE SESX
			session_start();
			$_SESSION['user'] = $ub->shift_user->usn;
			$_SESSION['uid'] = $ub->shift_user->uid;
			$_SESSION['name'] = $ub->shift_user->name;
			$_SESSION['title'] = $ub->shift_user->title;
			$_SESSION['priv'] = $ub->shift_user->priv;
			$_SESSION['memo'] = $ub->shift_user->memo;
			$_SESSION['phone'] = $ub->shift_user->phone;
							
			$sesc = "APL".date("Y/m/d").time();
			//TRANSPORT TO MYSQL : SESC
			$ub->S("sess",$sesc);
			echo "ULS---".$sesc;
		}else{
			die("ERRPAN");
		}
}else{
	die('ERRNOUS'); //用户不存在
}

?>