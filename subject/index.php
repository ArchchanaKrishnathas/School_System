	<?php
	require_once ('config.php');
	
	$query = "SELECT * FROM subjects";
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	?>
	
	<h2>Subjects Details</h2>

	<div class="container">
		<a href="index.php?section=subject&page=create" class="add-btn">+ Add Subject</a>
	</div>
	
	<table border="1">
		<tr>
			<th>Subject name</th>
			<th>Subject Index</th>
			<th>Subject Order</th>
			<th>Subject Color</th>
			<th>Subject No</th>
			<th colspan="3" style="text-align:center">Action</th>
		</tr>
		<?php 
		while ($row = mysqli_fetch_array($results)) { ?>   
			<tr>
				<td><?php echo $row["subject_name"]; ?></td>
				<td><?php echo $row["subject_index"]; ?></td>
				<td><?php echo $row["subject_order"]; ?></td>
				<td> <input type="color" value="<?php echo $row["subject_color"]; ?>"></td>
				<td><?php echo $row["subject_no"]; ?></td>
				<td> <a href="delete.php?sub_id=<?php echo $row['sub_id'];?>" onclick="return confirm('Do you want to delete?')"> delete </a> </td>
				<td> <a href="index.php?section=subject&page=edit&sub_id=<?php echo $row['sub_id'];?>"> edit </a> </td>
				<td> <a href="index.php?section=subject&page=show&sub_id=<?php echo $row['sub_id'];?>"> show </a> </td>
			</tr>
		<?php } ?>
				
	</table>
