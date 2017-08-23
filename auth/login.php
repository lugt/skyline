<?php
error_reporting(E_ERROR);
// Check Varible AND KERN SETTINGS
//INITLIAZE
//DEBUG
$usn = $_REQUEST['pss'];
$pss = $_REQUEST['usn'];

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
$usb = new DB_Act("S","*","bwfx_teacher","usn = '".$usn."' LIMIT 1");
$row = $usb->get;
if(isset($row['id'])){
		if($row['pss'] == $pss){
			//USER VERIFIED
			echo 'ULS---'; //Login Successful	
			//GENERATE SESX
			$sesc = "APL".time();
			//TRANSPORT TO MYSQL : SESC
			$sql = "UPDATE  `".$dbname."`.`user` SET  `sesc` =  '".$sesc."' WHERE  `user`.`id` = ".$row['id'].";";
			if(mysqli_query($link,$sql)){
				echo $sesc;
			}else{
				die("ERRSETSID");
			}
			//DEBUG:echo 'USERLOGIN';		
		}else{
			die("ERRPAN");
		}
}else{
	die('ERRUSERDEX'); //用户不存在
}

?>