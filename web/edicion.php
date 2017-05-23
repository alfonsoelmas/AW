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
		include("php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid text-center">    
		<div class="col-sm-10 text-left"> 
			<div class="panel panel-default margen-top">
				<div class="panel-heading">
					<p class="h3 panel-title">Edición</p>
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
								<span class="input-group-addon glyphicon glyphicon-text-size ">Sinopsis</span>
								<textarea  class="form-control" id='editor1' name='editor1' rows="10" placeholder="Erase una vez que se era..."></textarea>
							</form>
							<script type='text/javascript'>
								CKEDITOR.replace ('editor1');
							</script> 
							<button type="button" onclick="window.location.href='edicionCap.html'" class="btn btn-info margen-top"> Añadir capítulo</button>
							<button type="button" class="btn btn-info margen-top" data-toggle="collapse" data-target="#lCap">Desplegar lista de capitulos</button>
							<div id="lCap" class="collapse margen-top">
								<div class="list-group">
									<a href="edicionCap.html" class="list-group-item">
										<p class="h4 list-group-item-heading">Capitulo 1</p>
										<p class="list-group-item-text">Erase una vez que se era... la historia comienza y empieza la aventura.</p>
									</a>
									<a href="edicionCap.html" class="list-group-item">
										<p class="h4 list-group-item-heading">Capitulo 2</p>
										<p class="list-group-item-text">Nuestro viandante llega a Asturias, donde pasará un fin de semana de locura.</p>
									</a>
								</div>
							</div> 
						</div>
					</div>
				</div>  
			</div>
			<div class="col-sm-12 text-center">
			<button type="button" class="btn btn-warning margen-bottom">Guardar cambios realizados</button>
			</div>
		</div>
		<?php
			$pagina_actual="Edición";
			include("php/funciones/genera_bloque_derecha.php");
		?>
	</div>

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

</body>
</html>
