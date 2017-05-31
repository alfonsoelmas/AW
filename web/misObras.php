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
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/control_accesos.php");

		$comp = controlaSesion();
		?>
  
		<div class="container-fluid text-center">    
			<div class="row content">
				<div class="col-sm-10 text-left"> 
					<div class="panel panel-default" id="bloque-inicio">
						<div class="panel-heading">
							<p class="panel-title h3">Mis obras</p>
						</div>
						<div class="panel-body">
							<?php
								require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/muestra_mis_obras.php");
							?>
						</div> <!--panel-body-->  
					</div> <!--bloque inicio-->
				</div> <!--col-sm-10-->
				<?php
					$pagina_actual="Mis obras";
					require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
				?>
			</div> <!--row content-->
		</div> <!--container-fluid-->

		<?php 
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
		?>

		<!--Scripts-->
		<script type="text/javascript" src="js/goTo.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
