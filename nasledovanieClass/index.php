<?php
	header("Content-Type: text/html; charset=utf-8");

	class Car{
		protected $maxSpeed = 5;
		
		function __get($maxSpeed){
			return $this->maxSpeed;
		}
	}
	
	class Toyota extends Car{
		public $numOfSeeds = 2;
	}
	
	class Main{
		public function main(){
			$mashina = new Toyota();
			print $mashina->numOfSeeds."<br>";
			print $mashina->maxSpeed;
		}
	}
	
	$main = new Main();


?>