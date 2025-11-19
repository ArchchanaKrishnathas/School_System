<?php	
	$id= $_GET["st_id"];
	
	require_once ('config.php');
		
	$query="SELECT * FROM students WHERE st_id='$id' ";
	
	$results = mysqli_query($connect,$query);
				
	if(!$results){
		echo mysqli_error($connect);
	}
		
	$row = mysqli_fetch_array($results);
	
?>

  <h2>Edit Student's Details</h2>
  <form action="student/update.php" method="POST" enctype="multipart/form-data">
    <table>
		<tr>
			<td>
				<input type="hidden" id="st_id" name="st_id" value="<?php echo $id ?>" >
			</td>
		</tr>
		<tr>
			<?php 

				if(empty($row["image_path"])){		
					$path= "student/uploads/default_img.jpg";
				} else{
					$path= "student/".$row["image_path"];
				}
			?>
			<td colspan="2" style="text-align: center"><img src="<?php echo $path; ?>" alt="profile pic" height="180px" width="180px" ></td>
		<tr>
		 <tr>
			<td>
				 <label for="student_image">Edit profile</label> 
				 <input type="file" id="student_image" name="student_image" accept="Image/* "> 
			
		
				 <a href="student/delete_profile.php?st_id=<?php echo $id; ?>" onclick="return confirm('Do you want to delete this profile?')" style="color:red">  delete profile</a>    <br>
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
				<!-- <input type="hidden" id="grade_id" name="grade_id" value="<?php echo $row2["grade_id"]; ?>">   -->
				<label for="grade_id"> Grade </label>
				
				<select name="grade_id" id="grade_id">	 
					<?php 		
						$query2 = "SELECT gr_id, grade_name FROM grades";
							
						$result2 = mysqli_query($connect, $query2);
						
						if (!$result2) {
							echo mysqli_error($connect);
						}
						
						while ($row2 = mysqli_fetch_assoc($result2)) { ?>  
						<option value="<?php echo $row2["gr_id"] ?>" <?php if($row["grade_id"]==$row2["gr_id"]){echo "selected";} ?> > <?php echo $row2["grade_name"] ?> </option>
					<?php }   ?>
			
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
				<textarea id="address" name="address" rows="4" cols="50"> <?php echo $row["address"]; ?>
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

