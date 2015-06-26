<!DOCTYPE html>
<html>
<head>
	<title>Mi Cuenta</title>
	<link rel="stylesheet" href="estilos/miCuenta.css"> 
	<script type="text/javascript" src="scripts/librerias/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="estilos/principal_header.css">
	
	<script type="text/javascript" src="scripts/reImprimirArticulos.js"></script>
	<!-- // <script src="scripts/miCuenta.js"></script>	 -->
</head>

<body>
	<header>
	<?php 
	include '/principal_header.php';
	?>
	</header>
	
	<section class="main">
		<aside> 
		<p>Operaciones</p>
			<ul>
				<div class= "botones">
					<li><input type="button" value="Mis Subastas" onclick="reImprimir('titulo , idImagenPrincipal, idSubasta', 'Subasta', '', '', '', '', '<?php echo "AND idUsuario = ".$_SESSION['id'] ?>', 'tabla', 'imprimirArticulos.php')"></li>
					<!-- function reImprimir(columnas, tabla, criterioDeBusqueda, discriminante, criterioDeOrden, patronOExacto, condWhereAdicionales, idElementoHtml, pathPhpConsumidor) -->
					<li><input type="button" value="Mis Ofertas" onclick="imprimirOfertas('necesidad monto fechaOferta', 'titulo idImagenPrincipal idSubasta', 'Oferta', 'subasta', '<?php echo" AND Oferta.idUsuario = ".$_SESSION['id'] ?>', 'tabla','imprimirOfertas.php')" ></li>
					<li><input type="button" value="Cantidad De Ventas" ></li>
					<li><input type="button" value="Modificar Oferta" ></li>

				</div>
			</ul>
		</aside>
		
		<section class="articles">
			<div id="tabla" class="tabla">
			<!--AKA SE IMPRIMEN LAS CONSULTAS  -->
			</div>
		</section>
	</section>
</body>
</html>