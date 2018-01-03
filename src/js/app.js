$(document).ready(function() {
	'use strict';

	// Trigger window resize when DOM has been loaded
	$(window).trigger('resize');

	// Toggle mobile menu
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
	
	// Toggl contact form
	$(".contact-form-btn").click(function() {
		$(".contact-form-wrapper").toggleClass('hidden');
	});

	$(".contact-form-close").click(function() {
		$(".contact-form-wrapper").addClass('hidden');
	});


	$(document).mouseup(function (e){
	    var container_1 = $(".contact-form-wrapper");
	    var container_2 = $(".contact-form-btn");

	    if (!container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0 // ... nor a descendant of the container
	        && !container_2.is(e.target) // and if the target of the click isn't the container...
	        && container_2.has(e.target).length === 0) // ... nor a descendant of the container
	    {
			container_1.addClass('hidden');		        
	    }
	});

	// Switch between galleries
	$(".gallery-title-block").click(function() {
		$(".gallery-title-block.active, .gallery-img-block.active").removeClass('active');
		$(this).addClass('active');
		var $this_id = $(this).attr('id');
		var $this_id = $this_id.replace("gallery-title-block-", "");
		var $this_gallery_id_pre = ".gallery-img-block-";
		var $this_gallery_id = $this_gallery_id_pre.concat($this_id);
		$($this_gallery_id).addClass('active');
		$(this).addClass($this_gallery_id);
		return false;
	});

	// Script for "back button"
	$(".go-back").click(function(e) {
		e.preventDefault();
	    window.history.back();
	});

    // Script for deprecated browser notification
    $('#close_announcement').click(function(e) {
        e.preventDefault();
        $('#update_browser_container').addClass('hidden');
    });

	// Replace all .svg to .png, in case the browser does not support the format
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}

	// Initialize BX Slider
	$(document).ready(function(){
	  $('.bxslider').bxSlider({
	  		pager: false
	  });
	});

});

window.onload = function() {
	//add class to body element after page has loaded (including pictures)
	$("body").addClass('content-loaded');
}


$(window).resize(function() {

});