<?php
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	//Construye la sql que busca los comentarios de un libro que son comentarios raiz
	function comentarios($id, $contenido)
	{
		$sql = ""; 

		switch($contenido)
		{
			case "Libros":
			{
				$sql = "SELECT * FROM comentario_libro WHERE id_libro='$id' AND id_padre=0;";
			}
				break;

			case "Bocetos":
			{
				$sql = "SELECT * FROM comentario_boceto WHERE id_boceto='$id' AND id_padre=0;";
			}
				break;

			case "Capitulos":
			{
				$sql = "SELECT * FROM comentario_capitulo WHERE id_capitulo='$id' AND id_padre=0;";
			}
				break;
		}

		$comentarios = consulta($sql);

		return $comentarios;
	}

	//Construye la sql que busca los datos del usuario que ha comentado
	function usuario_comentario($id_usuario)
	{
		$sql =  "SELECT * FROM usuarios AS u JOIN perfil AS p ON u.id=p.id_usuario WHERE id_usuario=$id_usuario;";
		$usuario = consulta($sql);

		return $usuario;
	}

	//Construye la sql que busca todas las respuestas de un comentario
	function respuestas($id_comentario, $contenido)
	{
		
		$sql = ""; 

		switch($contenido)
		{
			case "Libros":
			{
				$sql = "SELECT * FROM comentario_libro WHERE id_padre='$id_comentario';";
			}
				break;

			case "Bocetos":
			{
				$sql = "SELECT * FROM comentario_boceto WHERE id_padre='$id_comentario';";
			}
				break;

			case "Capitulos":
			{
				$sql = "SELECT * FROM comentario_capitulo WHERE id_padre='$id_comentario';";
			}
				break;
		}

		$respuestas = consulta($sql);

		return $respuestas;
	}

	//id_comentario	cuerpo	fecha	id_usuario	id_padre  id_libro

	function nuevo_comentario($cuerpo, $id_usuario, $id_padre, $id_contenido, $contenido)
	{
		$sql = "";

		switch($contenido)
		{
			case "Libros":
			{
				$sql = "INSERT INTO comentario_libro(cuerpo, id_usuario, id_padre, id_libro) VALUES ('$cuerpo', '$id_usuario', '$id_padre', '$id_contenido');";
			}
				break;

			case "Bocetos":
			{
				$sql = "INSERT INTO comentario_boceto(cuerpo, id_usuario, id_padre, id_boceto) VALUES ('$cuerpo', '$id_usuario', '$id_padre',  '$id_contenido');";
			}
				break;

			case "Capitulos":
			{
				$sql = "INSERT INTO comentario_capitulo(cuerpo, id_usuario, id_padre, id_capitulo) VALUES ('$cuerpo', '$id_usuario', '$id_padre', '$id_contenido');";
			}
				break;
		}

		$exito = consulta($sql);

		return $exito;
	}


	function imprimir_respuestas($respuestas)
	{
		if($respuestas)
		{
			$rows = $respuestas->num_rows;

			//Si hay respuestas	
			if($rows > 0)
			{	
				//Una por una
				echo "<ul class='comments-list reply-list'>";
				while ($respuesta = $respuestas->fetch_object()) 
				{
					//Cogemos los datos del perfil del usuario que ha respondido
					$usuario_comentario = usuario_comentario($respuesta->id_usuario);
					$comment_user = $usuario_comentario->fetch_object();

					//Imprimimos el comentario
					echo "<li>
							<!-- Avatar -->
							<div class='comment-avatar'><img src=$comment_user->foto alt=''></div>
							<!-- Contenedor del Comentario -->
							<div class='comment-box'>
								<div class='comment-head'>
									<h6 class='comment-name'><a href='vistaUsuario.php?usuario=$comment_user->id'>$comment_user->usuario</a> </h6>
									<span>$respuesta->fecha</span>
									<a class='botones-comentario' data-toggle='modal' data-target='#myModal' data-id=$respuesta->id_comentario><i class='fa fa-reply'></i></a>
								</div>
								<div class='comment-content'>
									$respuesta->cuerpo
								</div>
							</div><br>
							</li>";

					$id = $respuesta->id_comentario;
					$respuestas_aux = respuestas($id, "Libros");
					imprimir_respuestas($respuestas_aux);
				}
				echo "</ul>";
			}
		}
	}
?>