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

	// Se ha indicado como argumento si hay que mostrar los libros o los bocetos.
	if(isset($_REQUEST["a_mostrar"]))
		$a_mostrar = $_REQUEST["a_mostrar"];
	// No se ha indicado como argumento ni estaba definido anteriormente si hay que mostrar los libros o los bocetos.
	else
		$a_mostrar = "Libros";

	require_once($_SERVER['DOCUMENT_ROOT']."/web/php/funciones/consulta.php");

	// Mostrar enlaces a los demás tipos de obras.
	echo "
	<div class='row'>
		<div class='col-sm-12 text-center'>
			<div class='btn-group' role='group' aria-label='...'>";
				if($a_mostrar != "Libros")
					echo "<a href='misObras.php?a_mostrar=Libros'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-book' aria-hidden='true'></span> Ver mis libros</button></a>";
				if($a_mostrar != "Bocetos")
					echo "<a href='misObras.php?a_mostrar=Bocetos'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ver mis bocetos</button></a>";
			echo "</div>
		</div>
	</div>";

	// Obtener todas las obras a mostrar.
	if($a_mostrar == "Libros")
		$query = "SELECT id_libro, portada, titulo, fecha FROM libros WHERE id_usuario LIKE ".$_SESSION['usuario_actual']." LIMIT ".$inicio.",".$tamanio_pagina;
	else
		$query = "SELECT id_bocetos, foto, titulo, fecha FROM bocetos WHERE id_usuario LIKE ".$_SESSION['usuario_actual']." LIMIT ".$inicio.",".$tamanio_pagina;
	$obras = consulta($query);

	// Cada obra se irá guardando individualmente en esta variable.
	$obra = mysqli_fetch_assoc($obras);

	echo "<div class='row'>";

	// Hay que mostrar libros.
	if($a_mostrar == "Libros") {
		if($obra == NULL)
			echo "<div class='col-sm-12 text-center'>Aún no has escrito ningún libro.</div>";
		else {
			while($obra != NULL) {
				// Obtener el número de capítulos del libro.
				$query = "SELECT * FROM capitulos WHERE id_libro LIKE ".$obra['id_libro'];
				$num_capitulos = mysqli_num_rows(consulta($query));

				echo "
				<div class='col-sm-6 col-md-3'>
					<div class='thumbnail efecto-redondo'>
						<a href='edicion.php?libro=".$obra['id_libro']."'>
							<img src='".$obra['portada']."' alt='' class='imgP'>
							<div class='caption'>
								<p>".$obra['titulo']."</p>
								<p>".$num_capitulos."</p>
								<p>".$obra['fecha']."</p>
							</div>
						</a>
					</div>
				</div>";

				// Ir al siguiente libro.
				$obra = mysqli_fetch_assoc($obras);
			}
		}

		// Consulta SQL para obtener todos los libros del usuario conectado.
		$query = "SELECT * FROM libros WHERE id_usuario LIKE ".$_SESSION['usuario_actual'];
	}

	// Hay que mostrar bocetos.
	else {
		if($obra == NULL)
			echo "<div class='col-sm-12 text-center'>Aún no has dibujado ningún boceto.</div>";
		else {
			while($obra != NULL) {
				echo "
				<div class='col-sm-6 col-md-3'>
					<div class='thumbnail efecto-redondo'>
						<a href='edicion.php?libro=".$obra['id_bocetos']."'>
							<img src='".$obra['foto']."' alt='' class='imgP'>
							<div class='caption'>
								<p>".$obra['titulo']."</p>
								<p>".$obra['fecha']."</p>
							</div>
						</a>
					</div>
				</div>";

				// Ir al siguiente boceto.
				$obra = mysqli_fetch_assoc($obras);
			}
		}

		// Consulta SQL para obtener todos los bocetos del usuario conectado.
		$query = "SELECT * FROM bocetos WHERE id_usuario LIKE ".$_SESSION['usuario_actual'];
	}

	$total_paginas = ceil(mysqli_num_rows(consulta($query)) / $tamanio_pagina);
	$pagina_anterior = $pagina - 1;
	$pagina_siguiente = $pagina + 1;

	echo "
	</div>
	<div class='row'>
		<div class='col-sm-12 text-center'>
			<div class='btn-group' role='group' aria-label='...'>";
				// Si hay que mostrar el enlace a la anterior página.
				if($pagina_anterior >= 1)
					echo "<a href='misObras.php?pagina=".$pagina_anterior."&a_mostrar=".$a_mostrar."'><button type='button' class='btn btn-default'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>Prev</button></a>";
				// Si hay que mostrar el enlace a la siguiente página.
				if($pagina_siguiente <= $total_paginas)
					echo "<a href='misObras.php?pagina=".$pagina_siguiente."&a_mostrar=".$a_mostrar."'><button type='button' class='btn btn-default'>Next<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span></button></a>";
			echo "</div>
		</div>
	</div>";

?>