	<?php
	require_once ('config.php');
	
	$query = "SELECT * FROM grades";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}

	?>
	
	<h2>Grades Details</h2>

	<div class="container">
		<a href="index.php?section=grade&page=create" class="add-btn">+ Add Grade</a>
	</div>
	
	<table border="1">
		<tr>
			<th>Grade name</th>
			<th>Grade group</th>
			<th>Grade color</th>
			<th>Grade order</th>
			<th colspan="4" style="text-align:center">Action</th>
		</tr>
		<?php 
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td><?php echo $row["grade_name"]; ?></td>
				<td><?php echo $row["grade_group"]; ?></td>
				<td> <input type="color" value="<?php echo $row["grade_color"]; ?>"></td>
				<td><?php echo $row["grade_order"]; ?></td>
				<td> <a href="grade/delete.php?gr_id=<?php echo $row['gr_id'];?>" onclick="return confirm('Do you want to delete?')"> delete </a> </td>
				<td> <a href="index.php?section=grade&page=edit&gr_id=<?php echo $row['gr_id'];?>"> edit </a> </td>
				<td> <a href="index.php?section=grade&page=show&gr_id=<?php echo $row['gr_id'];?>"> show </a> </td>			
				<td> <a href="index.php?section=grade&page=add_gr_subjects&gr_id=<?php echo $row['gr_id'];?>"> Add Subjects </a> </td>
			</tr>
		<?php } ?>
				
	</table>
