
function iniciarSesion(){
	var email = $("#email").val();
	var password = $("#password").val();
	if (email == '' || password== '') {
		$('#error-empty').show();
		$('#error').hide();
	}
	else{
		$.ajax({
			url:'../bestnid/scripts/scriptsPhp/usuarioIniciarSesion.php',
			type:'POST',
			data:{email:email,password:password,boton:'ingresar'}
		}).done(function(resp){
			if (resp=='0') 
			{
				$('#error').show();
				$('#error-empty').hide();
			}
			else
			{   
				$('#logout').show();
				$('#login').hide();
				$('#on').show();
				$('#registrarse').hide();
				cerrarVentanaModal('ventanaContenedor','contenidoVentanaLogin','modal')

			}
		});
	}
}

function cerrar(){
	$.ajax({
		url:'scripts/scriptsPhp/usuarioIniciarSesion.php',
		type:'POST',
		data:{boton:'cerrar'}
	}).done(function(resp){
		location.href = 'principal.php'
	});
}