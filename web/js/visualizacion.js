document.getElementById("logInButton").onclick = function(){
  location.href='login.html';
};

document.getElementById("registerButton").onclick = function(){
  location.href="registro.html";
};

document.getElementById("leer").onclick = function(){
  location.href="visualizacionContenidoLibro.html";
};

document.getElementByClassName("visita_perfil").onclick = function(){
  location.href="vistaUsuario.html";
};

document.getElementByClassName("vista_libro").onclick = function(){
  location.href="edicion.html";
};

document.getElementByClassName("vista_usuario").onclick = function(){
  location.href="vistaUsuario.html";
};