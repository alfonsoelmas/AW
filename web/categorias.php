<!DOCTYPE html>
<html lang="es">
<?php  sesion_start(); ?>

<head>
  <title>Categorías - Paper Dreams</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo2.css">

</head>

<body>
	<?php
		$pagina_actual="categorias";
		<?php require_once('php/funciones/genera_cabecera.php'); genera_cabecera('$pagina_actual');?>
		include("php/config/connection.php");
	?>
	

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default">

					<?php 
						//Lanzamos una query para obtener las categorias

						$conn = conectar();
						//Necesito obtener las categorias existentes (sin repeticion).
						$query = "SELECT DISTINCT categoria FROM libros";


						$consulta 	= 	realiza_consulta($conn, $query);
						$filas 		= 	$consulta->num_rows;
						$datosConsulta = $consulta->fetch_assoc();

						//Hacemos un for del numero de categorias
						for($i = 0; $i<$filas; $i++){

							//Pintamos titulo
							?>
							<div class="panel-heading">
								<?php 	echo '<a href="result-busqueda.php?categoria='.$datosConsulta["categoria"].'">'?>
									<p class="panel-title h3"><?php echo $datosConsulta["categoria"]; ?></p> 
								</a>
								<span class="badge"><?php echo $filas?></span></p>

							</div>					
							<div class="panel-body">
								<div class="row">
						<?php 
							//Lanzamos query de esa categoria recientemente TODO, no sé a qué altura va el LIMIT
							$query = "SELECT id_libro, titulo, portada FROM libros WHERE categoria=$datosConsulta[0] ORDER BY fecha DESC LIMIT 4".PHP_EOL;


							$consulta 	= 	realiza_consulta($conn, $query);
							$nResultados = 	$consulta->num_rows;//numero de resultados



							//Pintamos las 4 obras que hemos cargado
							while($row = $consulta->fetch_assoc()){
								?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail efecto-redondo">
										<?php 	echo '<a href="visualizacionLibro.php?id='.$row["id_libro"].'">'
												echo '<img alt="" src="'.$row["portada"].'" class="img-responsive imgP">'
												echo '<div class="caption">'
												echo '<p>'.$row["titulo"].'</p>'
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
												<button type="button" class="btn btn-default">Ver más<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
											</div>
										</div>
									</div>
								</div>  
							</div>
							<?php

						}

					?>

							
			<!--TODO, esto debería hacerse con php-->
			<div class="col-sm-2 sidenav">
				<div class="dropdown text-left">
					<p><a href="misObras.html"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Mis obras</a></p>
					<p><a href="misSeguidores.html"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Mis seguidores</a></p>
					<p><a href="miPerfil.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mi perfil</a></p>
				</div>
			</div>
		</div>
	</div>

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		function siguiente(){

		}

	</script>

</body>
</html>
