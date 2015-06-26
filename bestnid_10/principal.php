<?php 
	session_start();
	include("principalOficial.php");
	if (isset($_SESSION['ingreso'])) {
	?>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<script>
					$('#logout').show();
                	$('#login').hide();
                	$('#on').show();
                	$('#registrarse').hide();
             </script>
		</body>
		</html>
	<?php 
	}
	else
	{
		
	}
	 ?>