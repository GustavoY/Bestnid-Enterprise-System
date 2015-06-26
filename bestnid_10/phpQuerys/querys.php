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
<<<<<<< HEAD
	}                                                           
	
=======
	}       

	/////////////ofertas//////////////

	function queryTodasOfertas($columna1, $columna2, $tabla1, $tabla2, $condWhereAdicionales){
		// echo"$tabla1.$columna1[0] , $tabla1.$columna1[1]";
		$query = "	SELECT $tabla1.$columna1[0], $tabla1.$columna1[1], $tabla1.$columna1[2], $tabla2.$columna2[0], $tabla2.$columna2[1], $tabla2.$columna2[2], $tabla1.idUsuario, $tabla2.idUsuario
					FROM $tabla1
					INNER JOIN $tabla2  ON $tabla1.idSubasta = $tabla2.idSubasta
					WHERE ($tabla1.valida = 1 AND $tabla2.valida = 1) AND $tabla1.idSubasta = $tabla2.idSubasta $condWhereAdicionales"; 					
		$result = mysqli_query($GLOBALS['connection'], $query);
		return $result;
	}
	// select Necesidad ,Monto, fechaDeOferta, titulo, img
	// from	oferta o
	// INNER jOIN subasta s ON(o.idSubasta = s.idSubasta)
	// where	o.idUsuario = idusuario(del que inicio secion) 	AND valida=1 And o.idSubasta = s.idSubasta

>>>>>>> origin/ramaMiguel
?>