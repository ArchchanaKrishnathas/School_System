<html>
<head>
    <title>Login Form</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<style> 
		body{
			background-color: #b2e4e6ff;
		}
		.card{
			border-radius: 15px !important;
		}
		.card-header{
			/* background-color: #1f4e7a !important; */
			color: #1f4e7a;
			
		}

	</style>
</head>

<body>
	<div class="container m-5">
	<div class="container d-flex justify-content-center mt-5">
		<div class="card shadow mb-5 bg-body rounded" style="width: 25rem;">
		<div class="card-header">
			<h3 class="text-center">School System Login </h3>
		</div>
		<div class="card-body">
			<form action="islogin.php" method="post">
				<div class="col-auto">
					<label for="user_name" class="form-label"> Username: </label>         
					<input type="text" id="user_name" name="user_name" placeholder="Enter your Username" required class="form-control">
				</div>
				<div class="col-auto">
					<label for="password" class="form-label"> Password: </label>
					<input type="password" id="password" name="password" placeholder="Enter your Password" required  class="form-control">
				</div>
				<div class="col-auto  text-center mt-3">
					<input type="submit" value="Login" class="btn btn-success px-4 py-1">
				</div>
			</form>
			</div>
		</div>
</div>
</div>



  
  


</body>

</html>