
<?php

if($_POST){
	require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");

	$titulo = $_POST["title"];
	$cuerpo = $_POST["editor1"];

	//comprobamos que titulo < TANTOS caracteres y no este vacio
	if(strlen($titulo) == 0 || strlen($titulo) > 100) {
		header("Location: 404Error.php");
		exit;
	}
	//evitamos SQL inyection y HTML inyection TODO 


	if(isset($_POST["id"])){ //Existe capitulo y hay que MODIFICAR


		$id = $_POST["id"];




		//Generamos modificacion:


		$query = 'UPDATE capitulos SET titulo="'.$titulo.'", cuerpo="'.$cuerpo.'" WHERE id_capitulo="'.$id.'"' ;
		$consulta 	= 	consulta($query);

	} else {				
	//No existe capitulo y hay que CREAR

		$fecha = date('Y/m/d H:i');
		$idLibro = $_POST["idLibro"];



		//Generamos creacion:

		$query = 'INSERT INTO capitulos (titulo,cuerpo,fecha,id_libro) VALUES ('.$titulo.','.$cuerpo.','.$fecha.','.$idLibro.')';
		$consulta 	= 	consulta($query);
	}

	//TODO desconectar
	header("Location: /web/edicion.php?libro=".$_POST["idLibro"]);

} else {
	header("Location: 404Error.php");
}

?>