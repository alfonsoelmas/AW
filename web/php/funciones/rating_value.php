<?php
	function consulta_rate($id_user){
		$sql = "SELECT puntuacion FROM valora WHERE id_usuario='$id_user';";
		return consulta($sql);
	}
?>