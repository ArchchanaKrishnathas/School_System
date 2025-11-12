<?php
	session_start();

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$sub_name=$_POST["subject_name"];
		$sub_index=$_POST["subject_index"];
		$sub_order=$_POST["subject_order"];
		$sub_color = $_POST['subject_color'];
		$sub_no = $_POST['subject_no'];
		
		require_once('../config.php');
		
		$check_query= "SELECT subject_name FROM subjects WHERE subject_name='$sub_name' ";
		$check_result= mysqli_query($connect,$check_query);
		$rows_count=mysqli_num_rows($check_result);

		if($rows_count>0){
			//echo "Duplicate entry";
			//header("location:create.php?id=1");
			
			$row = mysqli_fetch_assoc($check_result);
			
			/*
			if($row['subject_name'] == $sub_name && $row['subject_index']== $sub_index){
				
			}
			$_SESSION['error'] = "Subject already exists!";
			header("location:create.php");
			exit;
			
			if ($rows_count > 0) {
			$row = mysqli_fetch_assoc($check_result);
			
			if ($row['admission_no'] == $admission_no && $row['nic_no'] == $nic_no) {
				$_SESSION['error'] = "Admission number & NIC number already exist!";
			} elseif ($row['admission_no'] == $admission_no) {
				$_SESSION['error'] = "Admission number already exists!";
			} elseif ($row['nic_no'] == $nic_no) {
				$_SESSION['error'] = "NIC number already exists!";
			}
			header("Location: create.php");
			exit;
			*/
		} else {
			$query="INSERT INTO subjects(subject_name,subject_index,subject_order,subject_color,subject_no) VALUES('$sub_name','$sub_index','$sub_order','$sub_color','$sub_no')";
			
			$results = mysqli_query($connect,$query);
					
			if(!$results){
				echo mysqli_error($connect);
			} else{
				header("location:index.php");
			}
		}
	}
		
?>