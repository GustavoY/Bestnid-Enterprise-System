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
	}

	function fechaActual(){
		$dia = date("d");
		$mes = date("m");
		$año = date("Y");
		$strResult = $año."-".$mes."-".$dia; 
		return $strResult;
	} 
	 
	//---------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------QUERYS-------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------Subastas-----------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	function querySubastasTodas($columnas){
		$fechaActual = fechaActual();
		$query = "	SELECT ".$columnas."
					FROM Subasta
					WHERE (subastaValida = 1) AND (fechaVencimiento > \"".fechaActual()."\")"; // 
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	 
	 
	function querySubastasConBusquedaExacta($columnas, $criterioDeBusqueda, $discriminante){
		$query = "	SELECT ".$columnas."
					FROM Subasta
					WHERE (".$criterioDeBusqueda." = \"".$discriminante."\") AND (fechaVencimiento > \"".fechaActual()."\") AND (subastaValida = 1)";
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	
	function querySubastasConBusquedaLike($columnas, $criterioDeBusqueda, $discriminante){
		$query = "	SELECT ".$columnas."
					FROM Subasta
					WHERE (".$criterioDeBusqueda." LIKE \"%".$discriminante."%\") AND (fechaVencimiento > \"".fechaActual()."\") AND (subastaValida = 1)";
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}

	
	function querySubastasConBusquedaExactaConOrden($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden){
		$query = "	SELECT ".$columnas."
					FROM Subasta
					WHERE (".$criterioDeBusqueda." = \"".$discriminante."\") AND (fechaVencimiento > \"".fechaActual()."\") AND (subastaValida = 1)
					ORDER BY ".$criterioDeOrden;
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	
	function querySubastasConBusquedaLikeConOrden($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden){
		$query = "	SELECT ".$columnas."
					FROM Subasta
					WHERE (".$criterioDeBusqueda." LIKE \"%".$discriminante."%\") AND (fechaVencimiento > \"".fechaActual()."\") AND (subastaValida = 1)
					ORDER BY ".$criterioDeOrden;
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	
	//---------------------------------------------------------------------------------------------------------------------------------------
	//------------------------------------------------Categorias-----------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	function queryCategoriasTodas(){
		$query = "	SELECT nombre
					FROM Categoria
					WHERE valida = 1
					ORDER BY nombre";
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	
	//---------------------------------------------------------------------------------------------------------------------------------------
	//------------------------------------------------Usuarios-------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
		function  queryUsuarioEmailEmail($email){
			$query="SELECT `email`
				FROM `bestnid`.`usuario`
				WHERE email = '$email'";
			$result = mysqli_query($GLOBALS['connection'],$query);
			return $result;
		}

		function queryUsuarioSubastas($idUsuario){
			$query = "SELECT titulo
					  FROM	Subasta
					  WHERE idUsuario = '$idUsuario' ";
			$result= mysqli_query($GLOBALS['connection'],$query);
			return $result;
		}
?>