<?php
//Funciones usadas en la búsqueda

require_once($_SERVER['DOCUMENT_ROOT'] ."/web/php/funciones/consulta.php");


//Devuelve el usuario pasando un id como entrada
function dameAutor($idAutor){
	$query = 'SELECT usuario FROM usuarios WHERE id='.$idAutor;
	$resultado = consulta($query);
	$nombre = $resultado->fetch_assoc();

	return $nombre["usuario"];
}

//Devuelve la media de un contenido dado por id
function dameMedia($id){
	$query = 'SELECT AVG(puntuacion) FROM valora WHERE id='.$id;
	$resultado = consulta($query);
	$nombre = $resultado->fetch_assoc();

	return $nombre["usuario"];
}

function rendondea($valor){
	return round($valor);
}

function buscaDibujos($valor){
	$query = 'SELECT id_bocetos AS id, titulo, foto AS portada, id_usuario FROM bocetos WHERE titulo OR descripcion LIKE "%'.$valor.'%"';
	return $resultado = consulta($query);


}

function buscaLibros($valor){
	$query = 'SELECT id_libro AS id, titulo, portada, id_usuario FROM libros WHERE titulo LIKE "%'.$valor.'%"';
	return $resultado = consulta($query);


}

function buscaLibrosCat($valor,$categoria){
	$query = 'SELECT id_libro AS id, titulo, portada, id_usuario FROM libros WHERE titulo LIKE "%'.$valor.'%" AND categoria="'.$categoria.'"';
	return $resultado = consulta($query);

}

?>