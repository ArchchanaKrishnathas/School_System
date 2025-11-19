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

				<?php
		$query_sub="SELECT * FROM subject_grade where gr_id='$id' ";
	
		$result3 = mysqli_query($connect, $query_sub);
		
		if (!$result3) {
			echo mysqli_error($connect);
		}
		
		$sub_array = [];
		while ($row3 = mysqli_fetch_assoc($result3)) {
			$sub_array[] = $row3["sub_id"];  
		}
		//echo var_dump($sub_array);
	?>
	<br>
	

			<table class="table table-striped table-hover text-center">
			<tr class="bg-secondary text-white">
				<th colspan="2">Assigned Subjects</th>
			</tr>
				<?php 
				if(empty($sub_array)){   ?>
					<tr> <td colspan="2"> <i> No Subjects Selected </i> </td> </tr>
				<?php 
				} else{
		
					foreach($sub_array as $subject_id){
						
						$query= "SELECT * FROM subjects WHERE sub_id=$subject_id";
						
						$result4 = mysqli_query($connect, $query);
				
						if (!$result4) {
							echo mysqli_error($connect);
						}
						
						$row4 = mysqli_fetch_assoc($result4); ?>
				<tr>
				<td>	
					<?php echo $row4["subject_name"]; ?>
				</td> 
				<td>
					<a href="index.php?section=grade&page=delete_subject&gr_id=<?php echo $row['gr_id']; ?>&sub_id=<?php echo $row4['sub_id']; ?>" onclick="return confirm('Do you want to delete this subject?')" class="btn btn-danger p-1">  <i class="bi bi-trash"></i> </a>	
				</td>
			</tr>
				<?php
				} 
			}
				?> 
			</tr>
		</table>


		
		
			<?php
				//  subjects 
			$query2 = "SELECT sub_id, subject_name FROM subjects";
			$result2 = mysqli_query($connect, $query2);

			if (!$result2) {
				echo mysqli_error($connect);
			}

			$subjects = [];
			while ($row1 = mysqli_fetch_assoc($result2)) {
				$subjects[] = $row1;  // store all rows
			}

			
			$query_sub="SELECT * FROM subject_grade where gr_id='$id' ";
			
			$result3 = mysqli_query($connect, $query_sub);
				
			$selected_subjects = [];
			while ($row3 = mysqli_fetch_assoc($result3)) {
				$selected_subjects[] = $row3["sub_id"];  
			}
			?>
			
				<form action="grade/subject_grade_store.php" method="post"> 
					<input type="hidden" name="gr_id" value="<?php echo $id; ?>">
					<div class="row"> 
						<div class="col-6"><label for="subject" > <h5> Choose Subjects: </h5></label>  </div>
						<div class="col-6"> <?php foreach ($subjects as $subject): ?>
									<input class="form-check-input" type="checkbox" id="subjects" name="subjects[]" value="<?php echo $subject['sub_id']; ?>" <?php if(in_array($subject['sub_id'],$selected_subjects)){echo "checked";} ?>>
									<label  class="form-check-label"><?php echo $subject['subject_name']; ?></label><br>
							<?php endforeach; ?></div>
					</div>
					<div class="d-flex justify-content-between mx-3">
						<a href="index.php?section=grade&page=index" class="btn btn-secondary"> <i class="bi bi-arrow-left-circle"></i> Back to Grades List</a>
						<input type="submit" value="Save" class="btn btn-success" >
					</div>
				</form>
			
				

				
			</div>
		</div>
	</div>
		
	
	
	
	
	
	
	
	
	
	
	