<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Original Author <author@example.com>                        |
// |          Your Name <you@example.com>                                 |
// +----------------------------------------------------------------------+
//
// $baidu_Id:lugt12
// $qq_id: 961538720
//global $home_path;
class Load {
    public static $db, $db_loaded, $db_set, $db_char;
    public static $char, $char_loaded;
    static public $lock, $Sec, $User, $DB;
    public static $home_path;
    static public final function loadmod($name) {
        $GLOBALS['home_path'] = realpath(dirname(__FILE__) . "/../..");
        if ($name == "Header") {
            header("Access-Control-Allow-Origin: http://niimei.com");
            header("Access-Control-Allow-Origin: http://127.0.0.1");
        } else if ($name == "Game.Init.Settings") {
            require_once ($GLOBALS['home_path'] . "/game/set.php");
        } else if ($name == "JSON") {
            require_once ($GLOBALS['home_path'] . "/core/load/json.php");
        } else if ($name == "Game.Person.Settings") {
            die("ERR_REQUIRE_NOT_ESTEEMED");
        } else if ($name == "CAT1") {
        	require_once ($GLOBALS['home_path'] . "/game/classattr.php");
        } else if ($name == "CAT2") {
        	require_once ($GLOBALS['home_path'] . "/game/classattrf.php");
        } else if ($name == "CMM") {
        	require_once ($GLOBALS['home_path'] . "/game/classmem.php");
        } else if ($name == "CST") {
        	require_once ($GLOBALS['home_path'] . "/game/classsta.php");
        } else if ($name == "CPO") {
        	require_once ($GLOBALS['home_path'] . "/game/classpos.php");
        } else if ($name == "DB") {
            require_once ($GLOBALS['home_path'] . "/core/db/load.php");
            return;
        } else if ($name == "Security.L" || $name == "Kern.Set" || $name == "Error") {
            //require_once  realpath(self::$home_path."/../../core/settings/sec.php");
            
        } else if ($name == "3s") {
        	if(!isset($_SESSION)){
        		session_start();
        		$_SESSION['init'] = 1;
        	}
            Load::loadmod("JSON");
            Load::loadmod("DB");
            Load::loadmod("Security.L");
            EC::A();
            if (!isset($_SESSION['uid']) || !is_numeric($_SESSION['uid'])) {
            	//var_dump($_SESSION);
                JSON::fa("ERR_X12");
            }
            return $_SESSION['uid'];
        } else if ($name == "User") {
            require_once ($GLOBALS['home_path'] . "/core/db/user.php");
            //die("ERR_NO_USER");
        } else if ($name == "Teach") {
            require_once ($GLOBALS['home_path'] . "/core/classteach.php");
        } else {
            die("UNKNOWN REQUIRANCE" . $name);
        }
    }
    public static function main_load() {
        if (self::$lock === true) {
            return false;
        }
        //Main LOader  Loading
        //Lock it self
        self::$lock = true;
        //Loading as a List
        //Load DB
        self::loadmod("DB");
        //Load User
        //Load Game
        //Load Process
        
    }
    static public final function I($name) {
        self::$home_path = realpath(dirname(__FILE__) . "/../../../../core/");
        if ($name == "Header") {
            header("Access-Control-Allow-Origin: http://niimei.com");
            header("Access-Control-Allow-Origin: http://127.0.0.1");
            header("Access-Control-Allow-Origin: http://niimei.wicp.net");
            header("Access-Control-Allow-Origin: http://114.215.157.171");
        }
        if ($name == "REQU") {
            require_once realpath($GLOBALS['home_path'] . "/requ.php");
        }
        if ($name == "DB.Set") {
            //require_once realpath(self::$home_path ."/db/set.php");
            
        }
        if ($name == "DB") {
            require_once realpath($GLOBALS['home_path'] . "/db/load.php");
            //self::$DB = true;
            
        }
        if ($name == "Security") {
            //$this->loadmod("Security");
            //require_once  realpath(self::$home_path."/sec.php");
            //self::$Sec = true;
            
        }
        if ($name == "UA") {
            require_once realpath($GLOBALS['home_path'] . "/checkua.php");
        }
        if ($name == "Tecent") {
            require_once realpath($GLOBALS['home_path'] . "/tencent.php");
        }
        if ($name == "Echos") {
            require_once realpath($GLOBALS['home_path'] . "/echo.php");
        }
        if ($name == "User.Change") {
            require_once realpath($GLOBALS['home_path'] . "/u/usset.php");
        }
    }
    static public final function ER() {
        error_reporting(E_ERROR);
    }
    static public final function EA() {
        error_reporting(E_ALL);
    }
    static public final function quick_load() {
        if (self::$lock === true) {
            return false;
        }
        //Main LOader  Loading
        //Lock it self
        self::$lock = true;
        //Loading as a List
        //Load DB
        require_once $GLOBALS['home_path'] . "./../../core/db/load.php";
        DBLoad::load();
        //Load
        
    }
}
class Set {
    public static $RAND = 10000;
    public static $dp = "../../data";
    public static $sslen = 32;
    public static function SETS() {
        dirname(__FILE__) . "/../../data/";
    }
}
class EC {
    static public function R() {
        error_reporting(E_ERROR);
    }
    static public function S() {
        error_reporting(E_WARNING);
    }
    static public function N() {
        error_reporting(E_NOTICE);
    }
    static public function A() {
        error_reporting(E_ALL);
    }
}
class Sec {
    public static $E_ILLEG = - 1006;
    public static $E_LEN = - 1007;
    public static $E_UNDER = - 1002;
    public static $E_MAX = - 1001;
    public static $E_NUM = - 1000;
    public static function tu($npos) {
        while (stripos($npos, "\\") !== false) {
            $npos = substr($npos, 0, stripos($npos, "\\")) . substr($npos, stripos($npos, "\\") + 1);
        }
        return $npos;
    }
    public static function D($erg, $lee = 200) {
        $erg = quotemeta($erg);
        $erg = htmlentities($erg, ENT_QUOTES);
        if (strlen($erg) > $lee) {
            return -1007;
        }
        return $erg;
    }
    public static function A($erg, $lee = 100) {
        $Char = array(
            "'",
            '"'
        );
        foreach ($Char as $cchar) {
            // echo $cchar;
            if (strpos($erg, $cchar) !== false) {
                // echo $cchar;
                return NULL;
            }
        }
        if (strlen($erg) > $lee) {
            return NULL;
        }
        return $erg;
    }
    public static function B($erg, $lee = 100) {
        $Char = array(
            "\\",
            "'",
            '"',
            '/',
            ',',
            "\r",
            "\t",
            "\n",
            '?',
            "!"
        );
        foreach ($Char as $cchar) {
            // echo $cchar;
            if (strpos($erg, $cchar) !== false) {
                // echo $cchar;
                return -1006;
            }
        }
        if (strlen($erg) > $lee) {
            return -1007;
        }
        return $erg;
    }
    public static function C($num, $up = TRUE, $limit = 2E0020) {
        $num = Sec::A($num, 20);
        if ((2 * $num) / 2 != $num) {
            return -1000;
        }
        if ($num > $limit) {
            return -1001;
        }
        if ($num < 0 && $up === TRUE) {
            return -1002;
        }
        return $num;
    }
    public static function C80($num, $up = 80) {
        $num = Sec::A($num, $up);
        return $num;
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
}
?>