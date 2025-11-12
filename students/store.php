<?php
	session_start();
	
	require_once('../config.php');

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
		
		$check_query= "SELECT admission_no,nic_no FROM students WHERE admission_no='$admission_no' OR nic_no='$nic_no' ";
		$check_result= mysqli_query($connect,$check_query);
		$rows_count=mysqli_num_rows($check_result);
		
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
		} else {	
			$target_dir="uploads/";
			$target_file=$target_dir.basename($_FILES["student_image"]["name"]);
			//$original_file_name= basename($_FILES["student_image"]["name"]);
			
			$img_file_type= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$allowed_file_types= ['jpg','jpeg','png','gif'];
			$size = $_FILES["student_image"]["size"];

			if(in_array($img_file_type,$allowed_file_types)){
				if(move_uploaded_file($_FILES["student_image"]["tmp_name"],$target_file)){
					echo "Image uploaded successfully!";
				
					$query="INSERT INTO students(father_name,student_name,admission_no,grade_id,nic_no,date_of_birth,gender,telephone_no,address,image_path) VALUES('$fname','$st_name','$admission_no',$grade_id,'$nic_no','$dob','$gender','$tel_no','$address','$target_file')";
					
					$results = mysqli_query($connect,$query);
							
					if(!$results){
						echo mysqli_error($connect);
					}
					/*
					$query_img= "INSERT INTO images (file_name,original_name,mime,size) VALUES('$target_file','$original_file_name','$img_file_type','$size')";
					$result2= mysqli_query($connect, $query_img);
					if(!$result2){
						echo mysqli_error($connect);
					} 
					*/

				}
				else {
					echo "Image upload failed!";
				}
			} else {
				echo "Only JPG, JPEG, PNG & GIF files are allowed.";
			}
		}
		
		header("location:index.php");
	}
?>