$(document).ready(function(){
	
	$('.checkbox').click (function(){
		var thisCheck = $(this);
	  	//var codeArr = new Array();
		if (thisCheck.is(':checked') ) {
		    // Do stuff
			cookieArr.push(thisCheck.val());
		} else {
			cookieArr.splice($.inArray(thisCheck.val(), cookieArr),1);

		}
		alert(cookieArr);
		createCookie('cookieArr', cookieArr, 1);
	});
	//Cookies
	function createCookie(name, value, days) {
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	        var expires = "; expires=" + date.toGMTString();
	    }
	    else var expires = "";

	    var fixedName = '<%= Request["formName"] %>';
	    name = fixedName + name;

	    document.cookie = name + "=" + value + expires + "; path=/";
	}

	function readCookie(name) {
	    var nameEQ = name + "=";
	    var ca = document.cookie.split(';');
	    for (var i = 0; i < ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
	        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	    }
	    return null;
	}

	function eraseCookie(name) {
	    createCookie(name, "", -1);
	}
	
	$(".fancybox-image").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',
    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
    });
});
