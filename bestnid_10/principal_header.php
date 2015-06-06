<!DOCTYPE html>
<html>
<head>
	<title> Subastas </title>
	<link rel="stylesheet" href="estilos/principal_header.css">  
</head>

<body>
	<header>
		<div class="nivel1">
			<div class="logo"><img src="logo.png"></div>
			<div class="tituloDePagina"><p>Bestnid</p></div>
			<div class="slogan"><p>Se elige con el coraz&oacute;n</p></div>
		</div>
		<div class="nivel2">			
			<nav>
				<ul>
					<li> <a href="principal.php"> Inicio </a> </li>
					<li> <a href="#"> Acerca de </a> </li>
					<li> <a href="#"> Servicios </a> </li>
					<li> <a href="#"> Contacto </a> </li>
				</ul>
			</nav>
			
			<section class="loginBar">
				<ul>
					<li>
						<div id="login" style="display:block;">
					 		<a href="#" onclick="abrirVentanaModal('contenidoVentanaLogin','modal','ventanaContenedor')">
					 			 <label>Ingresar</label>
					 		</a> 
					 	</div>
					</li>
					<li>
						<div id="on" style="display:none;">
							<a href="#"> Mi Cuenta </a>
						</div>
					</li>
					<li>
						<div id="logout" style="display:none;">
							<a href="#" onclick="cerrar()"> Cerrar Sesion</a>
						</div>
					</li>
					<li>
					 	<div id="registrarse" >
							<a href='formularioDeRegistro.html'> Registrarse </a>
						</div>
					</li>
				</ul>
			</section>
		</div>		
	</header>
</body>	