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
	<?php 
		include '/principal_header.php'; // tiene que estar en esta parte 
		//xq se tiene que ejecutar el javascript del principal el metodo iniciarsecion()
	 ?> 
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
	
	<!-- VENTANA MODAL -->
	<?php include 'ventanaModal.php'; ?>
	
	<!-- ----------- Ventanas modales --------------- -->
<!--	
	<div id="modal" style="display:none" onclick="cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal','alertaFaltaCuenta','alertaFaltaContraseña')"></div>
	<div id="ventanaContenedor" class="ventanaContenedor" style="display:none">
	
		<a href="#close" title="Cerrar" onclick="cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal','alertaFaltaCuenta','alertaFaltaContraseña')">X</a>
		
		<div id="contenidoVentanaLogin" class="contenidoVentanaLogin" style="display:none">
		
			<div class="tituloVentanaLogin"> <p>Ingresar a Mi cuenta</p> </div>
			<div class="contenedorLinea">
				<div class="contenedorLabel"> <label for="loginCuenta"> Cuenta: </label> </div>
				<input type="text" placeholder="Escriba su cuenta" name="cuenta" id="loginCuenta">
				<br>
			</div>
			<div class="contenedorLinea">
				<div class="contenedorLabel"> <label for="loginContraseña"> Contrase&ntilde;a: </label> </div>
				<input type="password" placeholder="Escriba su contrase&ntilde;a" name="contraseña" id="loginContraseña">
				<a href="#"> Olvid&eacute; mi contrase&ntilde;a </a>
			</div>		
			<div class="buttLoginContenedor">
				<input type="button" name="buttonLogin" value="Ingresar" onclick="validarFormLogin('loginCuenta','loginContraseña','alertaFaltaCuenta','alertaFaltaContraseña');"> 
				<div class="alertaFaltaCuenta" id="alertaFaltaCuenta" style="display:none"> Debe escribir su cuenta! </div>
				<div class="alertaFaltaContraseña" id="alertaFaltaContraseña" style="display:none"> Debe escribir su contrase&ntilde;a! </div>			
			</div>			
			<div class="footerVentanaLogin">
				<hr>
				<p> &iquest;A&uacute;n no tienes una cuenta? </p> <a href="#"> Reg&iacute;strate </a>
			</div>	
		</div>		
	</div>	-->
	
</body>
</html>