$(document).ready(function() {
	'use strict';

	// Show content
	$("body").removeClass("opacity-0").css("opacity", 1);
	var $timeout_show_header;
	function show_header() {
		$("#site-header").removeClass("opacity-0").css("opacity", 1);
	}
	$timeout_show_header = setTimeout(show_header, 300);

	// Trigger window resize when DOM has been loaded
	$(window).trigger('resize');
	
	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;

	// Toggle mobile menu
	$("#mobile-menu-icon").click(function(e) {
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
	$(document).mouseup(function (e) {
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

	// Add .active class on hover
	$(".switch-active").mouseenter(function(e) {
		$(this).find(".active").removeClass("active").addClass("was-active");
	});

	$(".switch-active").mouseleave(function(e) {
		$(this).find("a").removeClass("active");
		$(this).find(".was-active").addClass("active").removeClass("was-active");
	});

	// Switch .active class in Gallery Page
	$(".gallery-title-block").click(function(e) {
		$(this).siblings().removeClass("was-active");
		$(this).addClass("was-active");
		$(".gallery-page-img-block-wrapper").removeClass("active");
		var $this_id = $(this).attr('id');
		var $this_id = $this_id.replace("gallery-title-block-", "");
		var $this_gallery_class_pre = ".gallery-page-img-block-wrapper-";
		var $this_gallery_class = $this_gallery_class_pre.concat($this_id);
		$($this_gallery_class).addClass('active');
		return false;
	});

	// Toggl contact form
	$(".contact-form-btn").click(function() {
		$(".contact-form-outer").toggleClass('hidden');
		$("body").toggleClass("contact-form-open");
	});

	$(".contact-form-close").click(function() {
		$(".contact-form-outer").addClass('hidden');
		$("body").toggleClass("contact-form-open");
	});

	$(document).mouseup(function(e) {
	    var container_1 = $(".contact-form-wrapper");
	    var container_2 = $(".contact-form-btn");

	    if (!container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0 // ... nor a descendant of the container
	        && !container_2.is(e.target) // and if the target of the click isn't the container...
	        && container_2.has(e.target).length === 0) // ... nor a descendant of the container
	    {
			$(".contact-form-outer").addClass('hidden');	
			$("body").removeClass("contact-form-open");        
	    }
	});

	// Script for "back" button
	$(".go-back").click(function(e) {
		e.preventDefault();
	    window.history.back();
	});

	// Script for "load more" button
	$(document).on('click', '.load-more > a', function(e) {
          e.preventDefault();
          var $this = $(this);
          var $this_load_more = $this.parent();
          var $this_posts = $this.parents('.posts-parent').find('.posts');
          var $link = $this.attr('href');
          $this_load_more.html('<button class="btn btn-1 loader">Loading...</button>');
          jQuery.get($link, function(data) {
              var $post = $(".posts .post ", data);
              $this_posts.append($post);
              $("body").addClass("show-all-news");
          });
          $this_load_more.load($link+' .load-more-link');
          return false;
      });

	// Script for "load more" button for multiple pagination pages
	$(document).on('click', '.load-more-multiple > a', function(e) {
          e.preventDefault();
          var $this = $(this);
          var $this_load_more = $this.parent();
          var $this_id_no = $this[0].getAttribute("id");
          var $posts = '#posts-';
          var $load_more = ' #load-more-multiple-';
         
          var $this_posts_id = $posts.concat($this_id_no);
          var $this_post_items = $this_posts_id.concat(" .post");
          var $this_load_more_id = $load_more.concat($this_id_no);
         
          alert($this_posts_id);
          alert($this_post_items);
          alert($this_load_more_id);
         
          var $link = $this[0].getAttribute("href");
          $this.html('<button class="btn btn-1 loader">Loading...</button>');
          jQuery.get($link, function(data) {
          	  var $post = $($this_post_items, data);
              $($this_posts_id).append($post);
          });
          $this_load_more.load($link+$this_load_more_id);
          return false;
      });

	$(".gallery-title-block").click(function(e) {
		$(this).siblings().removeClass("was-active");
		$(this).addClass("was-active");
		$(".gallery-page-img-block-wrapper").removeClass("active");
		var $this_id = $(this).attr('id');
		var $this_id = $this_id.replace("gallery-title-block-", "");
		var $this_gallery_class_pre = ".gallery-page-img-block-wrapper-";
		var $this_gallery_class = $this_gallery_class_pre.concat($this_id);
		$($this_gallery_class).addClass('active');
		return false;
	});

	// Script for Facebook Share button
	$(document).on('click', '.fb-share-btn', function() {
		var $btn = $(this);

		FB.ui({
		method: 'share',
		display: 'popup',
		href: $btn.attr('data-url'),
		}, function(response){});

		return false;
	});

	// Fit Video To Parent Div
	if( $(window).width() > $tablet_width ) {
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
		$('.jquery-background-video.play-btn').bgVideo({
			//fullScreen: false, // Sets the video to be fixed to the full window - your <video> and it's container should be direct descendents of the <body> tag
			//fadeIn: 500, // Milliseconds to fade video in/out (0 for no fade)
			pauseAfter: 0, // Seconds to play before pausing (0 for forever)
			//fadeOnPause: false, // For all (including manual) pauses
			fadeOnEnd: false, // When we've reached the pauseAfter time
			showPausePlay: true, // Show pause/play button
			//pausePlayXPos: 'right', // left|right|center
			//pausePlayYPos: 'top', // top|bottom|center
			//pausePlayXOffset: '15px', // pixels or percent from side - ignored if positioned center
			//pausePlayYOffset: '15px' // pixels or percent from top/bottom - ignored if positioned center		
		});
	}

	// Play Video by clicking button or on video
	$(".video-play").click(function() {
		var $this = $(this);
		var $this_video = $this.get(0);
		var $this_button = $this.parent().find('.btn-play');
		if ( !$this_video.paused ) {
			$this_video.pause();
			$this_button.removeClass('hidden');
		} else {
			$this_video.play();
			$this_button.addClass('hidden');
		}
	});
	$(".btn-play").click(function() {
		var $this_button = $(this);
		var $this_video = $this_button.siblings(".video-play").get(0);
		if ( !$this_video.paused ) {
			$this_video.pause();
			$this_button.removeClass('hidden');
		} else {
			$this_video.play();
			$this_button.addClass('hidden');
		}
	});

	// Play Background Video on Desktop Devices
		// Loading Animation for Video
		var $video_with_animation = $("#video-loader-animation");
		function remove_loading() {
		    $("#video-loader-animation-wrapper").removeClass('loading');
		}

		if ( $video_with_animation.length ) {	

			$video_with_animation.on('loadedmetadata', function (e) {
			    $("#video-loader-animation-wrapper").removeClass('loading');
			});
			var $timeout_remove_loading;
			$timeout_remove_loading = setTimeout(remove_loading, 4000);
			var $this_video_wa = $video_with_animation.get(0);
			if ( $(window).width() > $tablet_width ) {
				$this_video_wa.setAttribute("muted", "");
				$this_video_wa.setAttribute("loop", "");
				$this_video_wa.play();
			}

		}

	// Add CSS class to Site Header when scrollTop position of the document is not 0
	var $window = $(window);
	var $lastY = $window.scrollTop();
	var $document = $(document);
	var $body = $("body");
	function add_not_top() {
		$body.addClass("not--top");
	}
	function remove_not_top() {
		$body.removeClass("not--top");
	}
	var $timeout_add_not_top;
	var $timeout_remove_not_top;

	if( $lastY > 50 ) {
		add_not_top();
	}

	$(window).scroll(function() {

		var $currentY = $window.scrollTop();
		if ( $currentY > $lastY ) {
			var y = 'down';
		} else if ( $currentY < $lastY ) {
			var y = 'up';
		}
		$lastY = $currentY;
		if ( $document.scrollTop() > 50 && y == 'down' ) {
			$timeout_add_not_top = setTimeout(add_not_top, 150);
		} else if ( $document.scrollTop() <= 100 && y == 'up' ) {
			$timeout_remove_not_top = setTimeout(remove_not_top, 150);
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
			zoomControl: true,
			// gestureHandling: 'greedy',
			// gestureHandling: 'none',
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

		if ( $(window).width() > $tablet_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 3;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

			    var $pan_distance = - $(window).width() * 2;
				// change the center of map
				map.panBy($pan_distance,0);
			}

		} else if ( $(window).width() <= $tablet_width && $(window).width() > $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 1;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});
			}

		} else if ( $(window).width() <= $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});
			}
		}
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
			anchor		: new google.maps.Point(18, 48)
		}

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon		: marker_img,
			url			: marker_href,
			optimized	: false
		});

		// create overlay
		var myoverlay = new google.maps.OverlayView();
		    myoverlay.draw = function () {
		        this.getPanes().markerLayer.id='markerLayer';
		    };
		myoverlay.setMap(map);

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

	google.maps.event.addDomListener(window, 'resize', function() {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		if ( $(window).width() > $tablet_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
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

		} else if ( $(window).width() <= $tablet_width && $(window).width() > $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 1;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

				// change the center of map
				map.panBy(0,0);
			}

		} else if ( $(window).width() <= $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

				// change the center of map
				map.panBy(0,0);
			}
		}

	});

