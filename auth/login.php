<html>
<head>
    <title>Login Form</title>
	<style> 
		body {
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: sans-serif;
			line-height: 1.5;
			min-height: 100vh;
			background: #f3f3f3;
			flex-direction: column;
			margin: 0;
		}

		.main {
			background-color: #fff;
			border-radius: 15px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
			padding: 10px 20px;
			transition: transform 0.2s;
			width: 500px;
			text-align: center;
		}

		h1 {
			color: #0066cc;
		}

		label {
			display: block;
			width: 100%;
			margin-top: 10px;
			margin-bottom: 5px;
			text-align: left;
			color: #555;
			font-weight: bold;
		}

		input {
			display: block;
			width: 100%;
			margin-bottom: 15px;
			padding: 10px;
			box-sizing: border-box;
			border: 1px solid #ddd;
			border-radius: 5px;
		}

		button {
			padding: 15px;
			border-radius: 10px;
			margin-top: 15px;
			margin-bottom: 15px;
			border: none;
			color: white;
			cursor: pointer;
			background-color: #4CAF50;
			width: 100%;
			font-size: 16px;
		}

		
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 15px;
			border: none;
			border-radius: 10px;
			cursor: pointer;
			font-size: 16px;
			width: 100%;
		}

input[type="submit"]:hover {
	background-color: #45a049; /* darker green on hover */
}

	</style>
</head>

<body>
	<div class="main">
        <h1>School System Login</h1>

        <form action="islogin.php" method="post">
            <label for="user_name"> Username: </label>         
            <input type="text" id="user_name" name="user_name" placeholder="Enter your Username" required>
            <label for="password"> Password: </label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>
			
			<input type="submit" value="Login"> </input>
		
        </form>
    </div>
 
</body>

</html>