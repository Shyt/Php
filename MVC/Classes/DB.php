<?php

namespace App\Classes;

use PDO;
use App\Classes\E404Exception;
use App\Classes\E403Exception;

class DB
{
	private $dbn;
  
	public function __construct(){
		$filename = __DIR__ .'/../config.php';
		
		if (file_exists($filename)) {
			require $filename;
		}else{
			throw new E404Exception("Конфигурации не найдены", 404);
		}
		
		try {
			$this->dbn = new PDO('mysql:host='.$host.';dbname='.$db, $login, $pass);
		}catch(PDOException $e) {
			throw new E403Exception("Подключиться к базе не удалось", 403);
		}
	}
	
	public function setClassName($className){
		$this->className = $className;
	}
	
	public function check($sql, $params=[]){
		$sth = $this->dbn->prepare($sql);
		$sth->execute($params);
		return $sth->rowCount();
	}
	
	public function execute($sql, $params=[]){
		$sth = $this->dbn->prepare($sql);
		return $sth->execute($params);
	}
	
	public function query($sql, $params=[])
	{
		$sth = $this->dbn->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
	}
	
}