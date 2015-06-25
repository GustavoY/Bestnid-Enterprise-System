<link rel="stylesheet" href="estilos/ventanaModal.css">
<script type="text/javascript" src="scripts/principalVentanaModal.js"></script>

<div id="modal" style="display:none" onclick="cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal')"></div>
<div id="ventanaContenedor" class="ventanaContenedor" style="display:none">
	<a href="#close" title="Cerrar" onclick="cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal')">X</a>
	
	<?php include 'ventanaIniciarSesion.php'; ?>	
	
</div>	