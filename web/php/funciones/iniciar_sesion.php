<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");
	login();

	function login(){
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
	}	

	function comprueba_usuario($email, $pass){

		$sql = "SELECT * FROM usuarios WHERE email='$email' AND pass='$pass'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function n_filas($consulta){

		$n = mysqli_num_rows($consulta);

		return $n;

	}

	/*function consulta_capitulos($id){

		$sql = "SELECT * FROM capitulos WHERE id_capitulo='$id';";

		$resultado = consulta($sql);

		return $resultado;
	}*/
?>