<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
	<?php
		$pagina_actual="LogIn";
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-3"></div> 
			<div class="col-sm-6 text-left"> 
				<div class="panel panel-default" id="logPanel">
					<div class="panel-heading">
						<p class="h3 panel-title">Iniciar Sesión</p>
					</div>
					<div class="panel-body">
						<div class="col-sm-6 text-center content" >
							<div class="login" id="login">
								<form id="formulario" method="post" action="login.php">
									
									<div class="input-group input-group-md">
										<span class="input-group-addon glyphicon glyphicon-user"></span>
										<input type="text" class="form-control" id="username" name='username' placeholder="Email">
									</div>
									<br>

									<div class="input-group input-group-md">
										<span class="input-group-addon glyphicon glyphicon-lock"></span>
										<input type="password" class="form-control" id="password" name='password' placeholder="Contraseña"/>
									</div>
									<br>
									<div class="text-left">
										<input type="submit" class="btn btn-default dropdown-toggle" name="login" value="Iniciar Sesión"/>
									</div>
									<br>

								</form>
								<div class="text-left">
									<span>¿No tienes cuenta? Haz click <a href="registro.php">aquí</a>, solo tardarás un minuto</span>
								</div>
							</div>
						</div>
						<div class="col-sm-6 container-fluid" id="col2">
						<?php
							require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/iniciar_sesion.php");
							require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/filtrado_entrada.php");


							if(isset($_POST['username']))
							{
								array_walk($_POST, 'limpiarCadena');

								$username = $_POST['username'];
								$password = $_POST['password'];
								$ok = login($username, $password);

								if($ok === '0')
								{
									echo "<div class='g-recaptcha' data-sitekey='6LdzkRsUAAAAAEFNfvtH7ahH_9-RJYbT-5tWabEQ' id='captcha'></div>";
								}
							}
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>

	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_pie.php"); 
	?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"	type="text/javascript"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="js/logIn.js"></script>

</body>
</html>




