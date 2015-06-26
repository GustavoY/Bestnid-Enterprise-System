<?php
	$root = $_SERVER['DOCUMENT_ROOT']; //deberia imprimir C:/xampp/htdocs  a no ser que se cambie la ruta del servidor
	include_once ('../../phpClases/Usuario.php');
	$boton=$_POST['boton'];
	
	if ($boton=='cerrar'){
		session_start();
		session_destroy();	
	}
	else{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$ins=new usuario();
		$array=$ins->identificar($email,$password);

		if ($array[0]==0){
			echo '0';
		} else {
			session_start();
			$_SESSION['ingreso']='SI';
			$_SESSION['nombre']=$array[2];
			$_SESSION['id']=$array[0];
			$_SESSION['tipoDeUsuario']=$array[7];
		}
	}
?>