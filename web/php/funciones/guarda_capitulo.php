
<?php

if(_$POST){

	if(isset(_$POST["id"])){ //Existe capitulo y hay que MODIFICAR

		//comprobamos que titulo < TANTOS caracteres
		//evitamos SQL inyection y HTML inyection



		//Generamos modificacion:


		$query = ;

	} else {				//No existe capitulo y hay que CREAR
		//evitamos HTML inyection



		//Generamos creacion:

		$query = ;
	}


} else {

	//TODO muestro error
}

?>