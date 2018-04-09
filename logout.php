<?php
session_start();

if(isset($_SESSION['principal'])){
	session_destroy();
	header("Location: form.html");
}elseif (isset($_COOKIE['principal'])) {
	$exp = time()-604800;
	setcookie("principal", "", $exp, '/');
	header("Location: form.html");
}

?>