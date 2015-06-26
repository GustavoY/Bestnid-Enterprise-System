<?php 
session_start();
?>	

<link rel="stylesheet" href="estilos/principal_header.css">
<script type="text/javascript" src="scripts/principal_header.js"></script>
<div class="nivel1">
	<div class="logo"><img src="logo.png"></div>
	<div class="tituloDePagina"><p>Bestnid</p></div>
	<div class="slogan"><p>Se elige con el coraz&oacute;n</p></div>
</div>
<div class="nivel2">			
	<nav>
		<ul>
			<li> <a href="principalOficial.php"> Inicio </a> </li>
			<li> <a href="#"> Acerca de </a> </li>
			<li> <a href="#"> Servicios </a> </li>
			<li> <a href="#"> Contacto </a> </li>
		</ul>
	</nav>
	
	<section class="loginBar">
		<ul>
			<?php if(!isset($_SESSION['ingreso'])){ ?>
				<li>
					<div id="login" style="display:block;">
					
						<a href="#" onclick="insertarContenidoEnVentanaModal('ventanaIniciarSesion.php')"> <!-- "abrirVentanaModal('modal','ventanaContenedor')" -->
							 <label>Ingresar</label>

						</a> 
					</div>
				</li>
				<li>
					<div id="registrarse" >
						<a href='formularioDeRegistro.html'> Registrarse </a>
					</div>
				
				</li>
			<?php } else{ ?>
			<li>
				<div id="on" >
					<a href="miCuenta.php">  <?php	echo($_SESSION['nombre']); ?>  </a>
				</div>
			</li>
			<li>
				<div id="logout">
					<a href="principalOficial.php" onclick="cerrar()"> Cerrar Sesion</a>
				</div>
			</li>
			<?php } ?>
			
			
		</ul>
	</section>
</div>	
