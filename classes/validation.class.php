<?php
require("../init.php");

class validation extends database{

	 public function validate($data){
		$data = mysqli_real_escape_string($this->conn, $data);
		$data = stripslashes($data);
		$data = htmlentities($data);
		$data = htmlspecialchars($data);

		return $data;
	}

}


?>