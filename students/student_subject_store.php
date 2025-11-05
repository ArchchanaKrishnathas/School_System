<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$st_id=$_POST["st_id"];
		$subjects=$_POST["subjects"];
		
		//echo var_dump($st_id);
		//echo var_dump($subjects);
	
		
		require_once('../config.php');
		
		//$query= "DELETE FROM student_subject WHERE st_id=$st_id";
		//$results = mysqli_query($connect,$query);
		
		//$query = "SELECT sub_id FROM subject_grade where gr_id='$gr_id' ";
		//$result = mysqli_query($connect, $query2);
		
		foreach ($subjects as $sub){
			//if(){
				
			//}
			$query="INSERT INTO student_subject(st_id,sub_id) VALUES('$st_id','$sub')";
			$results = mysqli_query($connect,$query);
			
		}
				

	}
	
	header("location:add_subject.php?st_id=$st_id"); 
?>