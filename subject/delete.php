<?php	
	$id= $_GET["sub_id"];
	
	require_once ('../config.php');
		
	$query="DELETE FROM subjects WHERE sub_id='$id' ";
		
	$results = mysqli_query($connect,$query);
					
	if(!$results){
		echo mysqli_error($connect);
	}else{
		header("location:../index.php?section=subject&page=index");
	}
	
?>