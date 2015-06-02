	event = event || window.event;
	var longitudNomYApeMaxima = 32;
	var longitudContraseniaMaxima = 32;
	var longitudContraseniaMinima = 8; 
	
function validarFormLogin(idCuenta,idContrasenia,idMsjErrorProblemaUsua,idMsjErrorProblemaContras){
	var esCorrecto = true;
	var cuenta = document.getElementById(idCuenta).value;
	var contrasenia = document.getElementById(idContrasenia).value;
	
	if(cuenta == ""){
		esCorrecto = false;
		document.getElementById(idMsjErrorProblemaContras).style.display="none";
		document.getElementById(idMsjErrorProblemaUsua).style.display="block";
	}
	if ((contrasenia == "") && (esCorrecto == true)){
		esCorrecto = false;
		document.getElementById(idMsjErrorProblemaUsua).style.display="none";
		document.getElementById(idMsjErrorProblemaContras).style.display="block";
	}
}

function cerrarVentanaModal(){
	for(i = 0; i < arguments.length; i++){
		document.getElementById(arguments[i]).style.display="none";	
	}
}

function abrirVentanaModal(){
	for(i = 0; i < arguments.length; i++){
		document.getElementById(arguments[i]).style.display="block";
	}
}

