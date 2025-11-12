<html>
<head>
  <title>Grade Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 40px;
    }

    h2 {
      color: #0066cc;
      text-align: center;
    }

    form {
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      width: 350px;
      margin: 0 auto;
    }

    table {
      width: 100%;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 6px;
      margin-top: 4px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-family: Arial, sans-serif;
    }

	input[type="color"] {
		  width: 30%;	
	}
	
    .submit-container {
      text-align: right;
    }

    input[type="submit"] {
      background-color: #0066cc;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #004c99;
    }
	
	.error{
		width: 40%;
		margin: 15px auto;
		padding: 10px 15px;
		font-family: Arial, sans-serif;
		font-size: 16px;
		text-align: center;
		background-color: #f8d7da;
		color: #721c24;
		border: 1px solid #f5c6cb;
		border-radius: 5px;
	}
	
  </style>
</head>
<body>
	<?php 
		session_start();
		if(isset($_SESSION['error'])){  ?>
		<div class="error">
			<?php echo $_SESSION['error']; ?>
		</div>
			<?php unset($_SESSION['error']); 
		}
	?>
  <h2>Create Grade </h2>
  <form action="store.php" method="POST">
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
			<td class="submit-container">
			  <input type="submit" value="Submit">
			</td>
      </tr>
    </table>
  </form>
</body>
</html>
