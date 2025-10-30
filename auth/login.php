<html>
<head>
    <title>Login Form</title>
	<style> 
		
	</style>
</head>

<body>
		
        <h1>School System Login</h1>

        <form action="islogin.php" method="post">
            <label for="user_name"> Username: </label>         
            <input type="text" id="user_name" name="user_name" placeholder="Enter your Username" required>
			<br>
			<br>
            <label for="password"> Password: </label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>
			<br>
			<br>
            <input type="submit" value="Login"> </input>
        </form>
        
 
</body>

</html>