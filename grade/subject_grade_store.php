<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$gr_id=$_POST["gr_id"];
		$subjects=$_POST["subjects"];
		
		//echo var_dump($st_id);
		//echo var_dump($subjects);
	
		
		require_once('../config.php');
		
		$query= "DELETE FROM subject_grade WHERE gr_id=$gr_id";
		$results = mysqli_query($connect,$query);
		
		foreach ($subjects as $sub){
			$query="INSERT INTO subject_grade(gr_id,sub_id) VALUES('$gr_id','$sub')";
			$results = mysqli_query($connect,$query);
		}
				
	}
	
	header("location:../index.php?section=grade&page=add_gr_subjects&gr_id=$gr_id"); 
?>