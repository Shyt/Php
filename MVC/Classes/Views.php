<?php

namespace App\Classes;

use App\Classes\E404Exception;

class Views
{
	
	protected $data = [];
	
	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	public function __get($name)
	{
		return $this->data[$name];
	}
	
	public function display($url){
		foreach ($this->data as $key => $val){
			$$key = $val;
		}
		
		$filename = __DIR__ . '/../views/' .$url;
		
		if (file_exists($filename)) {
			include $filename;
		}else{
			
			throw new E404Exception("Ошибка", 404);
		}
		
	}
}