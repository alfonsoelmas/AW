<!DOCTYPE html>
<html lang="es">
<head>
	<title>Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/vistaUsuario.css">
</head>
<body>
	<?php
		$pagina_actual="Usuario";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<br>

	<!--Perfil-->
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-1"></div>
			<div class="col-sm-9 text-left"> 
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<?php
									$id = $_GET['id_usuario'];
								?>
								<img class="img-responsive img-circle" alt="" src="img/mafalda.jpg" width="200" height="200"/>
							</div>
							<div class="col-sm-7">
								<p class="h2" id="nombre">Alejandra López</p>
								<p class="datos"> alelop@domain.com<br>
								Madrid <br>
								España</p>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-primary btn-lg">
									<span class="glyphicon glyphicon-plus"></span> 
									Follow 
								</button>
							</div>
						</div>
						<br>
						<div class="row">
							<p class="descripcion">Mi nombre es Alejandra López, tengo 19 años. Me considero una persona alegre, sociable y muy curiosa a la que le apasiona leer y sobre todo escribir.</p>
						</div>
					</div>
				</div>
			</div>

			<?php
				$pagina_actual="Usuario";
				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
			?>
		</div> <!--row content-->

		<div class="row">
			<div class="col-sm-10">
				<div class="panel panel-default">
					<div class="panel-heading">
					  <h3 class="panel-title">Obras de Alejandra</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<table class="obras">
										<tr>
											<td>
												<a href="visualizacionLibro.php">
													<img src="img/logo2.png" class="imgP" alt="logo">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="caption">
													<p>Nombre Obra 1</p>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="ec-stars-wrapper">
													<a class="estrellas" href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<table class="obras">
										<tr>
											<td>
												<a href="visualizacionBoceto.php">
													<img src="img/logo2.png" class="imgP" alt="logo">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="caption">
													<p>Nombre Obra 2</p>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="ec-stars-wrapper">
													<a class="estrellas" href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div> <!--col-sm-6 col-md-3-->
						</div>

						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div> <!--panel body--> 
				</div>
			</div> <!--col-sm-10-->
		</div> <!--row-->
	</div> <!--container fluid-->

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>
	
	<!--Script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
