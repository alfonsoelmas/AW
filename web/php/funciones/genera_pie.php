<?php
// Genera el pie de página de la web.

if(!isset($_SESSION))
	session_start();

echo "<footer class='container-fluid text-center'>";
	echo "<p><a id='color-defecto' href='aboutUs.html'>Paper Dreams 2017 - Un proyecto realizado por el grupo Bi-Inestables</a></p>";
echo "</footer>";

?>
