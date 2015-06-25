<!DOCTYPE html>
<html>
<head>
	<title>Mi Cuenta</title>
	<link rel="stylesheet" href="estilos/miCuenta.css"> 
	<link rel="stylesheet" href="estilos/principal_header.css">
	<script src="scripts/miCuenta.js"></script>	
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
					<li><input type="button" value="Mis Subastas" onclick="usuarioSubastas('$_SESSION['id']')" ></li>
					<li><input type="button" value="Mis Ofertas" ></li>
					<li><input type="button" value="Cantidad De Ventas" ></li>
					<li><input type="button" value="Modificar Oferta" ></li>

				</div>
			</ul>
		</aside>
		
		<section class="articles">
			<div id="tabla" class="tabla">
							
		
			</div>
		
		</section>
	</section>
</body>
</html>