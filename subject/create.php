 <style>
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

<div class="container d-flex justify-content-center mt-5">
	<div class="card shadow mb-5 bg-body rounded" style="width: 25rem;">
	<div class="card-header">
    	<h4 class="text-center">Create Subject  </h4>
	</div>
	<div class="card-body">
		<form action="subject/store.php" method="POST">
			<div class="col-auto">
				<label for="subject_name" class="form-label">Subject name</label>
				<input type="text" id="subject_name" name="subject_name" class="form-control">
			</div>
			<div class="col-auto">
				<label for="subject_index" class="form-label">Subject Index</label>
				<input type="text" id="subject_index" name="subject_index" class="form-control">
			</div>
			<div class="col-auto">
				<label for="subject_order" class="form-label"> Subject Order</label>
				<input type="number" id="subject_order" step="any" name="subject_order" class="form-control">
			</div>
			<div class="col-auto">
				<label for="subject_color" class="form-label" >Subject Color </label>
				<input type="color" id="subject_color" name="subject_color" required class="form-control">
			</div>
			<div class="col-auto">
				<label for="subject_no" class="form-label">Subject No </label>
				<input type="number" id="subject_no" name="subject_no" required class="form-control">
			</div>
			<div class="col-auto  text-center mt-3">
				<input type="submit" value="Submit" class="btn btn-success px-4 py-1">
			</div>
	</form>
	</div>
</div>

</div>



  
  


 


