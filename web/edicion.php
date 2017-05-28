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
		$pagina_actual="Edición";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid text-center">    
		<form action="php/funciones/editar.php" method="POST" enctype="multipart/form-data">
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default margen-top">
					<div class="panel-heading">
						<p class=" h3 panel-title">Edición</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-8 text-left"> 
								<input id="imagen" name="imagen" type="file" class="file">
								<br>
								<span class="input-group-addon glyphicon glyphicon-text-size">Título</span>
								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe aquí el título"/>
								<br>
								<span class="input-group-addon glyphicon glyphicon-text-size">Sinópsis</span>
								<textarea class="form-control" id="sinopsis" name="sinopsis" placeholder="Escribe aquí la sinópsis"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" name="genero">
										<option value="">Elige el género</option>
										<option value="Comedia">Comedia</option>
										<option value="Novela">Novela</option>
										<option value="Drama">Drama</option>
										<option value="Terror">Terror</option>
										<option value="Historica">Histórica</option>
									</select>
								</div>	
							</div>
						</div>
					</div>  
				</div>
				<div class="col-sm-12 text-center">
					<button type="submit" class="btn btn-warning margen-bottom">Guardar cambios realizados</button>
				</div>
			</div>
		</form>
		<?php
			$pagina_actual="Edición";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
		?>
	</div> <!--container-->

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!--Scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/editarFoto.js"></script>

</body>
</html>