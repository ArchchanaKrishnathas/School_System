<style>
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

<div class="container d-flex justify-content-center mt-5">
	<div class="card shadow mb-5 bg-body rounded" style="width: 25rem;">
	<div class="card-header">
    	<h3 class="text-center">Create Grade </h3>
	</div>
	<div class="card-body">
		<form action="grade/store.php" method="POST">
			<div class="col-auto">
				<label for="grade_name" class="form-label">Grade name</label>
				<input type="text" id="grade_name" name="grade_name" class="form-control">
			</div>
			<div class="col-auto">
					<label for="grade_group" class="form-label">Grade group</label>
					<input type="text" id="grade_group" name="grade_group" class="form-control">
			</div>
			<div class="col-auto">
					<label for="grade_color" class="form-label">Grade color</label><br>
					<input type="color" id="grade_color" name="grade_color" class="form-control" >
			</div>
			<div class="col-auto">
					<label for="grade_order" class="form-label" >Grade order</label><br>
					<input type="number" id="grade_order" name="grade_order" step="any" required class="form-control">
			</div>
			<div class="col-auto  text-center mt-3">
				<input type="submit" value="Submit" class="btn btn-success px-4 py-1">
			</div>
		</form>
		</div>
	</div>

</div>



  
  

