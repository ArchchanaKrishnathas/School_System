<?php 
	session_start();
	
	if(!$_SESSION['user_name']){
		header("location:/Archchana/School_System_CRUD_PHP/auth/login.php");
		exit();
	}
?> 