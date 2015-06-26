<<<<<<< HEAD
<!-- Este codigo HTML es de: el modal, la ventana y la cruz de la ventana,
 el resto del contenido de la ventana se inserta con la funcion javascript insertarContenidoEnVentanaModal(pathContenidoVentanaModal); del archivo ventanaModal.js -->
 
<link rel="stylesheet" href="estilos/ventanaModal.css">
<script type="text/javascript" src="scripts/ventanaModal.js"></script> 

<div id="modal" style="display:none" onclick="cerrarVentanaModal()"></div>
<div id="ventanaContenedor" class="ventanaContenedor" style="display:none">
	<a href="#close" title="Cerrar" onclick="cerrarVentanaModal()">X</a>
	
	<div class="contenidoVentanaModal" id="contenidoVentanaModal">
		<!-- aca va el contenido de la ventana (se coloca con javascript)	-->		
	</div>
=======
<link rel="stylesheet" href="estilos/ventanaModal.css">
<script type="text/javascript" src="scripts/principalVentanaModal.js"></script>

<div id="modal" style="display:none" onclick="cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal')"></div>
<div id="ventanaContenedor" class="ventanaContenedor" style="display:none">
	<a href="#close" title="Cerrar" onclick="cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal')">X</a>
	
	<?php include 'ventanaIniciarSesion.php'; ?>	
	
>>>>>>> origin/ramaMiguel
</div>	