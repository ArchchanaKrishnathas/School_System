	<style>
		.student-row{
			background-color: #1f4e7a;
			color: #fff;
		}

	</style>
	<?php
	require_once ('config.php');
	
	//$query = "SELECT * FROM students";
	//$query = "SELECT s.*,g.grade_name FROM students AS s INNER JOIN grade AS g ON s.grade_id = g.gr_id";
	
	//$query = "SELECT students.*,grades.grade_name FROM students INNER JOIN grades ON students.grade_id = grades.gr_id";
	   // Soft Delete
	$query = "SELECT students.*, grades.grade_name FROM students INNER JOIN grades ON students.grade_id = grades.gr_id WHERE students.deleted_at IS NULL";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) { 
		echo mysqli_error($connect);
	}
	
	?>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr class="student-row">
				<th colspan="16" class="text-center fs-4">
					Students Details
					<a href="index.php?section=student&page=create" class="btn btn-primary float-end"> <i class="bi bi-person-plus"></i> Add New Student</a>
				</th>
				
			</tr>
			<tr>
				<th>Student Profile</th>
				<th>Father Name</th>
				<th>Student Name</th>
				<th>Admission No</th>
				<th>Grade</th>
				<th>NIC No</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th>Telephone No</th>
				<th>Address</th>
				<th colspan="4" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			while ($row = mysqli_fetch_array($results)) { 
				if(empty($row["image_path"])){		
					$path= "student/uploads/default_img.jpg";
				} else{
					$path= "student/".$row["image_path"];
				}
			?>   
				<tr>
					<td><img src="<?php echo $path; ?>" alt="profile pic" height="60" width="60" ></td>
					<td><?php echo $row["father_name"]; ?></td>
					<td><?php echo $row["student_name"]; ?></td>
					<td><?php echo $row["admission_no"]; ?></td>
					<td><?php echo $row["grade_name"]; ?></td>
					<td><?php echo $row["nic_no"]; ?></td>
					<td><?php echo $row["date_of_birth"]; ?></td>
					<td><?php echo $row["gender"]; ?></td>
					<td><?php echo $row["telephone_no"]; ?></td>
					<td><?php echo $row["address"]; ?></td>
					<td><a href="index.php?section=student&page=edit&st_id=<?php echo $row['st_id'];?> " class="btn btn-warning"> Edit </a></td>
					<td><a href="student/delete.php?st_id=<?php echo $row['st_id'];?>" onclick="return confirm('Do you want to delete?')" class="btn btn-danger"> Delete</a></td>
					<td><a href="index.php?section=student&page=show&st_id=<?php echo $row['st_id'];?>" class="btn btn-info"> Show </a></td>
					<td><a href="index.php?section=student&page=add_subject&st_id=<?php echo $row['st_id'];?>" class="btn btn-success"> +Subject </a> </td>
				</tr>
			<?php } ?>
		</tbody>	
	</table>
