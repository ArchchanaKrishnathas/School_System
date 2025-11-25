	<?php
	
		require_once ('config.php');

		$query = "SELECT gr_id, grade_name FROM grades ORDER BY grade_order";
		
		$results = mysqli_query($connect, $query);
	
		if (!$results) {
			echo mysqli_error($connect);
		}		
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
    	<h3 class="text-center">Student Registration </h3>
	</div>
	<div class="card-body">
		<form action="student/store.php" method="POST" enctype="multipart/form-data">
			<div class="col-auto">
				<label for="father_name"  class="form-label">Father Name</label>
				<input type="text" id="father_name" name="father_name" class="form-control">
			</div>
			<div class="col-auto">
				<label for="student_name" class="form-label">Student Name</label>
				<input type="text" id="student_name" name="student_name" class="form-control">
			</div>
			<div class="col-auto">
				<label for="admission_no" class="form-label">Admission No</label><br>
				<input type="number" id="admission_no" name="admission_no" class="form-control">
			</div>
			<div class="col-auto">
				<!-- <input type="hidden" id="grade_id" name="grade_id" >     -->
				
				<label for="grade_id" class="form-label"> Grade </label>
				
				<select name="grade_id" id="grade_id" class="form-select">	 
					<?php 
						while ($row = mysqli_fetch_array($results)) { ?>   
						<option value=" <?php echo $row["gr_id"] ?>"> <?php echo $row["grade_name"] ?> </option>
						<?php }  ?>
				</select>
			</div>
			<div class="col-auto">
				<label for="nic_no" class="form-label">NIC No</label><br>
				<input type="number" id="nic_no" name="nic_no" required class="form-control">
			</div>
			<div class="col-auto">
				<label for="date_of_birth" class="form-label" >Date of Birth</label>
				<input type="date" id="date_of_birth" name="date_of_birth" required class="form-control">
			</div>
			<div class="col-auto">
				<label for="gender" class="form-label">Gender</label> <br>
				<div class="form-check form-check-inline">
					<input type="radio" id="male" name="gender" value="male" class="form-check-input">
					<label for="male" class="form-check-label">Male</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" id="female" name="gender" value="female" class="form-check-input">               
                <label for="female" class="form-check-label">Female</label>
				</div> 		
			</div>
			<div class="col-auto">
				<label for="telephone_no" class="form-label">Telephone No</label><br>
				<input type="number" id="telephone_no" name="telephone_no" required class="form-control">
			</div>
			<div class="col-auto">
				<label for="address" class="form-label">Address</label><br>
				<textarea id="address" name="address" rows="4" cols="50" class="form-control">
				</textarea>
			</div>
			<div class="col-auto">
				 <label for="student_image" class="form-label">Upload Image</label> 
          		<input type="file" id="student_image" name="student_image" accept="Image/* " class="form-control">
			</div>
			<div class="col-auto  text-center mt-3">
				<input type="submit"  value="Register" class="btn btn-success px-4 py-1">
			</div>
		</form>
		</div>
	</div>

</div>



  
  



  