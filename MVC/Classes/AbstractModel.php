<?php

namespace App\Classes;

use App\Classes\DB;

abstract class AbstractModel
{
	protected static $table;
	protected $item = [];
	
	public function __set($k, $v){
		$this->item[$k] = $v;
	}
	
	public function __get($k){
		return $this->item[$k];
	}
	
	public function findOne(){
		$class = get_called_class();
		$cols = array_keys($this->item);
		$keys = [];
		$string = [];
		foreach ($cols as $col) {
			$keys[':' . $col] = $this->item[$col];
			$string[] = $col . "= :". $col;
		}
		
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . implode(' AND ', $string);
		
		$db = new DB;
		$db->setClassName($class);
		return $db->query($sql,$keys)[0];
	}
	
	public function insert(){
		$cols = array_keys($this->item);
		$item = [];
		foreach ($cols as $col) {
			$item[':' . $col] = $this->item[$col];
		}

		$sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols). ') VALUES (' .implode(', ', array_keys($item)).')';
		$db = new DB();
		return $db->execute($sql,$item);
	}
	
	public function delete(){
		$cols = array_keys($this->item);
		$data = [];
		$item = [];

		foreach ($cols as $col) {
			$item[':' . $col] = $this->item[$col];
			$data[] = $col . "= :". $col;
		}

        $sql = 'DELETE FROM ' . static::$table . ' WHERE ' . implode(', ', $data) ;
		$db = new DB;
		$db->delete($sql, $item);
    }
	
	public function update(){
		$cols = array_keys($this->item);
		$data = [];
		$item = [];
		
		foreach ($cols as $col) {
			$item[':' . $col] = $this->item[$col];
			if($col != "id"){
				$data[] = $col . "= :". $col;
			}
		}
		
		$sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $data). ' WHERE id=:id';
		$db = new DB;
		$db->execute($sql,$item);
	}
	
	
}