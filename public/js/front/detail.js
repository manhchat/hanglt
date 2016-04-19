$(document).ready(function() {
    $(".ctpage").hide();
    $(".ctpage.active").fadeIn("400");

    $(".tab_title a").click(function(event) {
        $(".tab_title a").removeClass('active');
        $(this).addClass('active');

        var a = $(this).attr('rel');
        $(".ctpage").hide();
        $(a).fadeIn('fast');
    });
});