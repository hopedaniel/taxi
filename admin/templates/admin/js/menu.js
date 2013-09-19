$(function(){
$('.dropdown').click(function () {
	if ($(this).children('ul').css('display') == 'none'){
	$('.dropdown').children('ul').slideUp();
	$(this).children('ul').slideDown();
	} else {
	$('.dropdown').children('ul').slideUp();
	}
});
});