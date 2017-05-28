<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/filtrado_entrada.php");
	annadir_libro();
	
	// Registro de un boceto en la BD.
	function annadir_libro() {
		$titulo   = $_POST['titulo'];
		$sinopsis = $_POST['sinopsis'];
		$genero   = $_POST['genero'];
		echo $titulo;
		echo $sinopsis;
		session_start();
		$usuario_actual = $_SESSION['usuario_actual'];
		echo $usuario_actual;
		if(empty($titulo) && empty($genero)) {
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
				- Se permiten archivos .gif, .jpg, .png.</b></div>';
				}
				else {
					// Saber cual será la id del boceto que se va a añadir
					$num = n();
					$num += 1;
					// Direccion relativa donde se almacenara el fichero
					$dir_relativa = "/web/img/libros/";
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
						annadir($titulo, $sinopsis, $genero, $fich_bd, $usuario_actual);
						header('Location: ../../misObras.php');
					}
					else {
						//Si no se ha podido subir la imagen, mostramos un mensaje de error
						echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
					}
				}
			}
			else{
				echo "mal";
			}
		}
	}
	function annadir($titulo, $sinopsis, $genero, $fich_bd, $usuario_actual){
		$sql = "INSERT INTO libros(titulo,sinopsis,categoria,portada,id_usuario) VALUES ('$titulo', '$sinopsis', '$genero', '$fich_bd', '$usuario_actual')";
		$resultado = consulta($sql);
	}
	function n(){
		$sql = "SELECT * FROM libros";
		$resultado = consulta($sql);
		$num = mysqli_num_rows($resultado);
		return $num;
	}
?>