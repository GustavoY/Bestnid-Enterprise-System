
const arregloDeLetras = [' ','a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','á','é','í','ó','ú','Á','É','Í','Ó','Ú','à','è','ì','ò','ù','À','È','Ì','Ò','Ù','ü','ö','Ü','Ö']; 
const arregloDeNumeros = ['0','1','2','3','4','5','6','7','8','9']; // \u00f1
const arregloSignos = ['!','"','#','$','%','&','/','(',')','=',',','|'];

const longitudMaxima = [31,31,31,20,20,16,16];
const longitudContraseniaMinima = 8;

var caracterQueFalla;

var inputCorrecto = [false,false,false,false,false,false,false];

function incluye(conjunto, elemento){
	var i=0;
	var coincide = false;
	
	while((i < conjunto.length) && !coincide){
		if(elemento == conjunto[i]){
			coincide = true;
		}
		i++;
	}
	// alert(arregloDeLetras[15]);
	// if(!coincide){ //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@qqqqqq ESTO SE AGREGO PARA PRUEBA NO MAS
	// 	alert ("fallo la comprobacion de: "+conjunto[i-1]+" con: "+elemento);
	// }
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
					if(((caracterActual == '.') && (caracterAnterior == '.')) ||
					 ((caracterActual == '.') && (arrobaDetectado == false)) || 
					 ((arrobaDetectado == true) && (incluye(arregloSignos,caracterActual))) 
					 ||  ((arrobaDetectado == true) && (incluye(arregloDeNumeros,caracterActual))) ||
					 ((arrobaDetectado == true) && (caracterActual == '.') &&(caracterAnterior == '@'))){
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

function comprobarElementoInterno(inputName, msjErrorName, tipoElemento, indiceInput){
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
		case "telFijo":
			strEsValido = (cumplePatron(cadena,arregloDeNumeros) && !superaLongitudMaxima);
			break;
		case "telMovil":
			strEsValido = (cumplePatron(cadena,arregloDeNumeros) && !superaLongitudMaxima);	
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
				case"telFijo":
					msjError.innerHTML="Hay caracteres no v&aacute;lidos. Solo se permiten numeros.";
					break;
				case"telMovil":
					msjError.innerHTML="Hay caracteres no v&aacute;lidos. Solo se permiten numeros.";
					break;

			}
		}	
	}	
}

//function comprobarCodigoPostal(idInput, idMsjError, indice)

/*	var inputRadio = document.getElementsByName(inputRadioName);
	var msjErrorRadio = document.getElementsByName(msjErrorRadioName);
	var masculino = inputRadio[0];
	var femenino = inputRadio[1];
	
	if((masculino.checked == true) || (femenino.checked == true)){
		msjErrorRadio[0].innerHTML="";
		inputCorrecto[4] = true; 
	} else {
		inputCorrecto[3] = false;
	}
}*/

function comprobarContrasenia(inputName, msjErrorName, indiceInput){
	var inputs = document.getElementsByName(inputName);
	var input = inputs[indiceInput];
	var cadena = input.value;
	var msjError = document.getElementsByName(msjErrorName)[indiceInput];
	var longitudCad = cadena.length;
	var superaLongitudMaxima = (longitudCad > longitudMaxima[indiceInput]);
	var strEsValido;

	if(longitudCad < longitudContraseniaMinima){
		if(longitudCad == 0){
			msjError.innerHTML="";
			inputCorrecto[indiceInput] = true;
		} else {
			msjError.innerHTML="La longitud de la contrase&ntilde;a debe ser de al menos " + longitudContraseniaMinima+" caracteres.";
			inputCorrecto[indiceInput] = false;
		}	
	} else {
		if(longitudCad > longitudMaxima[indiceInput]){
			msjError.innerHTML="La longitud de la contrase&ntilde;a supera el m&aacute;ximo permitido ("+longitudMaxima[indiceInput]+" caracteres).";
			inputCorrecto[indiceInput] = false;
		} else {
			msjError.innerHTML="";
			inputCorrecto[indiceInput] = true;
		}
	}	
}

