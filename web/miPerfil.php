<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Perfil - Paper Dreams</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/miperfil.css">
</head>

<body>
	<?php
		$pagina_actual="Mi perfil";
		include("php/funciones/genera_cabecera.php");
	?>

    <!--Perfil-->
    <div class="container-fluid text-center">    
        <div class="row content">
            <div class="col-sm-10 text-left"> 
                <div class="jumbotron" id="bloque-inicio">
                   <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                             <?php
                                $id = $_SESSION['usuario_actual'];
                                include("perfil_usuario.php");
                                $user = buscar_usuario_datos($id);

                                $fila = $user->fetch_object()

                                // Imagen
							    echo "<img class='img-responsive img-circle' src='img/perfil.jpg' width='200' height='200'  alt='Foto de Perfil'/>
                            </div>
                            <div class='col-sm-7'>
                                <p class='h2' id='nombre'>$fila->nombre</p>
                                <p id='datos'>$fila->email <br>
                                $fila->ciudad<br>
                                $fila->pais</p>
                            </div>
                        </div>
                        <br>
                        <div class='row'>
                            <p class='descripcion'>$fila->descripcion.</p>
                        </div> ";
                        ?>
                    </div>
                </div>
            </div>
            <?php
				$pagina_actual="Mi perfil";
				include("php/funciones/genera_bloque_derecha.php");
			?>
        </div>
    </div>

    <?php include("php/funciones/genera_pie.php"); ?>
	
	<!--Script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
