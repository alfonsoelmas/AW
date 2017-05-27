<!DOCTYPE html>
<html lang="es">
<?php  sesion_start(); ?>

<?php
/*
//TODO ANTES DE HACER LAS CONSULTAS PASAR POR CONTROL ANTI INYECCTION SQL 
	
*/
function calculaValoracionToInt($valor){
	//Redondeamos a la baja...
	if($valor < 1){
		return 0;
	} else if ($valor < 2){
		return 1;
	} else if ($valor < 3){
		return 2;
	} else if ($valor < 4){
		return 3;
	} else if ($valor < 5){
		return 4;
	} else if ($valor < 6){
		return 5;
	} else {
		return -1;
	}
}

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
		$pagina_actual="Resultados de búsqueda";
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
										$datosConsulta = $consulta->fetch_assoc();
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
						 $pagina_actual_l;
						 $pagina_actual_d;



						 if(!isset($_GET['pagina_l'])){
						 	$pagina_actual_l=1;
						 } else {
						 	//COMPRUEBO QUE LA PÁGINA ES UN NUMERO
						 	$pagina_actual_l=$_GET['pagina_l']);
						 }

						 if(!isset($_GET['pagina_d'])){
						 	$pagina_actual_d=1;
						 } else {
						 	//COMPRUEBO QUE LA PÁGINA ES UN NUMERO
						 	$pagina_actual_d=$_GET['pagina_d']);
						 }

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
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha descendiente 
					 						//TODO
					 						$query = 'SELECT * FROM libros where titulo LIKE '/*TODO*/ ' OR contenido LIKE '/*TODO  */' ORDER BY fecha DESC'

					 					} else {
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha ascendiente

					 					}

					 				} else {
					 					if(strcmp($valorOrden,"descendente")){
											//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente

					 					} else {
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente
					 						
					 					}

					 				}

					 			} else {
					 				//No filtramos por el contenido de busqueda

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
					 						$query = 'SELECT * FROM libros  ORDER BY fecha DESC';

					 					} else {

					 						//Necesito los libros ordenados por valoraciones descendiente 
					 						//TODO
					 						
					 					}

					 				}

					 			}

					 		} else {	//En otro caso tenemos que filtrar la consulta por la categoría

					 			if($miroBusqueda){
					 				//La consulta filtrara por la busqueda también

					 				//Ahora filtramos x orden...
					 				if(strcmp($tipoOrden,"fecha")){
					 					if(strcmp($valorOrden,"descendente")){
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha descendiente 
					 						//TODO
					 						$query = 'SELECT * FROM libros where categoria="'.$categoria.'" AND (titulo LIKE '/*TODO*/ ' OR contenido LIKE '/*TODO  */') ORDER BY fecha DESC'

					 					} else {
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha ascendiente + categoria

					 					}

					 				} else {
					 					if(strcmp($valorOrden,"descendente")){
											//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente + categoria

					 					} else {
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente + categoria
					 						
					 					}

					 				}

					 			} else {
					 				//No filtramos por el contenido de busqueda

					 				//Ahora filtramos x orden...
					 				if(strcmp($tipoOrden,"fecha")){
					 					if(strcmp($valorOrden,"descendente")){

					 						//Necesito los libros ordenados por fecha descendiente 

					 						$query = 'SELECT * FROM libros  where categoria="'.$categoria.'" ORDER BY fecha DESC';

					 					} else {
					 						//Necesito los libros ordenados fecha ascendiente

					 						$query = 'SELECT * FROM libros where categoria="'.$categoria.'" ORDER BY fecha ASC';

					 					}

					 				} else {
					 					if(strcmp($valorOrden,"descendente")){

					 						//Necesito los libros ordenados por valoraciones descendiente 
					 						//TODO
					 						$query = 'SELECT * FROM libros where categoria="'.$categoria.'" ORDER BY fecha DESC';

					 					} else {

					 						//Necesito los libros ordenados por valoraciones descendiente 
					 						//TODO
					 						
					 					}

					 				}

					 			}


					 		}
						 
					 	//TODO NECESITO UNA CONSULTA QUE GUARDE EN $TOTALBUSQUEDA EL TOTAL DE RESULTADOS DE BUSQUEDA

 						$consulta 	= 	realiza_consulta($conn, $query);
						$filas 		= 	$consulta->num_rows;
						$datosConsulta = $consulta->fetch_assoc();

						//construimos la busqueda de libros
						//RECORDAR HACER LA CONSULTA CON DESPLAZAMIENTO Y LIMITE
						//RECORDAR HACER UN GET DE UN PUNTERO DE LA PAGINA
							?>
							<div class="panel panel-default" id="resultadosBusq">
							<div class="panel-heading">
								<p class=" h3 panel-title">Resultados de búsqueda de dibujos<span class="badge"><?php echo $totalBusqueda?></span></p>
							</div>
							<div class="panel-body">

							<?php
							//TODO $totalBusqueda = nº de resultados totales
							//TODO $totalConsulta = nºResultados en la consulta
							$maxFila=3;
							$maxCol=4;

							if($totalConsulta != 12){
								$maxFila = $totalConsulta/4; 
								//TODO maxCol???

							}

							for($i = 0; $i<$maxFila; $i++){
								?>
								<div class="row">


								<?php

								for($j = 0; $j<$maxCol; $j++){
									//TODO aqui pintamos el resultado:
									$titulo = ;//TODO $datosConsulta[i*4+j]->titulo;
									$autor = ;//TODO $datosConsulta[i*4+j]->autor;
									$valor = ;//TODO calculaValoracionToInt($datosConsulta[i*4+j]->valorMedio);
									$img = ; //TODO link a la imagen $datosConsulta[i*4+j]->img;
									$link = ; //TODO link a el libro $etcetcetc....

									?>
									<div class="col-sm-6 col-md-3">
										<div class="thumbnail efecto-redondo" onclick="location.href=<?php echo "'".$link."'"?>;">
											<img src=<?php echo '"'.$img.'"'?> alt="logo" class="img-responsive imgP">
											<div class="caption text-center">
												<p class="h3"><?php echo $titulo ?></p>
												<p><?php echo $autor ?>/p>
												<p>

												<!--valoraciones-->
												<?php 
													for($i=0; i<$valor; $i++) {
														echo'<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'
													}
													for($i=0; i<5-$valor; $i++) {
														echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>'
													}

												?>
												</p>
											</div>
										</div>
									</div>
								<?php
								}
								echo '</div> <!--row-->'
							}

							echo '<div class="row">'
							echo '<div class="col-sm-12 text-center">'
								echo '<nav aria-label="Page navigation">'
									echo '<ul class="pagination">'
										if($pagina_actual_l == 1)
										{ 
											echo '<li class="disabled">'
											echo '<a  href="#" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>'
											echo '</a>'
											echo '</li>'
										}
										else 
										{
						// $busqueda = trim($_GET['clave']);
						// $categoria = $_GET['categoria'];
						// $libroActivo = isset($_GET['esLibro']);
						// $dibujoActivo = isset($_GET['esDibujo']);
						// $pagina_actual_l;
						// $pagina_actual_d;
											echo '<li class="">'
											echo '<a  href="/result-busqueda.php?clave='.$busqueda.'&categoria='.$categoria.'&esLibro='.$libroActivo.'&esDibujo='.$dibujoActivo.'&pagina_l='.$pagina_actual_l-1.'&pagina_d='.$pagina_actual_d.'" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>'
											echo '</a>'
											echo '</li>'
										}
										$ultimaPagina = $totalBusqueda/12;

										//Aqui pintamos los numeros
										for($i=$pagina_actual_l-4; $i<=$pagina_actual_l+4; $i++){
											if($i>=0 && $i<=$ultimaPagina){
												if($i==$pagina_actual_l){
													//TODO HEMOS HECHO SESION START?
													echo '<li class="active"><a href="#">'.$i.'</a></li>'
												} else {
													echo '<li><a href="/result-busqueda.php?clave='.$busqueda.'&categoria='.$categoria.'&esLibro='.$libroActivo.'&esDibujo='.$dibujoActivo.'&pagina_l='.$i.'&pagina_d='.$pagina_actual_d.'" >'.$i.'</a></li>' //TODO EN LOS HREF ME FALTAN LOS ORDENES

												}
											}
										}


										//ahora pinto la flecha de ultima pagina:
										if($pagina_l == $ultimaPagina)
										{ 
											echo '<li class="disabled">'
											echo '<a  href="#" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>'//todo mirando pal otro laoo... glihicon???
											echo '</a>'
											echo '</li>'
										}
										else 
										{

											echo '<li class="">'
											echo '<a  href="/result-busqueda.php?clave='.$busqueda.'&categoria='.$categoria.'&esLibro='.$libroActivo.'&esDibujo='.$dibujoActivo.'&pagina_l='.$pagina_actual_l-1.'&pagina_d='.$pagina_actual_d.'" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>' // todo lo mismo q el todo de arriba
											echo '</a>'
											echo '</li>'
										}
											//cerramos el bloque de los resultados de libros
											echo 							'</ul>'
											echo						'</nav>'
											echo					'</div> <!--col-sm-12 text-center-->'
											echo				'</div> <!--row-->'
											echo			'</div> <!--panel-body-->'
											echo		'</div>'
											echo	'</div> <!--col-sm-10 text-left-->'


						 }






						 if($dibujoAtivo){

								if($miroBusqueda){
					 				//La consulta filtrara por la busqueda también

					 				//Ahora filtramos x orden...
					 				if(strcmp($tipoOrden,"fecha")){
					 					if(strcmp($valorOrden,"descendente")){
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha descendiente 
					 						//TODO
					 						$query = 'SELECT * FROM dibujos where titulo LIKE '/*TODO*/ ' ORDER BY fecha DESC'

					 					} else {
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por fecha ascendiente

					 					}

					 				} else {
					 					if(strcmp($valorOrden,"descendente")){
											//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente

					 					} else {
					 						//TODO
					 						//Necesito los libros cuyo titulo de capitulo o titulo de libro o contenido de capitulo contenga "param" ordenado por valoraciones descendiente
					 						
					 					}

					 				}

					 			} else {
					 				//No filtramos por el contenido de busqueda

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
					 						$query = 'SELECT * FROM libros  ORDER BY fecha DESC';

					 					} else {

					 						//Necesito los libros ordenados por valoraciones descendiente 
					 						//TODO
					 						
					 					}

					 				}

					 			}


							$consulta 	= 	realiza_consulta($conn, $query);
							$filas 		= 	$consulta->num_rows;
							$datosConsulta = $consulta->fetch_assoc();

							//construimos la busqueda de dibujos
							//RECORDAR HACER LA CONSULTA CON DESPLAZAMIENTO Y LIMITE
							//RECORDAR HACER UN GET DE UN PUNTERO DE LA PAGINA

							?>
							<div class="panel panel-default" id="resultadosBusq">
							<div class="panel-heading">
								<p class=" h3 panel-title">Resultados de búsqueda de Libros<span class="badge"><?php echo $totalBusqueda?></span></p>
							</div>
							<div class="panel-body">

							<?php
							//TODO $totalBusqueda = nº de resultados totales
							//TODO $totalConsulta = nºResultados en la consulta
							$maxFila=3;
							$maxCol=4;

							if($totalConsulta != 12){
								$maxFila = $totalConsulta/4; 
								//TODO maxCol???

							}

							for($i = 0; $i<$maxFila; $i++){
								?>
								<div class="row">


								<?php

								for($j = 0; $j<$maxCol; $j++){
									//TODO aqui pintamos el resultado:
									$titulo = ;//TODO $datosConsulta[i*4+j]->titulo;
									$autor = ;//TODO $datosConsulta[i*4+j]->autor;
									$valor = ;//TODO calculaValoracionToInt($datosConsulta[i*4+j]->valorMedio);
									$img = ; //TODO link a la imagen $datosConsulta[i*4+j]->img;
									$link = ; //TODO link a el libro $etcetcetc....

									?>
									<div class="col-sm-6 col-md-3">
										<div class="thumbnail efecto-redondo" onclick="location.href=<?php echo "'".$link."'"?>;">
											<img src=<?php echo '"'.$img.'"'?> alt="logo" class="img-responsive imgP">
											<div class="caption text-center">
												<p class="h3"><?php echo $titulo ?></p>
												<p><?php echo $autor ?>/p>
												<p>

												<!--valoraciones-->
												<?php 
													for($i=0; i<$valor; $i++) {
														echo'<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'
													}
													for($i=0; i<5-$valor; $i++) {
														echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>'
													}

												?>
												</p>
											</div>
										</div>
									</div>
								<?php
								}
								echo '</div> <!--row-->'
							}

							echo '<div class="row">'
							echo '<div class="col-sm-12 text-center">'
								echo '<nav aria-label="Page navigation">'
									echo '<ul class="pagination">'
										if($pagina_actual_l == 1)
										{ 
											echo '<li class="disabled">'
											echo '<a  href="#" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>'
											echo '</a>'
											echo '</li>'
										}
										else 
										{
						// $busqueda = trim($_GET['clave']);
						// $categoria = $_GET['categoria'];
						// $libroActivo = isset($_GET['esLibro']);
						// $dibujoActivo = isset($_GET['esDibujo']);
						// $pagina_actual_l;
						// $pagina_actual_d;
											echo '<li class="">'
											echo '<a  href="/result-busqueda.php?clave='.$busqueda.'&categoria='.$categoria.'&esLibro='.$libroActivo.'&esDibujo='.$dibujoActivo.'&pagina_l='.$pagina_actual_l-1.'&pagina_d='.$pagina_actual_d.'" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>'
											echo '</a>'
											echo '</li>'
										}
										$ultimaPagina = $totalBusqueda/12;

										//Aqui pintamos los numeros
										for($i=$pagina_actual_l-4; $i<=$pagina_actual_l+4; $i++){
											if($i>=0 && $i<=$ultimaPagina){
												if($i==$pagina_actual_l){
													//TODO HEMOS HECHO SESION START?
													echo '<li class="active"><a href="#">'.$i.'</a></li>'
												} else {
													echo '<li><a href="/result-busqueda.php?clave='.$busqueda.'&categoria='.$categoria.'&esLibro='.$libroActivo.'&esDibujo='.$dibujoActivo.'&pagina_l='.$i.'&pagina_d='.$pagina_actual_d.'" >'.$i.'</a></li>'

												}
											}
										}


										//ahora pinto la flecha de ultima pagina:
										if($pagina_l == $ultimaPagina)
										{ 
											echo '<li class="disabled">'
											echo '<a  href="#" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>'//todo mirando pal otro laoo... glihicon???
											echo '</a>'
											echo '</li>'
										}
										else 
										{

											echo '<li class="">'
											echo '<a  href="/result-busqueda.php?clave='.$busqueda.'&categoria='.$categoria.'&esLibro='.$libroActivo.'&esDibujo='.$dibujoActivo.'&pagina_l='.$pagina_actual_l-1.'&pagina_d='.$pagina_actual_d.'" aria-label="Previous">'
												echo '<span aria-hidden="true">&laquo;</span>' // todo lo mismo q el todo de arriba
											echo '</a>'
											echo '</li>'
										}
										//cerramos el bloque de los resultados de libros
											echo 							'</ul>'
											echo						'</nav>'
											echo					'</div> <!--col-sm-12 text-center-->'
											echo				'</div> <!--row-->'
											echo			'</div> <!--panel-body-->'
											echo		'</div>'
											echo	'</div> <!--col-sm-10 text-left-->'




						 }


					} else {
						header("Location: 404Error.php");
					}

				?>

			
			<?php
				$pagina_actual="Resultado de búsqueda";
				include("php/funciones/genera_bloque_derecha.php");
			?>
		</div> <!--row content-->
	</div> <!--container-fluid-->

	<?php include("php/funciones/genera_pie.php"); ?>
	<?php cerrar_conexion($conn);?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
