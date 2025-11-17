<?php	
	$id= $_POST["sub_id"];
	$sub_name=$_POST["subject_name"];
	$sub_index=$_POST["subject_index"];
	$sub_order=$_POST["subject_order"];
	$sub_color = $_POST['subject_color'];
	$sub_no = $_POST['subject_no'];
	
	require_once ('../config.php');

	$check_query= "SELECT subject_name,subject_index FROM subjects WHERE subject_name='$sub_name' OR subject_index='$sub_index' ";
	$check_result= mysqli_query($connect,$check_query);
	$rows_count=mysqli_num_rows($check_result);

		if($rows_count>0){  ?>
			<script>
				alert("Subject Already Exist!");
				history.back();
			</script>
		<?php
			$query="UPDATE subjects SET subject_name= '$sub_name', subject_index='$sub_index',subject_order='$sub_order',subject_color='$sub_color',subject_no='$sub_no' where sub_id=$id ";
				
			$results = mysqli_query($connect,$query);
						
				
			if(!$results){
				echo mysqli_error($connect);
			}else{
				header("location:../index.php?section=subject&page=index");
			}
			
		}	
		?>