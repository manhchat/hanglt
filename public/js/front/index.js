$(document).ready(function(){
	$('#danh-muc').hide();
	$('#menu').click(function(){
		var clicked = $(this).attr('data-clicked');
		if (clicked == 0) {
			$(this).attr('data-clicked', 1);
	        $('#danh-muc').slideDown("fast");
		} else {
			$(this).attr('data-clicked', 0);
	        $('#danh-muc').hide();
		}
		
	});
});