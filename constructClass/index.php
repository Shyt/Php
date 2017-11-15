<?php
	header("Content-Type: text/html; charset=utf-8");
	
	class BaseClass{
		function __construct(){
			print "baseClass";
		}
	}
	
	class SubClass extends BaseClass{
		function __construct(){
			parent::__construct();
			print "SubClass";
		}
	}
	
	class OtherClass extends BaseClass{
		
	} 
	
	//$obj = new BaseClass(); //baseClass
	//$obj = new SubClass(); //baseClass, subClass
	$obj = new OtherClass(); //baseClass