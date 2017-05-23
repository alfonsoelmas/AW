<?php

	require_once("funciones/iniciar_sesion.php");
	
	// usuario y pass
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Esto hay que cogerlo de una consulta
	$con = comprueba_usuario($username, $password);

	$nFilas = n_filas($con);

	if($nFilas == 1){
		
		session_start();
		
		$filaUsuario = $con->fetch_object();

		$_SESSION['usuario_actual'] = $filaUsuario->id;
		$_SESSION['name'] = $filaUsuario->nombre;
		header("Location: ../index.php");
	}
	else{
		echo "El usuario no existe o no coincide con la contraseña";
	}
	

?>
