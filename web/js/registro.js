$(document).ready(function() {

    $('#register').submit(function(e) { e.preventDefault(); }).validate(
    { 
        debug: true,
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        
        rules: {
            "name": {
                required: true
            },
            "user": {
                required: true
            },
            "age":{
                required: true,
                number: true
            },
            "ciudad":{
                required: true
            },
            "pais":{
                required: true
            },
            "imagen_perfil":{
                required: true
            },
            "desc":{
                required: true
            },
            "email": {
                required: true,
                email: true
            },
            "password":{
                required: true,
                minlength: "8"
            },
            "confirm_password":{
                required: true,
                equalTo:"#password"
            },
            "condiciones":{
                required: true
            }
        },

        messages: {
            "name": {
                required: "Introduce tu nombre."
            },
            "user": {
                required: "Introduce tu nombre de usuario."
            },
            "age":{
                required: "Introduce tu edad.",
                number: "La edad debe ser un numero."
            },
            "ciudad":{
                required: "Introduce tu ciudad."
            },
            "pais":{
                required: "Introduce tu país."
            },
            "imagen_perfil":{
                required: "Introduce una foto de perfil."
            },
            "desc":{
                required: "Introduce una descripción."
            },
            "email": {
                required: "Introduce tu correo.",
                email: "Introduce un email válido."
            },
            "password":{
                required: "Introduce la contraseña.",
                minlength: "La contraseña debe tener una longitud minima de 8 caracteres."
            },
            "confirm_password":{
                required: "Introduce la contraseña de nuevo.",
                equalTo: "La contraseña debe ser igual a la contraseña indicada anteriormente."
            },
            "condiciones":{
                required: "Debe aceptar las condiciones."
            }
        },

        submitHandler: function(form){
            form.submit();
        }
    });
});
