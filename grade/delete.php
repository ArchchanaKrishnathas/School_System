<?php	
	$id= $_GET["gr_id"];
	
	require_once ('../config.php');

	$query= "UPDATE grades SET deleted_at= NOW() WHERE gr_id= '$id' ";	
		$results = mysqli_query($connect,$query);
						
		if(!$results){
			echo mysqli_error($connect);
		}else{
			header("location:../index.php?section=grade&page=index");
		}
	/* 	
	$check_query = "SELECT grade_id FROM students WHERE grade_id='$id'";
	$check_result=mysqli_query($connect,$check_query);
	$row= mysqli_num_rows($check_result);

	if($row > 0){
		echo "Can't Delete! Grade already in students record ";
	} else {
		//$query="DELETE FROM grades WHERE gr_id='$id' "; 
		$query= "UPDATE grades SET deleted_at= NOW() WHERE gr_id= '$id' ";	
		$results = mysqli_query($connect,$query);
						
		if(!$results){
			echo mysqli_error($connect);
		}else{
			header("location:../index.php?section=grade&page=index");
		}
	} */


	
?>