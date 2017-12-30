$(document).ready(function() {
	'use strict';

	//trigger window resize when DOM has been loaded
	$(window).trigger('resize');

	//toggle mobile menu
	$("#nav-icon").click(function(event) {
        var html_top = Math.abs(parseInt($('html').css('top'), 10));
		if ( $(this).hasClass('open') ) {
	        $("html").removeClass('no-scroll');
	        $("html").css("top",  '');
	        $(window).scrollTop( html_top );
        } else {
            $("html").css("top",  - $(window).scrollTop() );
            $("html").addClass('no-scroll');                      
        }
		$(this).toggleClass('open');
		$("#site-header").toggleClass('open');
		$("#site-header .nav").toggleClass('hidden');
		return false;
	});
	$(".header-menu a").click(function() {
        $("html").removeClass('no-scroll');
        $("html").css("top",  '');
		$("#nav-icon").removeClass('open');
		$("#site-header").removeClass('open');
		$("#site-header .nav").addClass('hidden');
	});
			
    //script for deprecated browser notification
    $(document).ready(function() {
        $('#close_announcement').click(function(e) {
            e.preventDefault();
            $('#update_browser_container').addClass('hidden');
        });
    });

	//replace all .svg to .png, in case the browser does not support the format
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}

});

window.onload = function() {
	//add class to body element after page has loaded (including pictures)
	$("body").addClass('content-loaded');
}


$(window).resize(function() {

});