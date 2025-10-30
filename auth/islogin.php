<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		
		$user_name=$_POST["user_name"];
		$password=$_POST["password"];
		
		include('../config.php');
		$query = "SELECT * FROM users  WHERE user_name ='$user_name' AND password='$password'";
		
		$results = mysqli_query($connect, $query);
		if (!$results) {
			echo mysqli_error($connect);
		}
		
		$rowcount= mysqli_num_rows($results);
		
		if($rowcount==1){
			//echo "login Success";
			$_SESSION['user_name']= $user_name;
			header("location:../index.php");
			
		}else{
			//echo "login failure";
			header("location:login.php");
			exit();
		}
	}
?>