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

	// Google Maps API script
/* -------------------------------------------------------------------------------------- */
	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	function new_map( $el ) {
		
		// var
		var $markers = $el.find('.marker');
		
		
		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI: true,
			styles		: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#ffffff"},{"visibility":"on"}]}]
		};
		
		
		// create map
		var map = new google.maps.Map( $el[0], args);
		
		
		// add a markers reference
		map.markers = [];
		
		
		// add markers
		$markers.each(function(){
			
	    	add_marker( $(this), map );
			
		});
		
		
		// center map
		center_map( map );
		
		
		// return
		return map;
		
	}

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		var marker_href = $marker.attr('href');
		var marker_img_base = $('#template-dir-uri-img').attr('href');
		var marker_img = {
			url			: marker_img_base + 'marker.png',
			anchor		: new google.maps.Point(25, 48)
		}

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon		: marker_img,
			url			: marker_href
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				//infowindow.open( map, marker );
				window.location.href = this.url;

			});
		}

	}

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}

	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});
/* -------------------------------------------------------------------------------------- */
	// /Google Maps API script


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