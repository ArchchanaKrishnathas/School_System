<?php	

	require_once ('../config.php');
	
	$id= $_POST["st_id"];
	$fname=$_POST["father_name"];
	$st_name=$_POST["student_name"];
	$admission_no=$_POST["admission_no"];
	$grade_id = $_POST['grade_id'];
	$nic_no=$_POST["nic_no"];
	$dob=$_POST["date_of_birth"];
	$gender=$_POST["gender"];
	$tel_no=$_POST["telephone_no"];
	$address=$_POST["address"];
		
	if($_FILES["student_image"]['error'] !== UPLOAD_ERR_NO_FILE){
		$target_dir="uploads/";
		$target_file=$target_dir.basename($_FILES["student_image"]["name"]);
		//$original_file_name= basename($_FILES["student_image"]["name"]);
			
		$img_file_type= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$allowed_file_types= ['jpg','jpeg','png','gif'];
		$size = $_FILES["student_image"]["size"];

		if(in_array($img_file_type,$allowed_file_types)){
			if(move_uploaded_file($_FILES["student_image"]["tmp_name"],$target_file)){
				
				$query="UPDATE students SET father_name= '$fname', student_name='$st_name',admission_no='$admission_no',grade_id='$grade_id',nic_no='$nic_no',date_of_birth='$dob',gender='$gender',telephone_no='$tel_no',address='$address',image_path='$target_file' WHERE st_id=$id ";
			
				$results = mysqli_query($connect,$query);
							
				if(!$results){
					echo mysqli_error($connect);
				} else{
					header("location:index.php");
				}
			}
			else {
				echo "Image upload failed!";
			}
		} else {
			echo "Only JPG, JPEG, PNG & GIF files are allowed.";
		}
	} 
	else{
	
		$query="UPDATE students SET father_name= '$fname', student_name='$st_name',admission_no='$admission_no',grade_id='$grade_id',nic_no='$nic_no',date_of_birth='$dob',gender='$gender',telephone_no='$tel_no',address='$address' WHERE st_id=$id ";
			
		$results = mysqli_query($connect,$query);
		
		if(!$results){
				echo mysqli_error($connect);
		} else{
			header("location:../index.php?section=student&page=index");
		}
		
	}	
			
?>     

