const rutaScriptPhp = "scripts/scriptsPhp/reImprimirArticulos.php";

function reImprimirArticulos(columnas, tabla, criterioDeBusqueda, discriminante, criterioDeOrden, patronOExacto, condWhereAdicionales, idElementoHtml){
	var patronOExacto;
	
	if(criterioDeBusqueda == "titulo"){ //ya que si se busca por titulo no se le pasa nada al parametro 
										//discriminante porque el discriminante en si esta todavia en el input del form.
		discriminante = document.getElementById("inputSearch").value;
	}
	var checkBoxElem = document.getElementById("checkboxOrden");
	
	if(checkBoxElem.checked){
		criterioDeOrden = "titulo";
	} else {
		criterioDeOrden = "";
	}
	reImprimir(columnas, tabla, criterioDeBusqueda, discriminante, criterioDeOrden, patronOExacto, condWhereAdicionales, idElementoHtml, "imprimirArticulos.php");
}

function reImprimir(columnas, tabla, criterioDeBusqueda, discriminante, criterioDeOrden, patronOExacto, condWhereAdicionales, idElementoHtml, pathPhpConsumidor){
	//NO MODIFICAR, ES CRITICO.
	var conexion;
	
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
	conexion.open("GET",rutaScriptPhp+"?columnas="+columnas+"&tabla="+tabla+"&critBusq="+criterioDeBusqueda+"&discrim="+discriminante+"&critOrd="+criterioDeOrden+"&patrOExact="+patronOExacto+"&condWhereAd="+condWhereAdicionales+"&pathConsumidor="+pathPhpConsumidor, true);
	//el ultimo true es para seleccionar el modo asincronico de ajax
<<<<<<< HEAD
=======
	conexion.send();
}

function imprimirOfertas(columna1, columna2, tabla1, tabla2, condWhereAdicionales, idElementoHtml, pathPhpConsumidor){
	var conexion;
	rutaScript="scripts/scriptsPhp/imprimirOfertas.php";
	// columna1= columna1.split(" ");
	// columna2= columna2.split(" ");
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
	conexion.open("GET",rutaScript+"?columna1="+columna1+"&columna2="+columna2+"&tabla1="+tabla1+"&tabla2="+tabla2+"&condWhereAd="+condWhereAdicionales+"&pathConsumidor="+pathPhpConsumidor, true);
	//el ultimo true es para seleccionar el modo asincronico de ajax
>>>>>>> origin/ramaMiguel
	conexion.send();
}
