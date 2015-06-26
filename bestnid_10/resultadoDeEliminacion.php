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
		<div class="nivel1">
			<div class="logo"><img src="logo.png"></div>
			<div class="tituloDePagina"><p>Bestnid</p></div>
			<div class="slogan"><p>Se elige con el coraz&oacute;n</p></div>
		</div>	
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