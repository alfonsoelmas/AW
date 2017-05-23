<?php

	require_once("consulta.php");

	function existe_usuario($user, $email){

		$sql = "SELECT * FROM usuarios WHERE email='$email' OR usuario='$user'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function annadir_usuario($usuario, $nombre, $email, $pass, $edad){
		
		$sql = "INSERT INTO usuarios(usuario,nombre,email,pass,edad) VALUES ('$usuario','$nombre', '$email', '$pass', '$edad')";

		$resultado = consulta($sql);
	}

	function annadir_datos($id, $desc, $ciudad, $pais){

		$sql = "INSERT INTO perfil(id_usuario,descripcion,ciudad,pais) VALUES ('$id','$desc', '$ciudad', '$pais')";

		$resultado = consulta($sql);

	}

?>