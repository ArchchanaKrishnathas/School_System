	<style>
		.student-row{
			background-color: #1f4e7a;
			color: #fff;
		}

	</style>

	<?php
	require_once ('config.php');
	
	$query = "SELECT * FROM grades";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}

	?>

	<table class="table table-striped table-hover">
	<thead>
		<tr class="student-row">
			<th colspan="8" class="text-center">
				Grades Details
				<a href="index.php?section=grade&page=create"  class="btn btn-primary float-end">+ Add Grade</a>
			</th>
		</tr>
		<tr>
			<th>Grade name</th>
			<th>Grade group</th>
			<th>Grade color</th>
			<th>Grade order</th>
			<th colspan="4" style="text-align:center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td><?php echo $row["grade_name"]; ?></td>
				<td><?php echo $row["grade_group"]; ?></td>
				<td> <input type="color" value="<?php echo $row["grade_color"]; ?>"></td>
				<td><?php echo $row["grade_order"]; ?></td>
															<!-- query string -->
				<td> <a href="grade/delete.php?gr_id=<?php echo $row['gr_id'];?>" onclick="return confirm('Do you want to delete?')"  class="btn btn-danger"> delete </a> </td>
				<td> <a href="index.php?section=grade&page=edit&gr_id=<?php echo $row['gr_id'];?>"  class="btn btn-warning"> edit </a> </td>
				<td> <a href="index.php?section=grade&page=show&gr_id=<?php echo $row['gr_id'];?>"  class="btn btn-info"> show </a> </td>			
				<td> <a href="index.php?section=grade&page=add_gr_subjects&gr_id=<?php echo $row['gr_id'];?>"  class="btn btn-success"> +Subjects </a> </td>
			</tr>
		<?php } ?>
	</tbody>		
	</table>
