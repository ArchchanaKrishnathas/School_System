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
		
		input[type="submit"] {
			background-color: #ADD8E6;
			cursor: pointer;
			border:none;
			border-radius:5px;
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
			<td>  <input type="color" value="<?php echo $row["grade_color"]; ?>"></td>
		</tr>
		<tr>
			<th>Grade order</th>
			<td> <?php echo $row["grade_order"]; ?></td>
		</tr>		
	</table>
	
	
	
	<?php
		$query_sub="SELECT * FROM subject_grade where gr_id='$id' ";
	
		$result3 = mysqli_query($connect, $query_sub);
		
		if (!$result3) {
			echo mysqli_error($connect);
		}
		
		$sub_array = [];
		while ($row3 = mysqli_fetch_assoc($result3)) {
			$sub_array[] = $row3["sub_id"];  
		}
		//echo var_dump($sub_array);
	?>
	<br>
	
	<table border="1">
		<tr>
			<th>Subjects</th>
		</tr>
		 
			<?php 
			foreach($sub_array as $subject_id){
				
				$query= "SELECT * FROM subjects WHERE sub_id=$subject_id";
				
				$result4 = mysqli_query($connect, $query);
		
				if (!$result4) {
					echo mysqli_error($connect);
				}
				
				$row4 = mysqli_fetch_assoc($result4); ?>
			<tr>
			<td>	
				<?php echo $row4["subject_name"]; ?>
			</td> </tr>
			<?php
			} 
			?> 
		</tr>
	</table>
	
	
	
	
	
	
	
	
	
	<?php
		//  subjects 
	$query2 = "SELECT sub_id, subject_name FROM subjects";
	$result2 = mysqli_query($connect, $query2);

	if (!$result2) {
		echo mysqli_error($connect);
	}

	$subjects = [];
	while ($row1 = mysqli_fetch_assoc($result2)) {
		$subjects[] = $row1;  // store all rows
	}

	
	$query_sub="SELECT * FROM subject_grade where gr_id='$id' ";
	
	$result3 = mysqli_query($connect, $query_sub);
		
	$selected_subjects = [];
	while ($row3 = mysqli_fetch_assoc($result3)) {
		$selected_subjects[] = $row3["sub_id"];  
	}

	?>
	<br>
	<form action="subject_grade_store.php" method="post"> 
	<input type="hidden" name="gr_id" value="<?php echo $id; ?>">
	<table border="1">
		<tr>
			<td><label for="subject">Subjects:</label></td>
			<td>
			<?php foreach ($subjects as $subject): ?>
					<input type="checkbox" id="subjects" name="subjects[]" value="<?php echo $subject['sub_id']; ?>" <?php if(in_array($subject['sub_id'],$selected_subjects)){echo "checked";} ?>>
					<label><?php echo $subject['subject_name']; ?></label><br>
				<?php endforeach; ?>
					
			
			<!-- using while loop only -->
			 <!-- <?php while ($subject = mysqli_fetch_assoc($result2)) { ?>
					<input type="checkbox" id="subjects[]" name="subjects[]" value="<?php echo $subject['sub_id']; ?>">
					<label><?php echo $subject['subject_name']; ?></label><br>
			<?php } ?> -->
            </td>
		</tr>
		<tr> <td colspan="2" style="text-align: right;"> <input type="submit" value="Save" > </td></tr>
	</table>
	</form>

	<div class="back">
    	<a href="index.php" class="back-btn">← Back to Student List</a>
	</div>

</body>
</html>