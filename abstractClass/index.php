<?php
	header("Content-Type: text/html; charset=utf-8");
	
	abstract class Cars{
		function moveCars(){
			print "start move";
		}
		abstract function colorCars();
	}
	
	class Toyota extends Cars{
		function colorCars(){
			print "green";
		}
	}
	
	class Ferrari extends Cars{
		function colorCars(){
			print "red";
		}
	}
	
	class Main{
		public function main(){
			$car1 = new Toyota();
			print $car1->colorCars()."<br>";
			print $car1->moveCars()."<br>";
			
			$car2 = new Ferrari();
			print $car2->colorCars()."<br>";
			print $car2->moveCars();
		}
	}
	
	$mashina = new Main();
	
	
	
	