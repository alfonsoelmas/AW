<?php
	require_once('consulta.php');
	require_once('filtrado_entrada.php');

	registra_usuario();
	
	// Registro de un usuario en la BD.
	function registra_usuario() {

		// COMPROBACIONES DE SEGURIDAD
		array_walk($_REQUEST, 'limpiarCadena');	

		$nombre   = htmlspecialchars(trim(strip_tags($_REQUEST["name"])));
		$usuario  = htmlspecialchars(trim(strip_tags($_REQUEST["user"])));
		$edad     = htmlspecialchars(trim(strip_tags($_REQUEST["age"])));
		$ciudad   = htmlspecialchars(trim(strip_tags($_REQUEST["ciudad"])));
		$pais     = htmlspecialchars(trim(strip_tags($_REQUEST["pais"])));
		$desc     = htmlspecialchars(trim(strip_tags($_REQUEST["desc"])));
		$email    = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
		$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
		$confirm_password = htmlspecialchars(trim(strip_tags($_REQUEST["confirm_password"])));
		
		// HASH
		$password_hased = password_hash($password, PASSWORD_DEFAULT);


		if(empty($nombre) || empty($usuario) || empty($edad) || empty($email) || empty($password) || empty($confirm_password) || empty($ciudad) || empty($pais) ||
	   	   !preg_match('/^[^@\s]+@([a-z0-9]+\.)+[a-z]{2,}$/i', $email) ||
	   	   !is_numeric($edad) ||
	   	   strlen($password) < 8 ||
	   	   $password != $confirm_password) {
			echo "<p> Se ha producido un error al enviar los datos del formulario.</p>";
			echo "<a href='../../registro.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
		}
		else {
			// Comprobar si el usuario ya está registrado en la BD.
			$resultado = existe_usuario($usuario);	

			if($resultado->num_rows != 0) {
				echo "<p>El nombre de usuario ya existe. Prueba con otro.</p>";
				echo "<a href='../../registro.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
			}
			else {
				// Comprobar si el email ya está registrado en la BD.
				$resultado = existe_email($email);
				if($resultado->num_rows != 0) {
					echo "<p>El email introducido ya está registrado. Prueba con otro.</p>";
					echo "<a href='../../registro.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
				}
				else {
					// Registrar el nuevo usuario en la BD.
					annadir_usuario($usuario, $nombre, $email, $password_hased, $edad);
					// Iniciamos sesion
					session_start();
					// Buscamos el usuario otra vez para obtener el id generado automaticamente
					$con = existe_email($email);

					$nFilas = n_filas($con);

					if($nFilas == 1){
						
						$filaUsuario = $con->fetch_object();

						$_SESSION['usuario_actual'] = $filaUsuario->id;
						$_SESSION['name'] = $filaUsuario->nombre;

						// Finalmente añadimos los datos del usuario
						annadir_datos($_SESSION['usuario_actual'], $desc, $ciudad, $pais);

						header('Location: ../../index.php');
					}
				}
			}
		}
	}


	function existe_usuario($user){

		$sql = "SELECT * FROM usuarios WHERE usuario='$user'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function existe_email($email){

		$sql = "SELECT * FROM usuarios WHERE email='$email'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function annadir_usuario($usuario, $nombre, $email, $pass, $edad){
		
		$sql = "INSERT INTO usuarios(usuario,nombre,email,pass,edad) VALUES ('$usuario','$nombre', '$email', '$pass', '$edad')";

		$resultado = consulta($sql);
	}

	function annadir_datos($id, $desc, $ciudad, $pais){

		$sql = "INSERT INTO perfil(id_usuario,descripcion,ciudad,pais) VALUES ('$id','$desc', '$ciudad', '$pais')";

		$resultado = consulta($sql);

	}

	function n_filas($consulta){

		$n = mysqli_num_rows($consulta);

		return $n;

	}

?>
