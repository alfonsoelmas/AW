<?php
	
	require_once("consulta.php");

	function buscar_datos_usuario($id){

		$sql = "SELECT * FROM usuarios JOIN perfil ON id=id_usuario WHERE id='$id'";

		$resultado = consulta($sql);

		return $resultado;
	}
?>