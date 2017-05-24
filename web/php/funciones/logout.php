<?php
	session_start();

	if(isset($_SESSION['usuario_actual'])) {
		session_destroy();
		header("Location: ../../index.php");
	}
?>