<?php
	require_once("consulta.php");

	//Construye la sql que busca los comentarios de un libro
	function comentarios($id, $contenido)
	{
		$sql = ""; 

		switch($contenido)
		{
			case "Libros":
			{
				$sql = "SELECT * FROM comentario_libro WHERE id_libro='$id';";
			}
				break;

			case "Bocetos":
			{
				$sql = "SELECT * FROM comentario_boceto WHERE id_boceto='$id';";
			}
				break;

			case "Capitulos":
			{
				$sql = "SELECT * FROM comentario_capitulo WHERE id_capitulo='$id';";
			}
				break;
		}

		$comentarios = consulta($sql);

		return $comentarios;
	}

	//Construye la sql que busca los datos del usuario que ha comentado
	function usuario_comentario($id_usuario)
	{
		$sql =  "SELECT * FROM usuarios NATURAL JOIN perfil WHERE id_usuario='$id_usuario';";
		$usuario = consulta($sql);

		return $usuario;
	}

	//Construye la sql que busca todas las respuestas de un comentario
	function respuestas($id_comentario, $contenido)
	{
		
		$sql = ""; 

		switch($contenido)
		{
			case "Libros":
			{
				$sql = "SELECT * FROM comenta WHERE id_padre='$id_comentario';";
			}
				break;

			case "Bocetos":
			{
				$sql = "SELECT * FROM comenta WHERE id_padre='$id_comentario';";
			}
				break;

			case "Capitulos":
			{
				$sql = "SELECT * FROM comenta WHERE id_padre='$id_comentario';";
			}
				break;
		}

		$respuestas = consulta($sql);

		return $respuestas;
	}

	//id_comentario	cuerpo	fecha	id_usuario	id_padre  id_libro

	function nuevo_comentario($cuerpo, $id_usuario, $id_padre, $id_contenido, $contenido)
	{
		$sql = "";

		switch($contenido)
		{
			case "Libros":
			{
				$sql = "INSERT INTO comentario_libro(cuerpo, id_usuario, id_padre, id_libro) VALUES ('$cuerpo', '$id_usuario', '$id_padre',    '$id_contenido');";
			}
				break;

			case "Bocetos":
			{
				$sql = "INSERT INTO comentario_boceto(cuerpo, id_usuario, id_padre, id_boceto) VALUES ('$cuerpo', '$id_usuario', '$id_padre',  '$id_contenido');";
			}
				break;

			case "Capitulos":
			{
				$sql = "INSERT INTO comentario_capitulo(cuerpo, id_usuario, id_padre, id_capitulo) VALUES ('$cuerpo', '$id_usuario', '$id_padre', '$id_contenido');";
			}
				break;
		}

		$exito = consulta($sql);

		return $exito;
	}
?>