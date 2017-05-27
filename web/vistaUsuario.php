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
									// Pasamos el id del usuario al que visitamos. 
									$id = $_GET['usuario'];
									$usuario_actual = $_SESSION['usuario_actual'];

									require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/perfil_usuario.php");
									require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/seguir_usuario.php");
                                	
                                	// Buscamos los datos del perfil del usaurio al que visitamos. 
                                	$user = buscar_datos_usuario($id);

                                	$fila = $user->fetch_object();
							echo "<img class='img-responsive img-circle' alt='' src='$fila->foto' width='200' height='200'/>
							</div><!--col-sm-3-->
							<div class='col-sm-7'>
								<p class='h2' id='nombre'>$fila->nombre</p>
								<p class='datos'> $fila->email<br>
								$fila->ciudad <br>
								$fila->pais</p>
							</div><!--col-sm-7-->
							<div class='col-sm-2'>
								<form action='php/funciones/seguir_usuario.php' method='POST'>";
									echo "<input type='hidden' name='noSeguido' value='$id'/>";
									echo "<input type='hidden' name='actual' value='$usuario_actual'/>";
									if (!sigo($usuario_actual, $id)){
										echo "<button class='btn btn-primary btn-md' type='submit' id='follow'>
											<span class='glyphicon glyphicon-plus'></span>
											Seguir 
										</button>
								</form>";
									}
									else{
										echo "<form action='php/funciones/seguir_usuario.php' method='POST'>";
										echo "<input type='hidden' name='seguido' value='$id'/>";
										echo "<input type='hidden' name='actual' value='$usuario_actual'/>";
										echo "<input type='hidden' name='actual' value='$usuario_actual'/>
										<button class='btn btn-primary btn-md' type='submit' id='unfollow'>
											<span class='glyphicon glyphicon-minus'></span>
											Dejar de seguir 
										</button>";	
									} 
								echo "</form>
							</div><!--col-sm-2-->
						</div><!--row-->
						<br>
						<div class='row'>
							<p class='descripcion'>$fila->descripcion.</p>
						</div><!-- row-->";

						?>
					</div> <!--container-->
				</div> <!--jumbotron-->
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
					  <h3 class="panel-title">Obras de <?php echo $fila->nombre?></h3>
					</div>
					<div class="panel-body">
						<?php
							require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/mostrar_obras.php");
							echo "<div class='row'>";
								
							// Buscamos las obras del usaurio al que visitamos. 
                        	$usuario = buscar_libros($id);

							if (n_filas($usuario) > 0){
                    			$f = $usuario->fetch_object();
								echo "<div class='col-sm-6 col-md-3'>
									<div class='thumbnail efecto-redondo'>
										<table class='obras'>
											<tr>
												<td>
													<a href='visualizacionLibro.php'>
														<img src='$f->portada' class='imgP' alt='logo'>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class='caption'>
														<p>$f->titulo</p>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class='ec-stars-wrapper'>
														<a class='estrellas' href='#' data-value='1' title='Votar con 1 estrellas'>&#9733;</a>
														<a class='estrellas' href='#' data-value='2' title='Votar con 2 estrellas'>&#9733;</a>
														<a class='estrellas' href='#' data-value='3' title='Votar con 3 estrellas'>&#9733;</a>
														<a class='estrellas' href='#' data-value='4' title='Votar con 4 estrellas'>&#9733;</a>
														<a class='estrellas' href='#' data-value='5' title='Votar con 5 estrellas'>&#9733;</a>
													</div>
												</td>
											</tr>
										</table>
									</div> <!--thumbnail efecto-redondo-->
								</div> <!--col-sm-6 col-md-3-->
							</div><!--row-->
							<div class='row'>
								<div class='col-sm-12 text-center'>
									<div class='btn-group' role='group' aria-label='...''>
										<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>Prev</button>
										<button type='button' class='btn btn-default'>Next<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span></button>
									</div>
								</div>
							</div> <!--row-->";
							}
							else{
								echo "<div class='col-sm-12 text-center'>Este usuario no tiene obras.</div>";
							}

						?>
					</div> <!--panel body--> 
				</div>
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
