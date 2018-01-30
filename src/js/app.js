$(document).ready(function() {
	'use strict';

	// Trigger window resize when DOM has been loaded
	$(window).trigger('resize');
	
	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;

	// Toggle mobile menu
	$("#mobile-menu-icon").click(function(event) {
		var $this = $(this);
		if ( $this.hasClass("open") ) {
			$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
			$('.header-menu .menu-item-has-children > a > .menu-item-has-children-ghost').removeClass('hidden');
			$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
		}
		$(this).toggleClass('open');
		$("#site-header .wrapper-for-mobile-menu").stop(true, true).slideToggle();
		return false;
	});

	//hide mobile menu when clicked outside of it
	$(document).mouseup(function (e){
		if ( $("#mobile-menu-icon").hasClass('open') ) {
		    var container = $("#site-header");	
		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0 ) // ... nor a descendant of the container
		    {
				$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
				$('.header-menu .menu-item-has-children > a > .menu-item-has-children-ghost').removeClass('hidden');
				$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
				$("#mobile-menu-icon").removeClass("open");
				$("#site-header .wrapper-for-mobile-menu").stop(true, true).slideUp();			
				return false;			        
		    }
		}
	});

	// Toggle first level sub-menus for desktop
	$(".menu-item-has-children").mouseenter(function(e) {
		var $this = $(this);
		if ( $(window).width() > $tablet_width ) {
			$this.children(".sub-menu").stop(true, true).slideDown();
			return false;
			alert('enter');
		}
	});

	$(".header-menu > .menu-item-has-children").mouseleave(function(e) {
		var $this = $(this);
		if ( $(window).width() > $tablet_width ) {
			$this.children(".sub-menu").stop(true, true).css("display", 'none');
			//$(".sub-menu").slideUp();
			return false;
			alert('leave');
		}
	});

	// Toggle mobile menu sub-menus
		// First level sub-menus
	$('.header-menu > .menu-item-has-children > a > .menu-item-has-children-ghost').click(function(event) {
		if ( $(window).width() <= $tablet_width ) {
			var $this = $(this);
			 event.preventDefault();
			// Close sub-menus below first level
			$('.header-menu .sub-menu .sub-menu').slideUp();
			// Restore ghost element above the links for sub-menus below first level
			$('.header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost').removeClass('hidden');
			// Close first level sub-menus, but NOT THIS
			$('.header-menu > .menu-item-has-children > a > .menu-item-has-children-ghost').not(this).parent().siblings('.sub-menu').slideUp();
			// Restore ghost element above the links for first level sub-menus, but NOT THIS
			$('.header-menu > .menu-item-has-children > a > .menu-item-has-children-ghost').not(this).removeClass('hidden');
			// Slide toggle sub-menu for THIS item
			$this.parent().siblings('.sub-menu').stop(true, true).slideToggle();
			// Hide ghost element above the link for THIS item
			$this.addClass("hidden");
			// Remove active menu item style for inactive items
			$('.header-menu .menu-item-has-children-ghost').not(this).parent().css({'color' : '', 'background-color' : ''});
			// Add active menu item style for THIS item
			$this.parent().css({'color' : '#231F20', 'background-color' : '#f6c55b'});
			return false;
		}
	});
		// Sub-menus below first level
	$('.header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost').click(function(event) {
		if ( $(window).width() <= $tablet_width ) {
			var $this = $(this);
			 event.preventDefault();
			// Close sub-menus below first level, but NOT THIS
			$('.header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost').not(this).parent().siblings('.ul-sub-menu').slideUp();
			// Restore ghost element above the links for sub-menus below first level, but NOT THIS
			$('.header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost').not(this).removeClass('hidden');
			// Slide toggle sub-menu for THIS item
			$this.parent().siblings('.sub-menu').stop(true, true).slideToggle();
			// Hide ghost element above the link for THIS item
			$this.addClass("hidden");
			// Remove active menu item style for below first level sub-menu inactive items
			$('.header-menu .sub-menu .menu-item-has-children-ghost').parent().not(this).css({'color' : '', 'background-color' : ''});
			// Add active menu item style for THIS item
			$this.parent().css({'color' : '#231F20', 'background-color' : '#f6c55b'});
			return false;
		}
	});

	// Language switcher .active class
	$(".lang-switcher").mouseenter(function(e) {
		$(this).find(".active").removeClass("active").addClass("was-active");
	});

	$(".lang-switcher").mouseleave(function(e) {
		$(this).find("a").removeClass("active");
		$(this).find(".was-active").addClass("active").removeClass("was-active");
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
	/*$(".gallery-title-block").click(function() {
		$(".gallery-title-block.active, .gallery-img-block-container.active").removeClass('active');
		$(this).addClass('active');
		var $this_id = $(this).attr('id');
		var $this_id = $this_id.replace("gallery-title-block-", "");
		var $this_gallery_class_pre = ".gallery-img-block-container-";
		var $this_gallery_class = $this_gallery_class_pre.concat($this_id);
		$($this_gallery_class).addClass('active');
		return false;
	});*/

	// Script for "back" button
	$(".go-back").click(function(e) {
		e.preventDefault();
	    window.history.back();
	});

	// Script for "load more" button
	$(document).on('click', '.load-more a', function(e) {
          e.preventDefault();
          var $link = $(this).attr('href');
          $('.load-more').html('<span class="loader">Loading...</span>');
          jQuery.get($link, function(data) {
              var $post = $(".posts .post ", data);
              $(".posts").append($post);
          });
          $('.load-more').load($link+' .load-more a');
      });

	/*	$(document).on('click', '.load-more a', function(e) {
      e.preventDefault();
      var $link = $(this).attr('href');
      var $load_more = $(this).parents('.load-more');

      $load_more.html('<span class="loader">Loading...</span>');

      var $load_more_id = $load_more.attr('id');
      var $this_id = $load_more_id.replace("load-more-", "");
      var $this_posts_class_pre = ".posts-";
      var $this_posts_class = $this_posts_class_pre.concat($this_id);
      var $this_posts_post = $this_posts_class.concat(' .post ');
      alert($this_posts_class);
      alert($this_posts_post);
      var $post = $($this_posts_post, data);

      jQuery.get($link, function(data) {    
          $($this_posts_class).append($post);
      });
      
      $load_more.load($link+' .load-more a');
  }); */

	// Play Video by clicking button
	/*$(".btn-play").click(function() {
		var $this_video = $(this).parent().find('.video-play').get(0);
		if ( $this_video.paused ) {
			$this_video.play();
			$(this).addClass('hidden');
		}
	});*/

	$(".video-play").click(function() {
		var $this = $(this);
		var $this_video = $(this).get(0);
		var $this_button = $this.parent().find('.btn-play');
		if ( !$this_video.paused ) {
			$this_video.pause();
			$this_button.removeClass('hidden');
		} else {
			$this_video.play();
			$this_button.addClass('hidden');
		}
	});

	// Script for Facebook Share button
	$(document).on('click', '.shareBtn', function() {
		var $btn = $(this);

		FB.ui({
		method: 'share',
		display: 'popup',
		href: $btn.attr('data-url'),
		}, function(response){});

		return false;
	});

	// Fit Video To Parent Div
	$('.jquery-background-video').bgVideo({
		//fullScreen: false, // Sets the video to be fixed to the full window - your <video> and it's container should be direct descendents of the <body> tag
		//fadeIn: 500, // Milliseconds to fade video in/out (0 for no fade)
		pauseAfter: 0, // Seconds to play before pausing (0 for forever)
		//fadeOnPause: false, // For all (including manual) pauses
		fadeOnEnd: false, // When we've reached the pauseAfter time
		showPausePlay: false, // Show pause/play button
		//pausePlayXPos: 'right', // left|right|center
		//pausePlayYPos: 'top', // top|bottom|center
		//pausePlayXOffset: '15px', // pixels or percent from side - ignored if positioned center
		//pausePlayYOffset: '15px' // pixels or percent from top/bottom - ignored if positioned center		
	});

	// Add CSS class to Site Header when scrollTop position of the document is not 0
	var $window = $(window);
	var $lastY = $window.scrollTop();
	var $document = $(document);
	var $body = $("body");
	function add_not_top() {
	//	$body.addClass("not--top");
	}
	function remove_not_top() {
	//	$body.removeClass("not--top");
	}
	var $timeout_add_not_top
	var $timeout_remove_not_top

	if( $lastY > 10 ) {
		add_not_top();
	}

	$(window).scroll(function() {

		var $currentY = $window.scrollTop();
		if ( $currentY > $lastY ) {
			var y = 'down';
		} else if ( $currentY == $lastY ) {
			var y = 'none';
		} else {
			var y = 'up';
		}
		$lastY = $currentY;
		if ( $document.scrollTop() > 10 && y == 'down' ) {
			$timeout_add_not_top = setTimeout(add_not_top, 250);
		} else if ( $document.scrollTop() <= 10 && y == 'up' ) {
			$timeout_remove_not_top = setTimeout(remove_not_top, 250);
		}

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
			// gestureHandling: 'greedy',
			gestureHandling: 'none',
			styles		: [
							{
							    "featureType": "administrative",
							    "elementType": "labels.text.fill",
							    "stylers": [
							        {
							            "color": "#444444"
							        }
							    ]
							},
							{
							    "featureType": "administrative.country",
							    "elementType": "geometry.stroke",
							    "stylers": [
							        {
							            "color": "#787c82"
							        }
							    ]
							},
							{
							    "featureType": "administrative.province",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "administrative.locality",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "administrative.neighborhood",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "administrative.land_parcel",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "landscape",
							    "elementType": "all",
							    "stylers": [
							        {
							            "color": "#c2c0c2"
							        }
							    ]
							},
							{
							    "featureType": "poi",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "poi",
							    "elementType": "labels.text",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road",
							    "elementType": "all",
							    "stylers": [
							        {
							            "saturation": -100
							        },
							        {
							            "lightness": 45
							        },
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road.highway",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road.arterial",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road.arterial",
							    "elementType": "labels.icon",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "transit",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "water",
							    "elementType": "all",
							    "stylers": [
							        {
							            "color": "#ffffff"
							        },
							        {
							            "visibility": "on"
							        }
							    ]
							}
						]
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

		    var listener = google.maps.event.addListener(map, "idle", function() { 
			  var current_zoom = map.getZoom();			
			  var zoom_out = current_zoom - 2;
			  map.setZoom( zoom_out );
			  google.maps.event.removeListener(listener); 
			});

			// change the center of map
			map.panBy(-800,0);
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


	// Initialize Lightslider
	$(".lightslider").lightSlider({
		item	: 1,
		pager	: false
	});

	// Initialize lightbox plugin
	$('a[data-rel^=lightcase]').lightcase({
		labels			: {
			'sequenceInfo.of': '/'
		}
	});

});

window.onload = function() {
	//add class to body element after page has loaded (including pictures)
	$("body").addClass('content-loaded');
}


$(window).resize(function() {

	var $window_width = $(window).width();
	var	$wrapper_for_mobile_menu = $("#site-header .wrapper-for-mobile-menu");

	if ( $window_width < 1200 ) {
		var $menu_item_has_children = $(".header-menu .menu-item-has-children > a");
		if( !$menu_item_has_children.has('.menu-item-has-children-ghost').length ) {
			$menu_item_has_children.append("<span class='menu-item-has-children-ghost'></span>");
		}
		$("#site-header .wrapper-for-mobile-menu").removeClass('block-important');
		alert('mazaks');
	} else {
		$(".menu-item-has-children-ghost").detach();
		$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
		$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
		//$('.header-menu > .menu-item-has-children > .sub-menu').css("display", 'none');		
		if ( $wrapper_for_mobile_menu.css("display") == 'none' ) {
			$wrapper_for_mobile_menu.addClass('block-important');
		}
		$("#mobile-menu-icon").removeClass("open");
		alert('lielaks');
	}

});