 <?php 
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include $root.'/bestnid/phpFunciones/principal_funciones.php';
	$criterioDeBusqueda = $_GET['critBusq'];
	$discriminante = $_GET['discrim'];
	$criterioDeOrden = $_GET['critOrd'];
	$patronOExacto = $_GET['patrOExact'];
 ?>
 
<ul>
	<?php 
	$arts = bddObtenerArticulos("titulo, idImagenPrincipal", $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto);
	//function bddObtenerArticulos($columnas, $criterioDeBusqueda, $discriminante, $criterioDeOrden, $patronOExacto)
	//la documentacion de los parametros de la funcion invocada bddObtenerArticulos esta dentro de la implementacion de la funcion. 
	
	for($fila=0; $fila < count($arts["titulo"]); $fila++){ //preguntar por ["titulo"] o ["idImagenPrincipal"] es lo mismo ya que ambas columnas tienen la misma cantidad de filas.. es una tabla..
	?>					
		<article>
			<div class="contenedorImagen">
				<img src="<?php echo("imagenesProductos/".$arts["idImagenPrincipal"][$fila].".jpg");?>">
			</div>	
			<div class="descripcion">
				<div class="titulo">
					<p> <?php echo($arts["titulo"][$fila]) ?> </p> <!-- imprime el titulo del articulo i (indice $fila) -->
				</div>
			</div>
		</article>			
	<?php
	}
	if(count($arts["titulo"]) == 0){
		echo ("No se ha encontrado ningún producto");
	}
	?>	
</ul>


