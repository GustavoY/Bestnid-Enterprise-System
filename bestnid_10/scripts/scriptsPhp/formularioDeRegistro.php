<?php
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpFunciones/conexion.php';
	include $root.'/bestnid/phpQuerys/querys.php';
	
	

	$nombre= $_REQUEST['nombre'];
	$apellido=$_REQUEST['apellido'];
	$email=$_REQUEST['email'];
	$telFijo=$_REQUEST['telFijo'];
	$telMovil=$_REQUEST['telMovil'];
	$contrasenia=$_REQUEST['contrasenia'];
	$contraseniaR=$_REQUEST['contraseniaR'];
	$tipoDeUsuario= "usuario";
	$estado= "activo";
	$valida= "1";

	abrirConexion();
	$query="SELECT `email`
			FROM `bestnid`.`usuario`
			WHERE email = '$email'";
	$result = mysqli_query($GLOBALS['connection'],$query);
	// $result= queryUsuarioEmailEmail($email);
	
	//queryTodas($columnas, $tabla, $condWhereAdicionales)
	if(mysqli_num_rows($result) > 0){
		echo 0;

	}	
	else{
		
		$query="INSERT INTO `bestnid`.`usuario` (`idUsuario`, `email`, 
		     `nombre`, `apellido`, `telFijo`, `telMovil`, `contrasenia`, `tipoDeUsuario`, `estado`, `valida`)
		   	 VALUES(NULL,'$email','$nombre','$apellido','$telFijo','$telMovil','$contrasenia','$tipoDeUsuario',
		   	 	'$estado', '$valida')";
		mysqli_query($GLOBALS['connection'],$query);
		echo 1;

	}
	
	
	cerrarConexion();
?>