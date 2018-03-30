// Responsive design widths
var $tablet_width = 1199;
var $mobile_width = 767;

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

(function() {

       /**
        * Set cookie
        *
        * @param string name
        * @param string value
        * @param int days
        * @param string path
        * @see http://www.quirksmode.org/js/cookies.html
        */
       function createCookie(name,value,days,path) {
           if (days) {
               var date = new Date();
               date.setTime(date.getTime()+(days*24*60*60*1000));
               var expires = "; expires="+date.toGMTString();
           }
           else var expires = "";
           document.cookie = name+"="+value+expires+"; path="+path;
       }

       /**
        * Read cookie
        * @param string name
        *@returns {*}
        * @see http://www.quirksmode.org/js/cookies.html
        */
       function readCookie(name) {
           var nameEQ = name + "=";
           var ca = document.cookie.split(';');
           for(var i=0;i < ca.length;i++) {
               var c = ca[i];
               while (c.charAt(0)==' ') c = c.substring(1,c.length);
               if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
           }
           return null;
       }

       var cookieMessage = document.getElementById('cookies');
       if (cookieMessage == null) {
           return;
       }
       var cookie = readCookie('seen-cookie-message');
       if (cookie != null && cookie == 'yes') {
           cookieMessage.style.display = 'none';
       } else {
           cookieMessage.style.display = 'block';
       }
       
       // Set/update cookie
       var cookieExpiry = cookieMessage.getAttribute('data-cookie-expiry');
       if (cookieExpiry == null) {
           cookieExpiry = 30;
       }
       var cookiePath = cookieMessage.getAttribute('data-cookie-path');
       if (cookiePath == null) {
           cookiePath = "/";
       }

       $('#cookies-close').click(function() {
           $('#cookies').remove();
           createCookie('seen-cookie-message','yes',cookieExpiry,cookiePath);
       });

   })();

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
    }
  });

  $(".header-menu > .menu-item-has-children").mouseleave(function(e) {
    var $this = $(this);
    if ( $(window).width() > $tablet_width ) {
      $this.children(".sub-menu").stop(true, true).css("display", 'none');
      //$(".sub-menu").slideUp();
      return false;
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

  // Script for "load more" button for multiple pagination pages
    // Set Prev and Next Pages
    var $prev_page_$ = $(".load-more-link.prev");
    var $next_page_$ = $(".load-more-link.next");
    var $prev_page_el = $(".load-more-link.prev")[0];
    var $next_page_el = $(".load-more-link.next")[0];

    var $page_data_href = $prev_page_el.getAttribute("data-href");
    var $total_pages = $prev_page_el.getAttribute("data-total-pages");

    var $current_page = $(".load-more-link.current-page")[0].getAttribute("data-page");
    var $prev_page = parseInt($current_page - 1);
    var $next_page = parseInt($current_page - 1 + 2);

    var $prev_page_link = $page_data_href.concat($prev_page);
    var $next_page_link = $page_data_href.concat($next_page);

    $prev_page_el.setAttribute("href", $prev_page_link);
    $next_page_el.setAttribute("href", $next_page_link);

    if( $current_page == 1 ) {
      $prev_page_$.addClass('not-active');
      $next_page_$.removeClass('not-active');
    } else if( $current_page == $total_pages ) {
      $prev_page_$.removeClass('not-active');
      $next_page_$.addClass('not-active');
    } else {
      $prev_page_$.removeClass('not-active');
      $next_page_$.removeClass('not-active');
    }

  $(document).on('click', '.load-more-multiple > a', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $this_id_no = $this[0].getAttribute("data-id");
    var $posts = '#posts-';
    var $load_more_multiple = '#load-more-multiple-';
    var $this_posts_id = $posts.concat($this_id_no);
    var $this_load_more_multiple = $load_more_multiple.concat($this_id_no);
    var $this_post_items = $this_posts_id.concat(" .post");

    var $link = $this[0].getAttribute("href");
    jQuery.get($link, function(data) {
        var $post = $($this_post_items, data);
        $($this_posts_id).html($post);
        // Round the height of body-wrapper
        $('html, #body-wrapper').css('height', '');
        var $body_wrapper = $('#body-wrapper');
        var $body_wrapper_height = Math.round($body_wrapper.innerHeight());
        $body_wrapper.css('height', $body_wrapper_height);
        $('html').css('height', $body_wrapper_height);
    });

    // scroll the beginning of gallery
    var $site_header_height = $('#site-header').innerHeight();
    var $top_of_gallery = $('#gallery-title-block-wrapper');
      $("html, body").animate({
          scrollTop: $($top_of_gallery).offset().top - $site_header_height + 1
    }, 300);

    // Switch between pages
      // Add CSS class 'current-page' to correct page number
    var $current_page_$ = $($this_load_more_multiple).find('.current-page');
    if( $this.hasClass('prev') &&  $current_page_$.first() ) {
      $current_page_$.removeClass('current-page').prev().addClass('current-page');
    } else if ( $this.hasClass('next') ) {
      $current_page_$.removeClass('current-page').next().addClass('current-page');
    } else {
      $current_page_$.removeClass('current-page');
      $this.addClass('current-page');
    }

      // Get prev and next link elements
    var $prev_page_$ = $($this_load_more_multiple).find(".load-more-link.prev");
    var $next_page_$ = $($this_load_more_multiple).find(".load-more-link.next");
    var $prev_page_el = $($this_load_more_multiple).find(".load-more-link.prev")[0];
    var $next_page_el = $($this_load_more_multiple).find(".load-more-link.next")[0];

      // Get base of the link and total pages number
    var $page_data_href = $prev_page_el.getAttribute("data-href");
    var $total_pages = $prev_page_el.getAttribute("data-total-pages");

      // Get current, prev and next page numbers
    var $current_page = $($this_load_more_multiple).find(".load-more-link.current-page")[0].getAttribute("data-page");
    var $prev_page = parseInt($current_page - 1);
    var $next_page = parseInt($current_page - 1 + 2);

      // Form prev and next links
    var $prev_page_link = $page_data_href.concat($prev_page);
    var $next_page_link = $page_data_href.concat($next_page);

      // Set prev and next links
    $prev_page_el.setAttribute("href", $prev_page_link);
    $next_page_el.setAttribute("href", $next_page_link);

      // Disable prev or next or none according to current and total page numbers
    if( $current_page == 1 ) {
      $prev_page_$.addClass('not-active');
      $next_page_$.removeClass('not-active');
    } else if( $current_page == $total_pages ) {
      $prev_page_$.removeClass('not-active');
      $next_page_$.addClass('not-active');
    } else {
      $prev_page_$.removeClass('not-active');
      $next_page_$.removeClass('not-active');
    }

    return false;
  });

  // Switch between gallery title blocks
  $(".gallery-title-block").click(function(e) {
    $(this).siblings().removeClass("was-active");
    $(this).addClass("was-active");
    $(".gallery-page-img-block-wrapper").removeClass("active");
    var $this_id = $(this).attr('id');
    var $this_id = $this_id.replace("gallery-title-block-", "");
    var $this_gallery_class_pre = ".gallery-page-img-block-wrapper-";
    var $this_gallery_class = $this_gallery_class_pre.concat($this_id);
    $($this_gallery_class).addClass('active');
        // Round the height of body-wrapper
        $('html, #body-wrapper').css('height', '');
        var $body_wrapper = $('#body-wrapper');
        var $body_wrapper_height = Math.round($body_wrapper.innerHeight());
        $body_wrapper.css('height', $body_wrapper_height);
        $('html').css('height', $body_wrapper_height);
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



  // Initialize Lightslider
  var $slider = 0;
  $(".lightslider").each(function() {
    $slider += 1;
    var $this = $(this);
    var $this_slider = $('#lightslider-'+$slider);
    if ( $this.hasClass("with-pager") ) {
      $this.lightSlider({
        item      : 1,
        auto      : true,
        loop      : true,
        pauseOnHover  : true,
        speed: 600,
        pause: 3000,
        onBeforeStart: function() {
          if ( $this_slider.find('li').length < 2 ) {
            $this_slider.addClass('one-item');
          }
        },
        onSliderLoad: function() {
          $this_slider.removeClass('cS-hidden');
        },
      });
    } else {
      $this.lightSlider({
        item  : 1,
        pager : false,
        enableTouch     : false,
        enableDrag      : false,
        loop:  true,
        onBeforeStart: function() {
          if ( $this_slider.find('li').length < 2 ) {
            $this_slider.addClass('one-item');
          }
        },
        onSliderLoad: function() {
          $this_slider.removeClass('cS-hidden');
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

  if( $('.photoswipe-wrapper').length ) {
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
  }

});


$(window).resize(function() {

  // Responsive design widths
  var $tablet_width = 1199;
  var $mobile_width = 767;
  var $window_width = $(window).width();

  // Round the height of body-wrapper
  $('html, #body-wrapper').css('height', '');
  var $body_wrapper = $('#body-wrapper');
  var $body_wrapper_height = Math.round($body_wrapper.innerHeight());
  $body_wrapper.css('height', $body_wrapper_height);
  $('html').css('height', $body_wrapper_height);

  // Mobile Menu For Tablet and Mobile Script
  var $wrapper_for_mobile_menu = $("#site-header .wrapper-for-mobile-menu");

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