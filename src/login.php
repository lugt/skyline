<?php
require_once "../core/load.php";
Load::I("Security");
Load::I("DB");
Load::I("User");
Load::I("User.Login");
Load::ER();
$kt = new ULOGIN();
$krx = new UB();
$usn = Sec::A($_REQUEST["login"]);
$pss = Sec::B($_REQUEST["passwd"],33);
$rt = $kt->Login($usn,$pss);
//$rt = $kt->Login($krx);
//WRITE REF LIMIT
?>