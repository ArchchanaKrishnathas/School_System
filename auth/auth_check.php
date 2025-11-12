<?php 
	session_start();
	
	if(!$_SESSION['user_name']){
		header("location:/archchana/school-system/auth/login.php");
		exit();
	}
?> 