<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/libros.php");
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/comentarios.php");

	$id_libro = $_GET['id_libro'];
	$id_capitulo = $_GET['id_capitulo'];

	//Esto hay que cogerlo de una consulta
	$resultado = consulta_capitulos($id_capitulo);
	if($resultado)
	{
		$libro = $resultado->fetch_object();
		$titulo = $libro->titulo;
		$cuerpo = $libro->cuerpo;
		$fecha = $libro->fecha;
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
				    </div> <!--panel-->
				</div>

				<!-- BOTONES ANTERIOR Y SIGUIENTE-->
				<div class="row">
					<div class="col-sm-1 text-left">
						<?php 
							$resultado = capitulos_por_libro($id_libro);
							//Vamos verificando el inmediatamente anterior al actual
							$capituloAnterior="";
							$capituloSiguiente="";
							
							//Incializamos los parámetros
							$capitulo = $resultado->fetch_object();
							//Id del primer capitulo
							$current_id = $capitulo->id_capitulo;
							//Mientras que no sea igual al id de la página
							while ($current_id != $id_capitulo)
							{
								//Guardamos el capitulo actual como el anterior
								$capituloAnterior = $capitulo;
								//Avanzamos al siguiente capitulo
								$capitulo = $resultado->fetch_object();
								$current_id = $capitulo->id_capitulo;
							}
							$resultado = capitulos_por_libro($id_libro);
							//Incializamos los parámetros
							$capitulo = $resultado->fetch_object();
							//Id del primer capitulo
							$current_id = $capitulo->id_capitulo;
							//Vamos a verificar el inmediato posterior
							//Mientras el id actual sea menor o igual al de la página
							while ($current_id < $id_capitulo)
							{
								//Avanzamos un capitulo
								$capitulo = $resultado->fetch_object();
								$current_id = $capitulo->id_capitulo;
							}
							//Cuando salimos es porque current_id = id_capitulo. A partir de aquí vamos a ver si hay más capitulos con otra consulta
							$resultado = capitulos_mayores($id_libro, $current_id);
							$num = $resultado->num_rows;
							if($num > 0)
							{
								$capituloSiguiente = $resultado->fetch_object();
							}
							//Si el capituloAnterior está vacio, significa que no hemos entrado al bucle y, por tanto, estamos en el primero
							if($capituloAnterior != "")
								echo " <button type='button' class='btn btn-primary btn-md' id='capituloAnterior'>
											<a href='visualizacionContenidoLibro.php?id_libro=$id_libro&id_capitulo=$capituloAnterior->id_capitulo'>
												Capitulo Anterior
											</a>
									  	</button>";
						?> 
			  		</div> <!--col-sm-1 text-left-->
			  		<div class="col-sm-9"></div>
			  		<div class="col-sm-1">
			  			<?php
			  				if($capituloSiguiente != "")
				  				echo "<button type='button' class='btn btn-primary btn-md' id='capituloAnterior'>Capitulo 
									  	<a href='visualizacionContenidoLibro.php?id_libro=$id_libro&id_capitulo=$capituloSiguiente->id_capitulo'>
									  		Siguiente
									  	</a>		
									</button>";
			  			?>
			  		</div><!--col-sm-1-->
			  	</div> <!-- row-->
			</div> <!--col-sm-10 text-left-->
			
			<?php
				$pagina_actual=$titulo;
				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
			?>
		</div> <!--row-->


		<div class="row"> 
			<div class="col-sm-10 text-left">    
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
							$resultado = comentarios($id_capitulo, "Capitulos");
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
									$id = $comentario->id_comentario;
									$respuestas = respuestas($id, "Capitulos");
									imprimir_respuestas($respuestas, "Capitulos");
								}
							}
						?>
					</li>
				</ul>
			</div>
			</div>
		</div> <!--row-->
	</div>
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>


	
	<?php
		if(isset($_SESSION['usuario_actual']))
		{
			echo "<div class='modal fade' id='myModal' role='dialog'>
					<div class='modal-dialog'>
						<!-- Modal content-->
						<div class='modal-content widget-area'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<p class='h4 modal-title'>Comenta</p>
							</div>
							<form id='form_comment' method='POST' action='php/funciones/new_comment.php'>
								<div class='modal-body'>
									<textarea class='form-control' id='cuerpo' name='cuerpo' placeholder='¿Qué piensas de la historia?'></textarea>
									<input type='hidden' name='padre' class='answerParent' id='answerParent' value='' />
									<input type='hidden' name='user' value=$_SESSION[usuario_actual]  />
									<input type='hidden' name='contenido' value= '$id_capitulo'/>
									<input type='hidden' name='tipo_contenido' value='Capitulos' />
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
							<div class='modal-body'>
								<span class='h3'>Upsss... parece que no estás registrado. No podrás comentar hasta que lo hagas. Te esperamos :)</span>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->";
		}
	?>



	

	<!-- scripts -->
	<script src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/respuestaComentarios.js" type="text/javascript"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</body>
</html>
