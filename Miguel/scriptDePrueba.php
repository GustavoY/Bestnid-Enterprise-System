<?php
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "bestnid";
	
	// Create connection
	$connection = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	 if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		echo "Connected successfully";
	}
		
	function bdd_obtener_articulos(){
		$query = "SELECT titulo, idImagenPrincipal FROM Subasta";
		$result = mysqli_query($GLOBALS['connection'], $query);	
		$cantFilas = mysqli_num_rows($result);
		$articulos = array("titulo" => array(),
						  ("idImagen") => array()
						  );
		
		if ($cantFilas > 0) {
		// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$articulos["titulo"][] = $row["titulo"];
				$articulos["idImagenPrincipal"][] =	$row["idImagenPrincipal"];
			}
		} else {
			echo "0 results";
		}		
		return $articulos;
	}
	
	$arts = bdd_obtener_articulos();
	
	//Asi se accede al arreglo $arts que devuelve la funcion con las tuplas del resultado de la consulta.
	echo "<br><br>";
	for($fila=0; $fila < count($arts["titulo"]); $fila++){
		echo ($arts["titulo"][$fila]."<br>");
		echo ($arts["idImagenPrincipal"][$fila]."<br>");
	}
	
	mysqli_close($connection); 
?>