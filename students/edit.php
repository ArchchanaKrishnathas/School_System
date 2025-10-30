<?php	
	$id= $_GET["st_id"];
	
	require_once ('../config.php');
		
	$query="SELECT * FROM students WHERE st_id='$id' ";
		
	$results = mysqli_query($connect,$query);
				
	if(!$results){
		echo mysqli_error($connect);
	}
		
	$row = mysqli_fetch_array($results);
	
?>

<html>
<head>
  <title>Edit Student detail </title>
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

    form {
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      width: 350px;
      margin: 0 auto;
    }

    table {
      width: 100%;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
	input[type="date"],
    textarea {
      width: 100%;
      padding: 6px;
      margin-top: 4px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-family: Arial, sans-serif;
    }

    textarea {
      resize: vertical;
      height: 60px;
    }

    .submit-container {
      text-align: right;
    }

    input[type="submit"] {
      background-color: #0066cc;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #004c99;
    }
  </style>
</head>
<body>
  <h2>Edit Student's Details</h2>
  <form action="update.php" method="POST">
    <table>
		<tr>
			<td>
				<input type="hidden" id="st_id" name="st_id" value="<?php echo $id ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label for="father_name">Father Name</label>
				<input type="text" id="father_name" name="father_name" value="<?php echo $row["father_name"]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="student_name">Student Name</label>
				<input type="text" id="student_name" name="student_name" value="<?php echo $row["student_name"]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="admission_no">Admission No</label><br>
				<input type="number" id="admission_no" name="admission_no" value="<?php echo $row["admission_no"]; ?>">
			</td>
      </tr>
	  <tr>
			<td>
				<!-- <input type="hidden" id="grade_id" name="grade_id" value="<?php echo $row["grade_id"]; ?>">   -->
				<label for="grade_id"> Grade </label>
				
				<select name="grade_id" id="grade_id">	 
					<?php 
						while ($row = mysqli_fetch_array($results)) { ?>   
						<option value=" <?php echo $row["gr_id"] ?>"> <?php echo $row["grade_name"] ?> </option>
						<?php }  ?>
				</select>
			</td>
      </tr>
	 <tr>
			<td>
				<label for="nic_no" >NIC No</label><br>
				<input type="number" id="nic_no" name="nic_no" value="<?php echo $row["nic_no"]; ?>" required>
			</td>
	 </tr>
	 <tr>
			<td>
				<label for="date_of_birth" >Date of Birth</label><br>
				<input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row["date_of_birth"]; ?>" required>
			</td>
	 </tr>
	 <tr>
            <td>
                 <label for="gender">Gender</label>
                 <input type="radio" id="male" name="gender" value="male" <?php echo ($row['gender'] == 'male' ? 'checked' : '') ?>>
                 <label for="male" style="display:inline;">Male</label>
                 <input type="radio" id="female" name="gender" value="female" <?php echo ($row['gender'] == 'female' ? 'checked' : '') ?>>
                 <label for="female" style="display:inline;">Female</label>
            </td>
     </tr>
	 <tr>
			<td>
				<label for="telephone_no" >Telephone No</label><br>
				<input type="number" id="telephone_no" name="telephone_no" value="<?php echo $row["telephone_no"]; ?>"  required>
			</td>
	 </tr>
	 <tr>
			<td>
				<label for="address" >Address</label><br>
				<textarea id="address" name="address" rows="4" cols="50" value="<?php echo $row["address"]; ?>">
				</textarea>
			</td>
	 </tr>
      <tr>
			<td class="submit-container">
			  <input type="submit" value="Update">
			</td>
      </tr>
    </table>
  </form>
</body>
</html>
