<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/filtrado_entrada.php");


	annadir_boceto();
	
	// Registro de un boceto en la BD.
	function annadir_boceto() {

		$titulo = $_POST['titulo'];
		$desc   = $_POST['desc'];

		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			modificar($titulo, $desc, $id);
			header('Location: ../../misObras.php');
		}
		else
		{
			session_start();
			$usuario_actual = $_SESSION['usuario_actual'];

			if(empty($titulo)) {
				echo "MAAAl";
				echo "<p> Se ha producido un error al enviar los datos del formulario.</p>";
				echo "<a href='../../edicionFoto.php'><button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='button'>Volver al formulario de registro</button></a>";
			}
			else {

				//Recogemos el archivo enviado por el formulario
				$imagen = $_FILES['imagen']['name'];
				print_r($imagen);

				//Si el archivo contiene algo y es diferente de vacio
				if (isset($imagen) && $imagen != "") {
					//Obtenemos algunos datos necesarios sobre el archivo
					$tipo   = $_FILES['imagen']['type'];
					$temp   = $_FILES['imagen']['tmp_name'];
					$tamano = $_FILES['imagen']['size'];

					//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
					if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
						echo "MAL";
						echo '<div><b> Error. La extensión o el tamaño de los archivos no es correcta.<br/>
					- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
					}
					else {
						// Saber cual será la id del boceto que se va a añadir
						$num = n();
						$num += 1;
						echo "<br>"; 
						echo $num;

						// Direccion relativa donde se almacenara el fichero
						$dir_relativa = "/web/img/bocetos/";
						// Direccion absoluta donde se almacenara el fichero
						$dir_absoluta = $_SERVER['DOCUMENT_ROOT'] . $dir_relativa;
						// direccion absoluta + fichero
						$fichero      = $dir_absoluta . basename($imagen);

						// Extenxion del fichero
						$tipo = pathinfo($fichero,PATHINFO_EXTENSION);
						// Cambiamos el nombre al fichero para guardarlo en el servidor
						$fichero = $dir_absoluta . $num . "." . $tipo;
						// ruta que se guardara en la bd
						$fich_bd = $dir_relativa . $num . "." . $tipo;
						//Si la imagen es correcta en tamaño y tipo
						//Se intenta subir al servidor
						if (move_uploaded_file($temp, $fichero)) {
							//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
							chmod($fichero, 0777);
							//Mostramos el mensaje de que se ha subido co éxito
							echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
							// Finalmente añadimos los datos
							annadir($titulo, $desc, $fich_bd, $usuario_actual);

							header('Location: ../../misObras.php');
						}
						else {
							//Si no se ha podido subir la imagen, mostramos un mensaje de error
							echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
						}
					}
				}
				else{
					echo "mual";
				}
			}
		}
	}

	function annadir($titulo, $desc, $fich_bd, $usuario_actual){

		$sql = "INSERT INTO bocetos(titulo,descripcion,foto,id_usuario) VALUES ('$titulo', '$desc', '$fich_bd', '$usuario_actual')";

		$resultado = consulta($sql);

	}

	function modificar($titulo, $desc, $id){

		$sql = "UPDATE bocetos SET titulo='$titulo', descripcion='$desc' WHERE id_bocetos='$id';";

		$resultado = consulta($sql);
	}

	function n(){

		$sql = "SELECT * FROM bocetos";

		$resultado = consulta($sql);

		$num = mysqli_num_rows($resultado);

		return $num;

	}



	//Si se quiere subir una imagen
	/*if (isset($_POST['subir'])) {
		//Recogemos el archivo enviado por el formulario
		$archivo = $_FILES['archivo']['name'];

		//Si el archivo contiene algo y es diferente de vacio
		if (isset($archivo) && $archivo != "") {
			//Obtenemos algunos datos necesarios sobre el archivo
			$tipo   = $_FILES['archivo']['type'];
			$temp   = $_FILES['archivo']['tmp_name'];
			$tamano = $_FILES['archivo']['size'];
			
			//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
			if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
				echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
			- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
			}
			else {
				//Si la imagen es correcta en tamaño y tipo
				//Se intenta subir al servidor
				if (move_uploaded_file($temp, 'images/'.$archivo)) {
					//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
					chmod('images/'.$archivo, 0777);
					//Mostramos el mensaje de que se ha subido co éxito
					echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
					//Mostramos la imagen subida
					echo '<p><img src="images/'.$archivo.'"></p>';
				}
				else {
					//Si no se ha podido subir la imagen, mostramos un mensaje de error
					echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
				}
			}
		}
	}*/
?>