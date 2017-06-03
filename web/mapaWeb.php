<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mapa web - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="css/aboutUs.css">
</head>
<body>
	<?php
		$pagina_actual="Mapa web";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<!--

	>home
		>crearLibro
			>crearCapitulo
		>crearBoceto
	>about us
	>contacto
	>Categorias
	>busqueda
	>log-in
		>Mis obras
			>visualicacionLibro
			>visualizacionBoceto
		>Mi perfil
		>Mis seguidores
		>Siguiendo
	>registro



	-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10">
				<ul>
	    			<li>
	    				<a href="index.php">home</a>
	    				<ul>
	    					<li>
	    						<a href="edicion.php"> crear libro </a>
	    						<ul>
	    							<li>
	    								<a href="edicionCap.php"> crear capítulo </a>	
	    							</li>
	    						</ul>
	    					</li>
	    					<li><a href="edicionFoto.php">crear boceto</a></li>
	    				</ul>
	    			</li>
	    			<li><a href="aboutUs.php">about us</a></li>
	    			<li><a href="contacto.php">contacto</a></li>
	    			<li><a href="categorias.php">categorias</a></li>
	    			<li><a href="result-busqueda.php">busqueda</a></li>
	    			<li>
	    				<a href="login.php">login</a>
	    				<ul>
	    					<li>
	    						<a href="misObras.php">mis obras</a>
	    						<ul>
	    							<li><a href="visualizacionLibro.php">visualizacion libro</a></li>
	    							<li><a href="visualizacionBoceto.php">visualizacion boceto</a></li>
	    						</ul>
	    					</li>
	    					<li><a href="miPerfil.php">mi perfil</a></li>
	    					<li><a href="misSeguidores.php">mis seguidores</a></li>
	    					<li><a href="siguiendo.php">siguiendo</a></li>
	    				</ul>
	    			</li>
	    			<li><a href="registro.php">registro</a></li>
	    			<li><a href="mapaWeb.php">mapa web</a></li>
		    	</ul>
			</div>

			<?php
				$pagina_actual="Mapa web";
				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
			?>
		</div>
	</div>

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
