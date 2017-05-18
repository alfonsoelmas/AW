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

	<div class="jumbotron" id="banner">
		<!--div class="left">
		</div-->
		<div class="text-left">
			<div class="col-sm-2">
				<img id="logo" alt="" src="img/logo1.png">
			</div>

			<!--AQUI METER DIVS Y VER SI LO PUEDO SEPARAR EN DOS COLUMNAS-->
			<div class="col-sm-10">
				<p class="h1">Paper Dreams</p>      
				<p>De tus sueños al papel</p>
			</div>
		</div>
		<div id="breadcum-div">
			<ol class="breadcrumb" id="breadcum">
				<li><a href="index.html">Inicio</a></li>
				<li class="active">Contacto</li>
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
					<li><a href="categorias.html">Categorias</a></li>
					<li><a class="actual" href="#">Contacto</a></li>
					<li><a href="aboutUs.html">About Us</a></li>
				</ul>
				<div class="nav navbar-nav navbar-right">
					<!--li><a href="#"><span class="glyphicon glyphicon-search"></span> Buscar</a></li--> 
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

			<div class="col-sm-2 sidenav">
				<div class="row">
					<button class="btn btn-default dropdown-toggle engordar redondear" type="button" id="logInButton">
						Inicia sesión
					</button>
				</div>
				<div class="row">
					<button class="btn btn-default dropdown-toggle engordar redondear" type="button" id="registerButton">
						Regístrarse
					</button>
				</div>
			</div>
		</div> <!--row-->
	</div> <!--container-->

	<footer class="container-fluid text-center">
		<p><a id="color-defecto" href="aboutUs.html">Paper Dreams 2017 - Un proyecto realizado por el grupo Bi-Inestables</a></p>
	</footer>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>