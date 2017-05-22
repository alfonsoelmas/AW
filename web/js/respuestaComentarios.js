

$('#myModal').on('show.bs.modal', function (e) {
    var idAnswer = $(e.relatedTarget).attr('data-id');
    $('.answerParent').attr('value', idAnswer);
});