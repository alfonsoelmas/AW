<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	if(isset($_POST['noSeguido'])){
		$seguido  = $_POST['noSeguido'];
		$seguidor = $_POST['actual'];
		// Seguimos al usuario		
		seguir($seguidor, $seguido);
		echo $seguido;
		echo $seguidor;
		
		header("Location: ../../vistaUsuario.php?usuario=".$seguido);
	}

	if(isset($_POST['seguido'])){
		$seguido  = $_POST['seguido'];
		$seguidor = $_POST['actual'];
		// Seguimos al usuario		
		dejar_de_seguir($seguidor, $seguido);
		echo $seguido;
		echo $seguidor;
		
		header("Location: ../../vistaUsuario.php?usuario=".$seguido);
	}


	function sigo($id_actual, $id_seguido){

		$sql = "SELECT * FROM seguidores WHERE id_seguido='$id_seguido' AND id_seguidor='$id_actual'";

		$resultado = consulta($sql);

		if ($resultado->num_rows != 0){
			$ok = true;
		}
		else{
			$ok = false;
		}

		return $ok;
	}

	function seguir($id_actual, $id_seguido){

		$sql = "INSERT INTO seguidores(id_seguidor,id_seguido) VALUES ('$id_actual','$id_seguido')";

		$resultado = consulta($sql);

	}

	function dejar_de_seguir($id_actual, $id_seguido){

		$sql = "DELETE FROM seguidores  WHERE id_seguido='$id_seguido' AND id_seguidor='$id_actual'";

		$resultado = consulta($sql);

	}

?>