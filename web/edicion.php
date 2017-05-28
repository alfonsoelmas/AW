<!DOCTYPE html>
<html lang="es">
<?php session_start() ?>
<head>
	<title>Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
	<link rel="stylesheet" href="css/estilobusq.css">
	<link rel="stylesheet" href="css/edicionStyle.css">
</head>
<body>

	<?php
		$pagina_actual="Edición";
		require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/genera_cabecera.php");
		require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/consulta.php");
		require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/categorias.php");
		//Si sesión iniciada

		if(isset($_SESSION['usuario_actual']) ){
			
			if(isset($_GET['libro'])){
				//Editaremos un libro
				$idLibro = $_GET['libro'];
				//Pero antes cargaremos sus datos:

				//Necesito:

				/*
					Consulta para cargar titulo, sinopsis, imagen
					Consulta para cargar capitulos
					METER CATEGORIAS!
				*/
				$query = 'SELECT titulo, sinopsis, portada FROM libros WHERE id_libro="'.$idLibro.'"';


		  		$consulta 	= 	consulta($query);
		  		$datosConsulta = $consulta->fetch_assoc();


				?>

				<div class="container-fluid text-center">
					<form method="post" action="guardar_libro.php">	    
					<div class="col-sm-10 text-left">
						<div class="panel panel-default margen-top">
							<div class="panel-heading">
								<p class="h3 panel-title">Edición</p>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="img-edicion" alt="" <?php echo 'src="img/portadas/'.$portada.''; ?>">
										<input id="imagen" name="imagen" type="file" class="btn btn-info margen-top">
										<input type="hidden" name="idLibro" value=<?php echo '"'.$idLibro.'"' ?>/>
									</div>
									<div class="col-sm-9 text-left"> 

										<span class="input-group-addon glyphicon glyphicon-text-size">Título</span>
										<input type="text" class="form-control" id="titulo" name="title" value=<?php echo '"'.$datosConsulta['titulo'].'"'?> />
										<br>
										<span class="input-group-addon glyphicon glyphicon-text-size ">Sinopsis</span>
										<textarea  class="form-control" id='editor1' name='sinopsis' rows="10" value=<?php echo '"'.$datosConsulta['sinopsis'].'"'; ?> </textarea>

										<?php 
										$categorias = obtenerCategorias();
										$tam = count($categorias);
										
										echo '<select name="categoria">'
										for($i = 0; $i<$tam; $i++){
											echo '<option value="'.$categorias[$i].'">'.$categorias[$i].'</option>';
										}
										echo '</select>';


										//Ahora obtenemos los capitulos existentes para pintarlos:
										$query = 'SELECT titulo, cuerpo, id_capitulo FROM capitulos WHERE id_libro="'.$idLibro.'"';
								  		$consulta 	= 					consulta($query);
								  		$datosConsulta = $consulta->fetch_assoc();
								  		$tamDatos = $datosConsulta->num_rows;

										?>

										<!--script type='text/javascript'>
											CKEDITOR.replace ('editor1');
										</script--> 

										<button type="button" <?php echo 'onclick="window.location.href="edicionCap.php?idLibro='.$idLibro.'""' ?> class="btn btn-info margen-top"> Añadir capítulo </button> 

										<button type="button" class="btn btn-info margen-top" data-toggle="collapse" data-target="#lCap">Desplegar lista de capitulos</button>


										<div id="lCap" class="collapse margen-top">
										<div class="list-group">
											<?php
												for($i=1; $i<=$tamDatos; $i++){

												 echo '<a href="edicionCap.php?idCap='.$datosConsulta["id_capitulo"].'" class="list-group-item">';
												 echo '	<p class="h4 list-group-item-heading">Capitulo '.$i.'</p>';
												 echo '	<p class="list-group-item-text">'.substr ($datosConsulta["cuerpo"] , 0, 70 ] ).'...</p>';
												</a>

													$datosConsulta = $consulta->fetch_assoc();
												}
											?>	
											</div>
										</div> 
									</div>
								</div>
							</div>  
						</div>
			<div class="col-sm-12 text-center">
			<button type="sumbit" class="btn btn-warning margen-bottom">Guardar cambios realizados</button>
			</div>
			</form>
		</div>

				<?php

			} else {
				//Creamos un libro
				?>

				<div class="container-fluid text-center">
					<form method="post" action="guardar_libro.php">	    
					<div class="col-sm-10 text-left">
						<div class="panel panel-default margen-top">
							<div class="panel-heading">
								<p class="h3 panel-title">Edición</p>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="img-edicion" alt="" src="img/portadas/portada.png">
										<input id="imagen" name="imagen" type="file" class="btn btn-info margen-top">
									</div>
									<div class="col-sm-9 text-left"> 

										<span class="input-group-addon glyphicon glyphicon-text-size">Título</span>
										<input type="text" class="form-control" id="titulo" name="title" placeholder="Escribe aquí el título" ?> />
										<br>
										<span class="input-group-addon glyphicon glyphicon-text-size ">Sinopsis</span>
										<textarea  class="form-control" id='editor1' name='sinopsis' rows="10" placeholder="Escribe aquí la sinopsis" ?> </textarea>

										<!--TODO necesitamos cargar las categorias-->
										<?php 
										$categorias = obtenerCategorias();
										$tam = count($categorias);
										
										echo '<select name="categoria">'
										for($i = 0; $i<$tam; $i++){
											echo '<option value="'.$categorias[$i].'">'.$categorias[$i].'</option>';
										}
										echo '</select>';

										?>

										<!--script type='text/javascript'>
											CKEDITOR.replace ('editor1');
										</script--> 

										<button type="button" <?php echo 'onclick="window.location.href="edicionCap.php?idLibro='.$idLibro.'""' ?> class="btn btn-info margen-top"> Añadir capítulo </button> 

									</div><!--todo puede que me sobre o falte algun div-->
								</div>
							</div>  
						</div>
			<div class="col-sm-12 text-center">
			<button type="sumbit" class="btn btn-warning margen-bottom">Guardar libro nuevo </button>
			</div>
			</form>
		</div>
		<?php
			}

		} else {
			header("Location: 404Error.php");
			exit;
		}

	?>


				
		<?php
			$pagina_actual="Edición";
			require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/genera_bloque_derecha.php");
		?>
	</div>

	<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/genera_pie.php");?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

</body>
</html>
