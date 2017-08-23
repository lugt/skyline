<?php


class Teacher_A{
	public $i;
	public $n,$t,$p;
	public function __construct($row){
		if($row != NULL){
			$this->i = $row['uid'];
			$this->n = $row['name'];
			$this->t = $row['title'];
			$this->p = $row['phone'];
			$this->o = $row['otell'];
		}
	}	
	
}

class Teach_Info{
		
	public $l = array();	
	
	public function load() {
		$q = BW_TEACH::tc_open();
		if(!isset($q->l) && !isset($q['l'])){
			return false;	
		}
		$this->l = $q->l;
		return true;
	}
	
	public function save(){
		return BW_TEACH::tc_save($this);
	}
	
	
	// 添加一个物品 
	public function add($teach){
		$is = count($this->l);
		$this->l[$is] = $teach;
		return true;
		//钩子
	}
	
	public function remove($ip){
		
		for($i=0;$i<count($this->l);$i++){
			
			if($this->l[$i]->i == $ip){
					unset($this->l[$i]);
					$this->l = array_values($this->l);	
					// 钩子
					return true;
			}
		}
		return false;
	}
	
	public function gettitle($ip){
		
		for($i=0;$i<count($this->l);$i++){
			
			if($this->l[$i]->i == $ip){
				return $this->l[$i]->t;
			};
		}
		return false;
	}	
	
	
	public function getname($ip){
		
		for($i=0;$i<count($this->l);$i++){
			
			if($this->l[$i]->i == $ip){
				return $this->l[$i]->n;
			};
		}
		return false;
	}	
	
	public function getphone($ip){
		
		for($i=0;$i<count($this->l);$i++){
			
			if($this->l[$i]->i == $ip){
				return $this->l[$i]->p;
			};
		}
		return false;
	}	
}


	
class BW_TEACH{
	public static function tc_open(){
		$url = $GLOBALS['home_path']."/data/teachers.info"; 
		if(file_exists($url)){
			$bap = unserialize(file_get_contents($url));
		}else{
			$bap = new Teach_Info();
			$bap->l = array();
			// 发放100个铜币
			BW_TEACH::tc_save($bap);
		}
		return $bap;
	}
		
	public static function tc_save($bap){
		$url = $GLOBALS['home_path']."/data/teachers.info"; 
		if(!file_exists(dirname($url))){
			mkdir(dirname($url));
		}
		return file_put_contents($url,serialize($bap),LOCK_EX);
	}
}
?>