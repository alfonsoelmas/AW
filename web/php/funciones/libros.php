<?php

	require_once("consulta.php");

	function consulta_datos($id)
	{
		$sql = "SELECT * FROM libros WHERE id_libro='$id';";

		$resultado = consulta($sql);

		return $resultado;
	}

	function consulta_capitulos($id)
	{
		$sql = "SELECT * FROM capitulos WHERE id_capitulo='$id';";

		$resultado = consulta($sql);

		return $resultado;
	}

	function capitulos_por_libro($id_libro)
	{
		$sql = "SELECT * FROM capitulos WHERE id_libro='$id' ORDER BY id_capitulo ASC;";

		$resultado = consulta($sql);

		return $resultado;
	}
?>