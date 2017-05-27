<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/filtrado_entrada.php");

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

						//Subimos la imagen del usuario
						$dir_relativo = "/web/img/usuarios/";
						$dir_subida = $_SERVER['DOCUMENT_ROOT'] . $dir_relativo;
						$fichero = $dir_subida . basename($_FILES['imagen_perfil']['name']);

						// extension del fichero
						$imageFileType = pathinfo($fichero,PATHINFO_EXTENSION);
						$fichero = $dir_subida . $filaUsuario->id . "." . $imageFileType;
						$path_img = $dir_relativo . $filaUsuario->id . "." . $imageFileType;


						if (move_uploaded_file($_FILES['imagen_perfil']['tmp_name'], $fichero)) {
						    echo "El fichero es válido y se subió con éxito.\n";
						} else {
						    echo "¡Posible ataque de subida de ficheros!\n";
						}

						// Finalmente añadimos los datos del usuario
						annadir_datos($_SESSION['usuario_actual'], $path_img, $desc, $ciudad, $pais);

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

	function annadir_datos($id, $path_img, $desc, $ciudad, $pais){

		$sql = "INSERT INTO perfil(id_usuario,foto,descripcion,ciudad,pais) VALUES ('$id','$path_img','$desc', '$ciudad', '$pais')";

		$resultado = consulta($sql);

	}

	function n_filas($consulta){

		$n = mysqli_num_rows($consulta);

		return $n;

	}

	function validar_imagen(){

		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}

?>
