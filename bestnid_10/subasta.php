<?php
include '/phpFunciones/principal_funciones.php'; 

$idSubasta = $_GET['idSubasta'];
$subasta = bddObtener("idSubasta, fechaVencimiento, titulo, descripcion, idUsuario, categoria, idImagenPrincipal", "Subasta", "idSubasta", $idSubasta, "", "exacto", "");
//function bddObtener($columnas, $tabla, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto, $condWhereAdicionales)
//la documentacion de los parametros de la funcion invocada bddObtenerArticulos esta dentro de la implementacion de la funcion. 
?>

<html>
<head>
	<title> <?php echo $subasta['titulo'][0]; ?> </title> <!-- [0] porque las columnas tienen una unica tupla (obviamente ya que la busqueda fue por ID) -->
	<link rel="stylesheet" href="estilos/subasta.css">
	<script type="text/javascript" src="scripts/librerias/jquery-1.11.3.min.js"></script>
</head>

<body>
	<header>
		<?php include 'principal_header.php'; ?>
	</header>
	<section class="main">
		<section class="articles">
			<div class="titulo">
				<div class="categoria">
					<p>Categor&iacute;a: <?php echo $subasta['categoria'][0]; ?></p> 
					<!-- [0] porque las columnas tienen una unica tupla (obviamente ya que la busqueda fue por ID) -->
				</div>
				<div class="nombre">
					<p> <?php echo $subasta['titulo'][0]; ?></p>
				</div>	
			</div>
			
			<div class="contenedorBloqueSuperiorDeInfoSubasta"> <!-- tiene posicion relativa -->
				<div class="bloqueSuperiorDeInfoSubasta"> <!-- tiene posicion absoluta -->
					<div class="presentacionDeImagenes">	
						<div class="contenedorImagen">
							<?php //retorno de imagen?>
							<img src="imagenesProductos/<?php echo $subasta['idImagenPrincipal'][0]; ?>.jpg">
						<!--<img src="<?php// echo("imagenesProductos/".$arts["idImagenPrincipal"][$fila].".jpg");?>"> -->
						</div>
						
						<button class="botonDesplImagenes" onclick="unScriptReCopado()"> < </button>
						<div class="indiceDeImagenes">
							<p>Imagen: I de N<?php //imprime i/n?></p> 
						</div>
						<button class="botonDesplImagenes" onclick="otroScriptReCopado()"> > </button>
					</div>
					
					<div class="contenedorInfoEstado">
						<div class="fechaVenc">
							<div class="encabezadoDeFecha">
								<p>Subasta vigente hasta: </p>
							</div>
							<div class="datoFecha">
								<p> <?php echo $subasta['fechaVencimiento'][0]; ?> </p>
							</div>
						</div>
						
						<div class="contenedorModifSub">
							<a class="botonModifSub" href="edicionDeSubasta.php" id="botonModifSubasta" style="display:none;"> Modificar esta subasta </a>
						</div>
						
						<div class="contenedorElimSub">
						
						<!-- function insertarContenidoEnVentanaModal(pathContenidoVentanaModal){ en el path se pueden pasar parametros GET -->
							<?php 
							//Se inicializan 2 variables para pasarlas por parametro GET, cosa que no quede tan largo y horrible en una sola linea.				
							$mensaje = "¿Seguro desea eliminar esta subasta?";
							$hrefBotonConfirmarVentanaModal = "resultadoDeEliminacion.php?idSubasta=".$idSubasta;
							?>
							<a class="botonElimSub"  id="botonElimSubasta" onclick="insertarContenidoEnVentanaModal('ventanaConfirmacion.php?mensaje=<?php echo $mensaje; ?>&href=<?php echo $hrefBotonConfirmarVentanaModal; ?>')" > Eliminar esta subasta </a>
						</div>
						
						<div class="contenedorOfertar">
							<a class="botonOfertar" href="efectuarOferta.php" id="botonOfertarSubasta" style="display:none;"> Efectuar una oferta </a>
						</div>	
					</div>
				</div>
			</div>

			<div class="bloqueInferiorDeInfoSubasta">
				<div class="tituloDescripcion">
					<p> Descripcion del producto: </p>
				</div>	
				<div class="descripcion">
					<p> <?php echo $subasta['descripcion'][0]; ?> </p>
			
				</div>
				
				<div class="tituloComentarios">
					<p> Comentarios: </p>
				</div>
				<div class="contenedorComentarios"> <!-- ya tiene un par de estilos en CSS -->
					<!-- COMENTARIOS QUE IMPLEMENTA GUSTAVO -->
					
					<?php //encabezado del for ?>
					<div class="comentario">
						<p> Texto del comentario bla bla blabla blabla bla blabla blabla bla blabla blabla bla blabla blabla bla blabla blabla bla blabla bla
						bla bla blabla blabla bla blabla blabla bla blabla blabla bla blabla bla
						bla bla blabla blabla bla blabla blabla bla blabla blabla bla blabla blabla bla blabla blabla 
						<?php //se imprime un comentario ?> </p>
						<hr> <!-- deja una linea para separar al proximo comentario -->
					</div>	
					<?php //se cierra el for ?>
					
					<div class="contenedorEscrituraComent">
						<!-- DONDE SE ESCRIBEN LOS COMENTARIOS -->
						<input type="text" class="inputComentario" placeholder="Escribe un comentario...">
					</div>
					
				</div>
				
			</div>
		</section>
	</section>
	<?php include 'footer.php'; ?>
</body>

<?php include 'ventanaModal.php'; ?>

</html>

<?php 
if (isset($_SESSION['ingreso'])) { ?>
	<?php echo ($_SESSION['id'] == $subasta['idUsuario'][0]); ?>
	<script>
	<?php
	if($_SESSION['id'] == $subasta['idUsuario'][0]){ //Si el usuario es el dueño de la subasta..
		echo "$('#botonElimSubasta').show();"; //sentencia de javascript
		echo "$('#botonModifSubasta').show();";
	} else { //si no es el dueño de la subasta..
		echo "$('#botonOfertarSubasta').show();";
		/*
		if($_SESSION['tipoDeUsuario'] == admin blabla consultar a la tabla usuario){
			echo "$('#botonElimSubasta').show();";
		}
		*/
	} ?>
	</script>
<?php
}	
?>