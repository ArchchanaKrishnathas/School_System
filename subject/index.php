	<style>
		.subject-row{
			background-color: #1f4e7a;
			color: #fff;
		}

	</style>

	<?php
	require_once ('config.php');
	
	$query = "SELECT * FROM subjects";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	?>
	
	
	<table class="table table-striped table-hover">
		<thead>
			<tr class="subject-row">
				<th colspan="8" class="text-center fs-4">
					Subject Details
					<a href="index.php?section=subject&page=create" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Add Subject</a>
				</th>
			</tr>
			<tr>
				<th class="px-4">Subject name</th>
				<th>Subject Index</th>
				<th>Subject Order</th>
				<th>Subject Color</th>
				<th>Subject No</th>
				<th class="px-5">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			while ($row = mysqli_fetch_array($results)) { ?>   
				<tr>
					<td class="px-4"><?php echo $row["subject_name"]; ?></td>
					<td><?php echo $row["subject_index"]; ?></td>
					<td><?php echo $row["subject_order"]; ?></td>
					<td> <input type="color" value="<?php echo $row["subject_color"]; ?>"></td>
					<td><?php echo $row["subject_no"]; ?></td>
					<td> <a href="index.php?section=subject&page=edit&sub_id=<?php echo $row['sub_id'];?>" class="btn btn-warning me-2"> edit </a>
					<a href="subject/delete.php?sub_id=<?php echo $row['sub_id'];?>" onclick="return confirm('Do you want to delete?')" class="btn btn-danger me-2"> delete </a> 
					<a href="index.php?section=subject&page=show&sub_id=<?php echo $row['sub_id'];?>" class="btn btn-info me-2"> show </a> </td>
				</tr>
			<?php } ?>
		</tbody>		
	</table>
