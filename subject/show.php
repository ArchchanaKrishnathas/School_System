	<?php

	$id= $_GET["sub_id"];
	
	require_once ('config.php');
	
	$query="SELECT * FROM subjects where sub_id='$id' ";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	$row = mysqli_fetch_array($results);
	?>
	
	<h2>  Details of <?php echo $row["subject_name"]?>  </h2>
	<table border="1">
		<tr>
			<th>Subject name</th>
			<td> <?php echo $row["subject_name"]; ?> </td>
		</tr>
		<tr>
			<th>Subject Index</th>
			<td> <?php echo $row["subject_index"]; ?></td>
		</tr>
		<tr>
			<th>Subject Order </th>
			<td> <?php echo $row["subject_order"]; ?></td>
		</tr>
		<tr>
			<th>Subject Color</th>
			<td> <input type="color" value="<?php echo $row["subject_color"]; ?>"></td>
		</tr>
		<tr>
			<th>Subject No</th>
			<td> <?php echo $row["subject_no"]; ?></td>
		</tr>
	</table>
	
	<div class="back">
    	<a href="index.php?section=subject&page=index" class="back-btn">← Back to Subjects List</a>
	</div>
	
