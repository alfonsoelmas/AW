<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	function consulta_datos($id)
	{
		$sql = "SELECT * FROM bocetos WHERE id_bocetos='$id'";

		$resultado = consulta($sql);

		return $resultado;
	}
?>