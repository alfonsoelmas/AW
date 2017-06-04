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
	?>
	
	<!--Creamos el contenido-->
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 
				
					<?php 
						//Lanzamos una query para obtener las categorias
						require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/categoriasFunctions.php");

						//Necesito obtener las categorias existentes (sin repeticion).
						$consulta1 = categorias();
						$filas = $consulta1->num_rows;
						$datosConsulta = $consulta1->fetch_assoc();
						

						//Hacemos un for del numero de categorias
						for($i = 0; $i<$filas; $i++)
						{
							$consulta = libros_categoria($datosConsulta['categoria']);
							$nResultados = 	$consulta->num_rows;//numero de resultados
							$categoria = $datosConsulta['categoria'];
							echo"<div class='panel panel-default'>
									<div class='panel-heading'>
										<p class='panel-title h3'>
												$datosConsulta[categoria]
											<span class='badge'>$nResultados</span>
										</p>
									</div>					
									<div class='panel-body'>
									<div class='row'>";
							
							

							//Pintamos las 4 obras que hemos cargado
							while($row = $consulta->fetch_assoc())
							{
								echo "<div class='col-sm-6 col-md-3'>
										<div class='thumbnail efecto-redondo'>
											<a href='visualizacionLibro.php?id_libro=$row[id_libro]'>
												<img alt='' src=$row[portada] class='img-responsive imgP' />
												<div class='caption'>
													<p>$row[titulo]</p>
												</div>
											</a>
										</div>
									</div>";

							}
							echo "	
									<div class='row'>
									<div class='col-sm-12 text-center'>
										<div class='btn-group' role='group' aria-label='...'>
											<form method='get' action='result-busqueda.php'>
												<input type='hidden' name='categoria' value='".$categoria."' class='btn btn-lg'>
												<input type='hidden' name='tipo' value='libro'>
												<input type='hidden' name='busq' value=''>
												<input type='submit' value='Ver más' class='btn btn-lg'>
											</form>
										</div>
										</div>
										</div>
										</div>  
										</div>
										</div>";
							$datosConsulta = $consulta1->fetch_assoc();
						}

						$consulta 	= 	bocetos_categoria();
						$filas = $consulta->num_rows;
					?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<p class="panel-title h3">Bocetos 
							<span class="badge"><?php echo $filas ?></span></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<?php
									$nResultados = 	$consulta->num_rows;//numero de resultados
									//Pintamos las 4 obras que hemos cargado
									while($row = $consulta->fetch_assoc())
									{
		
										echo "<div class='col-sm-6 col-md-3'>
												<div class='thumbnail efecto-redondo'>
													<a href='visualizacionBoceto.php?id=$row[id_bocetos]'>
														<img alt='' src=$row[foto] class='img-responsive imgP'>
														<div class='caption'>
															<p>$row[titulo]</p>
														</div>
													</a>
												</div>
											</div>";
									}
								?>
								<div class="row">
									<div class="col-sm-12 text-center">
										<div class="btn-group" role="group" aria-label="...">
											<form method="get" action=<?php echo "result-busqueda.php";?>>
												<input type="hidden" name="tipo" value="dibujo">
												<input type="hidden" name="categoria" value="terror">
												<input type="hidden" name="busq" value="">
												<input type="submit" value="Ver más" class="btn btn-lg">
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
	<?php  require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php");?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
