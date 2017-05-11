//Acceso a BD

<?php

//Acceso a BD
$servername = "localhost"; 	//Como sea
$username = "username";		//Como sea
$password = "password";		//Como sea
$BD = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

?>