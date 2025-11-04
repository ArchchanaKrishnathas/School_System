<html>
<head>
	<title> Grade Details</title>
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
	</style>
</head>
<body>
	<?php
	require_once ('../config.php');
	
	$query = "SELECT * FROM grade";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	include('../auth/auth_check.php');

	?>
	
	<h2>Grade Details</h2>

	<div class="container">
		<a href="create.php" class="add-btn">+ Add Grade</a>
	</div>
	
	<table border="1">
		<tr>
			<th>Grade name</th>
			<th>Grade group</th>
			<th>Grade color</th>
			<th>Grade order</th>
			<th colspan="4" style="text-align:center">Action</th>
		</tr>
		<?php 
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[3]; ?></td>
				<td><?php echo $row[4]; ?></td>
				<td> <a href="delete.php?gr_id=<?php echo $row['gr_id'];?>" onclick="return confirm('Do you want to delete?')"> delete </a> </td>
				<td> <a href="edit.php?gr_id=<?php echo $row['gr_id'];?>"> edit </a> </td>
				<td> <a href="show.php?gr_id=<?php echo $row['gr_id'];?>"> show </a> </td>			
				<td> <a href="add_gr_subjects.php?gr_id=<?php echo $row['gr_id'];?>"> Add Subjects </a> </td>
			</tr>
		<?php } ?>
				
	</table>
</body>
</html>