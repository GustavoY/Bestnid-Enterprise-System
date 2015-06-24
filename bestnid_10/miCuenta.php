<!DOCTYPE html>
<html>
<head>
	<title>Mi Cuenta</title>
	<link rel="stylesheet" href="estilos/miCuenta.css"> 
	<link rel="stylesheet" href="estilos/principal_header.css">
	<script src="scripts/miCuenta.js"></script>
	<?php 
	include '/principal_header.php';

	include '/phpQuerys/querys.php';

	?>
	
</head>
<body>
	<aside> 
	<p>Operaciones</p>
		<ul>
			<div class="botones">
				<li><input type="button" value="Mis Subastas" id="input1" onclick="usuarioSubastas('<?php echo($_SESSION['id']); ?>')"></li>
				<li><input type="submit" value="Mis Ofertas" id="input2"></li>
				<li><input type="submit" value="Cantidad De Ventas" id="input3"></li>
				<li><input type="submit" value="Modificar Oferta" id="input4"></li>
			
			</div>
		</ul>
	</aside>
</body>
</html>

