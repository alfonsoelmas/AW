<!DOCTYPE html>
<html lang="es">
<head>
	<title>About Us - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="css/aboutUs.css">
</head>
<body>
	<?php
		$pagina_actual="AboutUs";
		include("php/funciones/genera_cabecera.php");
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10">
				<p class="h1">Miembros que conforman el proyecto</p>
				A continuación podrá consultar el perfil de los miembros de Bi-Inestables:
				<ul>
					<li> <a href="#juan"> Juan Mas Aguilar </a> </li>
					<li> <a href="#eli"> Elianni Agüero Selva </a> </li>
					<li> <a href="#alfonso"> Alfonso Soria Muñoz </a> </li>
					<li> <a href="#gonzalo"> Gonzalo Jiménez Corta </a> </li>     
				</ul>
			  
				<!--JUAN-->
				<p id="juan" class="h2">Juan Mas Aguilar</p>
				<p>Nombre: Juan Mas Aguilar </p>
				<p>Dirección de Contacto: jumas@ucm.es </p>
				<p>Descripción: Soy un chico que disfruta con la buena vida. Me gusta hacer deporte, viajar y escribir. Interesado especialmente
				   en la seguridad informática pero con interés en muchos más campos. Trabajador y más vago que la chaqueta de un guardia planteo una
				   contradicción vital muy interesante que no quita el hecho de ser un fiel compañero a la hora de desarrollar un proyecto.</p>
				<p>Lema: Cuando hay que trabajar se trabaja, pero con el mínimo esfuerzo y el máximo resultado.</p>
				<img class="foto img-responsive" src="img/juan.jpg" alt="Juan" width="85" height="120" />

				<!--ELI-->
				<p id="eli" class="h2">Elianni Agüero Selva</p>
				<p> Nombre: Elianni Agüero Selva </p>
				<p> Dirección de Contacto: eaguero@ucm.es </p>
				<p> Descripción: Ingeniera Informática en potencia. Me gusta la música, escucharla solo porque cantar se me da muy mal.
					También me gusta viajar e ir al cine y al teatro. Me considero una persona trabajadora y creativa, aunque no me gusta
					nada improvisar.</p>
				<p>Lema: Trabaja para que te oigan, canta sin que te escuchen.</p>
				<img src="img/eli.jpg" alt="Eli" class="img-responsive foto" width="120" height="120"/>

				<!--ALFONSO-->
				<p id="alfonso" class="h2">Alfonso Soria Muñoz</p>
				<p> Nombre: Alfonso Soria Muñoz </p>
				<p> Dirección de Contacto: alfsoria@ucm.es </p>
				<p> Descripción: Futuro ingeniero informático nacido en Madrid en 1996. Me gusta el deporte (especialmente el snowboard) y la lectura.</p>
				<p> Lema: Be happy and life will return the smiles.</p>
				<img src="img/alfonso.jpg" alt="Alfonso" class="img-responsive foto" width="110" height="110"/>

				<!--GONZALO-->
				<p id="gonzalo" class="h2">Gonzalo Jiménez Corta</p>
				<p> Nombre: Gonzalo Jiménez Corta </p>
				<p> Dirección de Contacto: gonzajim@ucm.es </p>
				<p> Descripción: Me gusta leer, jugar a videojuegos, escuchar música y quedar con amigos. Además de la Informática, estoy interesado en la Física y en algunos temas relacionados con la Biología.</p>
				<p> Lema: No dejes para mañana lo que puedes hacer hoy.</p>
				<img src="img/gonzalo.jpg" alt="Gonzalo" class="img-responsive foto" width="110" height="110"/>
			</div>

			<?php
				$pagina_actual="AboutUs";
				include("php/funciones/genera_bloque_derecha.php");
			?>
		</div>
	</div>

	<?php include("php/funciones/genera_pie.php"); ?>

	<!--Scripts-->
	<script type="text/javascript" src="js/goTo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
