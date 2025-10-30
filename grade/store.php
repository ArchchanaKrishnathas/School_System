<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$gr_name=$_POST["grade_name"];
		$gr_group=$_POST["grade_group"];
		$gr_color=$_POST["grade_color"];
		$gr_order = $_POST['grade_order'];
		
		require_once('../config.php');
		
		$query="INSERT INTO grade(grade_name,grade_group,grade_color,grade_order) VALUES('$gr_name','$gr_group','$gr_color','$gr_order')";
		
		$results = mysqli_query($connect,$query);
				
		if(!$results){
			echo mysqli_error($connect);
		}
	}
	
	header("location:index.php");
?>