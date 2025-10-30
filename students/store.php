<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$fname=$_POST["father_name"];
		$st_name=$_POST["student_name"];
		$admission_no=$_POST["admission_no"];
		$grade_id = $_POST['grade_id'];
		$nic_no=$_POST["nic_no"];
		$dob=$_POST["date_of_birth"];
		$gender=$_POST["gender"];
		$tel_no=$_POST["telephone_no"];
		$address=$_POST["address"];
		
		require_once('../config.php');
		
		$query="INSERT INTO students(father_name,student_name,admission_no,grade_id,nic_no,date_of_birth,gender,telephone_no,address) VALUES('$fname','$st_name','$admission_no',$grade_id,'$nic_no','$dob','$gender','$tel_no','$address')";
		
		$results = mysqli_query($connect,$query);
				
		if(!$results){
			echo mysqli_error($connect);
		}
	}
	
	header("location:index.php");
?>