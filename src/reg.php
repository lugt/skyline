<?php
require_once "../core/load.php";
Load::I("Security");
Load::I("DB");
Load::I("User");
Load::I("User.Reg");
Load::ER();
if(!$_REQUEST['org'] && !defined('org')){
	header("Location: ../welcome.html");
}else if($_REQUEST['org'] == "dor"){
	$kt = new UREG();
	$krx = new UB();
	$rt = $kt->Reg($krx);
	//WRITE REF LIMIT
}

?>