<?php
ob_start();
session_start();

class session {
	static public function sessionTerms() {
		if(isset($_SESSION['principal'])){
			echo "<a href='logout.php'>Sign Out</a>";
		}elseif (isset($_COOKIE['principal'])) {
			echo "<a href='logout.php'>Sign Out</a>";
		}else{
			header("Location: form.html");
		}
	}
}

ob_end_flush();
?>