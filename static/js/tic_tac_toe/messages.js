
var template_message = '<div class="alert alert-%type-message% alert-dismissible">' +
					   '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
					   '%message%' +
					   '</div>';

function set_message(type, message){

	$("#alert-message").html(template_message.replace('%type-message%', type).replace('%message%', message));
}