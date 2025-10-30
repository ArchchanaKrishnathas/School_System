<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$sub_name=$_POST["subject_name"];
		$sub_index=$_POST["subject_index"];
		$sub_order=$_POST["subject_order"];
		$sub_color = $_POST['subject_color'];
		$sub_no = $_POST['subject_no'];
		
		require_once('../config.php');
		
		$query="INSERT INTO subjects(subject_name,subject_index,subject_order,subject_color,subject_no) VALUES('$sub_name','$sub_index','$sub_order','$sub_color','$sub_no')";
		
		$results = mysqli_query($connect,$query);
				
		if(!$results){
			echo mysqli_error($connect);
		}
	}
	
	header("location:index.php");
?>