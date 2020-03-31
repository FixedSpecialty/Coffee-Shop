<?php
class Dao {
	private $host = "us-cdbr-iron-east-05.cleardb.net";
	private $db = "heroku_45798c2d8de94b9";
	private $user = "b28a9f1c08dfd1";
	private $pass = "0d745671";

	public function getConnection() {
		try{
		  $connection = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
	} catch (Exception $e) {
		echo print_r($e,1);
	  }
	  return $connection;
	}

}
