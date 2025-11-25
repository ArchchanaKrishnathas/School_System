<style>
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

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
	
	<div class="container d-flex justify-content-center mt-5">
		<div class="card shadow mb-5 bg-body rounded" style="width: 32rem;">
			<div class="card-header">
				<h3 class="text-center"> Details of <?php echo $row["subject_name"]?>  </h3>
			</div>
			<div class="card-body">
				<table class="table table-striped table-hover text-center"> 
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
				
				<div>
					<a href="index.php?section=subject&page=index" class="btn btn-secondary"> <i class="bi bi-arrow-left-circle"></i> Back to Subjects List</a>
				</div>
				
