const idContenidoVentanaModal = "contenidoVentanaModal";

function abrirVentanaModal(){
	document.getElementById('ventanaContenedor').style.display="block";
	document.getElementById('modal').style.display="block";
}

function cerrarVentanaModal(){
	document.getElementById('ventanaContenedor').style.display="none";
	document.getElementById('modal').style.display="none";
}

function insertarContenidoEnVentanaModal(pathContenidoVentanaModal){ //Tener en cuenta que en el path se pueden pasar parametros GET 
	var elemento = document.getElementById(idContenidoVentanaModal);
	var conexion;
	
	abrirVentanaModal();
	
	if(window.XMLHttpRequest){
		conexion = new XMLHttpRequest();
	} else {
		conexion = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	conexion.onreadystatechange = function(){
		if(conexion.readyState == 4 && conexion.status == 200){ //conexion.readyState == 4 es "esta todo preparado (READY/STANDBY)", y conexion.status == 200 es "todo OK"
			elemento.innerHTML = conexion.responseText;
		}
	}
	conexion.open("GET",pathContenidoVentanaModal, true);
	//el ultimo true es para seleccionar el modo asincronico de ajax
	conexion.send();
}