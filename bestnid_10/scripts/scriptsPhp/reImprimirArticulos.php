 <?php 
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpFunciones/principal_funciones.php';
	$criterioDeBusqueda = $_GET['critBusq'];
	$discriminante = $_GET['discrim'];
	$criterioDeOrden = $_GET['critOrd'];
	$patronOExacto = $_GET['patrOExact'];
	
 
	$arts = bddObtenerArticulos("titulo, idImagenPrincipal", $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto);
	//function bddObtenerArticulos($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto)
	//la documentacion de los parametros de la funcion invocada bddObtenerArticulos esta dentro de la implementacion de la funcion. 
	
	include $root.'/bestnid/imprimirArticulos.php';
	?>	


