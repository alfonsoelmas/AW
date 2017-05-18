<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro - Paper Dreams</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/estilo2.css">
		<link rel="stylesheet" href="../../css/login.css">
	</head>
	<body>
		<?php include("genera_cabecera.php"); ?>
		
		<div class="container-fluid text-center">    
			<div class="row content">
				<div class="col-sm-3"></div> 
				<div class="col-sm-6 text-left">
					<div class="panel panel-default" id="logPanel">
						<div class="panel-heading">
							<p class="h3 panel-title">Crear una cuenta nueva</p>
						</div>
						<div class="panel-body">
							<div class="col-sm-6 text-center content">
								<?php registra_usuario(); ?>
							</div>
							<div class="col-sm-6 text-center content">
								<div id="inicio_sesion">
									<span>O si ya tienes una cuenta: </span>
									<div class="row margin-normal">   
										<button class="btn btn-default dropdown-toggle engordar redondear" type="button" id="logInButton">Iniciar sesión</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>

		<?php include("genera_pie.php"); ?>

		<!--Scripts-->
  		<script type="text/javascript" src="../../js/goTo.js"></script>
	</body>
</html>

<?php
	// Registro de un usuario en la BD.
	function registra_usuario() {
		session_start();
		include('../config/connection.php');
		include('../config/filtrado.php');

		// COMPROBACIONES DE SEGURIDAD
		$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["name"])));
		filtrar($nombre);
		$usuario = htmlspecialchars(trim(strip_tags($_REQUEST["user"])));
		filtrar($usuario);
		$edad = htmlspecialchars(trim(strip_tags($_REQUEST["age"])));
		filtrar($edad);
		$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
		filtrar($email);
		$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
		filtrar($password);
		$confirm_password = htmlspecialchars(trim(strip_tags($_REQUEST["confirm_password"])));
		filtrar($confirm_password);
		$mysqli = conectar();
	
		if(empty($nombre) || empty($usuario) || empty($edad) || empty($email) || empty($password) || empty($confirm_password) ||
	   	   !preg_match('/^[^@\s]+@([a-z0-9]+\.)+[a-z]{2,}$/i', $email) ||
	   	   !is_numeric($edad) ||
	   	   strlen($password) < 8 ||
	   	   $password != $confirm_password) {
			echo "<p>Se ha producido un error al enviar los datos del formulario.</p>";
			echo "<button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='registerButton'>Volver al formulario de registro</button>";
		}
		else {
			// Comprobar si el usuario ya está registrado en la BD.
			$query = "SELECT * FROM usuarios WHERE usuario LIKE '$usuario'";
			$resultado = realiza_consulta($mysqli, $query);

			if($resultado->num_rows != 0) {
				echo "<p>El nombre de usuario ya existe. Prueba con otro.</p>";
				echo "<button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='registerButton'>Volver al formulario de registro</button>";
			}
			else {
				// Comprobar si el email ya está registrado en la BD.
				$query = "SELECT * FROM usuarios WHERE email LIKE '$email'";
				$resultado = realiza_consulta($mysqli, $query);
				if($resultado->num_rows != 0) {
					echo "<p>El email introducido ya está registrado. Prueba con otro.</p>";
					echo "<button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='registerButton'>Volver al formulario de registro</button>";
				}
				else {
					// Registrar el nuevo usuario en la BD.
					$query = "INSERT INTO usuarios (usuario, nombre, email, pass, edad) VALUES ('$usuario', '$nombre', '$email', '$password', '$edad')";
					realiza_consulta($mysqli, $query);
					echo "<p>¡Te has registrado correctamente!";
				}
			}
		}

		cerrar_conexion($mysqli);
	}
?>