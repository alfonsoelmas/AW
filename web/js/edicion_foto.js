$(document).ready(function() {
    
    $('#boceto').submit(function(e) { e.preventDefault(); }).validate(
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
            "desc":{
                required: true
            }
        },
        messages: {
            "imagen": {
                required: "No olvides subir tu boceto"
            },
            "titulo": {
                required: "Pon un título a tu obra"
            },
            "desc":{
                required: "Escribe una descripción"
            }
        },

        submitHandler: function(form){
            form.submit();
        }
        

    });
});