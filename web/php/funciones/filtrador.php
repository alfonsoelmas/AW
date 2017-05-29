<div class="panel panel-default" id="opcionesBusq">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-11">
				<p class="h3 panel-title">Opciones de búsqueda</p>
			</div>
			<div class="col-sm-1 text-center">
				<button type="button" class="btn btn-default margen-top" data-toggle="collapse" data-target="#opcionesBusqBody">+</button>
			</div>
		</div>
	</div>
	<div class="panel-body" id="opcionesBusqBody">
		<form method="get" action="result-busqueda.php">
			<div class="row">
				Busqueda: <input type="text" class="form-control" id="busqueda" name="busq" placeholder="buscar..." />
			</div>

			<span> 	Filtrar por: </span>
			<div class="row">

			  <input type="radio" name="tipo" value="libro" checked> Libro<br>
			  <input type="radio" name="tipo" value="dibujo"> Dibujo<br> 

			</div>

			<div class="row">
				Género de libro:
				<span class="caret"></span>
				</button>
				<select name="categoria">
					<?php 
						//Pintamos las categorías
						require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/categorias.php");
						$categorias = obtenerCategorias();
						$elementos = count($categorias);
						
						for($i=0; $i<$elementos; $i++){
							echo '<option value="'.$categorias[$i].'">'.$categorias[$i].'</option>';
						}

					?>
				</select> 
			</div>
			<input type="submit" value="Busqueda" class="btn btn-lg"></input>
		</form>
	</div> <!--panel-body--> 
</div>