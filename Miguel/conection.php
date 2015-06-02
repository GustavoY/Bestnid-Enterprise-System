
<?php
	function bdconnection(){
		$servername = "localhost";
		$username = "root";
		$password = "1234";
		$dbname = "bestnid";

		// Create connection
		$connection = mysql_connect($servername, $username, $password, $dbname);

		// Check connection
		 if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		} else {
			echo "Connected successfully";
		}
		return $connection;
	}	

	?>