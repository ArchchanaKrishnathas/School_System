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
<style>
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

<div class="container d-flex justify-content-center mt-5">
	<div class="card shadow mb-5 bg-body rounded" style="width: 32rem;">
	<div class="card-header">
    	<h3 class="text-center">Edit Student's Details </h3>
	</div>
	<div class="card-body">
	<form action="student/update.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="st_id" name="st_id" value="<?php echo $id ?>" >
				<?php 

					if(empty($row["image_path"])){		
						$path= "student/uploads/default_img.jpg";
					} else{
						$path= "student/".$row["image_path"];
					}
				?>
				<div class="col-auto text-center mb-2">
					<img src="<?php echo $path; ?>" alt="profile pic" height="180px" width="180px" >
				</div>
				<div class="d-flex justify-content-around align-items-center mb-2">
					<div>
						<label for="student_image">Edit profile</label> 
						<input type="file" id="student_image" name="student_image" accept="Image/* "> 
					</div>
					<div>
						<a href="student/delete_profile.php?st_id=<?php echo $id; ?>" onclick="return confirm('Do you want to delete this profile?')" class="btn btn-danger">  delete profile</a> 
					</div>
				</div>
				<div class="col-auto">
					<label for="father_name" class="form-label">Father Name</label>
					<input type="text" id="father_name" name="father_name" value="<?php echo $row["father_name"]; ?>" class="form-control">
				</div>
				<div class="col-auto">
					<label for="student_name" class="form-label">Student Name</label>
					<input type="text" id="student_name" name="student_name" value="<?php echo $row["student_name"]; ?>" class="form-control">
				</div>
				<div class="col-auto">
					<label for="admission_no" class="form-label">Admission No</label><br>
					<input type="number" id="admission_no" name="admission_no" value="<?php echo $row["admission_no"]; ?>" class="form-control">
				</div>
				<div class="col-auto">
					<!-- <input type="hidden" id="grade_id" name="grade_id" value="<?php echo $row2["grade_id"]; ?>">   -->
					<label for="grade_id" class="form-label"> Grade </label>
					
					<select name="grade_id" id="grade_id" class="form-select">	 
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
				</div>
				<div class="col-auto">
					<label for="nic_no" class="form-label">NIC No</label><br>
					<input type="number" id="nic_no" name="nic_no" value="<?php echo $row["nic_no"]; ?>" class="form-control" required>
				</div>
				<div class="col-auto">
					<label for="date_of_birth" class="form-label" >Date of Birth</label><br>
					<input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row["date_of_birth"]; ?>" class="form-control" required>
				</div>
				<div class="col-auto">		
					<label for="gender" class="form-label">Gender</label> <br>
					<div class="form-check form-check-inline">
					<input type="radio" id="male" name="gender" value="male" <?php echo ($row['gender'] == 'male' ? 'checked' : '') ?> class="form-check-input">
					<label for="male" class="form-check-label">Male</label>
					</div>
					<div class="form-check form-check-inline">
					<input type="radio" id="female" name="gender" value="female" <?php echo ($row['gender'] == 'female' ? 'checked' : '') ?> class="form-check-input">
					<label for="female" class="form-check-label">Female</label>
					</div>
				</div>
				<div class="col-auto">
					<label for="telephone_no" class="form-label" >Telephone No</label><br>
					<input type="number" id="telephone_no" name="telephone_no" value="<?php echo $row["telephone_no"]; ?>" class="form-control" required>
				</div>
				<div class="col-auto">		
					<label for="address" class="form-label">Address</label><br>
					<textarea id="address" name="address" rows="4" cols="50" class="form-control"> <?php echo $row["address"]; ?>  
					</textarea>
				</div>	
		
				<div class="col-auto text-center mt-3">	
				<input type="submit" value="Update" class="btn btn-success px-4 py-1">
				</div>
	</form>

