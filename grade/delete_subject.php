<?php

	require_once ('config.php');

	$gr_id= $_GET["gr_id"];
	$sub_id = $_GET['sub_id'];

	$query = "DELETE FROM subject_grade WHERE gr_id='$gr_id' AND sub_id='$sub_id'";
	$results = mysqli_query($connect, $query);

	if(!$results){
		echo mysqli_error($connect);
	}

	header("location:index.php?section=grade&page=add_gr_subjects&gr_id=$gr_id");
?>