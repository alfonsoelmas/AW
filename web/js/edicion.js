$(document).ready(function() {
    
    $('#libro').submit(function(e) { e.preventDefault(); }).validate(
    { 
        debug: true,
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        
        rules: {
            "imagen": {
                required: true
            },
            "titulo": {
                required: true
            },
            "sinopsis":{
                required: true
            },
            "genero":{
                required: true
            }
        },
        messages: {
            "imagen": {
                required: "No olvides la portada de tu libro"
            },
            "titulo": {
                required: "Pon un título a tu libro"
            },
            "sinopsis":{
                required: "Escribe la sinópsis"
            },
            "genero":{
                required: "Pon un género"
            }
        },

        submitHandler: function(form){
            form.submit();
        }
        

    });
});