/* -------------------------------------------------------------------------------------- */
	// /Google Maps API script

	// Initialize Lightslider
	$(".lightslider").each(function() {
		var $this = $(this);
		if ( $this.hasClass("with-pager") ) {
			$this.lightSlider({
				item			: 1,
				auto			: true,
				loop			: true,
				pauseOnHover	: true,
				speed: 600,
				pause: 3000,
		        onSliderLoad: function() {
					$('.lightslider').removeClass('cS-hidden');
		        },
			});
		} else {
			$this.lightSlider({
				item	: 1,
				pager	: false,
                enableTouch     : false,
                enableDrag      : false,
		        onSliderLoad: function() {
					$('.lightslider').removeClass('cS-hidden');
		        },
			});			
		}
	});

	// Initialize Lightcase Lightbox
	$('a[data-rel^=lightcase]').lightcase({
		overlayOpacity: 1,
		video: {
			'width': 'auto',
			'height': 'auto',
			'controls': true,
			'loop': true
		},
		disableShrink: true
	});

	// PhotoSwipe JavaScript Gallery

		var initPhotoSwipeFromDOM = function(gallerySelector) {

		    // parse slide data (url, title, size ...) from DOM elements 
		    // (children of gallerySelector)
		    var parseThumbnailElements = function(el) {
		        var thumbElements = el.childNodes,
		            numNodes = thumbElements.length,
		            items = [],
		            figureEl,
		            linkEl,
		            size,
		            item;

		        for(var i = 0; i < numNodes; i++) {

		            figureEl = thumbElements[i]; // <figure> element

		            // include only element nodes 
		            if(figureEl.nodeType !== 1) {
		                continue;
		            }

		            linkEl = figureEl.children[0]; // <a> element

		            size = linkEl.getAttribute('data-size').split('x');

		            // create slide object
		            item = {
		                src: linkEl.getAttribute('href'),
		                w: parseInt(size[0], 10),
		                h: parseInt(size[1], 10)
		            };



		            if(figureEl.children.length > 1) {
		                // <figcaption> content
		                item.title = figureEl.children[1].innerHTML; 
		            }

		            if(linkEl.children.length > 0) {
		                // <img> thumbnail element, retrieving thumbnail url
		                item.msrc = linkEl.children[0].getAttribute('data-src');
		            } 

		            item.el = figureEl; // save link to element for getThumbBoundsFn
		            items.push(item);
		        }

		        return items;
		    };

		    // find nearest parent element
		    var closest = function closest(el, fn) {
		        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
		    };

		    // triggers when user clicks on thumbnail
		    var onThumbnailsClick = function(e) {
		        e = e || window.event;
		        e.preventDefault ? e.preventDefault() : e.returnValue = false;

		        var eTarget = e.target || e.srcElement;

		        // find root element of slide
		        var clickedListItem = closest(eTarget, function(el) {
		            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
		        });

		        if(!clickedListItem) {
		            return;
		        }

		        // find index of clicked item by looping through all child nodes
		        // alternatively, you may define index via data- attribute
		        var clickedGallery = clickedListItem.parentNode,
		            childNodes = clickedListItem.parentNode.childNodes,
		            numChildNodes = childNodes.length,
		            nodeIndex = 0,
		            index;

		        for (var i = 0; i < numChildNodes; i++) {
		            if(childNodes[i].nodeType !== 1) { 
		                continue; 
		            }

		            if(childNodes[i] === clickedListItem) {
		                index = nodeIndex;
		                break;
		            }
		            nodeIndex++;
		        }



		        if(index >= 0) {
		            // open PhotoSwipe if valid index found
		            openPhotoSwipe( index, clickedGallery );
		        }
		        return false;
		    };

		    // parse picture index and gallery index from URL (#&pid=1&gid=2)
		    var photoswipeParseHash = function() {
		        var hash = window.location.hash.substring(1),
		        params = {};

		        if(hash.length < 5) {
		            return params;
		        }

		        var vars = hash.split('&');
		        for (var i = 0; i < vars.length; i++) {
		            if(!vars[i]) {
		                continue;
		            }
		            var pair = vars[i].split('=');  
		            if(pair.length < 2) {
		                continue;
		            }           
		            params[pair[0]] = pair[1];
		        }

		        if(params.gid) {
		            params.gid = parseInt(params.gid, 10);
		        }

		        return params;
		    };

		    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
		        var pswpElement = document.querySelectorAll('.pswp')[0],
		            gallery,
		            options,
		            items;

		        items = parseThumbnailElements(galleryElement);

		        // define options (if needed)
		        options = {

		            // define gallery index (for URL)
		            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

		            getThumbBoundsFn: function(index) {
		                // See Options -> getThumbBoundsFn section of documentation for more info
		                var thumbnail = items[index].el.getElementsByTagName('div')[0], // find thumbnail
		                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
		                    rect = thumbnail.getBoundingClientRect(); 

		                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
		            },

		            shareEl: false,
					fullscreenEl: false,
					zoomEl: false,
					showHideOpacity: true,
					hideAnimationDuration:0,
					showAnimationDuration:0,
					barsSize: {top:60, bottom:'auto'},
					closeOnScroll: false,
					//modal: false
		        };

		        // PhotoSwipe opened from URL
		        if(fromURL) {
		            if(options.galleryPIDs) {
		                // parse real index when custom PIDs are used 
		                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
		                for(var j = 0; j < items.length; j++) {
		                    if(items[j].pid == index) {
		                        options.index = j;
		                        break;
		                    }
		                }
		            } else {
		                // in URL indexes start from 1
		                options.index = parseInt(index, 10) - 1;
		            }
		        } else {
		            options.index = parseInt(index, 10);
		        }

		        // exit if index not found
		        if( isNaN(options.index) ) {
		            return;
		        }

		        if(disableAnimation) {
		            options.showAnimationDuration = 0;
		        }

		        // Pass data to PhotoSwipe and initialize it
		        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
		        gallery.init();
		    };

		    // loop through all gallery elements and bind events
		    var galleryElements = document.querySelectorAll( gallerySelector );

		    for(var i = 0, l = galleryElements.length; i < l; i++) {
		        galleryElements[i].setAttribute('data-pswp-uid', i+1);
		        galleryElements[i].onclick = onThumbnailsClick;
		    }

		    // Parse URL and open gallery if it contains #&pid=3&gid=1
		    var hashData = photoswipeParseHash();
		    if(hashData.pid && hashData.gid) {
		        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
		    }
		};

		// execute above function
		initPhotoSwipeFromDOM('.photoswipe-wrapper');

});


