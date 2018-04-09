<?php

class placeholder extends database {

	public function returnConn() {

		if($this->conn){
			$result =  "Good";
		}else{
			$result =   "bad";
		}
		return $result;
	}
	
}

?>