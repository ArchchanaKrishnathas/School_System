	<?php

	$id= $_GET["gr_id"];
	
	require_once ('config.php');
	
	$query="SELECT * FROM grades where gr_id='$id' ";
	
	$results = mysqli_query($connect, $query);
	
	if (!$results) {
		echo mysqli_error($connect);
	}
	
	$row = mysqli_fetch_array($results);
	?>
	
	<h2>  Details of <?php echo $row["grade_name"]?>  </h2>
	<table border="1">
		<tr>
			<th>Grade name</th>
			<td> <?php echo $row["grade_name"]; ?> </td>
		</tr>
		<tr>
			<th>Grade group</th>
			<td> <?php echo $row["grade_group"]; ?></td>
		</tr>
		<tr>
			<th>Grade color </th>
			<td> <input type="color" value="<?php echo $row["grade_color"]; ?>"> </td>
		</tr>
		<tr>
			<th>Grade order</th>
			<td> <?php echo $row["grade_order"]; ?></td>
		</tr>		
	</table>

	<div>
    	<a href="index.php?section=grade&page=index" >← Back to Grades List</a>
	</div>