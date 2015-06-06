const rutaScriptPhp = "scripts/scriptsPhp/reImprimirArticulos.php";


function reImprimirArticulos(criterioDeBusqueda, discriminante, criterioDeOrden, idElementoHtml){
	var patronOExacto;

	if(criterioDeBusqueda == "titulo"){ //ya que si se busca por titulo no se le pasa nada al parametro 
										//discriminante porque el discriminante en si esta todavia en el input del form.
		discriminante = document.getElementById("inputSearch").value;
		patronOExacto = "patron";
	} else {
		patronOExacto = "exacto";
	}
	
	var conexion;
//	alert("esto se ejecuta");
	
	if(window.XMLHttpRequest){
		conexion = new XMLHttpRequest();
	} else {
		conexion = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	conexion.onreadystatechange = function(){
		if(conexion.readyState == 4 && conexion.status == 200){ //conexion.readyState == 4 es "esta todo preparado (READY/STANDBY)", y conexion.status == 200 es "todo OK"
			document.getElementById(idElementoHtml).innerHTML = conexion.responseText;
		}
	}
	
	conexion.open("GET",rutaScriptPhp+"?critBusq="+criterioDeBusqueda+"&discrim="+discriminante+"&critOrd="+criterioDeOrden+"&patrOExact="+patronOExacto, true); //el ultimo true es para seleccionar el modo asincronico de ajax
	conexion.send();
}