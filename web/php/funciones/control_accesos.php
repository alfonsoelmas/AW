<?php
//Control de acceso correcto a páginas

function controlaSesion(){
	if(!isset($_SESSION['usuario_actual'])){
		header('Location:'.$_SERVER["DOCUMENT_ROOT"].'login.php');
		return false;
	}
	return true;
}

function controlaAcceso(){
	if(!$_GET){
		header('Location:'.$_SERVER["DOCUMENT_ROOT"].'404error.php');
		return false;
	}
	return true;
}


?>