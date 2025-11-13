  <h2>Create Subject </h2>
  <?php 
		/*if(isset($_GET['id'])){  ?>
		<div class="error">
			<span> <h5> Subject already exist! </h5> </span>
		</div>
		<?php
		} */
	?>


  <form action="subject/store.php" method="POST">
  
    <table>
		<tr>
			<td>
				<label for="subject_name">Subject name</label>
				<input type="text" id="subject_name" name="subject_name" >
			</td>
		</tr>
		<tr>
			<td>
				<label for="subject_index">Subject Index</label>
				<input type="text" id="subject_index" name="subject_index">
			</td>
		</tr>
		<tr>
			<td>
				<label for="subject_order"> Subject Order</label><br>
				<input type="number" id="subject_order" step="any" name="subject_order" >
			</td>
      </tr>
	 <tr>
			<td>
				<label for="subject_color" >Subject Color </label><br>
				<input type="color" id="subject_color" name="subject_color" required>
			</td>
	 </tr>
	 <tr>
			<td>
				<label for="subject_no" >Subject No </label><br>
				<input type="number" id="subject_no" name="subject_no" required>
			</td>
	 </tr>
      <tr>
			<td class="submit-container">
			  <input type="submit" value="Submit">
			</td>
      </tr>
    </table>
  </form>
