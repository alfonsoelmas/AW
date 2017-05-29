<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/filtrado_entrada.php");


	if(isset($_POST['id_user']))
	{
		array_walk($_POST,"limpiarCadena");

		$usuario = $_POST['id_user'];
		$libro = $_POST['id_libro'];
		$voto = $_POST['voto'];

		$sql = "INSERT INTO valora(id_libro, puntuacion, id_usuario) VALUES ('$libro', '$voto','$usuario');";
		consulta($sql);
	}

	header("Location:".$_SERVER['HTTP_REFERER']);  
	exit();
?>