<!DOCTYPE html>
<html lang="es">
<head>
	<title>Contacto - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo2.css">
</head>

<body>

	<?php
		$pagina_actual="Contacto";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 text-center colorAtonado">    
				<h2>Contacta con nosotros</h2>
				<p>
					 ¿Tienes algún problema o duda que transmitirnos?¿Quieres solicitar algún servicio que ofrecemos o simplemente obtener más información? Rellena el siguiente formulario y nos pondremos en contacto con vosotros lo más rápido posible.
				</p>
				<div class="blankdivider30">
				</div>
				<div class="row text-left">
									

						<form name="contactform" method="post" action="php/funciones/send_form_email.php"> 
						<div class="col-sm-6">

						  <label for="first_name">Nombre *</label>
						  <input  type="text" class="form-control" name="first_name" maxlength="50" size="30">

						  <label for="last_name">Apellido *</label>
						  <input type="text" class="form-control" name="last_name" maxlength="50" size="30">

						  <label for="email">E-mail *</label>
						  <input  type="text" class="form-control" name="email" maxlength="80" size="30">

						  <label for="telephone">Teléfono</label>
						  <input  type="text" class="form-control" name="telephone" maxlength="30" size="30">

						</div>
						<div class="col-sm-6">
						  <label for="message">Mensaje *</label>
						  <textarea  name="message" maxlength="1000" cols="50" rows="6"></textarea>
						  <input type="submit" class="btn" value="Enviar">
						</div>
						</form>

	</div>
			</div>

			<?php
				$pagina_actual="Contacto";
				require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_bloque_derecha.php");
			?>
		</div> <!--row-->
	</div> <!--container-->

	<?php require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
