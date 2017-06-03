<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/bocetos.php");
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/comentarios.php");

	$id_boceto = $_GET['id'];

	$resultado = consulta_datos($id_boceto);

	if($resultado)
	{
		$boceto = $resultado->fetch_object();

		$titulo = $boceto->titulo;
		$descripcion = $boceto->descripcion;
		$fecha = $boceto->fecha;
		$imagen = $boceto->foto;
		$autor = $boceto->id_usuario;
	}
	else
	{
		header("Location: 404Error.php");
	}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/visualizacion.css">
	<link rel="stylesheet" href="css/estilo2.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
	<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		$pagina_actual="$titulo";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/control_accesos.php");
		controlaAcceso();
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 text-left"> 
				<div class="row">
					<img class="col-sm-6 text-left img-responsive center-block" data-toggle="modal" data-target="	#myModal2" id="portada" alt="" src=<?php
												$ruta = $imagen;
												echo $ruta 
										?> />
					<div class="text-center" id="texto">
						<p class="h3"><?php echo $titulo ?></p>
						<div id="sipnopsis">
							<?php echo $descripcion ?>
						</div>

						<?php 

			    		if(!$_SESSION || $_SESSION['usuario_actual'] != $autor){
			    			?><a href=<?php echo "vistaUsuario.php?usuario=".$autor;?>>Visita el perfil del autor</a><?php
			    		}

			    		?>
				    </div>
				    <div id="opciones">
				  		<div class="col-sm-2 text-left">
				  			<?php
				  				if($_SESSION['usuario_actual'] == $autor) {
				  					echo "
				  					<div class='row'>
										<a href='edicionFoto.php?foto=".$id_boceto."'>
											<button type='button' class='btn btn-primary bmd-btn-fab'>
  												Editar boceto
											</button>
										</a>
									</div>";
								}
							?>
				  		</div>
				  	</div>
				</div> 
				<div class="row">     
					<!-- Contenedor Principal -->
				    <div class="comments-container">
				    	<div class="row">
						    <div class="col-xs-4 offset-xs-4">
						      	<span class="h1"> Comentarios </span>
						    </div>
						    <div class="col-xs-4 offset-xs-4">
						    	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Comenta</button>
						    </div>
						</div>
						<ul id="comments-list" class="comments-list">
							<li>
								<?php
									//Cogemos todos los comentarios que NO son respuesta de otro
									$resultado = comentarios($id_boceto, "Bocetos");

									while ($comentario = $resultado->fetch_object()) 
									{
										//Cogemos los datos del perfil del usuario que ha comentado
										$usuario_comentario = usuario_comentario($comentario->id_usuario);
										$rows = $usuario_comentario->num_rows;

										if($rows > 0)
										{

											$comment_user = $usuario_comentario->fetch_object();

											//Imprimimos el comentario
											echo "<div class='comment-main-level'>
														<!-- Avatar -->
														<div class='comment-avatar'><img src=$comment_user->foto alt=''></div>
														<!-- Contenedor del Comentario -->
														<div class='comment-box'>
															<div class='comment-head'>
																<p class='comment-name h6'><a href='vistaUsuario.php?usuario=$comment_user->id'>$comment_user->usuario</a></p>
																<span>$comentario->fecha</span>
																<a class='botones-comentario' data-toggle='modal' data-target='#myModal' data-id=$comentario->id_comentario><i class='fa fa-reply'></i></a>
															</div>
															<div class='comment-content'>
																$comentario->cuerpo
															</div>
														</div>
													</div>
													<br>";

											//Buscamos las posibles respuestas
											
											$id = $comentario->id_comentario;
											$respuestas = respuestas($id, "Bocetos");
											imprimir_respuestas($respuestas, "Bocetos");
										}
									}
								?>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<?php
				$pagina_actual=$titulo;
				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
			?>
		</div>

		<?php
			if(isset($_SESSION['usuario_actual']))
			{
				echo "<div class='modal fade' id='myModal' role='dialog'>
						<div class='modal-dialog'>
							<div class='modal-content widget-area'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<p class='h4 modal-title'>Comenta</p>
								</div>
								<form id='form_comment' method='POST' action='php/funciones/new_comment.php'>
									<div class='modal-body'>
										<textarea class='form-control' id='edicion_comentario' name ='cuerpo' placeholder='¿Qué piensas de la imagen?'></textarea>
										<input type='hidden' name='padre' class='answerParent' id='answerParent' value='' />
										<input type='hidden' name='user' value=$_SESSION[usuario_actual]  />
										<input type='hidden' name='contenido' value= '$id_boceto'/>
										<input type='hidden' name='tipo_contenido' value='Bocetos' />
									</div>
									<div class='modal-footer container-fluid'>
										<button type='submit' class='btn btn-success green'><span class='fa fa-share'></span> Comentar</button>
									</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->";
			}
			else
			{
				echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog'>
						<div class='modal-dialog' role='document'>
							<div class='modal-content widget-area'>
								<div class='modal-header'>
									<span class='h3'>Upsss... parece que no estás registrado. No podrás comentar hasta que lo hagas. Te esperamos :)</span>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->";
			}
		?>
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content widget-area ">
					<img class="img-responsive" src=<?php echo $ruta; ?> alt="">
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>


	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!-- scripts -->
	<script src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/respuestaComentarios.js" type="text/javascript"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</body>
</html>
