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
	</table>
	
	<div class="back">
    	<a href="index.php" class="back-btn">← Back to Student List</a>
	</div>
</body>
</html>