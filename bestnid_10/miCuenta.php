<!DOCTYPE html>
<html>
<head>
	<title>Mi Cuenta</title>
	<link rel="stylesheet" href="estilos/miCuenta.css"> 
<<<<<<< HEAD
	<link rel="stylesheet" href="estilos/principal_header.css">
	<script src="scripts/miCuenta.js"></script>	
=======
	<script type="text/javascript" src="scripts/librerias/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="estilos/principal_header.css">
	
	<script type="text/javascript" src="scripts/reImprimirArticulos.js"></script>
	<!-- // <script src="scripts/miCuenta.js"></script>	 -->
>>>>>>> origin/ramaMiguel
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
<<<<<<< HEAD
					<li><input type="button" value="Mis Subastas" onclick="usuarioSubastas('$_SESSION['id']')" ></li>
					<li><input type="button" value="Mis Ofertas" ></li>
=======
					<li><input type="button" value="Mis Subastas" onclick="reImprimir('titulo , idImagenPrincipal, idSubasta', 'Subasta', '', '', '', '', '<?php echo "AND idUsuario = ".$_SESSION['id'] ?>', 'tabla', 'imprimirArticulos.php')"></li>
					<!-- function reImprimir(columnas, tabla, criterioDeBusqueda, discriminante, criterioDeOrden, patronOExacto, condWhereAdicionales, idElementoHtml, pathPhpConsumidor) -->
					<li><input type="button" value="Mis Ofertas" onclick="imprimirOfertas('necesidad monto fechaOferta', 'titulo idImagenPrincipal idSubasta', 'Oferta', 'subasta', '<?php echo" AND Oferta.idUsuario = ".$_SESSION['id'] ?>', 'tabla','imprimirOfertas.php')" ></li>
>>>>>>> origin/ramaMiguel
					<li><input type="button" value="Cantidad De Ventas" ></li>
					<li><input type="button" value="Modificar Oferta" ></li>

				</div>
			</ul>
		</aside>
		
		<section class="articles">
			<div id="tabla" class="tabla">
<<<<<<< HEAD
							
		
			</div>
		
=======
			<!--AKA SE IMPRIMEN LAS CONSULTAS  -->
			</div>
>>>>>>> origin/ramaMiguel
		</section>
	</section>
</body>
</html>