<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	annadir();

	function annadir(){
		if (isset($_POST['titulo'])){
			$titulo   = $_POST['titulo'];
			$cuerpo   = $_POST['cuerpo'];
			$id_libro = $_POST['id_libro'];

			annadir_capitulo($titulo, $cuerpo, $id_libro);

			header('Location: ../../edicionCap.php?libro='.$id_libro);
		}
	}



	function annadir_capitulo($titulo, $cuerpo, $id_libro){

		$sql = "INSERT INTO capitulos(titulo,cuerpo,id_libro) VALUES ('$titulo', '$cuerpo', '$id_libro')";

		$resultado = consulta($sql);

	}

	function buscar_nombre_libro($id_libro){

		$sql = "SELECT titulo FROM libros WHERE id_libro='$id_libro'";

		$resultado = consulta($sql);

		return $resultado;

	}

	





















?>