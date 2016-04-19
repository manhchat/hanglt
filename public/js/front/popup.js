$( document ).ready(function() {	
	$( ".sticky-popup" ).addClass('right-bottom');
	var contheight = jQuery( ".popup-content" ).outerHeight()+2;
     	$( ".sticky-popup" ).css( "bottom", "-"+contheight+"px" );

     	$( ".sticky-popup" ).css( "visibility", "visible" );

     	$('.sticky-popup').addClass("open_sticky_popup");
     	$('.sticky-popup').addClass("popup-content-bounce-in-up");
     	
       $( ".popup-header" ).click(function() {
       	if($('.sticky-popup').hasClass("open"))
       	{
       		$('.sticky-popup').removeClass("open");
       		$( ".sticky-popup" ).css( "bottom", "-"+contheight+"px" );
       	}
       	else
       	{
       		$('.sticky-popup').addClass("open");
         		$( ".sticky-popup" ).css( "bottom", 0 );
       	}
         
       });
});