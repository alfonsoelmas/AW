<!DOCTYPE html>
<html lang="es">
<head>
	<title>404 Error</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
	<?php
		$pagina_actual="404Error";
		require_once('php/funciones/genera_cabecera.php');
	?>

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-3"></div> 
			<div class="col-sm-6 text-left"> 
				<div class="panel panel-default" id="panel">
					<div class="panel-heading">
						<p class="h1 panel-title">Error 404</p>
					</div>
					<div class="panel-body">
						<span class="h3">Upssss... parece que el recurso que estás buscando no se encuentra</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>













<!--<body>
	<?php
		$pagina_actual="Log-In";
		include("php/funciones/genera_cabecera.php");
	?>

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
/*<<<<<<< HEAD
	if(isset($_SESSION["session_username"])){
		// echo "Session is set"; // for testing purposes
		header("Location: intropage.php");
	}
 
	if(isset($_POST["login"])){
 
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
	 		$username = $_POST['username'];
	 		$password = $_POST['password'];
	 
			$query = mysql_query($GLOBALS['conn'],"SELECT * FROM usuarios WHERE usuario='".$username."' AND pass='".$password."'");
			$numrows = mysql_num_rows($query);

 			if($numrows!=0) {
 				while($row=mysql_fetch_assoc($query)) {
 					$dbusername=$row['username'];
 					$dbpassword=$row['password'];
 				}
 
				if($username == $dbusername && $password == $dbpassword) {
		 			$_SESSION['session_username']=$username;
		 
					/* Redirect browser TODO REMEMBER PASSWORD + ENCRIPTAR DATOS*/
					/*header("Location: intropage.php");
				} else {
					$message = "Nombre de usuario ó contraseña inválida!";
				}
			}
		} else {
			$message = "Todos los campos son requeridos!";
		}

	}else {
=======
if(isset($_SESSION['nombre']))
{
	echo "<p>Has iniciado sesion: " . $_SESSION['nombre'] . "";
	echo "<p><a href='pagina3.php'>Cerrar Sesion</a></p>"; //TODO 
}
else 
{
>>>>>>> origin/master
?>		
			<div class="col-sm-6 text-center content" >
				<div class="login" id="login">
					<form id="formulario" method="post" action="login.php">
						
						<div class="input-group input-group-md">
							<span class="input-group-addon glyphicon glyphicon-user" id="icon_user"></span>
							<input type="text" class="form-control" id="username" name='username' placeholder="usuario" aria-describedby="icon_user">
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
							<input type="submit" class="btn btn-default dropdown-toggle" name="login" value="Iniciar Sesión"/>
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
				<!--div class="g-recaptcha" data-sitekey="6LdzkRsUAAAAAEFNfvtH7ahH_9-RJYbT-5tWabEQ" id="captcha"></div-->
			</div>

<?php
}

//cerrar_conexion();
?>
					</div> <!--panel-body-->
				</div> <!--logPanel-->
			</div> <!--panel-->
		</div> <!--row-->
	</div> <!--container-fluid text-center-->

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/logIn.js"></script>
	<script src="js/jquery.validate.min.js"	type="text/javascript"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</body>
</html>?>-->*/
