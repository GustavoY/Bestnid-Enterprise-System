 <?php 
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpFunciones/principal_funciones.php';
	
	$columna1 = $_GET['columna1'];
	$columna2 = $_GET['columna2'];
	$tabla1 = $_GET['tabla1'];
	$tabla2 = $_GET['tabla2'];
	$condWhereAdicionales = $_GET['condWhereAd'];
	$pathConsumidor = $_GET['pathConsumidor'];
	
/*	echo "	Columnas: ".$columnas."<br>   PARA DEBUGGEAR SE IMPRIME LO QUE SE PASA POR PARAMETRO GET QUE ES MUY FACTIBLE A COMETER ERRORES DE SINTAXIS EN LA INVOCACION
			tabla: ".$tabla."<br>
			criterioDeBusqueda: ".$criterioDeBusqueda."<br>
			discriminante: ".$discriminante."<br>
			criterioDeOrden: ".$criterioDeOrden."<br>
			patronOExacto: ".$patronOExacto."<br>
			condWhereAdicionales: ".$condWhereAdicionales."<br>
			pathConsumidor: ".$pathConsumidor; */
 
	$arts = bddObtenerOfertas($columna1, $columna2, $tabla1, $tabla2, $condWhereAdicionales);
	//function bddObtener($columnas, $tabla, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto)
	//la documentacion de los parametros de la funcion invocada bddObtenerArticulos esta dentro de la implementacion de la funcion. 
	
	include $root.'/bestnid/'.$pathConsumidor; //se llama al archivo que utiliza la variable $arts. Esto se hace para ser abstracto y asi servir para cualquier tipo de consulta.
?>	
