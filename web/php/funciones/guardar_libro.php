<?php

session_start();

if(_$POST){

	require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/consulta.php");

	$titulo = _$POST["titulo"];
	$sinopsis = _$POST["sinopsis"];
	$categoria = _$POST["categoria"];
	$imagen = $_FILES['imagen']['name'];
	$usuario = $_SESSION['usuario_actual'];



	//Si el archivo contiene algo y es diferente de vacio
	if (isset($imagen) && $imagen != "" && isset($categoria) && count($titulo) > 0 && count($titulo) < 100 && count($sinopsis) >0 && count($sinopsis) < 5000) {
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
					// Saber cual será la id de la portada que se va a añadir
					$num = n();
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
					$fichero = $dir_absoluta . $num++ . "." . $tipo;
					// ruta que se guardara en la bd
					$fich_bd = $dir_relativa . $num++ . "." . $tipo;
					//Si la imagen es correcta en tamaño y tipo
					//Se intenta subir al servidor
					if (move_uploaded_file($temp, $fichero)) {
						//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
						chmod($fichero, 0777);
						//Mostramos el mensaje de que se ha subido co éxito
						echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
						// Finalmente añadimos los datos

						//TODO INYECT. SQL
						//TODO CONSULTA MAL ESCRITA
						$fecha = date('Y/m/d H:i');
						if(isset($_POST["idLibro"])){
							$idLibro = $_POST["idLibro"];
							//Update

							$query = 'UPDATE libros SET titulo="'.$titulo.'", sinopsis="'.$sinopsis.', portada="'.$fich_bd.'", fecha="'.$fecha.'", categoria="'.$categoria.'", id_usuario="'$usuario..'" WHERE id_libro="'.$idLibro.'"';

						} else {
							//Insert..


							$query = 'INSERT INTO libros(titulo,sinopsis,portada,fecha,categoria,id_usuario) VALUES ('.$titulo.', '.$sinopsis.', '.$fich_bd.','.$fecha.','.$categoria.','$usuario')';

						}
						
						consulta($query);
						header('Location: ../../misObras.php');
					}
					else {
						//Si no se ha podido subir mostramos un mensaje de error
						echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
					}
				}

	} else {
		echo '<div><b>Ocurrió algún error</b></div>';
	}


	//TODO desconectar
	header("Location: edicion.php?id="._$POST["idLibro"]);

} else {
	header("Location: 404Error.php");
}


?>