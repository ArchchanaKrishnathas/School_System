<?php	
	$id= $_POST["gr_id"];
	$gr_name=$_POST["grade_name"];
	$gr_group=$_POST["grade_group"];
	$gr_color=$_POST["grade_color"];
	$gr_order = $_POST['grade_order'];
	
	require_once ('../config.php');
		
	$query="UPDATE grades SET grade_name= '$gr_name', grade_group='$gr_group',grade_color='$gr_color',grade_order='$gr_order' where gr_id=$id ";
		
	$results = mysqli_query($connect,$query);
				
		
	if(!$results){
		echo mysqli_error($connect);
	}else{
		echo "query Executed !!";
	}
	
	header("location:index.php");
?>