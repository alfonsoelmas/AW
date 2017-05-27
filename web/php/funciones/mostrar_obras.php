<?php
	
	function buscar_bocetos($id){

		$sql = "SELECT * FROM bocetos WHERE id_usuario='$id'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function buscar_libros($id){

		$sql = "SELECT * FROM libros WHERE id_usuario='$id'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function n_filas($consulta){

		$n = mysqli_num_rows($consulta);

		return $n;

	}

?>