	<?php 
		//session_start();   // Already session_start in auth_check . if started here. that will show error
	/*	if(isset($_SESSION['error'])){  ?>
		<div class="error">
			<?php echo $_SESSION['error']; ?>
		</div>
			<?php unset($_SESSION['error']); 
		} */ 
	?>
  <h2>Create Grade </h2>
  <form action="grade/store.php" method="POST">
    <table>
		<tr>
			<td>
				<label for="grade_name">Grade name</label>
				<input type="text" id="grade_name" name="grade_name">
			</td>
		</tr>
		<tr>
			<td>
				<label for="grade_group">Grade group</label>
				<input type="text" id="grade_group" name="grade_group">
			</td>
		</tr>
		<tr>
			<td>
				<label for="grade_color">Grade color</label><br>
				<input type="color" id="grade_color" name="grade_color" >
			</td>
      </tr>
	 <tr>
			<td>
				<label for="grade_order" >Grade order</label><br>
				<input type="number" id="grade_order" name="grade_order" step="any" required>
			</td>
	 </tr>
      <tr>
			<td>
			  <input type="submit" value="Submit">
			</td>
      </tr>
    </table>
  </form>

