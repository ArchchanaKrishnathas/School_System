<?php
	session_start();
	
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$gr_name=$_POST["grade_name"];
		$gr_group=$_POST["grade_group"];
		$gr_color=$_POST["grade_color"];
		$gr_order = $_POST['grade_order'];
		
		require_once('../config.php');
		
		$check_query= "SELECT grade_name FROM grades WHERE grade_name='$gr_name' ";
		$check_result= mysqli_query($connect,$check_query);
		$rows_count=mysqli_num_rows($check_result);
		
		if($rows_count>0){
			$_SESSION['error'] = "Grade already exists!";
			header("location:create.php");
			exit;
		} else {
			$query="INSERT INTO grades(grade_name,grade_group,grade_color,grade_order) VALUES('$gr_name','$gr_group','$gr_color','$gr_order')";
			
			$results = mysqli_query($connect,$query);
					
			if(!$results){
				echo mysqli_error($connect);
			} else{
				header("location:index.php");
			}
		}
	}

?>