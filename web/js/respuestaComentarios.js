$(document).ready(function(){
	
	$('#form_comment').submit(function(e) { e.preventDefault(); }).validate(
    { 
        debug: true,
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        
        rules: {
            "cuerpo": {
                required: true
            }
        },

        messages: {
            "cuerpo": {
                required: "Comenta esta obra."
            }
        },

        submitHandler: function(form){
            form.submit();
        }
    });
	
	$('.botones-comentario').click(function(){
		var id = $(this).attr('data-id');
		console.log(id);	
		$('#answerParent').val(id);
	});



});
