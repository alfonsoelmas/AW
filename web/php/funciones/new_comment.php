<?php
	require_once("comentarios.php");
	require_once('filtrado_entrada.php');

	array_walk($_POST, 'limpiarCadena');

	$cuerpo = $_POST['cuerpo'];
	$id_usuario = $_POST['user'];
	$id_padre = $_POST['padre'];
	$id_contenido = $_POST['contenido'];
	$tipo_contenido = $_['tipo_contenido'];

	nuevo_comentario($cuerpo, $id_usuario, $id_padre, $id_contenido, $tipo_contenido);
?>

