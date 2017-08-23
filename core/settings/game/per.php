<?php
class Person_Set{
	public $wiz,$sma,$ene,$fas,$cha,$fat,$str;
	public function combine($s2){
		$s1 = $this;
		if(!$s1 or !$s2){
			return false;		
		}
		$s3 = new Person_Set();
		$s3->cha = $s1->cha + $s2->cha;
		$s3->ene = $s1->ene + $s2->ene;
		$s3->str = $s1->str + $s2->str;
		$s3->fat = $s1->fat + $s2->fat;
		$s3->fas = $s1->fas + $s2->fas;
		$s3->sma = $s1->sma + $s2->sma;
		$s3->wiz = $s1->wiz + $s2->wiz;
		return $s3;
		 
	}
	
	public function damage($s1,$s2){
		$this->$s1 = $this->$s1 - $s2;		
	}
}



?>