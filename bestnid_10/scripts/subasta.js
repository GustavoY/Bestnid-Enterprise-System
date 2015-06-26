

var indiceImagenActual = 0; 
var IdImagenes;

function eliminarRedundancia(idImagenesConRedundancia){
	/*se repite la imagen principal pero la redundancia se quita en esta funcion.
	La redundancia esta por que se debe conocer de antemano la imagen principal, ya que siempre debe ser la primera en mostrarse en la lista no importa el
	orden en el que venga de la consulta. por eso se la pasa como primer parametro al JS*/
	
	var idImagenPrincipal = idImagenesConRedundancia[0];
	var nuevoArreglo =[]; //si no se declara como arreglo da error al utilizarlo despues.
	var indiceNuevoArreglo = 0;
	
	if(idImagenesConRedundancia.length > 1){
		nuevoArreglo[indiceNuevoArreglo] = idImagenPrincipal;
		indiceNuevoArreglo++;
		for(i=1; i<idImagenesConRedundancia.length; i++){ 
			if(idImagenPrincipal != idImagenesConRedundancia[i]){
				nuevoArreglo[indiceNuevoArreglo] = idImagenesConRedundancia[i];
				indiceNuevoArreglo++;
			}
		}
	} 
	return nuevoArreglo;
}

function insertarImagen(){
	var elemento = document.getElementById('imagenDeSubasta');
	elemento.innerHTML = "<img src=\"imagenesProductos/"+idImagenes[indiceImagenActual]+".jpg\">";
}

function actualizarIndiceDeLaImagen(indice){
	var elemento = document.getElementById('indiceImagen');
	elemento.innerHTML = indice;
}

function imagenAnterior(){ //Se pasa por parametro los id de todas las imagenes de una subasta determinada
	idImagenes = eliminarRedundancia(arguments);
	var cantImagenes = idImagenes.length; 
	
	if(indiceImagenActual > 0){
		indiceImagenActual--;
		insertarImagen();
		actualizarIndiceDeLaImagen(indiceImagenActual+1); //es +1 por que externamente en la pagina las imagenes van de (1 a n), no de (0 a n-1)
	}
}

function imagenSiguiente(){ //Se pasa por parametro los id de todas las imagenes de una subasta determinada
	idImagenes = eliminarRedundancia(arguments);
	var cantImagenes = idImagenes.length; 
	
	if(indiceImagenActual < cantImagenes -1){
		indiceImagenActual++;
		insertarImagen();
		actualizarIndiceDeLaImagen(indiceImagenActual+1); //es +1 por que externamente en la pagina las imagenes van de (1 a n), no de (0 a n-1)
	}
}