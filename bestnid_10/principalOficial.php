<?php include '/phpFunciones/principal_funciones.php'; ?>

<html>
<head>
	<title> Subastas </title>
	<link rel="stylesheet" href="estilos/principal.css"> 
	<script type="text/javascript" src="scripts/librerias/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="scripts/reImprimirArticulos.js"></script>
</head>

<body>
	<header>
	<?php include '/principal_header.php'; ?> 
	</header>
	
	<section class="main">
		<aside>
			<div class="filtroDeBusqueda">
				<div class="inputsTexto">
					<input type="search" placeholder="Nombre de producto" id="inputSearch" name="busqueda">
					<button id="searchSubmit" onclick="reImprimirArticulos('titulo, idImagenPrincipal, idSubasta','Subasta','titulo','','','patron','<?php echo "AND (fechaVencimiento > &quot;".fechaActual()."&quot;)"; ?>','articles')"> Buscar </button>
				</div>
				
				<div class="selectorOrden">
					<input type="checkbox" id="checkboxOrden">
					<p>Ordenar resultado</p>
				</div>
				
				<div class="categorias" id="categorias">
					<ul>
						<?php $categorias = bddObtener('nombre', "Categoria", "", "", "", "", "");
						//AND (fechaVencimiento > \"".fechaActual()."\")"
						//function bddObtener($columnas, $tabla, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto, $condWhereAdicionales){ 
						for($fila=0; $fila < count($categorias['nombre']); $fila++){
						?>
						<li onclick="reImprimirArticulos('titulo, idImagenPrincipal, idSubasta','Subasta','categoria','<?php echo $categorias['nombre'][$fila]; ?>','','exacto','<?php echo "AND (fechaVencimiento > &quot;".fechaActual()."&quot;)"; ?>','articles')"> <?php echo $categorias['nombre'][$fila] ?> </li>
						<!--function reImprimirArticulos(columnas, tabla, criterioDeBusqueda, discriminante, criterioDeOrden, patronOExacto, condWhereAdicionales, idElementoHtml)-->
						<?php
						}
						?>
					</ul>
				</div>	
				
	<!--			<button id="botonOrdenar" onclick="reImprimirArticulos('titulo',)"
				
			<div class="radios">
					<div class="radiosTitulo"><p>Rango de precios:</p></div>
					<div class="rango"> <input type="radio" name="rangoX" value="a"> <p>1$ - 50$</p> </div>
					<div class="rango"> <input type="radio" name="rangoX" value="b"> <p>50$ - 250$</p> </div>
					<div class="rango"> <input type="radio" name="rangoX" value="c"> <p>250$ - 1000$</p> </div>
					<div class="rango"> <input type="radio" name="rangoX" value="d"> <p>Mas de 1000$</p> </div>
				</div> -->
			</div>
		</aside>
		
		<section class="articles" id="articles"> <?php
			$arts = bddObtener("titulo, idImagenPrincipal, idSubasta", "Subasta", "", "", "", "", "AND (fechaVencimiento > \"".fechaActual()."\")"); 
			//function bddObtenerArticulos($columnas, $tabla, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto)
			//la documentacion de los parametros de la funcion invocada bddObtenerArticulos esta dentro de la implementacion de la funcion. 
			//idSubasta se necesita para mandarlo por metodo GET a la pagina de detalle de subasta.
			
			include "imprimirArticulos.php"; ?>
		</section> 		
	</section>
	
	<?php include 'footer.php' ?>
	
	<?php include 'ventanaModal.php'; ?>
	
</body>
</html>