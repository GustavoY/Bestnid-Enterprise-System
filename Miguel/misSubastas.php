<?php 
	
	include("conection.php");
	$con=bdconnection();
	$query= "SELECT * FROM `bestnid`.`subasta`";
	$result= mysql_query($query);
	//$rows= mysql_fetch_row($result);
	echo"<br>";
	if(mysql_num_rows($result) > 0){
		echo "<table >";
		while(($rows = mysql_fetch_array($result))!= null){
			echo "<tr>";
			echo "<td>".$rows[0]."</td>";//EN CADA CELDA SE COLOCA EL CONTENIDO DE rows
			echo "<td>".$rows[1]."</td>";
			echo "<td>".$rows[2]."</td>";
			echo "<td>".$rows[3]."</td>";
			echo "</tr>";
		}
		echo"<table/>";
	}






 ?>