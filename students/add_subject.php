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
	/*
	// subjects 
	$query1 = "SELECT sub_id, subject_name FROM subjects;
	$result2 = mysqli_query($connect, $query1);
	
	if (!$result2) {
		echo mysqli_error($connect);
	}
	
	$row2 = mysqli_fetch_array($result2);
	*/
	?>
	
	<h2> <?php echo $row["student_name"]?> 's Details </h2>
	<table border="1">
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
	
	<form action="student_subject_store.php" method="post"> 
	<table>
		<tr>
			<td><label for="subject">Subject:</label></td>
			<td><input type="checkbox" id="maths" name="subject[]" value="maths" <?php echo (
                    in_array('maths',$_POST['subject'])?'checked':'')?>>
                        <label for="maths">Maths</label>
                    <br>
            </td>
		</tr>
	</table>
	</form>
</body>
</html>