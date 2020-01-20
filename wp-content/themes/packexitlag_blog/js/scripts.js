$(document).ready(function() {
    /* Menu */
	var flag = 0;
    $(".hamburger").on("click", function() {
        if(flag == 0) {
        	$(this).addClass("is-active");
            $(".menu, .filter-header").stop().fadeIn();
            flag = 1;
        }
        else {
            $(this).removeClass("is-active");
            $(".menu, .filter-header").stop().fadeOut();
            flag = 0;
        }
    });

    $('.share').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });

});