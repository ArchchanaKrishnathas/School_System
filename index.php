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
			<td width="15%" height="80%">
			    <ul>
                        <li><a href="students" target="iframe_a">Students</a></li>
                        <li><a href="subjects" target="iframe_a">Subjects</a></li>
                        <li><a href="grade" target="iframe_a"> Grades</a></li>
						
						<li><a href="auth/logout.php"> Logout</a></li>
                </ul>
			</td>
			<td width="85%" height="80%">
				<iframe name="iframe_a" width="100%" height="100%"  title="school system iframe" style="border:none;"></iframe>
			</td>
		</tr>
		<tr class="footer">
			<td colspan="2" width="100%" height="10%">Footer</td>
		</tr>
		</table>
</body>
</html>





<!--
<html>
<head>
	<title>Home page</title>
	<style>
	* {
	  box-sizing: border-box;
	}

	body {
	  font-family: Arial, Helvetica, sans-serif;
	}

	/* Style the header */
	header {
	  background-color: #666;
	  padding: 8px;
	  text-align: center;
	  font-size: 25px;
	  color: white;
	}

	/* Create two columns/boxes that floats next to each other */
	nav {
	  float: left;
	  width: 30%;
	  height: 300px; /* only for demonstration, should be removed */
	  background: #ccc;
	  padding: 20px;
	}

	/* Style the list inside the menu */
	nav ul {
	  list-style-type: none;
	  padding: 0;
	}

	.main {
	  float: left;
	  padding: 20px;
	  width: 70%;
	  background-color: #f1f1f1;
	  height: 300px; /* only for demonstration, should be removed */
	}

	/* Clear floats after the columns */
	section::after {
	  content: "";
	  display: table;
	  clear: both;
	}

	/* Style the footer */
	footer {
	  background-color: #777;
	  padding: 10px;
	  text-align: center;
	  color: white;
	  margin-bottom: 10px;
	}
	</style>
	</head>
	<body>

	<header>
	  <h2>YarlIt</h2>
	</header>

	<section>
	  <nav>
		<ul>
		  <li><a href="students">Students</a></li>
		  <li><a href="grade">Grade</a></li>
		  <li><a href="subjects">Subjects</a></li>
		</ul>
	  </nav>
	  
	  <div class="main">
		
	  </div>
	</section>

	<footer>
	  <p>Footer</p>
	</footer>

	</body>
</html>

-->
