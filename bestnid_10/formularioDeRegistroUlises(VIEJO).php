<!DOCTYPE html>
<html>
<head>
	<title> Registrarse </title>
	<link rel="stylesheet" href="estilos/formularioDeRegistro.css"> 
	<script type="text/javascript" src="scripts/formularioDeRegistro.js"></script>
</head>

<body>
	<header>
		<div class="logo"><img src="logo.png"></div>
		<div class="tituloDePagina"><p>Bestnid</p></div>
		<div class="slogan"><p>Se elige con el alma</p></div>
	</header>
	
	<hr>
	
	<section class="main">
		<form  method="post">
			<div class="encabezado">
				<div class="titulo">
					Crear una cuenta 
				</div>		
				<a id="close" href="principal.html"> volver a la p&aacute;gina principal </a>
			</div>	
			<div class="introduccion">
				<p> Para registrarse en el sistema y crear una cuenta debe ingresar sus datos en este formulario. Si ya posee una cuenta de usuario puede <a href="#">iniciar sesi&oacute;n</a>.</p>
				<br>
			</div>	
			<div class="linea">
				<div class="entrada">
					<label for="nombre"> Nombre: </label>
					<input type="text" placeholder="Ingrese su nombre" name="inputDato[]" id="nombre" maxlength="40" onkeyup="comprobarElemento('inputDato[]','msjError[]','nombre','0')">
				</div>
				<div class="msjError">
					<p name="msjError[]" id="msjErrorNombre"> </p>
				</div>					
			</div>
			
			<div class="linea">
				<div class="entrada">
					<label for="apellido"> Apellido: </label>
					<input type="text" placeholder="Ingrese su apellido" name="inputDato[]" id="apellido" maxlength="40" onkeyup="comprobarElemento('inputDato[]','msjError[]','apellido','1')">
				</div>
				<div class="msjError">
					<p name="msjError[]" id="msjErrorApellido"> </p>
				</div>	
			</div>
			
			<div class="linea">
				<div class="entrada">
					<label for="email"> Email: </label>
					<input type="email" placeholder="pepe@ejemplo.com" name="inputDato[]" id="email" onkeyup="comprobarElemento('inputDato[]','msjError[]','email','2')">
				</div>
				<div class="msjError">
					<p name="msjError[]" id="msjErrorEmail"> </p>
				</div>	
			</div>
			
			<div class="linea">
				<div class="entrada">
					<label for="codigoPostal"> C&oacute;digo postal: </label>
					<input type="text" placeholder="Ingrese el c&oacute;digo postal" name="inputDato[]" id="codigoPostal" maxlength="10" onkeyup="comprobarElemento('inputDato[]','msjError[]','codigoPostal','3')">
				</div>
				<div class="msjError">
					<p name="msjError[]" id="msjErrorCodigoPostal"> </p>
				</div>					
			</div>
			
			<div class="linea">
				<div class="entrada">
				Sexo:
				M <input type="radio" name="radioSexo[]" value="masculino" onclick="comprobarSexo('radioSexo[]','msjErrorRadioSexo','4')"> F <input type="radio" name="radioSexo[]" value="femenino" onclick="comprobarSexo('radioSexo[]','msjErrorRadioSexo','5')">
				</div>
				<div class="msjError">
					<p name="msjErrorRadioSexo" id="msjErrorSexo"> </p>
				</div>	
			</div>
			
			<div class="linea">
				<div class="entrada">
					<label for="contrasenia"> Contrase&ntilde;a: (m&iacute;nimo 8 caracteres) </label>
					<input type="password" placeholder="Ingrese su contrase&ntilde;a" name="inputDato[]" id="contrasenia" maxlength="20" onkeyup="comprobarContrasenia('contrasenia','msjErrorContrasenia','4')">
				</div>
				<div class="msjError">
					<p name="msjError[]" id="msjErrorContrasenia"> </p>
				</div>	
			</div>
			<div class="linea">
				<div class="entrada">
					<label for="contraseniaReescrita"> Vuelva a escribir su contrase&ntilde;a: </label>
					<input type="password" placeholder="Ingrese nuevamente su contrase&ntilde;a" name="inputDato[]" id="contraseniaReescrita" maxlength="20" onkeyup="comprobarReinsercionDeContrasenia('contrasenia','contraseniaReescrita','msjErrorContraseniaReescrita','5')">
				</div>
				<div class="msjError">
					<p name="msjError[]" id="msjErrorContraseniaReescrita"> </p>
				</div>	
			</div>
			<!-- ['nombre','apellido','email','ciudad','sexo','contrasenia','contraseniaReescrita'],['msjErrorNombre','msjErrorApellido',msjErrorEmail','msjErrorCiudad','msjErrorSexo','msjErrorContrasenia','msjErrorContraseniaReescrita'] -->
			<input type="button" value="Crear cuenta" onclick="comprobarFormulario('inputDato[]','msjError[]','radioSexo[]','msjErrorRadioSexo')">
		</form>
	</section>	
</body>
</html>	
	