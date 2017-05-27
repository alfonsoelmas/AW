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

	// Obtener todos los identificadores de todos los usuarios a mostrar que siguen al usuario conectado.
	$query = "SELECT id_seguidor FROM seguidores WHERE id_seguido LIKE ".$_SESSION['usuario_actual']." LIMIT ".$inicio.",".$tamanio_pagina;
	$id_seguidores = consulta($query);

	// Cada seguidor se irá guardando individualmente en esta variable.
	$id_seguidor = mysqli_fetch_assoc($id_seguidores)['id_seguidor'];

	echo "<div class='row'>";

	// El usuario no tiene ningún seguidor.
	if($id_seguidor == NULL) {
		echo "<div class='col-sm-12 text-center'>Aún no tienes seguidores.</div>";
	}
	// El usuario tiene al menos un seguidor.
	else {
		while($id_seguidor != NULL) {
			// Obtener los nombres de los usuarios a mostrar en esta página que siguen al usuario conectado.
			$query = "SELECT foto FROM perfil WHERE id_usuario LIKE ".$id_seguidor;
			$foto = mysqli_fetch_assoc(consulta($query))['foto'];

			// Obtener las fotos de los usuarios a mostrar en esta página que siguen al usuario conectado.
			$query = "SELECT nombre FROM usuarios WHERE id LIKE ".$id_seguidor;
			$nombre = mysqli_fetch_assoc(consulta($query))['nombre'];

			echo "
			<div class='col-sm-6 col-md-3'>
				<div class='thumbnail efecto-redondo'>
					<a href='vistaUsuario.php?usuario=".$id_seguidor."'>
						<img src=".$foto." alt='' class='imgP'>
						<div class='caption'>
							<p>".$nombre."</p>
						</div>
					</a>
				</div>
			</div>";

			// Ir al siguiente seguidor.
			$id_seguidor = mysqli_fetch_assoc($id_seguidores)['id_seguidor'];
		}
	}

	$pagina_anterior = $pagina - 1;
	$pagina_siguiente = $pagina + 1;

	// Obtener todos los identificadores de todos los usuarios que siguen al usuario conectado.
	$query = "SELECT id_seguidor FROM seguidores WHERE id_seguido LIKE ".$_SESSION['usuario_actual'];
	$id_seguidores = consulta($query);
	$total_paginas = ceil(mysqli_num_rows($id_seguidores) / $tamanio_pagina);

	echo "
	</div>
	<div class='row'>
		<div class='col-sm-12 text-center'>
			<div class='btn-group' role='group' aria-label='...'>";
				// Si hay que mostrar el enlace a la anterior página.
				if($pagina_anterior >= 1)
					echo "<a href='misSeguidores.php?pagina=".$pagina_anterior."'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>Prev</button></a>";
				// Si hay que mostrar el enlace a la siguiente página.
				if($pagina_siguiente <= $total_paginas)
					echo "<a href='misSeguidores.php?pagina=".$pagina_siguiente."'><button type='button' class='btn btn-default'>Next<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span></button></a>";
			echo "</div>
		</div>
	</div>";

?
