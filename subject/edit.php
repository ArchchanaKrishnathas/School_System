<?php	
	$id= $_GET["sub_id"];
	
	require_once ('config.php');
		
	$query="SELECT * FROM subjects WHERE sub_id='$id' ";
		
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
	<div class="card shadow mb-5 bg-body rounded" style="width: 25rem;">
	<div class="card-header">
    	<h4 class="text-center">Edit Subject Details  </h4>
	</div>
	<div class="card-body">
		<form action="subject/update.php" method="POST">
			<input type="hidden" id="sub_id" name="sub_id" value="<?php echo $id ?>" >
			
			<div class="mb-2">
				<label for="subject_name" class="form-label">Subject name</label>
				<input type="text" id="subject_name" name="subject_name" value="<?php echo $row["subject_name"]; ?>" class="form-control"> 
			</div>
			<div class="mb-2">
				<label for="subject_index" class="form-label">Subject Index</label>
				<input type="text" id="subject_index" name="subject_index" value="<?php echo $row["subject_index"]; ?>" class="form-control">
			</div>
			<div class="mb-2">
				<label for="subject_order" class="form-label"> Subject Order</label><br>
				<input type="number" id="subject_order" step="any" name="subject_order" value="<?php echo $row["subject_order"]; ?>" class="form-control">
			</div>
			<div class="mb-2">
				<label for="subject_color" class="form-label" >Subject Color </label><br>
				<input type="color" id="subject_color" name="subject_color" value="<?php echo $row["subject_color"]; ?>" class="form-control" required>
			</div>
			<div class="mb-2">
				<label for="subject_no" class="form-label">Subject No </label><br>
				<input type="number" id="subject_no" name="subject_no" value="<?php echo $row["subject_no"]; ?>" class="form-control" required>
			</div>
			<div class="mb-2  text-center mt-3">
				<input type="submit" value="Update" class="btn btn-success px-4 py-1">
			</div>
	</form>
	</div>
</div>

</div>

