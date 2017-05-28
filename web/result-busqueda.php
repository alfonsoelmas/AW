<!DOCTYPE html>
<html lang="es">
<head>
	<title>Búsqueda - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
	<link rel="stylesheet" href="css/estilobusq.css">
</head>

<body>


 	<?php 
 	//Incluimos la cabecera
 	    $pagina_actual="Mi perfil";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>


	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left">

				<?php 
					//Incorporamos el filtrador
					require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/filtrador.php");
					//Incorporamos funciones de busqueda
					require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/funciones_busqueda.php");

					$busqueda;
					$resultado;
					$totBusqueda=0;
					$dato=false;

					if(isset($_GET["busqFacil"])){
						//Busqueda fácil
						$busqueda = $_GET["busqFacil"];

						//Busca solo libros
						$resultado = buscaLibros($busqueda);
						
					} else{
						//Busqueda avanzada

						$busqueda = $_GET["busq"];
						
						if(!isset($_GET["busq"]))
							$busqueda="";

						$tipo = $_GET["tipo"];
				
						$categoria = $_GET["categoria"];

						//Busca o libros o dibujos

						if($tipo=="libro"){
							//Buscamos libros con categoria
							$resultado = buscaLibrosCat($busqueda,$categoria);
						
						} else {
							//Buscamos bocetos
							$resultado = buscaDibujos($busqueda);
					
						}

						$totBusqueda = $resultado->num_rows;
						$dato=true;
					}


				?>

				<div class="panel panel-default" id="resultadosBusq">
					<div class="panel-heading">
						<p class=" h3 panel-title">Resultados de búsqueda <span class="badge"><?php echo $totBusqueda;?></span></p>
					</div>
					<div class="panel-body">
						<?php 

						while($dato && $resultado){
							echo '<div class="row">';
							for($j=0; $j<4 && $dato = $resultado->fetch_assoc(); $j++){

								$autor = dameAutor($dato["id_usuario"]);
								$titulo = $dato["titulo"];
								$valoracion = dameMedia($dato["id"]);
								$valoracion = redondea($valoracion); //La redondeamos
								$img = $dato["portada"];


								?>

								<div class="col-sm-6 col-md-3">
									<div class="thumbnail efecto-redondo">
										<img src=<?php echo '"'.$img.'"'; ?> alt="logo" class="img-responsive imgP">
										<div class="caption text-center">
											<p class="h3"><?php echo $titulo; ?></p>
											<p><?php echo $autor; ?></p>
											<p>

												<?php 

												for($i=0; $i<$valoracion; $i++){
													echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
												}

												for($i=$valoracion; $i<5; $i++){
													echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
												}


												?>

											</p>
										</div>
									</div>
								</div>

								<?php
							}
							echo '</div>';
						}



						?>

					</div> <!--panel-body-->
				</div>
			</div> <!--col-sm-10 text-left-->
			
			<?php require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php"); ?>
		</div> <!--row content-->
	</div> <!--container-fluid-->



	<?php require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
