<?php
require_once ("../init.php");

class signup extends database{

	public function dbInsert($schoolName, $schoolEmail, $schoolAddress, 
		$schoolState, $schoolCountry, $schoolPassword, $schoolPassword2){

		if ($schoolName){

			if($schoolEmail){

				if($schoolAddress){

					if($schoolState){

						if($schoolCountry){

							if($schoolPassword){

								if($schoolPassword2){

									if($schoolPassword2 === $schoolPassword){
										
											$emailCheckQuery = "SELECT * FROM signup ";
											$emailCheckQuery .= "WHERE email = '{$schoolEmail}' ";

											$emailCheck = mysqli_query($this->conn, $emailCheckQuery);
											$emailCount = mysqli_num_rows($emailCheck);

											if($emailCount != 0){
												$output = "Email already exists!";
											}else{
												$query = "INSERT INTO signup ";
												$query .= "(name, email, address, state, country, password) ";
												$query .= "VALUES('{$schoolName}', '{$schoolEmail}', '{$schoolAddress}', '{$schoolState}', '{$schoolCountry}', '{$schoolPassword}') ";

												$runQuery = mysqli_query($this->conn, $query);

												if($runQuery){
													$output = "Registration Successful. Please <a href='../form.html'>Login</a>";
												}else{
													$output = "Registration Failed. Please try again";
												}
											}

									}else{
										$output = "Passwords Do Not Match!";
									}
								}else{
									$output = "Please Confirm Password";
								}
							}else{
								$output = "Please Input Password";
							}
						}else{
							$output = "Please Input School Country";
						}
					}else{
						$output = "Please Input School State";
					}
				}else{
					$output = "Please Input School Address";
				}
			}else{
				$output = "Please Input School Email";
			}
		}else{
			$output = "Please Input School Name";
		}

		return $output;
	}
		


}


?>