function comprobarReinsercionDeContrasenia(inputName, msjErrorName, indiceContrasInput, indiceReinsercionContrasInput){
	var inputs = document.getElementsByName(inputName);
	var inputContras = inputs[indiceContrasInput];
	var inputContrasenia = inputs[indiceContrasInput];
	var inputReinsercionContrasenia = inputs[indiceReinsercionContrasInput];
	var strA = inputContrasenia.value;
	var strB = inputReinsercionContrasenia.value;
	var msjError = document.getElementsByName(msjErrorName)[indiceReinsercionContrasInput];
	var longitudStrA = strA.length;
	var longitudStrB = strB.length;
	var strIguales = (strA == strB);
	
	if(longitudStrB == 0){
		msjError.innerHTML="";
	} else {
		if(strIguales){
			msjError.innerHTML="";
			inputCorrecto[indiceReinsercionContrasInput] = true;
		} else {
			msjError.innerHTML="La repetici&oacute;n de la contrase&ntilde;a no coincide.";
			inputCorrecto[indiceReinsercionContrasInput] = false;
		}
	}
} 

	function comprobarFormulario(inputName,msjErrorName){ //son arrays.

		var input = document.getElementsByName(inputName);
		var msjError = document.getElementsByName(msjErrorName);
		var inputNombre =$("#nombre").val();
		var inputApellido =$("#apellido").val();
		var inputEmail = $("#email").val();
		var inputContrasenia = $("#contrasenia").val();
		var inputContraseniaR = $("#contraseniaReescrita").val();
		var inputTelFijo =$("#telFijo").val();
		var inputTelMovil = $("#telMovil").val();

		var formularioCorrecto = true;
		var j=0;
		//alert(inputCorrecto.toString());

		for(var i=0; i < input.length; i++){
			if((input[i].value.length == 0) && (input[i] != input[3])){
				msjError[i].innerHTML="Esta informacion es obligatoria.";
				formularioCorrecto = false;
			}
		}
		
		while((formularioCorrecto == true) && (j < inputCorrecto.length)){
			if(inputCorrecto[i] == false){
				formularioCorrecto = false;
			}
			j++;
		}

		if(formularioCorrecto){
						$.ajax({
					url: "scripts/scriptsPhp/formularioDeRegistro.php",
					type: "POST",
					//async: false,
					data:{	
						nombre : inputNombre,
						apellido : inputApellido,
						email : inputEmail,
						telFijo : inputTelFijo,
						telMovil : inputTelMovil,
						contrasenia : inputContrasenia,
						contraseniaR : inputContraseniaR
					},
					success: function(data){
						alert(data);
						if(data == 0){
							alert("error no se guardo con exito");
						}
						else{
							
							alert("se guardo con exito");
						}
					}
				});
		}
			
	}
	 
	

function comprobarElemento(inputName,msjErrorName,tipoElemento,indiceInput){
	switch(tipoElemento){
		case "nombre":
			comprobarElementoInterno(inputName,msjErrorName,tipoElemento,indiceInput);
			break;
		case "apellido":
			comprobarElementoInterno(inputName,msjErrorName,tipoElemento,indiceInput);
		break;
		case "email":
			comprobarElementoInterno(inputName,msjErrorName,tipoElemento,indiceInput);
		break;
		case "telFijo":
			comprobarElementoInterno(inputName,msjErrorName,tipoElemento,indiceInput);
		break;
		case "telMovil":
			comprobarElementoInterno(inputName,msjErrorName,tipoElemento,indiceInput);
		break;
		case "contrasenia":
			comprobarContrasenia(inputName,msjErrorName,indiceInput);
		break;
		case "contraseniaReescrita":
			comprobarReinsercionDeContrasenia(inputName,msjErrorName,indiceInput-1,indiceInput);
		break;
	}
}
