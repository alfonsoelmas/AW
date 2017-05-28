<!DOCTYPE html>
<html lang="es">
<head>
  <title>Categorías - Paper Dreams</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo2.css">

</head>

<body>


	<?php
		//generamos cabecera

		$pagina_actual="Categorías";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");
	?>
	
	<!--Creamos el contenido-->
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 

					<?php 
						//Lanzamos una query para obtener las categorias

						//Necesito obtener las categorias existentes (sin repeticion).
						$query = "SELECT DISTINCT categoria FROM libros";


						$consulta1 	= 	consulta($query);
						$filas 		= 	$consulta1->num_rows;
						$datosConsulta = $consulta1->fetch_assoc();

						//Hacemos un for del numero de categorias
						for($i = 0; $i<$filas; $i++){

							$query = 'SELECT id_libro, titulo, portada FROM libros WHERE categoria="'.$datosConsulta["categoria"].'" ORDER BY fecha DESC';
							$consulta2 	= 	consulta($query);
							$totRes		= 	$consulta2->num_rows;
							//Pintamos titulo
							?>
							<div class="panel panel-default">
							<div class="panel-heading">
								<?php 	echo '<a href="result-busqueda.php?categoria='.$datosConsulta["categoria"].'&esLibro=1">'?>
									<p class="panel-title h3"><?php echo $datosConsulta["categoria"]; ?>
								</a>
								<span class="badge"><?php echo $totRes ?></span></p>

							</div>					
							<div class="panel-body">
							<div class="row">
						<?php 
							//Lanzamos query de esa categoria recientemente TODO, no sé a qué altura va el LIMIT
							$query = 'SELECT id_libro, titulo, portada FROM libros WHERE categoria="'.$datosConsulta["categoria"].'" ORDER BY fecha DESC LIMIT 4 OFFSET 0';

							$consulta 	= 	consulta($query);
							$nResultados = 	$consulta->num_rows;//numero de resultados



							//Pintamos las 4 obras que hemos cargado
							while($row = $consulta->fetch_assoc()){
								?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail efecto-redondo">
										<?php 	echo '<a href="visualizacionLibro.php?id='.$row["id_libro"].'">';
												echo '<img alt="" src="'.$row["portada"].'" class="img-responsive imgP">';
												echo '<div class="caption">';
												echo '<p>'.$row["titulo"].'</p>';
										?>
											</div>
										</a>
									</div>
								</div>

							<?php
								$datosConsulta = $consulta1->fetch_assoc();
							}

							?>
									<div class="row">
										<div class="col-sm-12 text-center">
											<div class="btn-group" role="group" aria-label="...">
												<form method="get" action=<?php echo '"result-busqueda.php?categoria='.$datosConsulta["categoria"].'&esLibro=1"'; ?>>
												<input type="submit" value="Ver más" class="btn btn-lg"></input>
												</form>
											</div>
										</div>
									</div>
								</div>  
							</div>
							</div>
							<?php

						}

						$query = "SELECT id_bocetos, titulo, foto FROM bocetos ORDER BY fecha DESC LIMIT 4".PHP_EOL;
						$queryTot = "SELECT id_bocetos, titulo, foto FROM bocetos ORDER BY fecha DESC".PHP_EOL;


						$consulta 		= 	consulta($query);
						$consultaTot 	= 	consulta($queryTot);

							$filas = $consultaTot->num_rows;
					?>
					<div class="panel panel-default">
					<div class="panel-heading">
						<?php 	echo '<a href="result-busqueda.php?&esDibujo=1">'?>
							<p class="panel-title h3">Bocetos </a>
							<span class="badge"><?php echo $filas ?></span></p>

					</div>
					<div class="panel-body">
						<div class="row">
						<?php

						
						
							$nResultados = 	$consulta->num_rows;//numero de resultados
							//Pintamos las 4 obras que hemos cargado
							while($row = $consulta->fetch_assoc()){
								?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail efecto-redondo">
										<?php 	echo '<a href="visualizacionLibro.php?id='.$row["id_bocetos"].'">';
												echo '<img alt="" src="'.$row["foto"].'" class="img-responsive imgP">';
												echo '<div class="caption">';
												echo '<p>'.$row["titulo"].'</p>';
										?>
											</div>
										</a>
									</div>
								</div>

							<?php
							}

							?>
										<div class="row">
											<div class="col-sm-12 text-center">
												<div class="btn-group" role="group" aria-label="...">
													<form method="get" action=<?php echo '"result-busqueda.php?&esDibujo=1"';?>>
													<input type="submit" value="Ver más" class="btn btn-lg"></input>
													</form>
												</div>
											</div>
										</div>
									</div>  
								</div>
							</div>
						</div>
					


			
			<?php require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php"); ?>

		</div>
	</div>

	<?php  require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php")?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
