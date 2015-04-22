<?php

namespace App\Controllers;

use App\Classes\Views;

class Game
{
	
	public function Cover(){
		$view = new Views;
		$view->display('/index.php');
	}
	
}

?>