$(window).resize(function() {

	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;
	var $window_width = $(window).width();

	// Mobile Menu For Tablet and Mobile Script
	var	$wrapper_for_mobile_menu = $("#site-header .wrapper-for-mobile-menu");

	if ( $window_width <= $tablet_width ) {
		var $menu_item_has_children = $(".header-menu .menu-item-has-children > a");
		if( !$menu_item_has_children.has('.menu-item-has-children-ghost').length ) {
			$menu_item_has_children.append("<span class='menu-item-has-children-ghost'></span>");
		}
		$("#site-header .wrapper-for-mobile-menu").removeClass('block-important');
	} else {
		$(".menu-item-has-children-ghost").detach();
		$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
		$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
		//$('.header-menu > .menu-item-has-children > .sub-menu').css("display", 'none');		
		if ( $wrapper_for_mobile_menu.css("display") == 'none' ) {
			$wrapper_for_mobile_menu.addClass('block-important');
		}
		$("#mobile-menu-icon").removeClass("open");
	}

	// Reduce padding for .full-width-img-video-wrapper if text is not fitting in the div
	function reduce_padding() {
		var $fwivw = $(".full-width-img-video-wrapper");
		var $fwivw_contents = $fwivw.find(".container");
		$fwivw.css("padding-top", '');
		var $fwivw_padding_top = $fwivw.css("padding-top");
		var $fwivw_padding_top = $fwivw_padding_top.replace("px", "");

		if ( $fwivw.height() < $fwivw_contents.outerHeight() ) {
			$fwivw.css("padding-top", $fwivw_padding_top * 0.65);
		} else {
			$fwivw.css("padding-top", "");
		}
		$fwivw.css("opacity", '1');
	}

	if( $(".full-width-img-video-wrapper").length ) {
		reduce_padding();
	}

});