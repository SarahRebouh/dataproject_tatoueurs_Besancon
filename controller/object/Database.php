<?php

use \PDO;

class Database{

	private $pdo;
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;

	public function __construct(){
		require_once "controller/php/request_data.php";
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	private function getPDO(){
		if($this->pdo === null){
			$pdo = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", "$this->db_user", "$this->db_pass",
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}

		return $this->pdo;
	}

	public function prepare($statement, $attributes=null){
		$req = $this->getPDO()->prepare($statement);
		$req->execute($attributes);
		$datas = $req->fetchAll();
		return $datas;
	}
}
?>
