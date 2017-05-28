
<?php

if(_$POST){

	$titulo = _$POST["title"];
	$cuerpo = _$POST["editor1"];
	
	$conn = conectar();
	//comprobamos que titulo < TANTOS caracteres y no este vacio
	if(strlen($titulo) == 0 || strlen($titulo) > 100) {
		header("Location: 404Error.php");
		exit;
	}
	//evitamos SQL inyection y HTML inyection TODO 


	if(isset(_$POST["id"])){ //Existe capitulo y hay que MODIFICAR


		$id = _$POST["id"];




		//Generamos modificacion:


		$query = 'UPDATE capitulos SET titulo="'.$titulo.'", cuerpo="'.$cuerpo.'" WHERE id_capitulo="'.$id.'"' ;
		$consulta 	= 	realiza_consulta($conn, $query);

	} else {				
	//No existe capitulo y hay que CREAR

		$fecha = date('Y/m/d H:i');
		$idLibro = _$POST["idLibro"];



		//Generamos creacion:

		$query = 'INSERT INTO capitulos (titulo,cuerpo,fecha,id_libro) VALUES ('.$titulo.','.$cuerpo.','.$fecha.','.$idLibro.')';
		$consulta 	= 	realiza_consulta($conn, $query);
	}

	//TODO desconectar
	header("Location: edicion.php?id="._$POST["idLibro"]);

} else {
	header("Location: 404Error.php");
}

?>