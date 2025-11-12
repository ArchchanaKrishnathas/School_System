<html>
<head>
	<title> Student details </title>
	<style>
		body {
		  font-family: Arial, sans-serif;
		  background-color: #f2f2f2;
		  padding: 40px;
		}

		h2 {
		  color: #0066cc;
		  text-align: center;
		}

		table {
		  width: 50%;
		  margin: 0 auto;
		  border-collapse: collapse;
		  background-color: white;
		}

		th, td {
		  border: 1px solid #ccc;
		  padding: 8px;
		  text-align: left;
		}

		th {
		  background-color: #e6f0ff;
		}

		.back {
		  text-align: center;
		  margin-top: 15px;
		}
	
		a {
		  color: #0066cc;
		  text-decoration: none;
		}

		a:hover {
		  text-decoration: underline;
		}
		
		input[type="submit"] {
			background-color: #ADD8E6;
			cursor: pointer;
			border:none;
			border-radius:5px;
		}

		.back {
			text-align: center;
			margin-top: 15px;
			}
		
		.back-btn {
			display: inline-block;
			background-color: #ADD8E6;
			color: black;
			padding: 8px 16px;
			border-radius: 5px;
			text-decoration: none;
			font-weight: bold;
			border: none;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}

		.back-btn:hover {
			background-color: #87CEEB;
		}
	
		img{
			border-radius:50%;	
		}
	  </style>
</head>
</head>
<body>
	<?php

	$id= $_GET["st_id"];
	
	require_once ('../config.php');
	
	$query="SELECT * FROM students where st_id='$id' ";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	$row = mysqli_fetch_array($results);
	
	// grade
	$query2 = "SELECT gr_id, grade_name FROM grades";
		
	$result2 = mysqli_query($connect, $query2);
	
	
	?>
	
	<h2> <?php echo $row["student_name"]?> 's Details </h2>
	<table border="1">
		<tr>
			<?php 
				if(empty($row["image_path"])){		
					$path= "./uploads/default_img.jpg";
				} else{
					$path= $row["image_path"];
				}
			?>
			<td colspan="2" style="text-align: center"> <img src="<?php echo $path; ?>" alt="" height="200px" width="200px" > </td>
		</tr>
		<tr>
			<th>Father Name</th>
			<td> <?php echo $row["father_name"]; ?> </td>
		</tr>
		<tr>
			<th>Student Name</th>
			<td> <?php echo $row["student_name"]; ?></td>
		</tr>
		<tr>
			<th>Admission No </th>
			<td> <?php echo $row["admission_no"]; ?></td>
		</tr>
		<tr>
			<th>Grade </th>
			<!-- <td> <?php echo $row["grade_id"]; ?></td>  -->
			<td> <?php while ($row2 = mysqli_fetch_array($result2)) { 
						if($row2["gr_id"]==$row["grade_id"]){echo $row2["grade_name"];}
				}
				?>
			</td> 
			<!--  <td> <?php echo $row["grade_name"]; ?> </td>  -->
		</tr>
		<tr>
			<th>NIC No</th>
			<td> <?php echo $row["nic_no"]; ?></td>
		</tr>	
		<tr>
			<th>Date of Birth</th>
			<td> <?php echo $row["date_of_birth"]; ?></td>
		</tr>	
		<tr>
			<th>Gender</th>
			<td> <?php echo $row["gender"]; ?></td>
		</tr>	
		<tr>
			<th>Telephone No</th>
			<td> <?php echo $row["telephone_no"]; ?></td>
		</tr>	
		<tr>
			<th>Address</th>
			<td> <?php echo $row["address"]; ?></td>
		</tr>	
	</table>
	
	
	
	<?php
	
		$query_sub="SELECT * FROM student_subject where st_id='$id' ";
	
		$result3 = mysqli_query($connect, $query_sub);
		
		$sub_array = [];
		while ($row3 = mysqli_fetch_assoc($result3)) {
			$sub_array[] = $row3["sub_id"];
		
		}
		//echo var_dump($sub_array);    
	?>
	
	
	<br>
	
	<table border="1">
		<tr>
			<th colspan="2">Subjects</th>
		</tr>
		 
			<?php 
			if(empty($sub_array)){   ?>
				<tr> <td colspan="2"> <i> No Subjects Selected </i> </td> </tr>
			<?php 
			} else{
			foreach($sub_array as $subject_id){
				
				$query= "SELECT * FROM subjects WHERE sub_id=$subject_id";
				
				$result4 = mysqli_query($connect, $query);
				
				$row4 = mysqli_fetch_assoc($result4);
			 ?>
			<tr>
			<td>	
				<?php echo $row4["subject_name"]; ?>
			</td> 
			<td>
				<a href="delete_subject.php?st_id=<?php echo $row['st_id']; ?>&sub_id=<?php echo $row4['sub_id']; ?>" onclick="return confirm('Do you want to delete this subject?')">  Delete </a>	
			</td>

			</tr>
			<?php
			} }
			?> 
		</tr>
	</table>
	
	
	

	
	
	<?php
		//  subjects 
	$query_sub="SELECT * FROM student_subject where st_id='$id' ";
	
	$result3 = mysqli_query($connect, $query_sub);
		
	$selected_subjects = [];
	while ($row3 = mysqli_fetch_assoc($result3)) {
		$selected_subjects[] = $row3["sub_id"];  
	}
	?>
	<br>
	
	<form action="student_subject_store.php" method="post"> 
	<input type="hidden" name="st_id" value="<?php echo $id; ?>">
	<table border="1">
		<tr>
			<td><label for="subject">Subjects:</label></td>
			<td>
			<?php 
				//$query2 = "SELECT sub_id, subject_name FROM subjects";
				
				$gr_id= $row["grade_id"];
				$query2 = "SELECT sub_id FROM subject_grade where gr_id='$gr_id' ";
				$result2 = mysqli_query($connect, $query2);
				
				$subjects = [];
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$subjects[] = $row2["sub_id"];  
					
					$sub_id= $row2["sub_id"];
					$query3= "SELECT subject_name FROM subjects where sub_id='$sub_id' ";
					$result3 = mysqli_query($connect, $query3);
					
					$row3 = mysqli_fetch_assoc($result3);	
					$checked = in_array($sub_id,$selected_subjects)? "checked": "" ; 
					?>	
					<input type="checkbox" id="subjects" name="subjects[]" value="<?php echo $sub_id; ?>" <?php echo $checked; ?>>
					<label><?php echo $row3["subject_name"]; ?></label><br>
				<?php } ?>
			
			<?php /*foreach ($subjects as $subject): ?>
					<input type="checkbox" id="subjects" name="subjects[]" value="<?php echo $subject['sub_id']; ?>" <?php if(in_array($subject['sub_id'],$selected_subjects)){echo "checked";} ?>>
					<label><?php echo $subject['subject_name']; ?></label><br>
				<?php endforeach; */ ?>
					
			
			<!-- using while loop only -->
			 <!-- <?php while ($subject = mysqli_fetch_assoc($result2)) { ?>
					<input type="checkbox" id="subjects[]" name="subjects[]" value="<?php echo $subject['sub_id']; ?>">
					<label><?php echo $subject['subject_name']; ?></label><br>
			<?php } ?> -->
            </td>
		</tr>
		<tr> <td colspan="2" style="text-align: right;"> <input type="submit" value="Save" > </td></tr>
	</table>
	</form>

	<div class="back">
    	<a href="index.php" class="back-btn">← Back to Student List</a>
	</div>

</body>
</html>