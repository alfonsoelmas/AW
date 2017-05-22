<!DOCTYPE html>
<html lang="es">
<head>
	<title>Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/vistaUsuario.css">
</head>
<body>

	<div class="jumbotron" id="banner">
		<div class="text-left">
			<div class="col-sm-2">
				<img id="logo" src="img/logo1.png" alt="logo">
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
				<li class="active">Usuario</li>
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

	<br>

	<!--Perfil-->
	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-10 text-left"> 
				<div class="jumbotron">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<img class="img-responsive img-circle" alt="" src="img/mafalda.jpg" width="200" height="200"/>
							</div>
							<div class="col-sm-7">
								<p class="h2" id="nombre">Alejandra López</p>
								<p class="datos"> alelop@domain.com<br>
								Madrid <br>
								España</p>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-primary btn-lg">
									<span class="glyphicon glyphicon-plus"></span> 
									Follow 
								</button>
							</div>
						</div>
						<br>
						<div class="row">
							<p class="descripcion">Mi nombre es Alejandra López, tengo 19 años. Me considero una persona alegre, sociable y muy curiosa a la que le apasiona leer y sobre todo escribir.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-2 sidenav">
				<div class="text-center">
					<div class="dropdown text-left">
						<p><a href="misObras.html"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Mis obras</a></p>
						<p><a href="misSeguidores.html"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Mis seguidores</a></p>
						<p><a href="siguiendo.html"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Siguiendo</a></p>
						<p><a href="miPerfil.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mi perfil</a></p>
					</div>
				</div>
			</div>
		</div> <!--row content-->

		<div class="row">
			<div class="col-sm-10">
				<div class="panel panel-default">
					<div class="panel-heading">
					  <h3 class="panel-title">Obras de Alejandra</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<table class="obras">
										<tr>
											<td>
												<a href="visualizacionLibro.html">
													<img src="img/logo2.png" class="imgP" alt="logo">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="caption">
													<p>Nombre Obra 1</p>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="ec-stars-wrapper">
													<a class="estrellas" href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail efecto-redondo">
									<table class="obras">
										<tr>
											<td>
												<a href="visualizacionBoceto.html">
													<img src="img/logo2.png" class="imgP" alt="logo">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="caption">
													<p>Nombre Obra 2</p>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="ec-stars-wrapper">
													<a class="estrellas" href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
													<a class="estrellas" href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div> <!--col-sm-6 col-md-3-->
						</div>

						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="btn-group" role="group" aria-label="...">
									<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Prev</button>
									<button type="button" class="btn btn-default">Next<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</div>
					</div> <!--panel body--> 
				</div>
			</div> <!--col-sm-10-->
		</div> <!--row-->
	</div> <!--container fluid-->


	<footer class="container-fluid text-center">
		<p><a id="color-defecto" href="aboutUs.html">Paper Dreams 2017 - Un proyecto realizado por el grupo Bi-Inestables</a></p>
	</footer>
	
	<!--Script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></scipt>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>