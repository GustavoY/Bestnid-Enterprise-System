<link rel="stylesheet" href="estilos/ventanaIniciarSesion.css">

<div id="contenidoVentanaLogin" class="contenidoVentanaLogin" style="display:none">
		
	<div class="tituloVentanaLogin">
		 <p align=center>Ingresar a Mi cuenta</p>
	</div>
	<div class="alert" style="display:none;" id="error">
		<p align=center>Usuario o Password no identificados</p><br>
	</div>
	<div class="alert" style="display:none;" id="error-empty">
		<p align=center>Campos Incompletos</p><br>
	</div>
	<div class="contenedorLinea">
		<div class="contenedorLabel"> 
			<label for="email"> Cuenta: </label> 
		</div>
		<input type="text" placeholder="Ejemplo@hotmail.com" name="email" id="email" required><br>
	</div>
	<div class="contenedorLinea">
		<div class="contenedorLabel">
			<label for="password"> Contrase&ntilde;a: </label>
		</div>
		<input type="password" placeholder="Escriba su contrase&ntilde;a" name="contraseña" id="password">	
	</div>		
	<div class="buttLoginContenedor">
		<button onclick="iniciarSesion()">Ingresar</button>
	</div>			
	<div class="footerVentanaLogin">
		<hr>
		<p> &iquest;A&uacute;n no tienes una cuenta? </p> <a href="formularioDeRegistro.html"> Reg&iacute;strate </a>
	</div>	
</div>		