<?php
//session_start();
genera_bloque_derecha($pagina_actual);

function genera_bloque_derecha($pagina_actual) {
	// Genera el bloque de la derecha de la página web, con todas las opciones que debe haber en cada momento.
	
	// No hay una sesión iniciada
	if(!isset($_SESSION['usuario_actual'])) {
		// Mostrar botones "Iniciar sesión" y "Resgistrarse".
		echo
		"<div class='col-sm-2 sidenav'>
			<div class='row'>
				<button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='logInButton'>
					Inicia sesión
				</button>
			</div>
			<div class='row'>
				<button class='btn btn-default dropdown-toggle engordar redondear' type='button' id='registerButton'>
					Registro
				</button>
			</div>	
		</div>";
	}
	// Hay una sesión iniciada
	else {
		// Mostrar menú ("Mi perfil", "Mis obras", "Mis seguidores", "Siguiendo")
		echo "<div class='col-sm-2 sidenav'>";
			echo "<div class='dropdown text-left'>";

				if($pagina_actual != "Mi perfil")
					echo "<p><a href='miPerfil.php'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Mi perfil</a></p>";

				if($pagina_actual != "Mis obras")
					echo "<p><a href='misObras.php'><span class='glyphicon glyphicon-folder-open' aria-hidden='true'></span> Mis obras</a></p>";

				if($pagina_actual != "Mis seguidores")
					echo "<p><a href='misSeguidores.php'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Mis seguidores</a></p>";

				if($pagina_actual != "Siguiendo")
					echo "<p><a href='siguiendo.php'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span> Siguiendo</a></p>";

			echo "</div>";
		echo "</div>";
	}
}

?>
