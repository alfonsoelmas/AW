<?php
	
	if(isset($_GET['libro'])){
		$id_libro = $_GET['libro'];
	}
	
?>


<!DOCTYPE html>
<html lang="es">
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
		$pagina_actual="EdiciónCap";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/control_accesos.php");

		$comp = controlaSesion();
		if($comp) controlaAcceso();
	?>

	<br>
	<div class="container-fluid text-center">    
		<form id="cap" action="php/funciones/editar_cap.php" method="POST">
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php 
							require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/editar_cap.php");
							// Buscamos el nombre del libro
							$nombre = buscar_nombre_libro($id_libro);
							$fila = $nombre->fetch_object();
						?>
						<p class="h3 panel-title">Libro: <?php echo $fila->titulo;?></p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-left"> 
								<span class="input-group-addon glyphicon glyphicon-text-size">Título del capítulo</span>
								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe aquí el título"/>
								<br>
								<span class="input-group-addon glyphicon glyphicon-text-size ">Contenido del capítulo</span>
								<textarea type="text" class="form-control" id='cuerpo' name='cuerpo' rows="10" placeholder="Erase una vez que se era..."></textarea>
								<input type="hidden" id="id_libro" name="id_libro" value="<?php echo $id_libro?>">
								<button type="submit" class="btn btn-warning margen-top">Añadir capítulo</button>
								<?php
									echo "<a  class='btn btn-warning margen-top' href='visualizacionLibro.php?id_libro=".$id_libro."'>He terminado</a>";
								?>
							</div>
						</div>
					</div>  
				</div>
			</div>
		</form>
		<?php
			$pagina_actual="EdiciónCap";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
		?>
	</div>

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!--Scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/editarCap.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</body>
</html>
