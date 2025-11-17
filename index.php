<html>
<head>
	<title> Home Page </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<style>
		body{
			display: flex;
		}

		.sidebar{
			width: 250px;
			background-color:	#4d6d8b;
			position:relative;
		}

		.sidebar h3{
			color:	#27333fff;
		}
		.nav-link{
			color: #fff !important;
		}
		.header{
			background-color: #ecf3faff;
		}

		.logout-btn{
			position:absolute;
			bottom:10px;
			left:40px;
			margin:10px 20px;
			padding:0;
		}
	</style>
</head>
<body>
		<?php 
			include('auth/auth_check.php');
		?>
		
		<div class="sidebar">
			<h3 class="ml-4 my-3"> School System</h3>
			<ul class="nav flex-column">
				<li class="nav-item mx-auto"> <a href="index.php?section=student&page=index" class="nav-link">  Students</a></li>
				<li class="nav-item mx-auto"> <a href="index.php?section=subject&page=index" class="nav-link" > Subjects</a></li>
				<li class="nav-item mx-auto"> <a href="index.php?section=grade&page=index" class="nav-link"> Grades</a></li>
						
            </ul>
			<button class="logout-btn btn btn-warning"> <a href="auth/logout.php" class="nav-link"> <i class="bi bi-box-arrow-left"></i> Logout</a></button>
		</div>

		<div class="main-content w-100">
			<div class="header">
				<h2 class="mx-2">Dashboard</h2>
			</div>

			<?php 	
					if(isset($_GET['section'])){
						$section= $_GET['section'];
					} else {
						$section= "student";
					}
					
					if(isset($_GET['page'])){
						$page= $_GET['page'];
					}else{
						$page= "index";
					}
						
					$path= $section."/".$page.".php";
					if(file_exists($path)){
						include($path);
					} else {
						echo "<h1> 404 Page not found</h1>";
					}
						
				?>
		</div>
		


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>




