<?php
	// Profile Delete Query

	require_once ('../config.php');

	$st_id= $_GET["st_id"];

	//$target_dir="uploads/";
	//$target_file=$target_dir.basename($_FILES["student_image"]["name"]);
	
	//print_r($profile);
	//$query = "DELETE image_path FROM students WHERE st_id='$st_id'  ";
	
	$check_img= "SELECT image_path 	FROM students WHERE st_id = $st_id";
	$check_result= mysqli_query($connect, $check_img);
	$row= mysqli_fetch_assoc($check_result);

	$path= "../student/".$row['image_path'];
	
	if(file_exists($path)){
		unlink($path);

		$query ="UPDATE students SET image_path = NULL WHERE st_id = $st_id";
		$results = mysqli_query($connect, $query);

		header("location:../index.php?section=student&page=edit&st_id=$st_id");
	} else{
		echo "Image not found!";
	}
	
?>