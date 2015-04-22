<?php session_start();

use App\Classes\E404Exception;
use App\Classes\E403Exception;
use App\Controllers\ErrorControllers;

$error404 = "Неправильный путь";
$error403 = "Ошибка";

header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/auto.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);
$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'Game';
$method = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'Cover';

try {
	$class = 'App\\Controllers\\' .$ctrl;
	
	if(class_exists($class)){
		$controller = new $class;
		if(method_exists($controller, $method)){
			$controller->$method();
		}else{
			throw new E404Exception($error404, 404);
		}
	}else{
		throw new E404Exception($error404, 404);
	}
} catch (E404Exception $e) {
	$log = new ErrorControllers;
	$log->message = $error404;
	$log->code = $e->getCode();
	$log->url = 'error404/'.date("dmY").'.txt';
	$log->logFile();
} catch (E403Exception $e){
	$log = new ErrorControllers;
	$log->message = $error403;
	$log->code = $e->getCode();
	$log->url = 'error403/'.date("dmY").'.txt';
	$log->logFile();
}

?>