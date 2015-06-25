<?php 
$mensaje = $_GET['mensaje'];
$href = $_GET['href'];
?>

<link rel="stylesheet" href="estilos/ventanaConfirmacion.css">

<div id="contenidoVentanaMsjConfirm" class="contenidoVentanaMsjConfirm">
	<div class="mensaje">
		<p> <?php echo $mensaje; ?> </p>
	</div>

	<a id="botonConfirmar" href="<?php echo $href; ?>"> Confirmar </a>  

	<button id="botonCancelar" onclick="cerrarVentanaModal()"> Cancelar </button>
</div>	
