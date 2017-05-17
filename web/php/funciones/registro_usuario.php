<?php
// Registro de un usuario en la BD.
	session_start();
	include('../config/connection.php');
	include('../config/filtrado.php');

	// COMPROBACIONES DE SEGURIDAD
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["name"])));
	filtrar($nombre);
	$usuario = htmlspecialchars(trim(strip_tags($_REQUEST["user"])));
	filtrar($user);
	$edad = htmlspecialchars(trim(strip_tags($_REQUEST["age"])));
	filtrar($age);
	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	filtrar($email);
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
	filtrar($password);
	$confirm_password = htmlspecialchars(trim(strip_tags($_REQUEST["confirm_password"])));
	filtrar($confirm_password);
	
	if(empty($nombre) || empty($usuario) || empty($edad) || empty($email) || empty($password) || empty($confirm_password) ||
	   !preg_match('/^[^@\s]+@([a-z0-9]+\.)+[a-z]{2,}$/i', $email) ||
	   !is_numeric($age) ||
	   strlen($password) < 8 ||
	   $password != $confirm_password) {
		echo "<p>Se ha producido un error al enviar los datos del formulario.</p>";
		// OTRAS COSAS QUE SE DEBAN HACER.
	}
	else {
		// Comprobar si el usuario ya está registrado en la BD.
		$query = "SELECT * FROM usuarios WHERE usuario LIKE '$usuario'";
		$resultado = realiza_consulta($mysqli, $query);

		if($resultado->num_rows != 0) {
			echo "<p>El nombre de usuario ya existe. Prueba con otro.</p>";
			// OTRAS COSAS QUE SE DEBAN HACER.
		}
		else {
			// Comprobar si el email ya está registrado en la BD.
			$query = "SELECT * FROM usuarios WHERE email LIKE '$email'";
			$resultado = realiza_consulta($mysqli, $query);
			if($resultado->num_rows != 0) {
				echo "<p>El email introducido ya está registrado. Prueba con otro.</p>";
				// OTRAS COSAS QUE SE DEBAN HACER.
			}
			else {
				// Registrar el nuevo usuario en la BD.
				$query = "INSERT INTO usuarios (usuario, nombre, email, pass, edad) VALUES ('$usuario', '$nombre', '$email', '$password', '$edad')";
				realiza_consulta($mysqli, $query);
				echo "<p>¡Te has registrado correctamente!";
				// OTRAS COSAS QUE SE DEBAN HACER. Por ejemplo...
				//header("Location:../../index.html"); Para ir a index.html
				//echo "<button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='logInButton'>Iniciar sesión</button>";
			}
		}
	}

	$mysqli->close();
?>