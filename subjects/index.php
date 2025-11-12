<html>
<head>
	<title> Subject Details</title>
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
	
	$query = "SELECT * FROM subjects";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	include('../auth/auth_check.php');
	?>
	
	<h2>Subjects Details</h2>

	<div class="container">
		<a href="create.php" class="add-btn">+ Add Subject</a>
	</div>
	
	<table border="1">
		<tr>
			<th>Subject name</th>
			<th>Subject Index</th>
			<th>Subject Order</th>
			<th>Subject Color</th>
			<th>Subject No</th>
			<th colspan="3" style="text-align:center">Action</th>
		</tr>
		<?php 
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td><?php echo $row["subject_name"]; ?></td>
				<td><?php echo $row["subject_index"]; ?></td>
				<td><?php echo $row["subject_order"]; ?></td>
				<td> <input type="color" value="<?php echo $row["subject_color"]; ?>"></td>
				<td><?php echo $row["subject_no"]; ?></td>
				<td> <a href="delete.php?sub_id=<?php echo $row['sub_id'];?>" onclick="return confirm('Do you want to delete?')"> delete </a> </td>
				<td> <a href="edit.php?sub_id=<?php echo $row['sub_id'];?>"> edit </a> </td>
				<td> <a href="show.php?sub_id=<?php echo $row['sub_id'];?>"> show </a> </td>
			</tr>
		<?php } ?>
				
	</table>
</body>
</html>