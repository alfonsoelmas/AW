
$('.botones-comentarios').click(function(){
	var id = $(this).attr('data-id');
	$('#answerParent').val(id);
});