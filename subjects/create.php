<html>
<head>
  <title>Subjects Details</title>
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
  </style>
</head>
<body>
  <h2>Create Subject </h2>
  <form action="store.php" method="POST">
    <table>
		<tr>
			<td>
				<label for="subject_name">Subject name</label>
				<input type="text" id="subject_name" name="subject_name">
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
				<input type="color" id="subject_color" name="subject_color" step="any" required>
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
</body>
</html>
