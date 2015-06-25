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
	 
	//---------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------QUERYS-------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------
	
	function queryTodas($columnas, $tabla, $condWhereAdicionales){
		$fechaActual = fechaActual();
		$query = "	SELECT ".$columnas."
					FROM ".$tabla."
					WHERE (valida = 1) ".$condWhereAdicionales; 
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	 
	 
	function queryConBusquedaExacta($columnas, $tabla, $criterioDeBusqueda, $discriminante, $condWhereAdicionales){
		$query = "	SELECT ".$columnas."
					FROM ".$tabla."
					WHERE (".$criterioDeBusqueda." = \"".$discriminante."\")".$condWhereAdicionales." AND (valida = 1)";
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	function queryConBusquedaLike($columnas, $tabla, $criterioDeBusqueda, $discriminante, $condWhereAdicionales){
		$query = "	SELECT ".$columnas."
					FROM ".$tabla."
					WHERE (".$criterioDeBusqueda." LIKE \"%".$discriminante."%\")".$condWhereAdicionales." AND (valida = 1)";
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}

	
	function queryConBusquedaExactaConOrden($columnas, $tabla, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $condWhereAdicionales){
		$query = "	SELECT ".$columnas."
					FROM ".$tabla."
					WHERE (".$criterioDeBusqueda." = \"".$discriminante."\") ".$condWhereAdicionales." AND (valida = 1)
					ORDER BY ".$criterioDeOrden;
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	
	function queryConBusquedaLikeConOrden($columnas, $tabla, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $condWhereAdicionales){
		$query = "	SELECT ".$columnas."
					FROM ".$tabla."
					WHERE (".$criterioDeBusqueda." LIKE \"%".$discriminante."%\") ".$condWhereAdicionales." AND (valida = 1)
					ORDER BY ".$criterioDeOrden;
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	
	function queryEliminarTuplas($tabla, $criterioDeBusqueda, $discriminante){
		$query= "	UPDATE ".$tabla."
					SET valida = 0
					WHERE ".$criterioDeBusqueda." = ".$discriminante;
		$result = mysqli_query($GLOBALS['connection'], $query); //retorna false si hay error (creo jaja)
	}                                                           
	
?>