<?php
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpQuerys/querys.php'; //este archivo principal_funciones se ejecuta desde distintos archivos (distintos path)... 
	//por eso es necesario trabajar con el path absoluto, porque el relativo va a cambiar segun desde donde se haga el include.	
	
	function bddObtenerSubastas($idUsuario){
		$resultQuery= queryUsuarioSubastas($idUsuario);
		$cantFilas= mysql_num_rows($resultQuery);
		$subastas = array();
		if($cantFilas > 0){
			while($row = mysqli_fetch_assoc($resultQuery)){
				$subastas[] = $row["titulo"];
			}
		}
		return $subastas;
	}
?>