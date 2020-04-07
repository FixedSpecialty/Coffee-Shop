<?php
require_once 'KLogger.php';

class Dao {
	private $host = "us-cdbr-iron-east-05.cleardb.net";
	private $db = "heroku_45798c2d8de94b9";
	private $user = "b28a9f1c08dfd1";
	private $pass = "0d745671";

	public function __construct() {
		$this->logger = new KLogger("log.txt", KLogger::WARN);
	  }

	public function getConnection() {
		try{
		  $connection = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
	} catch (Exception $e) {
		echo print_r($e,1);
		$this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
		return null;
	  }
	  return $connection;
	}

	public function getStock(){
		$conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
      return $conn->query("SELECT id, origin, varietal, roaster, elevation, notes, stock FROM coffeestock", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
	}

	public function getUser($id){
		$conn = $this->getConnection();
    if(is_null($conn)) {
      return;
	}
	$q = $conn = $this->getConnection();
	$saveQuery ="SELECT first, last, email FROM members WHERE id = :Id";
	$q = $conn->prepare($saveQuery);
	$q->bindParam(":Id", $id);
	$logger = new KLogger('log.txt', KLogger::DEBUG);
	$logger->LogInfo("Getting a User in Dao[{$id}]");
 return $q->execute();
    } 

	public function saveStock($origin, $varietal, $roaster, $elevation, $notes, $stock) {
		$logger = new KLogger('log.txt', KLogger::DEBUG);
		$logger->LogInfo("Saving a Stock Item in Dao[{$roaster}]");
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO coffeestock (origin, varietal, roaster, elevation, notes, stock) VALUES (:Origin, :Varietal, :Roaster, :Elevation, :Notes, :Stock)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":Origin", $origin);
		$q->bindParam(":Varietal", $varietal);
		$q->bindParam(":Roaster", $roaster);
		$q->bindParam(":Elevation", $elevation);
		$q->bindParam(":Notes", $notes);
		$q->bindParam(":Stock", $stock);
		$q->execute();
	}

	public function saveUser($first, $last, $email, $password) {
		$logger = new KLogger('log.txt', KLogger::DEBUG);
		$logger->LogInfo("Saving a User in Database[{$first}, {$last}, {$email}, {$password}]");
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO Members (first, last, email, password) VALUES (:First, :Last, :Email, :Password)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":First", $first);
		$q->bindParam(":Last", $last);
		$q->bindParam(":Email", $email);
		$q->bindParam(":Password", $password);
		$q->execute();
	}
	
	public function deleteStock($id){
		$conn = $this->getConnection();
		$deleteQuery = "DELETE FROM coffeestock WHERE id = :id";
		$q = $conn->prepare($deleteQuery);
		$q->bindParam(":id", $id);
		$q->execute();
	
	}

}
