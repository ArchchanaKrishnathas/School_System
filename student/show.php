<style>
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

	<?php

	$id= $_GET["st_id"];
	
	require_once ('config.php');

	$user_name=$_SESSION['user_name'];

	//$query="SELECT * FROM students where st_id='$id' ";
	$query = "SELECT students.*,grades.grade_name FROM students INNER JOIN grades ON students.grade_id = grades.gr_id WHERE st_id='$id' ";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	$row = mysqli_fetch_array($results);
	
	
	// grade
	$query2 = "SELECT gr_id, grade_name FROM grades";
		
	$result2 = mysqli_query($connect, $query2);
	
	if (!$result2) {
		echo mysqli_error($connect);
	}

	?>
	
	<div class="container d-flex justify-content-center mt-5">
		<div class="card shadow mb-5 bg-body rounded" style="width: 32rem;">
			<div class="card-header">
				<h3 class="text-center"> <?php echo $row["student_name"]?> 's Details  </h3>
			</div>
			<div class="card-body">
		<table class="table table-striped table-hover text-center">
			<tr>
				<?php 
					if(empty($row["image_path"])){		
						$path= "student/uploads/default_img.jpg";
					} else{
						$path= "student/".$row["image_path"];
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
				<!-- <td> <?php while ($row2 = mysqli_fetch_array($result2)) { 
							if($row2["gr_id"]==$row["grade_id"]){echo $row2["grade_name"];}
					}
					?>   OR -->
				</td> 
				<!-- Using Inner Join -->
				<td> <?php echo $row["grade_name"]; ?> </td>  
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
			<tr>
				<th>Subjects</th>
				<td>
				<?php 
					// Subjects from student_subject table
					$query_sub= "SELECT sub_id FROM student_subject WHERE st_id='$id' ";
					$result_sub= mysqli_query($connect, $query_sub);
					while($row_sub= mysqli_fetch_assoc($result_sub)){
						$sub_id=$row_sub["sub_id"];
						$query= "SELECT subject_name FROM subjects WHERE sub_id=$sub_id";
						$result1= mysqli_query($connect,$query);
						$row1= mysqli_fetch_assoc($result1);
				
						echo $row1["subject_name"]. "<br>"; 
				 } ?>
				</td>
			</tr>
			<tr>
				<th>created_at </th>
				<td> 
					<?php
						use Carbon\Carbon;
						$createdAt = $row["created_at"];
						echo Carbon::parse($createdAt)->setTimezone('Asia/Colombo')->diffForHumans();
					?>
				</td>
			</tr>
			<tr>
				<th>created_by</th>
				<td> <?php echo $user_name; ?></td>
			</tr>
			<tr>
				<th>updated_at</th>
				<td> <?php echo $row["updated_at"]; ?></td>
			</tr>
			<tr>
				<th>updated_by</th>
				<td> <?php echo $row["updated_by"]; ?></td>
			</tr>	
			<tr>
				<th>deleted_at</th>
				<td> <?php echo $row["deleted_at"]; ?></td>
			</tr>	
			<tr>
				<th>deleted_by</th>
				<td> <?php echo $row["deleted_by"]; ?></td>
			</tr>	
		</table>
		
		<div>
			<a href="index.php?section=student&page=index"  class="btn btn-secondary"> <i class="bi bi-arrow-left-circle"></i> Back to Student List</a>
		</div>
	</div>