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
		<?php require_once("genera_cabecera.php"); ?>
		
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
		require_once('consulta.php');
		require_once('filtrado_entrada.php');

		// COMPROBACIONES DE SEGURIDAD
		array_walk($_REQUEST, 'limpiarCadena');	

		$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["name"])));
		$usuario = htmlspecialchars(trim(strip_tags($_REQUEST["user"])));
		$edad = htmlspecialchars(trim(strip_tags($_REQUEST["age"])));
		$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
		$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
		$confirm_password = htmlspecialchars(trim(strip_tags($_REQUEST["confirm_password"])));
		
		$password_hased = password_hash($password, PASSWORD_DEFAULT);

		if(empty($nombre) || empty($usuario) || empty($edad) || empty($email) || empty($password) || empty($confirm_password) ||
	   	   !preg_match('/^[^@\s]+@([a-z0-9]+\.)+[a-z]{2,}$/i', $email) ||
	   	   !is_numeric($edad) ||
	   	   strlen($password) < 8 ||
	   	   $password != $confirm_password) {
			echo "<p>Se ha producido un error al enviar los datos del formulario.</p>";
			echo "<a href='../../registro.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
		}
		else {
			// Comprobar si el usuario ya está registrado en la BD.
			$query = "SELECT * FROM usuarios WHERE usuario LIKE '$usuario'";
			$resultado = consulta($query);

			if($resultado->num_rows != 0) {
				echo "<p>El nombre de usuario ya existe. Prueba con otro.</p>";
				echo "<a href='../../registro.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
			}
			else {
				// Comprobar si el email ya está registrado en la BD.
				$query = "SELECT * FROM usuarios WHERE email LIKE '$email'";
				$resultado = consulta($query);
				if($resultado->num_rows != 0) {
					echo "<p>El email introducido ya está registrado. Prueba con otro.</p>";
					echo "<a href='../../registro.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
				}
				else {
					// Registrar el nuevo usuario en la BD.
					$query = "INSERT INTO usuarios (usuario, nombre, email, pass, edad) VALUES ('$usuario', '$nombre', '$email', '$password_hased', '$edad')";
					consulta($query);
					session_start();
					$_SESSION['name'] = $nombre;
					header('Location: ../../index.php');
				}
			}
		}
	}
?>
