<?php

class DB_Set{
	public static $db_name,$db_addr,$db_user,$db_db,$db_pass,$db_port,$db_char,$db_conn;
	static function Init(){
		self::$db_name = "Default DB";
		self::$db_addr = "localhost";
		self::$db_user = "s483816db0";
		self::$db_pass = "62g6nypm";
		self::$db_db   = "s483816db0";
		self::$db_port = "3306";
		self::$db_char = "gb2312";
		
	}
	


}
?>