<?php	
	$id= $_GET["gr_id"];
	
	require_once ('../config.php');
		
	$query="DELETE FROM grades WHERE gr_id='$id' ";
		
	$results = mysqli_query($connect,$query);
					
	if(!$results){
		echo mysqli_error($connect);
	}else{
		echo "query Executed !!";
	}
	
	header("location:index.php");
?>