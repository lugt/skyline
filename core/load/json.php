<?php
class JSON_Req{
	public $sta;
	public $msg;
	public $timer;
	public $uid;
	
	function __construct(){
			$this->sta = "success";
		}
	}
class JSON{
	public static  function di($k){
		if(substr($k,0,1) == "{" || substr($k,0,1) == "["){
			echo("({\"sta\":\"success\",\"msg\":".$k."})");
			die();
		}
			echo("({\"sta\":\"success\",\"msg\":\"".$k."\"})");
			die();
		}
	public static  function su($k){
		if(substr($k,0,1) == "{" || substr($k,0,1) == "["){
			echo("({\"sta\":\"success\",\"msg\":".$k."})");
		die();
		}
		echo("({\"sta\":\"success\",\"msg\":\"".$k."\"})");
		die();
		}
	public static  function sumd5($k){
		echo("({\"md5s\":\"".md5($k)."\",\"sta\":\"success\",\"msg\":\"".$k."\"})");
		die();}
	public static  function fa($k){
		echo("({\"sta\":\"failed\",\"msg\":\"".$k."\"})");
		die();}
	public static function dieo($k){
				self::di($k);
		}
	
	}

?>