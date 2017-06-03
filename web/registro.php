<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro - Paper Dreams</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo2.css">
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<?php
			$pagina_actual="Registro";
			require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/genera_cabecera.php");
		?>

		<div class="container-fluid text-center">    
			<div class="row content">
				<div class="col-sm-3"></div> 
				<div class="col-sm-6 text-left"> 
					<div class="panel panel-default" id="logPanel">
						<div class="panel-heading">
							<p class="h3 panel-title">Crear una cuenta nueva</p>
						</div>
						<div class="panel-body">
							<div class="col-sm-7 text-center content">
								<?php
									require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/registro_usuario.php");

									if(isset($_POST['user'])) {
										registra_usuario();
									}
								?>
								<form id="register" enctype="multipart/form-data" method="post" action="registro.php">
									<div class="login">
										<div class="login-form">
											<div class="input-group input-group-md">
												<span class="input-group-addon glyphicon glyphicon-font"></span>
												<input type="text" class="form-control" id="name" name="name" placeholder="Nombre"/>
											</div>

											<div class="input-group input-group-md">
												<span class="input-group-addon glyphicon glyphicon-user"></span>
												<input type="text" class="form-control" id="user" name="user" placeholder="Usuario"/>
											</div>
											
											<div class="input-group input-group-md">
												<span class="input-group-addon glyphicon glyphicon-plus"></span>
												<input type="text" class="form-control" id="age" name="age" placeholder="Edad"/>
											</div>

											<div class="input-group input-group-md">
												<span class="input-group-addon glyphicon glyphicon-map-marker"></span>
												<input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad"/>
											</div>

											<div class="input-group input-group-md">
												<span class="input-group-addon glyphicon glyphicon-globe"></span>
												<input type="text" class="form-control" id="pais" name="pais" placeholder="País"/>
											</div>
											
											<div class="input-group input-group-md">
												<label for="imagen_perfil">Selecciona una foto de perfil:</label>
											    <input type="file" name="imagen_perfil" id="imagen_perfil">
											</div>
											
											<br>
												<span class="input-group-addon glyphicon glyphicon-pencil"> Descripción</span>
												<textarea class="form-control" id='desc' name='desc' rows="5" placeholder="Escribe una breve descripcion de ti..."></textarea>
											
											<div class="input-group input-group-md">
												<span class="input-group-addon" id="icon_mail">@</span>
												<input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
											</div>
											
											<div class="input-group input-group-md">
												<span class="input-group-addon glyphicon glyphicon-lock"></span>
												<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" />
											</div>
											
											<div class="input-group input-group-md">
												<span class="input-group-addon  glyphicon glyphicon-lock"></span>
												<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repetir Contraseña"/>
											</div>
											
											<div class="text-left margin-normal">
												<input name="condiciones" id="condiciones" type="checkbox" aria-label="condiciones"/>
												<span>He leído y acepto las condiciones legales y acepto recibir comunicaciones electrónicas</span>
											</div>
											
											<div class="text-center margin-normal">
												<input id="registro" class="btn btn-default dropdown-toggle" type="submit" value="Registrar"/>
											</div>                    
										</div>
									</div>
								</form>
							</div>
							<div class="col-sm-5 text-center content">
								<div id="inicio_sesion">
									<span>O si ya tienes una cuenta: </span>
									<div class="row margin-normal">   
										<button class="btn btn-default dropdown-toggle engordar redondear" type="button" id="logInButton">Iniciar sesión</button>
									</div>
								</div>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<script type="text/javascript" src="js/registro.js"></script>
  		<script type="text/javascript" src="js/goTo.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	</body>
</html>

