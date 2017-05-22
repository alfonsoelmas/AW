<?php
	session_start();

	/*
	if(!isset($_SESSION['usuario']))
	{
		header("Location: login.php");	
		exit();
	}
	*/
	require_once("php/funciones/libros.php");
	$id_libro = $_GET['id_libro'];
	$id_capitulo = $_GET['id_capitulo'];

	//Esto hay que cogerlo de una consulta
	$resultado = consulta_datos($id_libro);

	if($resultado)
	{
		$libro = $resultado->fetch_object();
		$titulo = $libro->titulo;
		$cuerpo = $libro->cuerpo;
		$fecha = $libro->fecha;
		$portada = $libro->portada;
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
		include("php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 text-left">    
				<div class="row">
				    <div class="panel panel-default">
				        <div class="panel-heading">
				            <p class="panel-title h3"><?php echo $titulo ?></p>
				            <div class="pull-right">
				                <ul class="nav panel-tabs">
				                    <li class="active"></li>
				                </ul>
				            </div>
				        </div>            
				        <div class="panel-body">
				            <div class="tab-content">
				                <div class="tab-pane active" id="test">
				                	<?php echo $cuerpo ?>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<div>
					<div class="col-sm-4 text-left">
						<?php 
							$resultado = capitulos_por_libro($id_libro);

							//Vamos verificando el inmediatamente anterior al actual
							$capituloAnterior="";
							
							//Incializamos los parámetros
							$capitulo = $resultado->fetch_object();
							$current_id = $capitulo->id_capitulo;

							while ($current_id != $id_capitulo)
							{
								$capituloAnterior = $capitulo;
								$current_id = $capitulo->id_capitulo;
								$capitulo = $resultado->fetch_object();
							}

							//Vamos a verificar el inmediato posterior
							while ($current_id <= $id_capitulo)
							{
								$capitulo = $resultado->fetch_object();
								$current_id = $capitulo->id_capitulo;
							}

							$capituloSiguiente = $capitulo;

							echo " <a href='visualizacionContenidoLibro.php?id_libro=$id_libro&id_capitulo=$capituloAnterior'>
									  			<button type="button" class="btn btn-primary btn-lg" id="capituloAnterior">Capitulo Anterior
									  			</button>
									</a>";
					?> 
			  		</div>
			  		<div class="col-sm-4 text-center">
			  			<button type="button"  class="btn btn-primary btn-lg opciones" data-toggle="modal" id="comenta" data-target="#myModal">Comenta</button> 
			  		</div>
			  		<div class="col-sm-4">
			  			<?php
			  				echo " <a href='visualizacionContenidoLibro.php?id_libro=$id_libro&id_capitulo=$capituloSiguiente'>
									  			<button type="button" class="btn btn-primary btn-lg" id="capituloAnterior">Capitulo Siguiente
									  			</button>
									</a>";
			  			?>
			  		</div>
				<div class="row">     
					<!-- Contenedor Principal -->
				    <div class="comments-container">
						<p class="h1"> Comentarios </p>
						<ul id="comments-list" class="comments-list">
							<li>
								<?php
									//Cogemos todos los comentarios que NO son respuesta de otro
									$resultado = comentarios($id_capitulo, "Capitulos");

									while ($comentario = $resultado->fetch_object()) 
									{
										//Cogemos los datos del perfil del usuario que ha comentado
										$resultado = usuario_comentario($comentario->id_usuario);
										$comment_user = $resultado->fetch_object($resultado);
										
										//Imprimimos el comentario
										echo "<div class='comment-main-level'>
													<!-- Avatar -->
													<div class='comment-avatar'><img src=$comment_user->foto alt=''></div>
													<!-- Contenedor del Comentario -->
													<div class='comment-box'>
														<div class='comment-head'>
															<p class='comment-name by-author h6'><a href='http://miPerfil.html'>$comment_user->usuario</a></p>
															<span>$comentario->fecha</span>
															<button class='fa fa-reply botones-comentario data-toggle='modal' data-target='#myModal' data-id='$comentario->id'> </button>
														</div>
														<div class='comment-content'>
															$comentario->cuerpo;
														</div>
													</div>
												</div>";

										//Buscamos las posibles respuestas
										$resultado = respuestas($comentario->id_comentario, "Capitulos");
										$rows = $resultado->num_rows();

										//Si hay respuestas
										if($rows > 0)
										{	
											//Una por una
											while ($comentario = $resultado->fetch_object()) 
											{
												//Cogemos los datos del perfil del usuario que ha comentado
												$resultado = usuario_comentario($comentario->id_usuario);
												$comment_user = $resultado->fetch_object($resultado);

												//Imprimimos el comentario
												echo "<ul class='comments-list reply-list'>
													<li>
														<!-- Avatar -->
														<div class='comment-avatar'><img src=$comment_user->foto alt=''></div>
														<!-- Contenedor del Comentario -->
														<div class='comment-box'>
															<div class='comment-head'>
																<h6 class='comment-name'><a href='http://miPerfil.html'>$comment_user->usuario</a> </h6>
																<span>$comentario->fecha</span>
																<button class='fa fa-reply botones-comentario' data-toggle='modal' data-target='#myModal' data-id='$comentario->id'> </button>
															</div>
															<div class='comment-content'>
																$comentario->cuerpo;
															</div>
														</div>
													</li>
												</ul>";
											}
										}
									}
								?>
							</li>
						</ul>
					</div>
		   	 		<?php

		   	 			$resultado = comentarios($id_libro);
		   	 			$num = $resultado->num_rows();

		   	 			$numero_paginas = $num/8;

		   	 			if($numero_paginas > 0)
		   	 			{
		   	 				echo"<nav class='text-center' aria-label='Page navigation'>
									<ul class='pagination'>
									<li>
										<a href='#' aria-label='Previous'>
											<span aria-hidden='true'>&laquo;</span>
							     	 	</a>
							   	 	</li>";

			   	 			for($i = 0; $i < $numero_paginas; $i++)
					    		echo "<li><a href='#''>$i</a></li>";

					    	echo 	"<li>
					    				<a href='#' aria-label='Next'
			        						<span aria-hidden='true'>&raquo;</span>
			      						</a>
			    					</li>
			  					</ul>
							</nav>";
					    }
			    	?>
				</div>
			</div>
			<?php
				$pagina_actual=$titulo;
				include("php/funciones/genera_bloque_derecha.php");
			?>
		</div>



	<?php
		if(isset($_SESSION['usuario']))
		{
			echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog'>
					<div class='modal-dialog' role='document'>
						<div class='modal-content widget-area'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<p class='h4 modal-title'>Comenta</p>
							</div>
							<form class='form_comment' method='POST' action='php/funciones/nuevo_comentario.php'>
								<div class='modal-body'>
									<textarea id='edicion_comentario' placeholder='¿Qué piensas de la historia?'></textarea>
									<input type='hidden' name='padre' class='answerParent' value=''>
									<input type='hidden' name='id_usuario' value=\"$_SESSION['usuario']\">
									<input type='hidden' name='contenido' value=\"$id_capitulo\">
									<input type='hidden' name='tipo_contenido' value='Capitulos'>
								</div>
								<div class='modal-footer container-fluid'>
									<button type='submit' class='btn btn-success green'><span class='fa fa-share'></span>Comentar</button>
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
	</div>

	<?php include("php/funciones/genera_pie.php"); ?>

	<!-- scripts -->
	<script src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/star-rating.js" type="text/javascript"></script>
	<script src="js/respuestaComentario.js"</script>

</body>
</html>
