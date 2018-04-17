<?php
require_once ("../init.php");

class signin extends database {

	public function dbCheck($inputEmail, $inputPassword, $remember){
		$emailCheckQuery = "SELECT * FROM signup ";
		$emailCheckQuery .= "WHERE email = '{$inputEmail}' ";

		$emailCheck = mysqli_query($this->conn, $emailCheckQuery);
		$emailCount = mysqli_num_rows($emailCheck);

			if($emailCount == 0){
				$result = "Email does not exist. Please <a href='../sign-up.html'>Sign Up</a>";
			}else{
				$checkQuery = "SELECT * FROM signup ";
				$checkQuery .= "WHERE email = '{$inputEmail}' ";
				$query = mysqli_query($this->conn, $checkQuery);

				while($rows = mysqli_fetch_array($query)){
					$dbId = $rows['id'];
					$dbEmail = $rows['email'];
					$dbPass = $rows['password'];
				}

				if($inputEmail == $dbEmail){
					if($inputPassword == $dbPass){
						if($remember == "on"){
							$exp = time()+604800;
							setcookie("principal", md5($dbId), $exp, '/');
							header("Location: ../dashboard.php");
						}else{
							$_SESSION['principal'] = md5($dbId);
							header("Location: ../dashboard.php");
						}
					}else{
						$result = "Password incorrect. Please try again.";
					}
				}else{
					$result = "Email not found. Please <a href='../sign-up.html'>Sign Up</a>.";
				}

		}

		return $result;
	}
}


?>