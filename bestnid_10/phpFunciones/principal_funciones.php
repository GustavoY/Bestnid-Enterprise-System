<?php
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpQuerys/querys.php'; //este archivo principal_funciones se ejecuta desde distintos archivos (distintos path)... 
	//por eso es necesario trabajar con el path absoluto, porque el relativo va a cambiar segun desde donde se haga el include.	
	
	
	
	function bddObtenerArticulos($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto){ 
	//$patronOExacto tiene 2 valores posibles, "exacto" o "patron"...
	//si es exacto entonces la consulta se hara con el operador "="  es decir WHERE(criterioDeBusqueda = "discriminante")...
	//y si es patron entonces la consulta se hara con el operador "LIKE" es decir WHERE(criterioDeBusqueda LIKE "%discriminante%")
	//NOTAR QUE: si no se quiere filtrar los productos por ningun criterio, es decir, se desea mostrar todos los productos, entonces...
	//el parametro criterioDeBusqueda sera un str vacio "" y los demas parametros por logica no tendran ningun sentido, por lo que ni siquiera se los lee... 
	//pero por seguridad y prolijidad SE DEBE invocar esta funcion bddObtenerArticulos con todos los parametros definidos, con...
	//strings vacios "" todos los parametros que correspondan.
	
		if($criterioDeBusqueda == ""){
			$resultQuery = querySubastasTodas($columnas);
		} else {
			if($criterioDeOrden == ""){
				if($patronOExacto == "exacto"){
					$resultQuery = querySubastasConBusquedaExacta($columnas, $criterioDeBusqueda, $discriminante);
				} else {
					$resultQuery = querySubastasConBusquedaLike($columnas, $criterioDeBusqueda, $discriminante);
				} 
			} else {
				if($patronOExacto == "exacto"){
					$resultQuery = querySubastasConBusquedaExactaConOrden($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden);
				} else {
					$resultQuery = querySubastasConBusquedaLikeConOrden($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden);
				}
			}
		}

		$cantFilas = mysqli_num_rows($resultQuery);
		$articulos = array("titulo" => array(),
						  ("idImagen") => array()
						  );
		if ($cantFilas > 0) {
		// output data of each row
			while($row = mysqli_fetch_assoc($resultQuery)){
				$articulos["titulo"][] = $row["titulo"];
				$articulos["idImagenPrincipal"][] =	$row["idImagenPrincipal"];
			}
		}
		return $articulos;
	}
	
	function bddObtenerCategorias(){
		$resultQuery = queryCategoriasTodas();
		
		$cantFilas = mysqli_num_rows($resultQuery);
		$categorias = array();
		
		if($cantFilas > 0){
			while($row = mysqli_fetch_assoc($resultQuery)){
				$categorias[] = $row["nombre"];
			}
		}
		return $categorias;
	}
	
	
	
?>