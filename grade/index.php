	<style>
		.grade-row{
			background-color: #1f4e7a;
			color: #fff;
		}

	</style>

	<link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.css" />
	
	

	<?php
	require_once ('config.php');
	
	//$query = "SELECT * FROM grades";
	$query = "SELECT * FROM grades WHERE deleted_at IS NULL ORDER BY grade_order";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}

	?>
	<div class="container" >
	<table class="table table-striped table-hover text-center" id="gradetable">
	<thead>
		<tr class="grade-row">
			<th colspan="5" class="fs-4">
				Grades Details
				<a href="index.php?section=grade&page=create"  class="btn btn-primary float-end">  <i class="bi bi-plus-circle me-1"></i> Add Grade</a>
			</th>
		</tr>
		<tr>
			<th>Grade name</th>
			<th>Grade group</th>
			<th>Grade color</th>
			<th>Grade order</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	
</thead>
	<tbody>
		<?php 
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td class="px-5"><?php echo $row["grade_name"]; ?></td>
				<td><?php echo $row["grade_group"]; ?></td>
				<td> <input type="color" value="<?php echo $row["grade_color"]; ?>"></td>
				<td><?php echo $row["grade_order"]; ?></td>
															<!-- query string -->
											 
				<td> <a href="grade/delete.php?gr_id=<?php echo $row['gr_id'];?>" onclick="return confirm('Do you want to delete?')"  class="btn btn-danger"> delete </a> 
				 <a href="index.php?section=grade&page=edit&gr_id=<?php echo $row['gr_id'];?>"  class="btn btn-warning"> edit </a> 
				 <a href="index.php?section=grade&page=show&gr_id=<?php echo $row['gr_id'];?>"  class="btn btn-info "> show </a> 			
				 <a href="index.php?section=grade&page=add_gr_subjects&gr_id=<?php echo $row['gr_id'];?>"  class="btn btn-success"> +Subjects </a> </td>
				
			</tr>
		<?php } ?>
	</tbody>		
	</table>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>

	<script>
		
        $(document).ready( function () {
			$('#gradetable').DataTable();
		} );

	</script>