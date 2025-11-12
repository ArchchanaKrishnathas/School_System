<?php	
	$id= $_GET["gr_id"];
	
	require_once ('config.php');
		
	$query="SELECT * FROM grades WHERE gr_id='$id' ";
		
	$results = mysqli_query($connect,$query);
				
	if(!$results){
		echo mysqli_error($connect);
	}
		
	$row = mysqli_fetch_array($results);


	?>

  <h2>Edit Grade Details</h2>
  <form action="grade/update.php" method="POST" >
    <table border="1" >
		<tr>
			<td colspan="2">
				<input type="hidden" id="gr_id" name="gr_id" value="<?php echo $id ?>" >
			</td>
		</tr>
		<tr>
			<td> <label for="grade_name">Grade name</label> 	</td>
			<td> <input type="text" id="grade_name" name="grade_name" value="<?php echo $row["grade_name"]; ?>"> </td>
		</tr>
		<tr>
			<td> <label for="grade_group">Grade group</label> </td>
			<td>	<input type="text" id="grade_group" name="grade_group" value="<?php echo $row["grade_group"]; ?>"> </td>
			</td>
		</tr>
		<tr>
			<td><label for="grade_color">Grade color</label><br> </td>
				<td><input type="color" id="grade_color" name="grade_color" value="<?php echo $row["grade_color"]; ?>"> </td>		
      </tr>
	  <tr>
			<td> <label for="grade_order">Grade order</label> </td>
			<td>	<input type="number" id="grade_order" name="grade_order" step="any" value="<?php echo $row["grade_order"]; ?>"> </td>	 
    </tr>
    <tr>
			<td colspan="2">
			  <input type="submit" value="Update">
			</td>
    </tr>
    </table>
  </form>

