
<?php
$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "bestnid";
	
	// Create connection
	$connection = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	 if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		echo "Connected successfully";
	}

	?>