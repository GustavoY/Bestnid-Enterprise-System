const arregloDeLetras = [' ','a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','á','é','í','ó','ú','Á','É','Í','Ó','Ú','à','è','ì','ò','ù','À','È','Ì','Ò','Ù','ü','ö','Ü','Ö']; 
const arregloDeNumeros = ['0','1','2','3','4','5','6','7','8','9'];

event = event || window.event;
const longitudMaxima = [31,31,31,8,15,15];
const longitudContraseniaMinima = 8;

var inputCorrecto = [false,false,false,false,false,false,false,false];

function incluye(conjunto, elemento){
	var i=0;
	var coincide = false;
	
	while((i < conjunto.length) && !coincide){
		if(elemento == conjunto[i]){
			coincide = true;
		}
		i++;
	}
	return coincide;
}
	
function cumplePatron(str,conjunto){
	var strEsCorrecto = true;
	var coincide;
	var i=0;
	while((i < str.length) && strEsCorrecto){
		strEsCorrecto = incluye(conjunto,str.charAt(i));
		i++;
	}
	return strEsCorrecto;
}

function cumplePatronParaEmail(cadena){
	var cumple = true;
	var arrobaDetectado = false;
	var caracterAnterior = "";
	var caracterActual = "";
	var i = 0;
	
	if(cadena.length > 0){
		if(cadena.charAt(0) == '@'){
			cumple = false;
		} else {
			while(cumple && (i < cadena.length)){
				caracterActual = cadena.charAt(i);
				if(caracterActual == "@"){
					if(arrobaDetectado == true){
						cumple = false;
					} else {
						arrobaDetectado = true;
					}
				} else {
					if(((caracterActual == '.') && (caracterAnterior == '.')) || ((caracterActual == '.') && (arrobaDetectado == false))){
						cumple = false;
					}
				}
				caracterAnterior = caracterActual;
				i++;
			}
			if(!arrobaDetectado){
				cumple = false;
			} else {
				if(caracterActual == '@'){
					cumple = false;
				}
			}
		}
	} else {
		cumple = true;
	}
	return cumple;
}

function comprobarElemento(inputName, msjErrorName, tipoElemento, indiceInput){
	var inputs = document.getElementsByName(inputName);
	var input = inputs[indiceInput];
	var cadena = input.value;
	var msjError = document.getElementsByName(msjErrorName)[indiceInput];
	var longitudCad = cadena.length;
	var superaLongitudMaxima = (longitudCad > longitudMaxima[indiceInput]);
	var strEsValido;
	
	switch(tipoElemento){
		case "nombre":
			strEsValido = (cumplePatron(cadena,arregloDeLetras) && !superaLongitudMaxima);
			break;
		case "apellido":
			strEsValido = (cumplePatron(cadena,arregloDeLetras) && !superaLongitudMaxima);
			break;
		case "email":
			strEsValido = (cumplePatronParaEmail(cadena) && !superaLongitudMaxima);
			break;
		case "codigoPostal":
			strEsValido = (cumplePatron(cadena,arregloDeNumeros) && !superaLongitudMaxima);
			break;
	} 
	
	if(strEsValido){
		msjError.innerHTML="";
		input.style.backgroundColor="#FFF";
		inputCorrecto[indiceInput] = true;
	} else {
		input.style.backgroundColor="#FFE4E4";		
		inputCorrecto[indiceInput] = false;
		if(superaLongitudMaxima){
			msjError.innerHTML="La longitud del " + tipoElemento + " supera el m&aacute;ximo permitido ("+longitudMaxima[indiceInput]+" caracteres).";
		} else {
			switch(tipoElemento){
				case "nombre":
					msjError.innerHTML="Hay caracteres no v&aacute;lidos. Solo se permiten letras y espacios.";
					break;
				case "apellido":
					msjError.innerHTML="Hay caracteres no v&aacute;lidos. Solo se permiten letras y espacios.";
					break;
				case "email":
					msjError.innerHTML="Email inv&aacute;lido, revise su sintaxis.";
					break;
				case "codigoPostal":
					msjError.innerHTML="Hay caracteres no v&aacute;lidos. Solo se permiten n&uacute;meros.";
			}
		}	
	}	
}

//function comprobarCodigoPostal(idInput, idMsjError, indice)

function comprobarSexo(inputRadioName, msjErrorRadioName){
	var inputRadio = document.getElementsByName(inputRadioName);
	var msjErrorRadio = document.getElementsByName(msjErrorRadioName);
	var masculino = inputRadio[0];
	var femenino = inputRadio[1];
	
	if((masculino.checked == true) || (femenino.checked == true)){
		msjErrorRadio[0].innerHTML="";
		inputCorrecto[4] = true; 
	} else {
		inputCorrecto[3] = false;
	}
}

function comprobarContrasenia(idInput, idMsjError, indiceInput){
	var cadena = document.getElementById(idInput).value;
	var longitudCad = cadena.length;
	if(longitudCad < longitudContraseniaMinima){
		if(longitudCad == 0){
			document.getElementById(idMsjError).innerHTML="";
			inputCorrecto[indiceInput] = true;
		} else {
			document.getElementById(idMsjError).innerHTML="La longitud de la contrase&ntilde;a debe ser de al menos " + longitudContraseniaMinima+" caracteres.";
			inputCorrecto[indiceInput] = false;
		}	
	} else {
		if(longitudCad > longitudMaxima[indiceInput]){
			document.getElementById(idMsjError).innerHTML="La longitud de la contrase&ntilde;a supera el m&aacute;ximo permitido ("+longitudMaxima[indiceInput]+" caracteres).";
			inputCorrecto[indiceInput] = false;
		} else {
			document.getElementById(idMsjError).innerHTML="";
			inputCorrecto[indiceInput] = true;
		}
	}	
}

function comprobarReinsercionDeContrasenia(idInputPrimeroContrasenia, idInputReinsercionContrasenia, idMsjError, indiceInput){
	var strA = document.getElementById(idInputPrimeroContrasenia).value;
	var strB = document.getElementById(idInputReinsercionContrasenia).value;
	var longitudStrA = strA.length;
	var longitudStrB = strB.length;
	var strIguales = (strA == strB);
	
	if(longitudStrB == 0){
		document.getElementById(idMsjError).innerHTML="";
	} else {
		if(strIguales){
			document.getElementById(idMsjError).innerHTML="";
			inputCorrecto[indiceInput] = true;
		} else {
			document.getElementById(idMsjError).innerHTML="La repetici&oacute;n de la contrase&ntilde;a no coincide.";
			inputCorrecto[indiceInput] = false;
		}
	}
} 

function comprobarFormulario(inputName,msjErrorName,radioName,msjErrorRadioName){ //son arrays.
	var input = document.getElementsByName(inputName);
	var msjError = document.getElementsByName(msjErrorName);
	var radio = document.getElementsByName(radioName);
	var msjErrorRadio = document.getElementsByName(msjErrorRadioName);
	var formularioCorrecto = true;
	var j=0;
	
	for(var i=0; i < input.length; i++){
		if(input[i].value.length == 0){
			msjError[i].innerHTML="Esta informacion es obligatoria.";
			formularioCorrecto = false;
		}
	}
	
	if((radio[0].checked == false) && (radio[1].checked == false)){ 	
		msjErrorRadio[0].innerHTML="Esta informacion es obligatoria.";
		formularioCorrecto = false;
	}
	
	while((formularioCorrecto == true) && (j < inputCorrecto.length)){
		if(inputCorrecto[i] == false){
			formularioCorrecto = false;
		}
		j++;
	}
}

