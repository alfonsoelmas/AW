<?php

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	function login($username, $password){
		// Comprobamos si el usuario existe
		$con = comprueba_usuario($username);

		$nFilas = n_filas($con);
		
		if($nFilas == 1){

			// Comprobamos si la contraseña coincide
			// Ver el ejemplo de password_hash() para ver de dónde viene este hash.
			// $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
			$pass = dame_pass($username);
			$hash = $pass->fetch_object();

			if (password_verify("$password", "$hash->pass")) {
			    echo '¡La contraseña es válida!';
				session_start();
				
				$filaUsuario = $con->fetch_object();

				$_SESSION['usuario_actual'] = $filaUsuario->id;
				$_SESSION['name'] = $filaUsuario->nombre;
				header("Location: ../../index.php");
				return '1';
			} 
			else {
			    echo '<br><span>La contraseña no es válida.</span>';
			    return '0';
			}
		}
		else{
			echo "<span>El usuario no existe o no coincide con la contraseña</span>";
			return '0';
		}
	}	

	function comprueba_usuario($email){

		$sql = "SELECT * FROM usuarios WHERE email='$email'";

		$resultado = consulta($sql);

		return $resultado;
	}

	function dame_pass($email){

		$sql = "SELECT U.pass FROM usuarios AS U WHERE email='$email'";

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