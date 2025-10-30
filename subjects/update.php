<?php	
	$id= $_POST["sub_id"];
	$sub_name=$_POST["subject_name"];
	$sub_index=$_POST["subject_index"];
	$sub_order=$_POST["subject_order"];
	$sub_color = $_POST['subject_color'];
	$sub_no = $_POST['subject_no'];
	
	require_once ('../config.php');
		
	$query="UPDATE subjects SET subject_name= '$sub_name', subject_index='$sub_index',subject_order='$sub_order',subject_color='$sub_color',subject_no='$sub_no' where sub_id=$id ";
		
	$results = mysqli_query($connect,$query);
				
		
	if(!$results){
		echo mysqli_error($connect);
	}else{
		echo "query Executed !!";
	}
	
	header("location:index.php");
?>