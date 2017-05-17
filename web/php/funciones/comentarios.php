<?php
	require_once("consulta.php");

	//Construye la sql que busca los comentarios de un libro
	function comentarios($id_libro)
	{
		$sql = "SELECT * FROM comenta WHERE id_libro='$id_libro';";
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

	//Construye la sql que busca todas las respuestas de un usuario
	function respuestas($id_comentario)
	{
		$sql = "SELECT * FROM comenta WHERE id_respuesta='$id_comentario';";
		$respuestas = consulta($sql);

		return $respuestas;
	}

	function nuevo_comentario($id_usuario, $cuerpo, $es_libro, $id_respuesta, $id_libro)
	{
		$sql = "INSERT INTO comenta(id_usuario, cuerpo, es_libro, id_respuesta, id_libro) VALUES ('$id_usuario', '$cuerpo', '$es_libro', '$id_respuesta', '$id_libro');";
		$exito = consulta($sql);

		return $exito;
	}
?>