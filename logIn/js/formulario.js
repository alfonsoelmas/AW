
/*
// Expresión para validar email
var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

function validate_mail(string mail){
    if(form.email.value != expr || form.email.value == "")
    {
        document.getElementById("mail").style.borderColor="red";
        return "<br><span color='red'>El mail que ha introducido no es válido</span><br>" ;_
    }
    else
        document.getElementById("mail").style.borderColor="green";
}

function validate_password(string pass){
    if(form.email.value.length() < 8))
    {
        document.getElementById("password").style.borderColor="red";
        return "<br><span color='red'>La contraseña debe tener al menos 8 caracteres</span><br>" ;
    }
    else if(!re.test(form.password.value))
    {
        document.getElementById("mail").style.borderColor="red";
        return "<br><span color='red'>La contraseña tiene que tener una minuscula, una mayuscula y un numero</span><br>";
    }
    else
        document.getElementById("mail").style.borderColor="green";
}
*/

/*document.getElementById("logInButton").onclick=function(){

    var elemento = document.getElementById("panel");
    elemento.style.width = "1080px";
    var elemento = document.getElementById("captcha");
    elemento.style.display = "block";
    elemento = document.getElementById("user");
    elemento.value="";
    elemento = document.getElementById("pass");
    elemento.value="";
}*/


$(document).ready(function() {

    //$("#registro").click(function(a){alert("entra");});
    
    $('#register').submit(function(e) { e.preventDefault(); }).validate(
    { 

        debug: true,
        rules: {
            "name": {
                required: true
            },
            "user": {
                required: true
            },
            "email": {
                required: true,
                email: true
            },
            "country":{
                required: false
            },
            "password":{
                required: true,
                minlength: "8"
            },
            "confirm_password":{
                required: true,
                equalTo:"#password"
            },
            "age":{
                required: true,
                number: true
            }
        },
        messages: {
            "name": {
                required: "Introduce tu nombre."
            },
            "user": {
                required: "Introduce tu nombre de usuario.",
            },
            "email": {
                required: "Introduce tu correo.",
                email: "Introduce un email válido."
            },
            "country":{
                required: false
            },
            "password":{
                required: "Introduce la contraseña.",
                minlength: "La contraseña debe tener una longitud minima de 8 caracteres."
            },
            "confirm_password":{
                required: "Introduce la contraseña de nuevo.",
                equalTo:"La contraseña debe ser igual a la contraseña indicada anteriormente."
            },
            "age":{
                required: "Introduce tu edad.",
                number: "La edad debe ser un numero."
            }
        },
    });
});
