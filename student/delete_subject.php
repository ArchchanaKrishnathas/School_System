<?php
	// Subject Delete Query

	require_once ('../config.php');

	$st_id= $_GET["st_id"];
	$sub_id = $_GET['sub_id'];

	$query = "DELETE FROM student_subject WHERE st_id='$st_id' AND sub_id='$sub_id'";
	$results = mysqli_query($connect, $query);

	if(!$results){
		echo mysqli_error($connect);
	}

	header("location:../index.php?section=student&page=add_subject&st_id=$st_id");
?>