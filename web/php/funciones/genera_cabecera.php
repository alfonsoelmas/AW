<?php
session_start();
genera_cabecera($pagina_actual);

function genera_cabecera($pagina_actual) {
	// Genera la cabecera de la página web, mostrando el ususario conectado en caso de haberlo.
	echo "<div class='jumbotron' id='banner'>";
		echo "<div class='text-left'>";
			echo "<div class='col-sm-2'>";
				echo "<a href='index.php'><img id='logo' alt='logo' src='img/logo1.png'></a>";
			echo "</div>";
			echo "<div class='col-sm-10'>";
				echo "<p class='h1'>Paper Dreams</p>";      
				echo "<p>De tus sueños al papel</p>";
			echo "</div>";
		echo "</div>";
		echo "<div id='breadcum-div'>";
	   		echo "<ol class='breadcrumb' id='breadcum' >";
	   			// Mostrar usuario conectado en caso de haberlo.
				if(isset($_SESSION["usuario_actual"])) {
					echo "<li>¡Hola, ".$_SESSION["name"]."! ";
					echo "<a href='php/funciones/logout.php'>Desconectar</a></li>";
				}
				if($pagina_actual != "Inicio")
	   				echo "<li><a href='index.php'>Inicio</a></li>";
	   			echo "<li class='active'>".$pagina_actual."</li>";
			echo "</ol>";
		echo "</div>";
	echo "</div>";

	echo "<nav class='navbar navbar-inverse'>";
		echo "<div class='container-fluid'>";
			echo "<div class='navbar-header'>";
				echo "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>";
					echo "<span class='icon-bar'></span>";
					echo "<span class='icon-bar'></span>";
					echo "<span class='icon-bar'></span>";                        
				echo "</button>";
				echo "<a class='navbar-brand' href='index.php'>Inicio</a>";
			echo "</div>";
			echo "<div class='collapse navbar-collapse' id='myNavbar'>";
				echo "<ul class='nav navbar-nav'>";
					echo "<li><a href='categorias.php'>Categorías</a></li>";
					echo "<li><a href='contacto.php'>Contacto</a></li>";
					echo "<li><a href='aboutUs.php'>About Us</a></li>";
				echo "</ul>";
				echo "<div class='nav navbar-nav navbar-right'>";
	        		echo "<form class='navbar-form navbar-left input-group-btn' method='get' role='search' action='result-busqueda.php'>";
	            		echo "<div class='form-group'>";
	              			echo "<input type='text' class='form-control' name='busqFacil' placeholder='Search'>";
	            		echo "</div>";
	            		echo "<button id='buscador' type='submit' class='btn btn-default'><span class='glyphicon glyphicon-search'></span>Buscar</button>";
	          		echo "</form>";
	   			echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</nav>";
}

?>
