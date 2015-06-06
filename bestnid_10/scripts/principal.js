function iniciarSesion(){
	var email = $("#email").val();
	var password = $("#password").val();
	$.ajax({
		url:'../bestnid/scripts/scriptsPhp/usuarioIniciarSesion.php',
		type:'POST',
		data:{email:email,password:password,boton:'ingresar'}
	}).done(function(resp){
		if (resp=='0') 
		{
			$('#error').show();
			alert("Password o Email incorrectos");
		}
		else
		{   
			$('#logout').show();
			$('#login').hide();
			$('#on').show();
			$('#registrarse').hide();
		}
	});
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