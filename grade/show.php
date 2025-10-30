<html>
<head>
	<title> Grade details </title>
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
	  </style>
</head>
</head>
<body>
	<?php

	$id= $_GET["gr_id"];
	
	require_once ('../config.php');
	
	$query="SELECT * FROM grade where gr_id='$id' ";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	$row = mysqli_fetch_array($results);
	?>
	
	<h2>  Details of <?php echo $row["grade_name"]?>  </h2>
	<table border="1">
		<tr>
			<th>Grade name</th>
			<td> <?php echo $row["grade_name"]; ?> </td>
		</tr>
		<tr>
			<th>Grade group</th>
			<td> <?php echo $row["grade_group"]; ?></td>
		</tr>
		<tr>
			<th>Grade color </th>
			<td> <?php echo $row["grade_color"]; ?></td>
		</tr>
		<tr>
			<th>Grade order</th>
			<td> <?php echo $row["grade_order"]; ?></td>
		</tr>		
	</table>
</body>
</html>