<?php

//Acceso a BD
$servername = "localhost"; 	//Como sea
$username = "username";		//Como sea
$password = "password";		//Como sea

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 

echo "Connected successfully";

?>
