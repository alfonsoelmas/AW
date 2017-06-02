<?php
	function consulta_rate($id_user, $id_libro){
		$sql = "SELECT puntuacion FROM valora WHERE id_usuario='$id_user' AND id_libro='$id_libro';";
		return consulta($sql);
	}
?>