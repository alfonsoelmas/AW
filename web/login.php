<!DOCTYPE html>
<html lang="es">
<?php session_start(); ?>

<?php require_once("php/config/connection.php"); ?>
<head>
	<title>Login - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="css/login.css">
</head >
<body>

	<div class="jumbotron" id="banner">
		<div class="text-left">
			<div class="col-sm-2">
				<img id="logo" alt="logo" class="img-responsive"   src="img/logo1.png">
			</div>
			<div class="col-sm-10">
			<p class="h1">Paper Dreams</p>      
				<p>De tus sueños al papel</p>
			</div>
		</div>
		<div id="breadcum-div">
			<ol class="breadcrumb" id="breadcum" >
				<li><a href="index.html">Inicio</a></li>
				<li class="active">log-in</li>
			</ol>
		</div>
	</div>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="index.html">Inicio</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="categorias.html">Categorías</a></li>
					<li><a href="contacto.html">Contacto</a></li>
					<li><a href="aboutUs.html">About Us</a></li>
				</ul>
				<div class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left input-group-btn" role="search" action="result-busqueda.html">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button id="buscador" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>Buscar</button>
					</form>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-3"> </div>
			<div class="col-sm-6 text-left" id="panel"> 
				<div class="panel panel-default" id="logPanel">
					<div class="panel-heading">
						<p class="h3 panel-title">Login</p>
					</div>
					<div class="panel-body" id="panel_body">

<?php
if(isset($_SESSION['nombre'])){
echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>"; //TODO 
}else {
?>		
			<div class="col-sm-6 text-center content">
				<div class="login">
					<form id="formulario" method="post" action="">
						<div class="input-group input-group-md">
							<span class="input-group-addon glyphicon glyphicon-user" id="icon_user"></span>
							<input type="text" class="form-control" id="user" name='user' placeholder="usuario" aria-describedby="icon_user">
						</div>
						<br>
						<div class="input-group input-group-md">
							<span class="input-group-addon glyphicon glyphicon-lock" id ="icon_pass"></span>
							<input type="password" class="form-control" id="password" name='password' placeholder="contraseña" aria-describedby="icon_pass">
						</div>
						<div class="text-left row">
							<input type="checkbox" aria-label="olvido" id="remember" name="remember">
							<span>Recordar mi contraseña</span>
						</div>
						<div class="text-left">
							<input class="btn btn-default dropdown-toggle" type="submit" id="logInButton" value="Iniciar Sesión"/>
						</div>
						<br>	
					</form>
					<div class="text-left">
						<span>¿Has olvidado tus datos? Haz click <a>aquí</a> para recuperarlos</span>
						<br>
						<span>¿No tienes cuenta? Haz click <a href="registro.html">aquí</a>, solo tardarás un minuto</span>
					</div>
				</div>
			</div>
			<div class="col-sm-6 container-fluid" id="col2">
				<div class="g-recaptcha" data-sitekey="6LdzkRsUAAAAAEFNfvtH7ahH_9-RJYbT-5tWabEQ" id="captcha"></div>
			</div>

<?php
}
?>
					</div> <!--panel-body-->
				</div> <!--logPanel-->
			</div> <!--panel-->
		</div> <!--row-->
	</div> <!--container-fluid text-center-->

	<footer class="container-fluid text-center">
		<p><a id="color-defecto" href="abotuUs.html">Paper Dreams 2017 - Un proyecto realizado por el grupo Bi-Inestables</a></p>
	</footer>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/logIn.js"></script>
	<script src="js/jquery.validate.min.js"	type="text/javascript"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</body>
</html>
