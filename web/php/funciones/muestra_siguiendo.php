<?php
	
	$tamanio_pagina = 4;

	// No se ha pasado como argumento una página concreta.
	if(!isset($_REQUEST["pagina"])) {
		$inicio = 0;
		$pagina = 1;
	}
	// Se ha pasado como argumento una página concreta.
	else {
		$pagina = $_REQUEST["pagina"];
		$inicio = ($pagina - 1) * $tamanio_pagina;
	}

	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	// Obtener todos los identificadores de todos los usuarios a mostrar que sigue el usuario conectado.
	$query = "SELECT id_seguido FROM seguidores WHERE id_seguidor LIKE ".$_SESSION['usuario_actual']." LIMIT ".$inicio.",".$tamanio_pagina;
	$id_seguidos = consulta($query);

	// Cada usuario a mostrar se irá guardando individualmente en esta variable.
	$id_seguido = mysqli_fetch_assoc($id_seguidos)['id_seguido'];

	echo "<div class='row'>";

	// El usuario no sigue a nadie.
	if($id_seguido == NULL) {
		echo "<div class='col-sm-12 text-center'>Aún no sigues a nadie.</div>";
	}
	// El usuario sigue al menos a un usuario.
	else {
		while($id_seguido != NULL) {
			// Obtener los nombres de los usuarios a mostrar en esta página que sigue el usuario conectado.
			$query = "SELECT foto FROM perfil WHERE id_usuario LIKE '$id_seguido'";
			$foto = mysqli_fetch_assoc(consulta($query))['foto'];

			// Obtener las fotos de los usuarios a mostrar en esta página que sigue el usuario conectado.
			$query = "SELECT nombre FROM usuarios WHERE id LIKE '$id_seguido'";
			$nombre = mysqli_fetch_assoc(consulta($query))['nombre'];

			echo "
			<div class='col-sm-6 col-md-3'>
				<div class='thumbnail efecto-redondo'>
					<a href='vistaUsuario.php?usuario=".$id_seguido."'>
						<img src=".$foto." alt='' class='imgP'>
						<div class='caption'>
							<p>".$nombre."</p>
						</div>
					</a>
				</div>
			</div>";

			// Ir al siguiente seguido.
			$id_seguido = mysqli_fetch_assoc($id_seguidos)['id_seguido'];
		}
	}

	$pagina_anterior = $pagina - 1;
	$pagina_siguiente = $pagina + 1;

	// Obtener todos los identificadores de todos los usuarios que sigue el usuario conectado.
	$query = "SELECT id_seguido FROM seguidores WHERE id_seguidor LIKE ".$_SESSION['usuario_actual']."";
	$id_seguidos = consulta($query);
	$total_paginas = ceil(mysqli_num_rows($id_seguidos) / $tamanio_pagina);

	echo "
	</div>
	<div class='row'>
		<div class='col-sm-12 text-center'>
			<div class='btn-group' role='group' aria-label='...'>";
				// Si hay que mostrar el enlace a la anterior página.
				if($pagina_anterior >= 1)
					echo "<a class='btn btn-default' href='siguiendo.php?pagina=".$pagina_anterior."'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>Prev</a>";
				// Si hay que mostrar el enlace a la siguiente página.
				if($pagina_siguiente <= $total_paginas)
					echo "<a class='btn btn-default' href='siguiendo.php?pagina=".$pagina_siguiente."'>Next<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span></a>";
			echo "</div>
		</div>
	</div>";

?>
