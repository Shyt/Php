<?php

namespace App\Controllers;

use App\Classes\Views;

class ErrorControllers
{
	
	public function logFile(){
		$view = new Views;
		$view->error = $this->message;
		$view->code = $this->code;
		$view->display($_SESSION['lang'] .'/error/error.php');
		file_put_contents(__DIR__ .'/../error/'. $this->url , date("H:i:s Y-m-d") . " " . $this->message ." *". $this->code . "*\n", FILE_APPEND);
	}
	
}