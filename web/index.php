<!DOCTYPE html>
<html lang="es">
<head>
	<title>Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
</head>
<body>
	<?php
		$pagina_actual="Inicio";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 
				<div class="jumbotron" id="bloque-inicio">
					<p class="h1" id="text-bloque-inicio">Escritores, Diseñadores!</p>
					<p id="par-bloque-inicio">Empieza a escribir desde ahora mismo. Sube tus creaciones y demuestra a la comunidad lo que vales</p>
					<p>
					<?php

						if(isset($_SESSION['usuario_actual']))
						{
							echo "<a class='btn btn-primary btn-lg' href='edicion.php' role='button'>Escribe</a>
							<a class='btn btn-primary btn-lg' href='edicionFoto.php' role='button'>Dibuja</a>";
						}
						else
						{
							echo "<a class='btn btn-primary btn-lg' href='login.php' role='button'>Escribe</a>
							<a class='btn btn-primary btn-lg' href='login.php' role='button'>Dibuja</a>";
						}
					?>
					</p>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title h3">Más valorados</p>
					</div>
					<div class="panel-body">
						<div class="container">
						  	<div class="row">
							    <div class="col-xs-12">
							      	<div class="carousel slide multi-item-carousel" id="theCarousel">
							        	<div class="carousel-inner">
							        	<?php
							  				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/libros.php");

						  					$resultado = mejores_obras('20');
						  					$num = $resultado->num_rows;

						  					if($num > 0)
						  					{
								  				$obra = $resultado->fetch_object();


					  							echo "
					  							<div class='item active'>
					            					<div class='col-xs-4'><a href='visualizacionLibro.php?id_libro=$obra->id_libro'><img src=$obra->portada class='img-responsive img-carousel' alt='$obra->titulo'></a></div>
					          					</div>";

								  				while($obra = $resultado->fetch_object())
								  				{
													echo "<div class='item'>
								            					<div class='col-xs-4'><a href='visualizacionLibro.php?id_libro=$obra->id_libro'><img src=$obra->portada class='img-responsive img-carousel' alt='$obra->titulo'></a></div>
								          					</div>";
								  				}
								  			}

							        	?>
							        	</div>
							        	<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
							        	<a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
							      	</div>
							    </div>
						  	</div>
						</div>
					</div> <!--panel-body-->
				</div> <!--panel panel-default-->
			</div> <!--col-sm-10 text-left-->
		<?php
			$pagina_actual="Inicio";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
		?>
		</div> <!--row-->
	</div> <!--container-fluid-->

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>
	
		<!--//BLOQUE COOKIES-->
	<div id="barraaceptacion" class="container-fluid">
	    <div class="inner">
	    	<a id="ok" class="ok btn">OK</a> |  
	        Solicitamos su permiso para obtener datos estadísticos de su navegación en esta web, en cumplimiento del Real 
	        Decreto-ley 13/2012. Si continúa navegando consideramos que acepta el uso de cookies.
	        <a href="http://politicadecookies.com" target="_blank" class="info">Más información</a>
	    </div>
	</div>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/cookie.js"></script>
	<script src="js/carousel.js"></script>



</body>
</html>
