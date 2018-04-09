<?php
ob_start();
session_start();
require_once ("../init.php");

if(isset($_POST['signinBtn'])){
	$validationClass = new validation();
	$inputEmail = $validationClass->validate($_POST['inputEmail']);
	$inputPassword = $validationClass->validate(md5($_POST['inputPassword']));
		if(isset($_POST['remember'])){
			$remember = "on";
		}else{
			$remember = "off";
		}

		if(!empty($inputEmail)){
			if(!empty($inputPassword)){
				$handle = new signin();
				echo $handle->dbCheck($inputEmail, $inputPassword, $remember);
			}else{
				$result = "Please input password";
			}

		}else{
			$result =  "Please input email";
		}

}else{
	echo "Access Denied!";
}
?>