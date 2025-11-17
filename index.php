<html>
<head>
	<title> Home Page </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
		<?php 
			include('auth/auth_check.php');
		?>
		
		<table border="1" height="100%" width="100%">
        <tr class="header">
			<td colspan="2" width="100%" height="10%"><h2> School System</h2></td>
		</tr>
		<tr class="sidebar">
			<td width="10%" height="80%">
			    <ul>
                        <li><a href="index.php?section=student&page=index" >Students</a></li>
                        <li><a href="index.php?section=subject&page=index" >Subjects</a></li>
                        <li><a href="index.php?section=grade&page=index" > Grades</a></li>
						
						<li><a href="auth/logout.php"> Logout</a></li>
                </ul>
			</td>
			<td width="90%" height="80%">
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
			</td>
		</tr>
		<tr class="footer">
			<td colspan="2" width="100%" height="10%">Footer</td>
		</tr>
		</table>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>




