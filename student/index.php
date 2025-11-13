	<?php
	require_once ('config.php');
	
	//$query = "SELECT * FROM students";
	//$query = "SELECT s.*,g.grade_name FROM students AS s INNER JOIN grade AS g ON s.grade_id = g.gr_id";
	
	//$query = "SELECT students.*,grades.grade_name FROM students INNER JOIN grades ON students.grade_id = grades.gr_id";
	   // Soft Delete
	$query = "SELECT students.*, grades.grade_name 
	FROM students 
	INNER JOIN grades ON students.grade_id = grades.gr_id 
	WHERE students.deleted_at IS NULL";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	?>
		
	<h2>Students Details</h2>

	<div>
		<a href="index.php?section=student&page=create" class="add-btn">+ Add New Student</a>
	</div>
	
	<table border="1">
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
			<th colspan="4" style="text-align:center">Action</th>
			
		</tr>
		<?php 
		while ($row = mysqli_fetch_array($results)) { 
			if(empty($row["image_path"])){		
				$path= "student/uploads/default_img.jpg";
			} else{
				$path= $row["image_path"];
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
				<td><a href="delete.php?st_id=<?php echo $row['st_id'];?>" onclick="return confirm('Do you want to delete?')"> delete</a></td>
				<td><a href="index.php?section=student&page=edit&st_id=<?php echo $row['st_id'];?>"> edit </a></td>
				<td><a href="index.php?section=student&page=show&st_id=<?php echo $row['st_id'];?>"> show </a></td>
				<td><a href="index.php?section=student&page=add_subject&st_id=<?php echo $row['st_id'];?>"> Add Subject </a> </td>
			</tr>
		<?php } ?>
				
	</table>
