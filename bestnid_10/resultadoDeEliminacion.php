<?php 
	$idSubasta = $_GET['idSubasta'];
	include_once 'phpFunciones/principal_funciones.php';
	bddEliminar('Subasta', 'idSubasta', $idSubasta);
//	function bddEliminar($tabla, $criterioDeBusqueda, $discriminante)	
 ?>
 
<html>
<head>
	<title> Eliminacion exitosa </title>
	<link rel="stylesheet" href="estilos/resultadoDeEliminacion.css"> 
</head>

<body>
	<header>
		<?php // include principal_header_lvl1 ?>
	</header>

	<section class="main">
			<div class="mensaje">
				<p> La subasta se ha eliminado correctamente. </p>
			</div>	
			<div class="botonAPagPrincipal">
				<a href="principalOficial.php"> Volver a la pagina principal </a>
			</div>
	</section>
</body>
</html>