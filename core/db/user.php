<?php
/*
	AUTHOR : JAck Lu Ver: 135.132.238
*/
Load::loadmod("DB");
class BPUB {
	public static $E_UN = -1101;
	public static $E_NOUSER = -1102;
	public static $E_NOCONF = -1103;
	public static $E_UNAUTH = -1104;
	public static $C_OK = 991;
	public static $C_FAIL = -992;
	public $shift_user;
	public $db_c;
	public function __construct(){
		//Check DB Connect
		//Do Check
				
	}
	
	public function G_CONF(){
			$this->shift_user->Set("usn",$this->db_c->get['usn']);
			$this->shift_user->Set("uid",$this->db_c->get['uid']);
			$this->shift_user->Set("phone",$this->db_c->get['phone']);
			$this->shift_user->Set("sess",$this->db_c->get['sess']);
			$this->shift_user->Set("priv",$this->db_c->get['priv']);
			$this->shift_user->Set("name",$this->db_c->get['name']);
			$this->shift_user->Set("title",$this->db_c->get['title']);
			$this->shift_user->Set("memo",$this->db_c->get['memo']);
			$this->shift_user->Set("otell",$this->db_c->get['otell']);
			//$this->db_c = NULL;
			$uid = $this->shift_user->uid;
			return $this->shift_user;
		}
		
	public function Pass($pss){
		$a = base64_encode($pss);
		$b = $this->db_c->get['pss'];
		return ($a == $b);
	}
	
	public function G_ID($uid){
		$this->shift_user = new User_conf();
		if($uid == 0 || $uid < 0 ){
			return NULL;
		}
		if(Sec::A($uid) != $uid){
				return NULL;
		}
		// 合法性验证完毕
		// SELECT
		//echo("FUCKIT");
		$this->db_c = new DB_Act("S","*","skyline_user"," uid = '".$uid."'");
		//die($this->db_c->get);
		if(strlen($this->db_c->get['usn']) >= 2){
			$this->G_CONF();
			return $this->shift_user;
		}else{
			return NULL;
		}		
		
	}
	
	public function G_USN($usn){
		$this->shift_user = new User_conf();
		$this->db_c = new DB_Act("S","*","skyline_user"," usn = '".$usn."'");
		//die($this->db_c->get);
		if(strlen($this->db_c->get['usn']) >= 2){
			$this->G_CONF();
			return $this->shift_user;
		}else{
			return NULL;
		}		
	}
	
	public function G_SS($ses){
		//sdie("8888");
		$this->shift_user = new User_conf();
		//die("9999");
		if(Sec::B($ses,true) == Sec::$E_ILLEG || Sec::B($ses,true) == Sec::$E_LEN){
			return NULL;	
		}
		// 合法性验证完毕
		// SELECT
		$this->db_c = new DB_Act("S","*","skyline_user"," sess = '".$ses."'");
		if(strlen($this->db_c->get['usn']) >= 2){
			$this->G_CONF();
			return $this->shift_user;
		}else{
			return NULL;
		}			
	}
	public function create($usn,$pss,$name,$title="老师",$pri="leave",$state,$sess=NULL,$phone=NULL,$otell = NULL,$memo = NULL){
		$pss = base64_encode($pss);
		$usb = new DB_Act("I",
		"(NULL, '".$usn."', '".$pss."', '".$name."', '".$title."', '".$pri."', ".$state.", '".$sess."', '".$memo."' , ".$phone.",'".$otell."')",
		"skyline_user",
		"(`uid`, `usn`, `pss`, `name`, `title`, `priv`, `state`, `sess`, `memo`, `phone`, `otell`)");
		if($usb->status == DB_Mod::$C_TRUE){
			return BPUB::$C_OK;
		}else{
		        //print_r($usb);
			//die();
			return BPUB::$C_FAIL;
		}
		return $usb;
	}
	
	public function S($usn,$thing){
		if(Sec::A($usn) == NULL || Sec::A($thing) == NULL){
			return self::$C_FAIL;
		}
		// 合法性验证完毕
		// UPDATE
		//$this->db_c = new DB_Act("U","*","skyline_user"," id = '".$this->shift_user->uid."'");
		$this->db_c = new DB_Act("U","`".$usn."` =  '".$thing."' ","skyline_user"," `uid` = ".$this->shift_user->uid."");
		//print_r($dnsdb);
		//echo($dnsdb->get);
		if($this->db_c->status == DB_Act::$C_TRUE){
			return self::$C_OK;
		}
		return  self::$C_FAIL;
		
	}
	
}

class User_Conf {
	public $usn;
	public $name;
	public $uid;
	public $sess;
	public $phone;
	public $title;
	public $priv;
	public $state;
	public $memo;
	public $otell;
	public $exist = false;
	
	public function __construct($id = -1,$usn = -1){
		return $this;
	}

	public function Set($atr,$ins){
		if($atr  == "uid" || $atr  == "usn"){
			$this->exist = true;
		}
		$this->$atr = $ins;
		return true;
		
	}
}
?>