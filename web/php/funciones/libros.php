<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	function consulta_datos($id)
	{
		$sql = "SELECT * FROM libros WHERE id_libro='$id'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function consulta_capitulos($id)
	{
		$sql = "SELECT * FROM capitulos WHERE id_capitulo='$id'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function capitulos_por_libro($id_libro)
	{
		$sql = "SELECT * FROM capitulos WHERE id_libro='$id_libro' ORDER BY id_capitulo ASC";

		$resultado = consulta($sql);

		return $resultado;
	}

	function mejores_obras($n)
	{
		$sql = "SELECT l.id_libro, portada, AVG(puntuacion) AS punt_final FROM (libros l JOIN valora v ON l.id_usuario=v.id_usuario) GROUP BY id_libro ORDER BY punt_final DESC LIMIT 20";

		$resultado = consulta($sql);

		return $resultado;
	}

	function capitulos_mayores($id_libro, $id_capitulo)
	{
		$sql = "SELECT * FROM capitulos WHERE id_libro='$id_libro' AND id_capitulo >'$id_capitulo' ORDER BY id_capitulo ASC";

		$resultado = consulta($sql);

		return $resultado;
	}

?>