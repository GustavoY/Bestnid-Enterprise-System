<!DOCTYPE html>
<html>
<head>
	<title>Mi Cuenta</title>
	<link rel="stylesheet" href="estilos/miCuenta.css"> 
	<link rel="stylesheet" href="estilos/principal_header.css">
	<script src="scripts/miCuenta.js"></script>
	<?php 
	include '/principal_header.php';
	?>
	
</head>

<body>
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
	
</body>
</html>