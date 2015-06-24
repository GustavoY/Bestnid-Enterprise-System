<?php
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpQuerys/querys.php'; //este archivo principal_funciones se ejecuta desde distintos archivos (distintos path)... 
	//por eso es necesario trabajar con el path absoluto, porque el relativo va a cambiar segun desde donde se haga el include.	
	
	function eliminarCaracteresBlancos($str){
		$str = str_replace(' ', '', $str);
		return $str;
	}
	
	function crearArreglosDeStr($columnas){
		$columnas = eliminarCaracteresBlancos($columnas);
		$arregloDeStrings = explode(',', $columnas);
		return $arregloDeStrings;
	}
	
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
		$arregloDeNombresDeColumnas = crearArreglosDeStr($columnas);	
		$cantColumnas = count($arregloDeNombresDeColumnas);
		
		if ($cantFilas > 0) {
			while($row = mysqli_fetch_assoc($resultQuery)){
				for($i=0; $i<$cantColumnas; $i++){
					$articulos[$arregloDeNombresDeColumnas[$i]][] = $row[$arregloDeNombresDeColumnas[$i]];
			/*		se guarda en la matriz $articulos cada columna (iteran en el for) de cada tupla (filas/rows iteran en el while)
					es equivalente a poner esto en el while (sin el for):
					$articulos["titulo"][] = $row["titulo"];
					$articulos["idImagenPrincipal"][] =	$row["idImagenPrincipal"];
					pero usandolo asi se esta hardcodeando las columnas, y estas pueden cambiar de nombre y cantidad segun el parametro, por
					eso la necesidad del for para las columnas */
				}
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
	
	function bddEliminarSubasta($idSubasta){
		$resultQuery = queryEliminarTuplas("Subasta","idSubasta",$idSubasta);
	/*	try{
			$resultQuery = queryEliminarTuplas("Subasta","idSubasta",$idSubasta);
		} catch(Exception $e) {
			echo "error al eliminar la subasta";
		}	*/	
	}
?>