<?php
class Sec {
	public static $E_ILLEG = -1006;
	public static $E_LEN = -1007;
	public static $E_UNDER = -1002;
	public static $E_MAX = -1001;
	public static $E_NUM = -1000;
	public static function tu($npos){
		while(stripos($npos,"\\") !== false){
			$npos = substr($npos,0,stripos($npos,"\\")) . substr($npos,stripos($npos,"\\")+1);
		}
		return $npos;
	}
	public static function D($erg,$lee=200){
		$erg = quotemeta($erg);
		$erg = htmlentities($erg, ENT_QUOTES);
		if(strlen($erg) > $lee){
			return NULL;
		}
		return $erg;
	}
	public static function A($erg,$lee=100){
		$Char  = array("\\", '&', "'", '"', '/', '*', ',', '<', '>', "\r", "\t", "\n", '#', '%', '?', '　','$',"`","(");
	foreach($Char as $cchar){
		//echo $cchar;
		if(strpos($erg,$cchar) !== false){
			//echo $cchar;
			return NULL;
		}
	}
	
	if(strlen($erg) > $lee){
		return NULL;
	}
	return $erg;
	}
	
	
	public static function NS($erg,$lee = 2000){
		$Char = array("\\", "'", '"');
		foreach($Char as $cchar){
		//echo $cchar;
		if(strpos($erg,$cchar) !== false){
		//		echo $cchar;
				return NULL;
			}
		}
		
		if(strlen($erg) > $lee){
			return NULL;
		}
		return $erg;
	}
	
	
	public static function C($num,$up = TRUE,$limit = 2E0020){
		
		$num = Sec::A($num,20);
		if((2 * $num )/ 2 != $num){
			return -1000;
		}
		if($num	> $limit){
			return -1001;
		}
		if($num < 0 && $up === TRUE){
			return -1002;
		}
		return $num;
		
		
		}
	public static function C80($num,$up = 80){
		
		$num = Sec::A($num,$up);
		return $num;
		
		
	}
}
	

?>