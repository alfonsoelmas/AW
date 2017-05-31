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
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/control_accesos.php");
		controlaAcceso();
	?>

	<br>

	<!--Perfil-->
	<div class="container-fluid text-center">    
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-9 text-left"> 
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<?php
									// Pasamos el id del usuario al que visitamos.
 									require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/perfil_usuario.php");
									require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/seguir_usuario.php");
									require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/control_accesos.php");
									controlaAcceso();

									if(isset($_GET['usuario']))
									{
										$id =  $_GET['usuario'];

										if(isset($_SESSION['usuario_actual']))
										{
											$usuario_actual = $_SESSION['usuario_actual'];

											if($id == $usuario_actual)
	                                		{	
		                                		header("Location: miPerfil.php");
	                                			exit();
	                                		}
										}

	                                	// Buscamos los datos del perfil del usaurio al que visitamos. 
	                                	$user = buscar_datos_usuario($id);

	                                	if(!($fila = $user->fetch_object()))
	                                	{
	                                		header("Location: 404error.php");
                                			exit();
	                                	}
                                	}
                                	else
                                	{
                                		header("Location: 404error.php");
                                		exit();
                                	}
                                ?>
								<img class='img-responsive img-circle' alt='' src='<?php echo $fila->foto ?>' width='200' height='200'/>
							</div><!--col-sm-3-->
							<div class='col-sm-7'>
								<p class='h2' id='nombre'><?php echo $fila->nombre ?></p>
								<p class='datos'> <?php echo $fila->email ?><br>
								<?php echo $fila->ciudad ?> <br>
								<?php echo $fila->pais ?></p>
							</div><!--col-sm-7-->
							<div class='col-sm-2'>
								<?php
									// BOTON

									if(isset($_SESSION['usuario_actual']))
									{
										echo "
										<form action='php/funciones/seguir_usuario.php' method='POST'>
											<input type='hidden' name='noSeguido' value='$id'/>
											<input type='hidden' name='actual' value='$usuario_actual'/>";
											
											if (!sigo($usuario_actual, $id)){
												echo "
												<button class='btn btn-primary btn-md' type='submit' id='follow'>
													<span class='glyphicon glyphicon-plus'></span>
													Seguir 
												</button>
										</form>";
											}
											else{
												echo "
										<form action='php/funciones/seguir_usuario.php' method='POST'>
											<input type='hidden' name='seguido' value='$id'/>
											<input type='hidden' name='actual' value='$usuario_actual'/>
											<input type='hidden' name='actual' value='$usuario_actual'/>
												<button class='btn btn-primary btn-md' type='submit' id='unfollow'>
													<span class='glyphicon glyphicon-minus'></span>
													Dejar de seguir 
												</button>";	
											}
									}
								?> 
								</form>
							</div><!--col-sm-2-->
						</div><!--row-->
						<br>
						<div class='row'>
							<p class='descripcion'><?php echo $fila->descripcion ?></p>
						</div><!-- row-->
					</div> <!--container-->
				</div> <!--jumbotron-->
			</div>

			<?php
				$pagina_actual="Usuario";
				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
			?>
		</div> <!--row-->

		<!--LIBROS-->
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Libros de <?php echo $fila->nombre?></h3>
					</div>
					<div class="panel-body">
						<div class="container">
						  	<div class="row">
								<div class="col-md-10"> 
						        	<?php
						  			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/mostrar_obras.php");
				  					// buscamos las obras de los usuarios
				  					$resultado = buscar_libros($id);

					  				if ($resultado && n_filas($resultado) > 0){
	            						echo "
	            						<div class='carousel slide' id='theCarouselBocetos'>
								        	<div class='carousel-inner'>";
	 	          							$libro = $resultado->fetch_object();
					  							echo "
					  							<div class='item active'>
					  								<div class='col-xs-4'>
					  									<a href='visualizacionLibro.php?id_libro=$libro->id_libro'><img src=$libro->portada class='img-responsive img-carousel'></a>
					  									<p>$libro->titulo</p>
					  								</div>
					  							</div> <!--acive-->";
					  						while ($libro = $resultado->fetch_object()){
					  							echo "
					  							<div class='item'>
					            					<div class='col-xs-4'>
					            						<a href='#1'><img src='$libro->portada' class='img-responsive img-carousel'></a>
					            						<p>$libro->titulo</p>
					            					</div>
					          					</div>";
					  						}
								        	echo "
								        	</div><!--carousel-inner-->
								        	<a class='left carousel-control' href='#theCarouselBocetos' data-slide='prev'><i class='glyphicon glyphicon-chevron-left'></i></a>
								        	<a class='right carousel-control' href='#theCarouselBocetos' data-slide='next'><i class='glyphicon glyphicon-chevron-right'></i></a>
								      	</div><!--carousel slide multi-item-carousel-->";
	            					}
	            					else{
	            						echo "<div class='text-center'>Este usuario no tiene obras.</div>";
	            					}

						        	?>
							    </div> <!--col-ms-12-->
						  	</div> <!--row-->
						</div> <!--container-->
					</div> <!--panel body--> 
				</div><!--panel panel-default-->
			</div> <!--col-sm-10-->
		</div> <!--row-->

		<!--BOCETOS-->
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Bocetos de <?php echo $fila->nombre?></h3>
					</div>
					<div class="panel-body">
						<div class="container">
						  	<div class="row">
								<div class="col-md-10"> 
						        	<?php
						  			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/mostrar_obras.php");
				  					// buscamos las obras de los usuarios
				  					$resultado = buscar_bocetos($id);

					  				if ($resultado && n_filas($resultado) > 0){
	            						echo "
	            						<div class='carousel slide' id='theCarouselLibros'>
								        	<div class='carousel-inner'>";
	 	          							$boceto = $resultado->fetch_object();
					  							echo "
					  							<div class='item active'>
					  								<div class='col-xs-4'>
					  									<a href='visualizacionBoceto.php?id=$boceto->id_bocetos'><img src=$boceto->foto class='img-responsive img-carousel'></a>
					  									<p>$boceto->titulo</p>
					  								</div>
					  							</div> <!--acive-->";
					  						while ($boceto = $resultado->fetch_object()){
					  							echo "
					  							<div class='item'>
					            					<div class='col-xs-4'>
					            						<a href='visualizacionBoceto.php?id=$boceto->id_bocetos'><img src='$boceto->foto' class='img-responsive img-carousel'></a>
					            						<p>$boceto->titulo</p>
					            					</div>
					          					</div>";
					  						}
								        	echo "
								        	</div><!--carousel-inner-->
								        	<a class='left carousel-control' href='#theCarouselLibros' data-slide='prev'><i class='glyphicon glyphicon-chevron-left'></i></a>
								        	<a class='right carousel-control' href='#theCarouselLibros' data-slide='next'><i class='glyphicon glyphicon-chevron-right'></i></a>
								      	</div><!--carousel slide multi-item-carousel-->";
	            					}
	            					else{
	            						echo "<div class='text-center'>Este usuario no tiene obras.</div>";
	            					}

						        	?>
							    </div> <!--col-ms-12-->
						  	</div> <!--row-->
						</div> <!--container-->
					</div> <!--panel body--> 
				</div><!--panel panel-default-->
			</div> <!--col-sm-10-->
		</div> <!--row-->
	</div> <!--container fluid-->
	<br>

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>
	
	<!--Script-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
