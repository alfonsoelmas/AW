<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	function categorias()
	{
		$query = "SELECT DISTINCT categoria FROM libros";
		$consulta 	= 	consulta($query);
		return $consulta;
	}

	function libros_categoria($categoria)
	{
		$query = "SELECT id_libro, titulo, portada FROM libros WHERE categoria='$categoria' ORDER BY fecha DESC LIMIT 4 OFFSET 0";
		$consulta 	= 	consulta($query);
		return $consulta;
	}

	function bocetos_categoria()
	{
		$query = "SELECT id_bocetos, titulo, foto FROM bocetos ORDER BY fecha DESC LIMIT 4".PHP_EOL;
		$consulta 	= 	consulta($query);
		return $consulta;
	}

?>