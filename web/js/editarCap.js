$(document).ready(function() {
    
    $('#cap').submit(function(e) { e.preventDefault(); }).validate(
    { 
        debug: true,
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        
        rules: {
            "titulo": {
                required: true
            },
            "cuerpo":{
                required: true
            }
        },
        messages: {
            "titulo": {
                required: "Pon un título a tu libro"
            },
            "cuerpo":{
                required: "Escribe una historia"
            }
        },

        submitHandler: function(form){
            form.submit();
        }
        

    });
});