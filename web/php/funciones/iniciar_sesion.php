<?php

	require_once("consulta.php");

	function comprueba_usuario($email, $pass){

		$sql = "SELECT * FROM usuarios WHERE email='$email' AND pass='$pass'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function consulta_capitulos($id){

		$sql = "SELECT * FROM capitulos WHERE id_capitulo='$id';";

		$resultado = consulta($sql);

		return $resultado;
	}
?>