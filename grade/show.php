<style>
	.card-header{
		background-color: #1f4e7a !important;
		color: #fff;
	}
</style>

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
	
	<div class="container d-flex justify-content-center mt-5">
		<div class="card shadow mb-5 bg-body rounded" style="width: 32rem;">
			<div class="card-header">
				<h3 class="text-center">Details of <?php echo $row["grade_name"]?> </h3>
			</div>
			<div class="card-body">
				<table class="table table-striped table-hover text-center">
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
					<a href="index.php?section=grade&page=index" class="btn btn-secondary"> <i class="bi bi-arrow-left-circle"></i> Back to Grades List</a>
				</div>
			</div>
		</div>
	</div>
		

