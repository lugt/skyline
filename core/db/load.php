<?php
if(DB_Set::$db_name == "s483816db0"){return;}
class DB_Set{
	public static $db_name,$db_addr,$db_user,$db_db,$db_pass,$db_port,$db_char,$db_conn;
	static function Init(){
		self::$db_name = "s483816db0";
		self::$db_addr = "localhost";
		self::$db_user = "s483816db0";
		self::$db_pass = "62g6nypm";
		self::$db_port = "3306";
		self::$db_char = "utf8";
	}
}
/*AUTHOR : JAck Lu Ver: 136.102.238*/
//Load::I("DB.Set");
//Load::I("Security");
class DB_Cent{
	static public $status = false;
	public static function Init(){ 
		DB_Set::Init();
		DB_Set::$db_conn = mysqli_connect(DB_Set::$db_addr,DB_Set::$db_user,DB_Set::$db_pass,DB_Set::$db_name);
		//new mysqli('localhost', 'my_user', 'my_password', 'my_db');
		//DB_Set::$db_conn =  mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");
				
		if(DB_Set::$db_conn == FALSE){
			die("ERR_MRCE1".mysqli_error(DB_Set::$db_conn));
			return false;
		}	
		
		if(mysqli_set_charset(DB_Set::$db_conn , DB_Set::$db_char) == true){
				self::$status = true;
				return true;	
		}else{
			die("ERR_MCRE4");
			return false;
		}	
	}
}
class DB_mod{
	static public $C_TRUE = "0t";
	static public $C_NULL = "0n";
	static public $C_FALSE = "0f";
	static public $C_EMPY = "0e";
	static public $C_0 = "0z";
	static public $C_NOACT = "0na";
	static public $C_DB = "0d";
	final public function act(){
					
	}
		
	public function check_conn(){
			if(DB_Cent::$status != true){
				$sqc = DB_Cent::Init();
				if($sqc != true || DB_Cent::$status != true){
					return false;
				}
			}
			return true;
		}

}

cLass DB_Act extends DB_mod{
	public $get;
	public $cd;
	public $status;
	public $stri;
	public function e_($stri,$isdui){
		$this->stri = $stri;
		//die($stri);
		//echo $stri;
		$this->cd = mysqli_query(DB_Set::$db_conn,$this->stri);
		//检测Query 正常性和危险性，根据Log 智能分析
		if($this->cd == false){
				$this->get = array(mysqli_errno(DB_Set::$db_conn),mysqli_error(DB_Set::$db_conn));
				return self::$C_FALSE;	
		}
		if($this->cd == true){
			if($isdui){
				$this->get = mysqli_insert_id(DB_Set::$db_conn);
				return self::$C_TRUE;	
			}
			// RESULT
			if(mysqli_num_rows($this->cd) <= 0){
			    return self::$C_0;
			}else{
					$this->get = mysqli_fetch_array($this->cd);
					return self::$C_TRUE;
			}
			
		}
		
		if($this->cd === NULL){
			return self::$C_NULL;
		}
	}
	public function f_($stri){
		$this->stri = $stri;
		$this->cd = mysqli_query(DB_Set::$db_conn,$this->stri);
		if($this->cd === false){
				return self::$C_FALSE;		
		}
			if($this->cd === ""){
			 	return self::$C_EMPY;
			}
			if($this->cd === NULL){
				return self::$C_NULL;
			}
			if($this->cd === "true" || $this->cd === true ){
				return self::$C_TRUE;
				}
			if($this->cd === 0){
			    return self::$C_0;
			}
			//ROW By ROW
			for($i=0;$i < mysqli_num_rows($this->cd);$i++){
				$this->get[$i] = mysqli_fetch_array($this->cd);
			}			
			return self::$C_TRUE;
			//return mysql_fetch_array($this->cd);
		}
	
	
	public function __construct($argu,$db_list = "*",$db_table,$db_cond){
	
		if($argu == "S"){
			if(self::check_conn() != true){
				$this->status = self::$C_DB;	
			}
			/*if(strpos($db_table,"banpgai_game") !== false || strpos($db_table,"banpgai_game") !== false){
				mysql_select_db("");	
			}else{
				mysql_select_db("");
			}*/
			$sql = "SELECT ".$db_list."  FROM  ".$db_table ."  WHERE ".$db_cond;
			if($db_cond === NULL){
				$sql = "SELECT ".$db_list."  FROM  ".$db_table;
				}
			$this->status =  $this->e_($sql,false);
			return $this->status;
		}else if($argu == "S2"){
			if(self::check_conn() != true){
				$this->status = self::$C_DB;	
			}
			$this->status =  $this->f_("SELECT ".$db_list."  FROM  ".$db_table ." LIMIT 0,30");
			return $this->status;
		}else
		
		 if($argu == "U"){
			if(self::check_conn() != true){
				$this->status = self::$C_DB;
			}
			// LIST TABLE COND
			// TABLE LIST COND
			$this->status = $this->e_("UPDATE  `".DB_Set::$db_name."`.`".$db_table."`  SET  ".$db_list."  WHERE ".$db_cond,true);
			return $this->status;
		}else if($argu == "I"){
			if(self::check_conn() != true){
				$this->status = self::$C_DB;	
			}
			$this->status = $this->e_("INSERT INTO `".$db_table."` ".$db_cond." VALUES ".$db_list,true);
			return $this->status;		
		}else if($argu == "EXP"){
		// 设置要导出的
			return mysqli_query(DB_Set::$db_conn,"SELECT * FROM `".$db_table."`",false);
		}else{
			$this->status = self::$C_NOACT;
			return $this->status;
		}
			
	}
	
}

?>