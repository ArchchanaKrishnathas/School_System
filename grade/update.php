<?php	
	$id= $_POST["gr_id"];
	$gr_name=$_POST["grade_name"];
	$gr_group=$_POST["grade_group"];
	$gr_color=$_POST["grade_color"];
	$gr_order = $_POST['grade_order'];
	
	require_once ('../config.php');
		
	$check_query= "SELECT grade_name FROM grades WHERE grade_name='$gr_name' ";
	$check_result= mysqli_query($connect,$check_query);
	$rows_count=mysqli_num_rows($check_result);
		
	if($rows_count>0){  ?>
		<script>
			alert("Grade Already Exist!");
			history.back();
		</script>
		<?php
	} else {
		$query="UPDATE grades SET grade_name= '$gr_name', grade_group='$gr_group',grade_color='$gr_color',grade_order='$gr_order' where gr_id=$id ";
				
		$results = mysqli_query($connect,$query);
						
				
		if(!$results){
			echo mysqli_error($connect);
		}else{
			header("location:../index.php?section=grade&page=index");
		}
	}
	
	
?>