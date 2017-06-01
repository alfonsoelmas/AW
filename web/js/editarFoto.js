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
                required: "No olvides la imagen de tu boceto"
            },
            "titulo": {
                required: "Pon un título a tu boceto"
            },
            "desc":{
                required: "Escribe una descripción del boceto"
            }
        },

        submitHandler: function(form){
            form.submit();
        }
        

    });
});