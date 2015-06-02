<?php
	$nombre= $_POST['inputDato'][1];
	$apellido=$_POST['inputDato'][2];
	$email=$_POST['inputDato'][3];
	$codigoPostal=$_POST['inputDato'][4];
	$telFijo=$_POST['inputDato'][5];
	$telMovil=$_POST['inputDato'][6];
	$contraseña=$_POST['inputDato'][7];
	$contraseñaR=$_POST['inputDato'][8];
	$tipoDeUsuario= "usuario";
	$estado= "activo";

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

	/*  */
	$query="SELECT `email` FROM `bestnid`.`usuario` WHERE email = '$email'";
	$resul= mysql_query($query);
	//$cantFilas = mysql_num_rows($resul);
	if(mysql_num_rows($resul) > 0){
		echo "el usuario ya esta registrado en el sistema";
	}
	else{
		echo "lalala";
		$query="INSERT INTO `bestnid`.`usuario` (`idUsuario`, `email`, 
			     `nombre`, `apellido`, `telFijo`, `telMovil`, `contrasenia`, `tipoDeUsuario`, `estado`)
			   	 VALUES(NULL,'$email','$nombre','$apellido','$telFijo','$telMovil','$contraseña','$tipoDeUsuario',
			   	 	'$estado')";
		mysql_query($query);
	}
		mysql_close($connection); 

?>