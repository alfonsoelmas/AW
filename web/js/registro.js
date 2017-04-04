
$(document).ready(function() {

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
        }
    });
});
