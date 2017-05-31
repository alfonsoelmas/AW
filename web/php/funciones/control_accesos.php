<?php
//Control de acceso correcto a páginas

function controlaSesion(){
	if(!isset($_SESSION['usuario_actual'])){
		header('Location: login.php');
		return false;
	}
	return true;
}

function controlaAcceso(){
	if(!$_GET){
		header('Location: 404error.php');
		return false;
	}
	return true;
}


?>