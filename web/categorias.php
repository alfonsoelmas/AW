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
		include("php/funciones/genera_cabecera.php");
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
						$datosConsulta = $consulta->fetch_array(MYSQL_NUM);

						//Hacemos un for del numero de categorias
						for($i = 0; $i<$filas; $i++){

							//Pintamos titulo
						?>
							<div class="panel-heading">
								<p class="panel-title h3"><?php echo $datosConsulta[i]; ?></p>
							</div>
						<?php 
							//Lanzamos query de esa categoria ordenados por votos
							$query = "SELECT titulo, portada FROM libros WHERE categoria=$jugos[0]".PHP_EOL;
							$nResultados = 	$consulta->num_rows;//numero de resultados
							$datosResultados =  $consulta->fetch_array(MYSQL_NUM);

							//Las pintamos y hacemos el scroll de alguna forma TODO


						}

					?>

					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 1</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title2</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title3</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title4</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div>  
				</div>


				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title h3">Romance </p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 1</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 2</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 3</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 4</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div>  
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title h3">Ciencia-Ficción</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 1</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 2</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 3</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title 4</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div>  
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title h3">Bocetos</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
								<a href="">
								<img alt="" src="img/logo2.png" class="img-responsive imgP">
								<div class="caption">
								<p>Title 1</p>
								</div>
								</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
								<a href="">
								<img alt="" src="img/logo2.png" class="img-responsive imgP">
								<div class="caption">
								<p>Title2</p>
								</div>
								</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title3</p>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<a href="">
										<img alt="" src="img/logo2.png" class="img-responsive imgP">
										<div class="caption">
											<p>Title4</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div>  
				</div>
			</div>
			
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

</body>
</html>
