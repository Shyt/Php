<?php
	header("Content-Type: text/html; charset=utf-8");
	
	//До РНР 7 (проверенно)
	class Car{
		public function toyota(){
			print "toyota";
		}
	}
	
	$mashina = (new Car)->toyota(); 

	
/* 
	//РНР 7+ (не проверенно)
	$util->setLogger(new class{
		public function log($msg){
			echo $msg;
		}
	}); 
*/