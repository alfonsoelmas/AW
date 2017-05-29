<?php

session_start();

if($_POST){

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	$titulo = $_POST["title"];

	$sinopsis = $_POST["sinopsis"];

	$categoria = $_POST["categoria"];

	$imagen = $_FILES['img']['name'];


	$usuario = $_SESSION['usuario_actual'];


	//Si el archivo contiene algo y es diferente de vacio
	if (isset($imagen) && $imagen != "" && isset($categoria) && count($titulo) > 0 && count($titulo) < 100 && count($sinopsis) >0 && count($sinopsis) < 5000) {

		//Obtenemos algunos datos necesarios sobre el archivo
		$tipo   = $_FILES['img']['type'];
		$temp   = $_FILES['img']['tmp_name'];
		$tamano = $_FILES['img']['size'];

				//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
				if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
					echo "MAL";
					echo '<div><b> Error. La extensión o el tamaño de los archivos no es correcta.<br/>
					- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
				}
				else {
					// Saber cual será la id de la portada que se va a añadir
					$num = rand (1 ,1000 );
					// Direccion relativa donde se almacenara el fichero
					$dir_relativa = "/web/img/portadas/";
					// Direccion absoluta donde se almacenara el fichero
					$dir_absoluta = $_SERVER['DOCUMENT_ROOT'] . $dir_relativa;
					// direccion absoluta + fichero
					$fichero      = $dir_absoluta . basename($imagen);

					// Extenxion del fichero
					$tipo = pathinfo($fichero,PATHINFO_EXTENSION);
					// Cambiamos el nombre al fichero para guardarlo en el servidor
					$fichero = $dir_absoluta . $num . $usuario . basename($imagen);
					// ruta que se guardara en la bd
					$fich_bd = $dir_relativa . $num . $usuario . basename($imagen);
					//Si la imagen es correcta en tamaño y tipo
					//Se intenta subir al servidor
					if (move_uploaded_file($temp, $fichero)) {
						//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
						chmod($fichero, 0777);
						//Mostramos el mensaje de que se ha subido co éxito
						echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
						// Finalmente añadimos los datos

						//TODO INYECT. SQL
						$fecha = date('Y/m/d');
						if(isset($_POST["idLibro"])){
							$idLibro = $_POST["idLibro"];
							//Update

							$query = 'UPDATE libros SET titulo="'.$titulo.'", sinopsis="'.$sinopsis.', portada="'.$fich_bd.'", fecha="'.$fecha.'", categoria="'.$categoria.'", id_usuario="'.$usuario.'" WHERE id_libro="'.$idLibro.'"';

						} else {
							//Insert..


							$query = 'INSERT INTO libros(titulo,sinopsis,portada,fecha,categoria,id_usuario) VALUES ('.$titulo.', '.$sinopsis.', '.$fich_bd.','.$fecha.','.$categoria.','.$usuario.')';

						}
						echo $query;
						echo "<br>";
						consulta($query); //TODO no hace la consulta... wtf?
						var_dump(consulta($query));

						//header('Location: /web/misObras.php');
					}
					else {
						//Si no se ha podido subir mostramos un mensaje de error
						echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
					}
				}

	} else {
		echo '<div><b>Ocurrió algún error</b></div>';
	}


	
	//header("Location: /web/misObras.php");

} else {
	header("Location: /web/404Error.php");
}


?>