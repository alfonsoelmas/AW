<!DOCTYPE html>
<html lang="es">
<head>
	<title>Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
	<link rel="stylesheet" href="css/estilobusq.css">
	<link rel="stylesheet" href="css/edicionStyle.css">
</head>
<body>
	<?php
		$pagina_actual="EdiciónFoto";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid text-center">    
		<div class="col-sm-10 text-left"> 
			<div class="panel panel-default margen-top">
				<div class="panel-heading">
					<p class=" h3 panel-title">Edición de foto</p>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 text-center">
							<img class="img-edicion" alt="" src="img/portadas/portada.png">
							<button type="button" class="btn btn-info margen-top">Editar imagen</button>
						</div>
						<div class="col-sm-9 text-left"> 
							<form method="post" action="">
								<span class="input-group-addon glyphicon glyphicon-text-size">Título</span>
								<input type="text" class="form-control" id="titulo" name="title" placeholder="Escribe aquí el título"/>
								<br>
								<span class="input-group-addon glyphicon glyphicon-text-size">Categorías</span>
								<input type="text" class="form-control" id="categoria" name="title" placeholder="Escribe aquí la categoría"/>
							</form>
						</div>
					</div>
				</div>  
			</div>
			<div class="col-sm-12 text-center">
				<button type="button" class="btn btn-warning margen-bottom">Guardar cambios realizados</button>
			</div>
		</div>
		<?php
			$pagina_actual="EdiciónFoto";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
		?>
	</div> <!--container-->

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>
