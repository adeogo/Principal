<?php

class database {
	private $dbHost = "localhost";
	private $dbUser = "principal_admin";
	private $dbPass = "principal_admin";
	private $dbName = "principal_db";
	protected $conn;

	public function __construct(){
		$this->conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
	}

}
?>


