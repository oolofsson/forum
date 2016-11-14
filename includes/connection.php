<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "qwerty";
	$dbname = "forum";
	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
?>