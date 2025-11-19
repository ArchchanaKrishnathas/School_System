<style>
	body{
		background-color: #eeeff1ff;
	}
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

<?php	
	$id= $_GET["gr_id"];
	
	require_once ('config.php');
		
	$query="SELECT * FROM grades WHERE gr_id='$id' ";
		
	$results = mysqli_query($connect,$query);
				
	if(!$results){
		echo mysqli_error($connect);
	}
		
	$row = mysqli_fetch_array($results);


	?>


<div class="container d-flex justify-content-center mt-5">
	<div class="card shadow mb-5 bg-body rounded" style="width: 25rem;">
	<div class="card-header">
    	<h4 class="text-center">Edit Grade Details </h4>
	</div>
	<div class="card-body">
		<form action="grade/update.php" method="POST" >
			<div class="col-auto">
				<input type="hidden" id="gr_id" name="gr_id" value="<?php echo $id ?>" >
			</div>
			<div class="col-auto">
				<label for="grade_name" class="form-label">Grade name</label> 	
				<input type="text" id="grade_name" name="grade_name" value="<?php echo $row["grade_name"]; ?>" class="form-control">
			</div>
			<div class="col-auto">
				<label for="grade_group" class="form-label">Grade group</label>
			  	<input type="text" id="grade_group" name="grade_group" value="<?php echo $row["grade_group"]; ?>" class="form-control"> 
			</div>
			<div class="col-auto">
				<label for="grade_color" class="form-label">Grade color</label><br>  
				<input type="color" id="grade_color" name="grade_color" value="<?php echo $row["grade_color"]; ?>" class="form-control">  	
			</div>
			<div class="col-auto"></div>
				<label for="grade_order" class="form-label">Grade order</label>  
				<input type="number" id="grade_order" name="grade_order" step="any" value="<?php echo $row["grade_order"]; ?>" class="form-control">  
			</div>
			<div class="col-auto  text-center mb-3">
				<input type="submit" value="Update" class="btn btn-success px-4 py-1">
			</div>
		</form>
		</div>
	</div>

</div>



  


