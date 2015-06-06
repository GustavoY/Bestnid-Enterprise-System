<?php 
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "bestnid";
	$connection;

	function abrirConexion(){
			// Create connection
		$GLOBALS['connection'] = mysqli_connect($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password'],
		$GLOBALS['dbname']);

		// Check connection
		 if (!$GLOBALS['connection']) {
			die("Connection failed: " . mysqli_connect_error());
		 } //else {
		// 	echo "Connected successfully";
		// }
	}

	function cerrarConexion (){
		mysqli_close($GLOBALS['connection']); 
	}

?>