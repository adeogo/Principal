<?php
require_once ("../init.php");

if(isset($_POST['signupBtn'])){
	$validationClass = new validation();

	$schoolName = $validationClass->validate($_POST['schoolName']);
	$schoolEmail = $validationClass->validate($_POST['schoolEmail']);
	$schoolAddress = $validationClass->validate($_POST['schoolAddress']);
	$schoolState = $validationClass->validate($_POST['schoolState']);
	$schoolCountry = $validationClass->validate($_POST['schoolCountry']);
	$schoolPassword = $validationClass->validate(md5($_POST['schoolPassword']));
	$schoolPassword2 = $validationClass->validate(md5($_POST['schoolPassword2']));


		$handle = new signup();
			echo $handle->dbInsert($schoolName, $schoolEmail, 
										$schoolAddress, $schoolState, 
										$schoolCountry, $schoolPassword, 
										$schoolPassword2);
}else{
	echo "Access Denied!";
}




?>