<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mis obras - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
</head>
<body>
	<?php
		$pagina_actual="Mis obras";
		include("php/funciones/genera_cabecera.php");
	?>
  
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default" id="bloque-inicio">
					<div class="panel-heading">
						<p class="panel-title h3">Mis obras</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="edicion.php">
										<img src="img/logo2.png" alt="" class="imgP">
										<div class="caption">
											<p>TítuloObra1</p>
											<p>NúmeroCapítulosObra1</p>
											<p>FechaCreaciónObra1</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="edicion.php">
										<img src="img/logo2.png" alt="" class="imgP">
										<div class="caption">
											<p>TítuloObra2</p>
											<p>NúmeroCapítulosObra2</p>
											<p>FechaCreaciónObra2</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="edicion.php">
										<img class="imgP" alt="" src="img/logo2.png">
										<div class="caption">
											<p>TítuloObra3</p>
											<p>NúmeroCapítulosObra3</p>
											<p>FechaCreaciónObra3</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="edicionFoto.php">
										<img src="img/logo2.png" alt="" class="imgP">
										<div class="caption">
											<p>TítuloObra4</p>
											<p>NúmeroCapítulosObra4</p>
											<p>FechaCreaciónObra4</p>
										</div>
									</a>
								</div>
							</div>
						</div> <!--row-->
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div> <!--panel-body-->  
				</div> <!--bloque inicio-->
			</div> <!--col-sm-10-->
			<?php
				$pagina_actual="Mis obras";
				include("php/funciones/genera_bloque_derecha.php");
			?>
		</div> <!--row content-->
	</div> <!--container-fluid-->

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
