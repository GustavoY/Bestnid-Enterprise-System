<?php
	class Usuario
	{
		private $conexion;
		public function __construct()
		{
			require_once('Conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function identificar($email,$password)
		{
			$sql = " SELECT * FROM usuario WHERE email='$email' && contrasenia='$password'";
			$resul = $this->conexion->conexion->query($sql);
			if ($resul->num_rows > 0) 
			{
				$r= $resul->fetch_array();
			}
			else
			{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();
		}
	}
?>