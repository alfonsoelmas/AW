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
		$pagina_actual="EdiciónCap";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid text-center">    
		<div class="col-sm-10 text-left"> 
			<div class="panel panel-default">
				<div class="panel-heading">
					<p class="h3 panel-title">Capitulo [N] - +nombre capitulo+ - +nombre libro+</p>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 text-left"> 
							<form method="post" action="">
								<span class="input-group-addon glyphicon glyphicon-text-size">Título del capítulo</span>
								<input type="text" class="form-control" id="titulo" name="title" placeholder="Escribe aquí el título"/>
								<br>
								<span class="input-group-addon glyphicon glyphicon-text-size ">Sinópsis del capítulo</span>
								<textarea  class="form-control" id='editor1' name='editor1' rows="10" placeholder="Erase una vez que se era..."></textarea>
								<br>
								<span class="input-group-addon glyphicon glyphicon-text-size ">Contenido del capítulo</span>
								<textarea class="form-control" id='editor2' name='editor1' rows="10" placeholder="Erase una vez que se era..."></textarea>
							</form>
							<script type='text/javascript'>
								CKEDITOR.replace ('editor1');
								CKEDITOR.replace ('editor2');
							</script> 
							<button type="button" class="btn btn-warning margen-top">Guardar cambios</button>
						</div>
					</div>
				</div>  
			</div>
		</div>
		<?php
			$pagina_actual="EdiciónCap";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
		?>
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
