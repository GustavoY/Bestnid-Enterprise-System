<link rel="stylesheet" href="estilos/imprimirOfertas.css">
<?php 
//Este archivo imprime en html los articulos para la pagina principal. REQUIERE HABER INICIALIZADO LA VARIABLE $arts AFUERA.
if( $arts != null ){
	for($fila=0; $fila < count($arts["titulo"]); $fila++){ //preguntar por ["titulo"] o ["idImagenPrincipal"] es lo mismo, ya que ambas columnas tienen la misma cantidad de filas.. es una tabla..
	?>					
		<article>
			<a href="subasta.php?idSubasta=<?php echo $arts["idSubasta"][$fila]; ?>">
				<div class="contenedorImagen">
					<img src="<?php echo("imagenesProductos/".$arts["idImagenPrincipal"][$fila].".jpg");?>">
				</div>	
				<div class="descripcion">
					<div class="titulo">
						<p> <?php echo($arts["titulo"][$fila]) ?> </p> <!-- imprime el titulo del articulo i (indice $fila) -->
					</div>
					<div class="monto">
						<p><?php echo("Monto: ".$arts["monto"][$fila]) ?> </p>
					</div><div class="fechaOferta">
						<p><?php echo("Fecha de oferta: ".$arts["fechaOferta"][$fila]) ?> </p>
					</div>
				</div>
			</a>	
		</article>			
	<?php
	}
} else {
	echo ("No se ha encontrado ningúna oferta");
}
?>	