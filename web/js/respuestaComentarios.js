$(document).ready(function (){
	$('.botones-comentario').click(function(){
		var id = $(this).attr('data-id');
		console.log(id);	
		$('#answerParent').val(id);
	});
});
