<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/bocetos.php");

	if(isset($_GET['foto']))
	{
		$id_boceto = $_GET['foto'];
		$resultado = consulta_datos($id_boceto);
		$num = $resultado->num_rows;

		if($num > 0)
		{
			$boceto = $resultado->fetch_object();

			$titulo = $boceto->titulo;
			$descripcion = $boceto->descripcion;	
		}

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
		$pagina_actual="EdiciónFoto";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/control_accesos.php");

		$comp = controlaSesion();
	?>

	<div class="container-fluid text-center">    
		<form action="php/funciones/editar_foto.php" id="boceto" method="POST" enctype="multipart/form-data">
			<div class="col-sm-10 text-left"> 
				<div class="panel panel-default margen-top">
					<div class="panel-heading">
						<p class=" h3 panel-title">Edición de foto</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<?php
								if(isset($_GET['foto']))
								{
									echo "<div class='col-sm-8 text-left'> 
										<span class='input-group-addon glyphicon glyphicon-text-size'>Título</span>
										<input type='text' class='form-control' id='titulo' name='titulo' placeholder='Escribe aquí el título' value='$titulo'/>
										<br>
										<input type='hidden' class='form-control' id='id' name='id' value='$id_boceto'/>
										<span class='input-group-addon glyphicon glyphicon-text-size'>Descripción</span>
										<textarea type='text' class='form-control' id='desc' name='desc' placeholder='Escribe aquí alguna descripción'>$descripcion</textarea>
									</div>";
								}
								else
								{
									echo "<div class='col-sm-4'>
											<input id='imagen' name='imagen' type='file' class='file'>
										</div>
										<div class='col-sm-8 text-left'> 
										<span class='input-group-addon glyphicon glyphicon-text-size'>Título</span>
										<input type='text' class='form-control' id='titulo' name='titulo' placeholder='Escribe aquí el título'/>
										<br>
										<span class='input-group-addon glyphicon glyphicon-text-size'>Descripción</span>
										<textarea class='form-control' id='desc' name='desc' placeholder='Escribe aquí alguna descripción'></textarea>
									</div>";
								}
							?>
						</div>
					</div>  
				</div>
				<div class="col-sm-12 text-center">
					<button type="submit" class="btn btn-warning margen-bottom">Guardar cambios realizados</button>
				</div>
			</div>
		</form>
		<?php
			$pagina_actual="EdiciónFoto";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
		?>
	</div> <!--container-->

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!--Scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/editarFoto.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</body>
</html>
