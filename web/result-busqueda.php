<!DOCTYPE html>
<html lang="es">

<?php
/*
type=libro/dibujo (default ambos)
categoria=categoriaquesea (default todas)
clave=claveBusqueda	(default todo)
orden=fecha,valoracion (default fecha)

miro si es libro/dibujo
	si es libro:
		miro categoria
			si !categoria:
				miro busqueda
				miro orden
					si !orden o orden=fecha:
						select from libros where title like "busqueda" or contenido like "busqueda" order by fecha desc
					else
						select from libros where title like "busqueda" or contenido like "busqueda" order by valoracion (CONSULTA MAL HECHA, YA Q VALORACIONES HAY Q SACARLA DE OTRA TABLA)
			else
				miro busqueda
				miro orden
					si !orden o orden=fecha:
						select from libros where (title like "busqueda" or contenido like "busqueda") and categoria="categoria" order by fecha desc
					else
						select from libros where (title like "busqueda" or contenido like "busqueda") and categoria="categoria" order by valoracion (CONSULTA MAL HECHA, YA Q VALORACIONES HAY Q SACARLA DE OTRA TABLA)

		consulta en libros con esa categoria y busqueda ordenado por orden(default) fecha.
	si es dibujo:
		miro busqueda
		miro orden
			si !orden o orden=fecha:
				select from dibujos where title like "busqueda" order by fecha desc
			else
				select from dibujos where title like "busqueda" order by valoracion (CONSULTA MAL HECHA, YA Q VALORACIONES HAY Q SACARLA DE OTRA TABLA)

	caso ambos, realizar ambas consultas
	
*/
?>

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
		$pagina_actual="Resultado de búsqueda";
		include("php/funciones/genera_cabecera.php");
		include("php/config/connection.php");
	?>
    
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default" id="opcionesBusq">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-11">
								<p class="h3 panel-title">Opciones de búsqueda</p>
							</div>
							<div class="col-sm-1 text-center">
								<button type="button" class="btn btn-default margen-top" data-toggle="collapse" data-target="#opcionesBusqBody">+</button>
							</div>
						</div>
					</div>
					<div class="panel-body" id="opcionesBusqBody">
						<form method="get" action="result-busqueda.php">
							<!--TODO falta busqueda avanzada, un input de esta busqueda, etcq-->
							<span> Filtrar por: </span>
							<div class="row">
								<div class="checkbox">
									<input type="checkbox" name="libroActivo" aria-label="Libros"> Libros
								</div>
								<!--Mostramos todas las categorias-->
								Categoría del libro: 
								<select name="categoria">
								  <option value="todas">todas</option>

								  <?php 
								  	$conn = conectar();
								  	$query = "SELECT DISTINCT categoria FROM libros";

								  	$consulta 	= 	realiza_consulta($conn, $query);
									$filas 		= 	$consulta->num_rows;
									$datosConsulta = $consulta->fetch_assoc();

									for($i = 0; $i<$filas; $i++){
										echo '<option value="'.$datosConsulta["categoria"].'">'.$datosConsulta["categoria"].'</option>'
									}

								  ?>
								</select> 
								<div class="checkbox">
									<input type="checkbox" name="dibujoActivo" aria-label="Diseños"> Diseños  
								</div>

								<div>
									ordenar:<br>
									<input type="radio" name="tipoOrden" value="fecha"> Fecha
  									<input type="radio" name="tipoOrden" value="valoraciones"> Valoraciones<br>
  									<input type="radio" name="valorOrden" value="ascendente"> ascendente
  									<input type="radio" name="valorOrden" value="descendente"> descendente
								</div>
							</div>
							<input type="submit" name="filtro" value="filtro">
						</form>
					</div>
				</div>
				<?php 

					
					if($_GET){
						 $busqueda = trim($_GET['clave']);
						 $categoria = $_GET['categoria'];
						 $libroActivo = isset($_GET['esLibro']);
						 $dibujoActivo = isset($_GET['esDibujo']);

						 $tipoOrden;

						 if(isset($_GET['tipoOrden'])){
						 	$tipoOrden = $_GET['tipoOrden'];
						 } else {
						 	$tipoOrden = "fecha";
						 }

						 if(isset($_GET['tipoOrden'])){
						 	$valorOrden = $_GET['valorOrden'];
						 } else {
						 	$valorOrden = "descendente";
						 }

						 $miroBusqueda = isset($_GET['clave'])

						 $query;

						 if($libroActivo){
					 		//Miramos categoría:
					 		//En el caso de que la categoría sea todas, o no halla categoría... la consulta alos libros será más simple
					 		if( !isset($_GET['categoria']) || strcmp($categoria,"todas")){
					 			
					 			if($miroBusqueda){
					 				//La consulta filtrara por la busqueda también

					 				//Ahora filtramos x orden...
					 				if(strcmp($tipoOrden,"fecha")){
					 					if(strcmp($valorOrden,"descendente")){

					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha descendiente 
					 						//TODO
					 						$query = 'SELECT * FROM libros where titulo LIKE '/*TODO*/ ' OR contenido LIKE '/*TODO  */' ORDER BY fecha DESC'

					 					} else {
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha ascendiente

					 					}

					 				} else {
					 					if(strcmp($valorOrden,"descendente")){

					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente

					 					} else {

					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente
					 						
					 					}

					 				}

					 			} else {
					 				//No filtramos por el contenido de busqueda

					 				//Ahora filtramos x orden...
					 				//Ahora filtramos x orden...
					 				if(strcmp($tipoOrden,"fecha")){
					 					if(strcmp($valorOrden,"descendente")){

					 						//Necesito los libros ordenados por fecha descendiente 

					 						$query = 'SELECT * FROM libros  ORDER BY fecha DESC';

					 					} else {
					 						//Necesito los libros ordenados fecha ascendiente

					 						$query = 'SELECT * FROM libros  ORDER BY fecha ASC';

					 					}

					 				} else {
					 					if(strcmp($valorOrden,"descendente")){

					 						//Necesito los libros ordenados por valoraciones descendiente 
					 						//TODO

					 					} else {

					 						//Necesito los libros ordenados por valoraciones descendiente 
					 						//TODO
					 						
					 					}

					 				}

					 			}

					 		} else {	//En otro caso tenemos que filtrar la consulta por la categoría

					 			if($miroBusqueda){
					 				//La consulta filtrara por la busqueda también

					 			} else {
					 				//No filtramos
					 				
					 			}

					 		}
						 }

						 if($dibujoAtivo){

						 }


					} else {
						header("Location: 404Error.php");
					}

				?>
				<div class="panel panel-default" id="resultadosBusq">
					<div class="panel-heading">
						<p class=" h3 panel-title">Resultados de búsqueda <span class="badge">134</span></p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
						</div> <!--row-->
						
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<img src="img/logo2.png" alt="logo" class="img-responsive imgP">
									<div class="caption text-center">
										<p class="h3">Titulo 1</p>
										<p>Autor</p>
										<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></p>
									</div>
								</div>
							</div>
						</div> <!--row-->
						
						<div class="row">
							<div class="col-sm-12 text-center">
								<nav aria-label="Page navigation">
									<ul class="pagination">
										<li class="disabled">
											<a  href="#" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">6</a></li>
										<li><a href="#">7</a></li>
										<li><a href="#">8</a></li>
										<li><a href="#">9</a></li>
										<li>
											<a href="#" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
									</ul>
								</nav>
							</div> <!--col-sm-12 text-center-->
						</div> <!--row-->
					</div> <!--panel-body-->
				</div>
			</div> <!--col-sm-10 text-left-->
			
			<?php
				$pagina_actual="Resultado de búsqueda";
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
