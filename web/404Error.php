<!DOCTYPE html>
<html lang="es">
<head>
	<title>404 Error</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
	<?php
		$pagina_actual="404Error";
		require_once('php/funciones/genera_cabecera.php');
	?>

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-6 text-left"> 
				<p class="h1">Error 404: Content Not Found</p>
				<span class="h3">Upssss... parece que el recurso que estás buscando no se encuentra disponible. Lamentamos el inconveniente :(</span>
			</div>
		</div>
	</div>

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>