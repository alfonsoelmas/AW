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


	//Me tiene que venir el ID del libro correspondiente al capitulo
	if(isset($_GET["idLibro"])){

		$pagina_actual="EdiciónCap";
		include("php/funciones/genera_cabecera.php");
		
		$idLibro = $_GET["idLibro"];

		//Compruebo que ese idLibro corresponde al usuario 
		//con una query...
	  	$conn = conectar();


		if(isset($_GET["idCap"])){
			//No es nuevo

			$idCap = $_GET["idCap"];
		  	$query = 'SELECT usuarios.id FROM usuarios, libros WHERE usuarios.id="'.$_SESSION['usuario_actual'].'" AND id_libro="'.$idLibro.'"';

		  	$consulta 	= 	realiza_consulta($conn, $query);
			$filas 		= 	$consulta->num_rows;
			
			if($filas==0){
				header("Location: 404Error.php");
			} else {


				?>

			<div class="container-fluid text-center">    
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default">
					<div class="panel-heading">
					<?php 

					$query = 'SELECT titulo FROM libros WHERE id_libro="'.$idLibro.'"';
					$consulta = realiza_consulta($conn,$query);
					//doy por supuesto que obtengo un resultado único
					$datosConsulta = $consulta->fetch_assoc();



					?>
					<p class="h3 panel-title">Capitulo de <?php echo $datosConsulta["titulo"]?></p>

					<?php 

					$query = 'SELECT * FROM capitulos WHERE id_capitulo="'.$idCap.'"';
					$consulta = realiza_consulta($conn,$query);
					//doy por supuesto que obtengo un resultado único
					$datosConsulta = $consulta->fetch_assoc();



					?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-left"> 
								<form method="post" action=<?php echo '"php/funciones/guarda_capitulo.php?'; ?> > <!--comprobar eso del &...TODO-->
									<span class="input-group-addon glyphicon glyphicon-text-size">Título del capítulo</span>
									<input type="text" class="form-control" id="titulo" name="title" value=<?php echo '"'.$datosConsulta["titulo"].'"'; ?>/>
									<br>
									<span class="input-group-addon glyphicon glyphicon-text-size ">Contenido del capítulo</span>
									<textarea class="form-control" id='editor1' name='editor1' rows="10" value=<?php echo '"'.$datosConsulta["cuerpo"].'"'; ?> ></textarea>
									<input type="hidden" name="id" value=<?php echo '"'.$idCap.'"' ?>/>
									<button type="submit" class="btn btn-warning margen-top">Guardar cambios</button>
								</form>
								<!--Se que esto deberia estar en un .js>
								<script type='text/javascript'>
									CKEDITOR.replace ('editor1');
								</script--> 

							</div>
						</div>
					</div>  
				</div>
			</div>
				<?php

			}

		} else {
			//Es nuevo

		  	$query = 'SELECT usuarios.id FROM usuarios, libros WHERE usuarios.id="'.$_SESSION['usuario_actual'].'" AND id_libro="'.$idLibro.'"';

		  	$consulta 	= 	realiza_consulta($conn, $query);
			$filas 		= 	$consulta->num_rows;
			
			if($filas==0){
				header("Location: 404Error.php");
			} else {

				?>

			<div class="container-fluid text-center">    
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default">
					<div class="panel-heading">
					<?php 

					$query = 'SELECT titulo FROM libros WHERE id_libro="'.$idLibro.'"';
					$consulta = realiza_consulta($conn,$query);
					//doy por supuesto que obtengo un resultado único
					$datosConsulta = $consulta->fetch_assoc();


					?>
					<p class="h3 panel-title">Capitulo de <?php echo $datosConsulta["titulo"]?></p>

					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-left"> 
								<form method="post" action=<?php echo '"php/funciones/guarda_capitulo.php'; ?> >
									<span class="input-group-addon glyphicon glyphicon-text-size">Título del capítulo</span>
									<input type="text" class="form-control" id="titulo" name="title" placeholder="Escribe aquí el título"/>
									<br>
									<span class="input-group-addon glyphicon glyphicon-text-size ">Contenido del capítulo</span>
									<textarea class="form-control" id='editor2' name='editor1' rows="10" placeholder="Erase una vez que se era..."></textarea>
									<input type="hidden" name="idLibro" value=<?php echo '"'.$idLibro.'"' ?>/>
									<button type="submit" class="btn btn-warning margen-top">Añadir capitulo</button>
								</form>
								<!--Se que esto deberia estar en un .js-->
								<!--script type='text/javascript'>
									CKEDITOR.replace ('editor2');
								</script--> 

							</div>
						</div>
					</div>  
				</div>
			</div>
				<?php

			}

		}
	} else {
		header("Location: 404Error.php");
	}

	?>

	
					
				
		<?php
			$pagina_actual="EdiciónCap";

			require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/genera_bloque_derecha.php");
		?>
	</div>

	<?php include("php/funciones/genera_pie.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] ."php/funciones/genera_pie.php");?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!--cargamos el CKeditor TODO sobra-->

	<script type="text/javascript" src="Paper%20Dreams_files/ckeditor.js"></script><style>.cke{visibility:hidden;}</style>
	<script type="text/javascript" src="Paper%20Dreams_files/config.js"></script><link rel="stylesheet" type="text/css" href="Paper%20Dreams_files/editor_gecko.css"><script type="text/javascript" src="Paper%20Dreams_files/es.js"></script><script type="text/javascript" src="Paper%20Dreams_files/styles.js"></script>

<?php cerrar_conexion($conn);?>
</body>
</html>
