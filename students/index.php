<html>
<head>
	<title> Students Details</title>
		<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			padding: 40px;
		}
		
		h2 {
			text-align: center;
			color: #0066cc;
			margin-bottom: 20px;
		}

		.container {
				text-align: right;
				margin-bottom: 20px;
				margin-right: 140px;
		}

		.add-btn {
			display: inline-block;
			padding: 10px 20px;
			background-color: #0066cc;
			color: white;
			border-radius: 5px;
			text-decoration: none;
			font-weight: bold;
			transition: 0.3s;
		}

		table {
			width: 80%;
			margin: 0 auto;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
		}

		th, td {
			padding: 10px 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: 	#000068;
			color: white;
		}

		tr:hover {
			background-color: #f2f2f2;
		}

		a {
			text-decoration: none;
			color: #0066cc;
			font-weight: bold;
		}

		a:hover {
			color: #004080;
			text-decoration: underline;
		}
		
		img{
			border-radius:50%;
		}
	</style>
</head>
<body>
	<?php
	require_once ('../config.php');
	
	//$query = "SELECT * FROM students";
	//$query = "SELECT s.*,g.grade_name FROM students AS s INNER JOIN grade AS g ON s.grade_id = g.gr_id";
	
	$query = "SELECT students.*,grade.grade_name FROM students INNER JOIN grade ON students.grade_id = grade.gr_id";
	/*   // Soft Delete
	$query = "SELECT students.*, grade.grade_name 
	FROM students 
	INNER JOIN grade ON students.grade_id = grade.gr_id 
	WHERE students.deleted_at IS NULL";
	*/
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	require_once('../auth/auth_check.php');
	?>
		
	<h2>Students' Details</h2>

	<div class="container">
		<a href="create.php" class="add-btn">+ Add New Student</a>
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
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td><img src="<?php echo $row["image_path"]; ?>" alt="profile pic" height="60" width="60" ></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row["grade_name"]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><a href="delete.php?st_id=<?php echo $row['st_id'];?>" onclick="return confirm('Do you want to delete?')"> delete</a></td>
				<td><a href="edit.php?st_id=<?php echo $row['st_id'];?>"> edit </a></td>
				<td><a href="show.php?st_id=<?php echo $row['st_id'];?>"> show </a></td>
				<td><a href="add_subject.php?st_id=<?php echo $row['st_id'];?>"> Add Subject </a> </td>
			</tr>
		<?php } ?>
				
	</table>
</body>
</html>