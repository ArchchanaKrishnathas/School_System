<html>
<head>
	<title> Subject details </title>
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
	  </style>
</head>
</head>
<body>
	<?php

	$id= $_GET["sub_id"];
	
	require_once ('../config.php');
	
	$query="SELECT * FROM subjects where sub_id='$id' ";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	$row = mysqli_fetch_array($results);
	?>
	
	<h2>  Details of <?php echo $row["subject_name"]?>  </h2>
	<table border="1">
		<tr>
			<th>Subject name</th>
			<td> <?php echo $row["subject_name"]; ?> </td>
		</tr>
		<tr>
			<th>Subject Index</th>
			<td> <?php echo $row["subject_index"]; ?></td>
		</tr>
		<tr>
			<th>Subject Order </th>
			<td> <?php echo $row["subject_order"]; ?></td>
		</tr>
		<tr>
			<th>Subject Color</th>
			<td> <input type="color" value="<?php echo $row["subject_color"]; ?>"></td>
		</tr>
		<tr>
			<th>Subject No</th>
			<td> <?php echo $row["subject_no"]; ?></td>
		</tr>
	</table>
	
	<div class="back">
    	<a href="index.php" class="back-btn">← Back to Subjects List</a>
	</div>
	
</body>
</html>