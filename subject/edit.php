<?php	
	$id= $_GET["sub_id"];
	
	require_once ('config.php');
		
	$query="SELECT * FROM subjects WHERE sub_id='$id' ";
		
	$results = mysqli_query($connect,$query);
				
	if(!$results){
		echo mysqli_error($connect);
	}
		
	$row = mysqli_fetch_array($results);
?>

  <h2>Edit Subject Details</h2>
  <form action="subject/update.php" method="POST">
    <table>
		<tr>
			<td>
				<input type="hidden" id="sub_id" name="sub_id" value="<?php echo $id ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<label for="subject_name">Subject name</label>
				<input type="text" id="subject_name" name="subject_name" value="<?php echo $row["subject_name"]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="subject_index">Subject Index</label>
				<input type="text" id="subject_index" name="subject_index" value="<?php echo $row["subject_index"]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="subject_order"> Subject Order</label><br>
				<input type="number" id="subject_order" step="any" name="subject_order" value="<?php echo $row["subject_order"]; ?>">
			</td>
      </tr>
	 <tr>
			<td>
				<label for="subject_color" >Subject Color </label><br>
				<input type="color" id="subject_color" name="subject_color" step="any" value="<?php echo $row["subject_color"]; ?>" required>
			</td>
	 </tr>
	 <tr>
			<td>
				<label for="subject_no" >Subject No </label><br>
				<input type="number" id="subject_no" name="subject_no" value="<?php echo $row["subject_no"]; ?>" required>
			</td>
	 </tr>
      <tr>
			<td class="submit-container">
			  <input type="submit" value="Update">
			</td>
      </tr>
    </table>
  </form>

