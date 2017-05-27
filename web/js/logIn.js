$(document).ready(function() {
    
    document.getElementById("logInButton").onclick=function(){

        var elemento = document.getElementById("captcha");
        elemento.style.display = "block";       
        elemento = document.getElementById("user");
        elemento.value="";      
        elemento = document.getElementById("password");
        elemento.value="";      
    }

    $('#formulario').submit(function(e) { e.preventDefault(); }).validate(
    { 
        debug: true,
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        
        rules: {
            "user": {
                required: true
            },
            "password":{
                required: true,
                minlength: "8"
            }
        },
        messages: {
            "user": {
                required: "Introduce tu nombre de usuario",
            },
            "password":{
                required: "Introduce la contraseña",
                minlength: "Tiene que tener una longitud minima de 8 caracteres"
            }
        },

        submitHandler: function(form){
            form.submit();
        }
        

    });
});



/*
$("#logInButton").onclick=function(){

	    //var elemento = document.getElementById("panel");
	    $('#panel').style.width="1080px";
	    //elemento.style.width = "1080px";
	    //var elemento = document.getElementById("captcha");
	    //elemento.style.display = "block";
	    $('#captcha').style.display="block";
	    //elemento = document.getElementById("user");
	    //elemento.value="";
	    $('#user').value="";
	    //elemento = document.getElementById("password");
	    //elemento.value="";
	    $('#password').value="";
	}
*/