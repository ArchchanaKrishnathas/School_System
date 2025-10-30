<?php	
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
	
	require_once ('../config.php');
		
	$query="UPDATE students SET father_name= '$fname', student_name='$st_name',admission_no='$admission_no',nic_no='$nic_no',date_of_birth='$dob',gender='$gender',telephone_no='$tel_no',address='$address' where st_id=$id ";
		
	$results = mysqli_query($connect,$query);
				
		
	if(!$results){
		echo mysqli_error($connect);
	}else{
		echo "query Executed !!";
	}
	
	header("location:index.php");
?>