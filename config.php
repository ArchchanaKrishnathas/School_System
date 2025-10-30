<?php
	$connect = mysqli_connect("localhost", "root", "root", "school_system_db");
	
	if (!$connect) {
		die ("connection Failure". mysqli_connect_error());
	}
	
	//echo "Connected";
	
?>