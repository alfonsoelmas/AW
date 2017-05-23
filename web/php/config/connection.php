<?php
	function conectar()
	{
		//Acceso a BD

		/*$servername = "mysql.hostinger.es";
		$username = "u285194728_aw";
		$password = "123456";
		$nombreBD = "u285194728_aw";*/

		$servername = "localhost";
		$username = "root";
		$password = "";
		$nombreBD = "aw"; 


		//Hay que usar los métodos OO
		$conn = new mysqli($servername, $username, $password, $nombreBD);
		//$conn = mysqli_connect($servername, $username, $password ,$nombreBD);

		if (!$conn) {
			die("Conexión con la BBDD fallida. " . mysqli_connect_error());
		} 

		return $conn;	
	}

	function realiza_consulta($conn, $query)
	{
		$resultado = $conn->query($query);
		if(!$resultado)
			printf("Error %s\\n",$conn->error());

		return $resultado;
	}

	function cerrar_conexion($conn){
		$conn->close();
	}
?>
