<?php	
	$id= $_GET["st_id"];
	
	require_once ('../config.php');
		
	//$query="DELETE FROM students WHERE st_id='$id' ";
	
	 // Soft Delete
	$query="UPDATE students SET deleted_at = NOW() WHERE st_id = $id ";

	
	$results = mysqli_query($connect,$query);
					
	if(!$results){
		echo mysqli_error($connect);
	}else{
		header("location:../index.php?section=student&page=index");
	}
	

?>




