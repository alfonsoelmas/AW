<?php

	require_once("funciones/iniciar_sesion.php");
	require_once("funciones/registrarse.php");
	
	/**** Datos de la tabla usuarios ******/
	$nombre   = $_POST['name'];
	$usuario  = $_POST['user'];
	$edad     = $_POST['age'];
	$email    = $_POST['email'];
	$password = $_POST['password'];

	/***** Datos de la tabla perfil******/
	$ciudad = $_POST['ciudad'];
	$pais   = $_POST['pais'];
	$desc   = $_POST['desc'];

	// Vamos a añadir el usuario, pero antes
	// Comprobamos que el usuario o email no exista en la BD
	$con = existe_usuario($usuario, $email);

	// Cuantas tuplas devuelve
	$nFilas = n_filas($con);

	if($nFilas > 0){
		// si hay al menos 1
		echo "El usuario ya existe";
	}
	else{

		// Si no existe añadimos el usuario
		annadir_usuario($usuario, $nombre, $email, $password, $edad);

		// Iniciamos sesion
		session_start();
		
		// Buscamos el usuario creado otra vez para obtener el campo id generado
		$con = comprueba_usuario($email, $password);

		$filaUsuario = $con->fetch_object();

		// Tenemos el id
		$_SESSION['usuario_actual'] = $filaUsuario->id;
		// Tenemos el nombre del usuario
		$_SESSION['name'] = $filaUsuario->nombre;
		// $_SESSION['name'] = $nombre;
		
	}

	


	// Ahora vamos a insertar el resto de los datos del usuario en la tabla perfil
	// Comprobamos si la imagen es valida
	if(isset($_POST["imagen_perfil"])) {
		// el lugar donde será almacenado
		$target_dir = "../img/perfil";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// extension del fichero
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		

		// Comprobamos que sea una imagen
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

		// Permitir solo un tipo de formato
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

		}
	    
	    // guardamos la imagen
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

		$foto = $_POST['imagen_perfil'];
	}

	// Finalmente añadimos los datos
	annadir_datos($_SESSION['usuario_actual'], $desc, $ciudad, $pais);


	// Volvemos al index una vez registrado		
	header("Location: ../index.php");


?>
















