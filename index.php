<html>
<head>
	<title> Home Page </title>
	<style>
	* {
	  box-sizing: border-box;
	}

	body {
	  font-family: Arial, Helvetica, sans-serif;
	}

	.header {
	  background-color: #33887b;
	  padding: 10px;
	  text-align: center;
	  font-size: 20px;
	  color: white;
	  vertical-align: middle;
	}

	 .sidebar {
            background-color: #F0F8FF;
            border-right: 2px solid #D0D7DE;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar li {
            border: 2;
            margin: 10px 0;
        }
        .sidebar a {
            border: 2;
            color: #1E293B;
            font-size: 1.1em;
            display: block;
            padding: 12px 18px;
            border-radius: 6px;
        }
        .sidebar a:hover {
            background-color: #555;
            color: #FFFFFF;
        }
		.footer {
		  background-color: #33887b;
		  padding: 10px;
		  text-align: center;
		  color: white;
		  margin-bottom: 10px;
		}
	</style>
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
                        <li><a href="index.php?section=students&page=index" >Students</a></li>
                        <li><a href="index.php?section=subjects&page=index" >Subjects</a></li>
                        <li><a href="index.php?section=grade&page=index" > Grades</a></li>
						
						<li><a href="auth/logout.php"> Logout</a></li>
                </ul>
			</td>
			<td width="90%" height="80%">
				<?php 	
					if(isset($_GET['section'])){
						$section= $_GET['section'];
					} else {
						$section= "pages";
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
</body>
</html>




