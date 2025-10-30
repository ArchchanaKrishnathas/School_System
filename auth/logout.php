<?php 
	session_start();
	session_destroy();
	
	//header("location:login.php");
	header("Location: ../auth/login.php");

	exit();
?>