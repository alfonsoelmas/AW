<?php

//Acceso a BD
$servername = "localhost"; 	//Como sea
$username = "root";		//Como sea
$password = "";		//Como sea
$nombreBD = "aw";

$conn = mysqli_connect($servername, $username, $password ,$nombreBD);

if (!$conn) {
	die("Conexión con la BBDD fallida. " . mysqli_connect_error());
} 



function cerrar_conexion(){
	mysqli_close($conn);
}

?>
