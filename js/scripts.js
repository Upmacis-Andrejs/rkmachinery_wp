$(document).ready(function(){"use strict";$("body").removeClass("opacity-0").css("opacity",1);setTimeout(function(){$("#site-header").removeClass("opacity-0").css("opacity",1)},300),$(window).trigger("resize");var e=1199,t=767;$("#mobile-menu-icon").click(function(e){return $(this).hasClass("open")&&($(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""})),$(this).toggleClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideToggle(),!1}),$(document).mouseup(function(e){if($("#mobile-menu-icon").hasClass("open")){var t=$("#site-header");if(!t.is(e.target)&&0===t.has(e.target).length)return $(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""}),$("#mobile-menu-icon").removeClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideUp(),!1}}),$(".menu-item-has-children").mouseenter(function(t){var n=$(this);if($(window).width()>e)return n.children(".sub-menu").stop(!0,!0).slideDown(),!1}),$(".header-menu > .menu-item-has-children").mouseleave(function(t){var n=$(this);if($(window).width()>e)return n.children(".sub-menu").stop(!0,!0).css("display","none"),!1}),$(".header-menu > .menu-item-has-children > a > .menu-item-has-children-ghost").click(function(t){if($(window).width()<=e){var n=$(this);return t.preventDefault(),$(".header-menu .sub-menu .sub-menu").slideUp(),$(".header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu > .menu-item-has-children > a > .menu-item-has-children-ghost").not(this).parent().siblings(".sub-menu").slideUp(),$(".header-menu > .menu-item-has-children > a > .menu-item-has-children-ghost").not(this).removeClass("hidden"),n.parent().siblings(".sub-menu").stop(!0,!0).slideToggle(),n.addClass("hidden"),$(".header-menu .menu-item-has-children-ghost").not(this).parent().css({color:"","background-color":""}),n.parent().css({color:"#231F20","background-color":"#f6c55b"}),!1}}),$(".header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost").click(function(t){if($(window).width()<=e){var n=$(this);return t.preventDefault(),$(".header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost").not(this).parent().siblings(".ul-sub-menu").slideUp(),$(".header-menu .sub-menu .menu-item-has-children .menu-item-has-children-ghost").not(this).removeClass("hidden"),n.parent().siblings(".sub-menu").stop(!0,!0).slideToggle(),n.addClass("hidden"),$(".header-menu .sub-menu .menu-item-has-children-ghost").parent().not(this).css({color:"","background-color":""}),n.parent().css({color:"#231F20","background-color":"#f6c55b"}),!1}}),$(".switch-active").mouseenter(function(e){$(this).find(".active").removeClass("active").addClass("was-active")}),$(".switch-active").mouseleave(function(e){$(this).find("a").removeClass("active"),$(this).find(".was-active").addClass("active").removeClass("was-active")}),$(".gallery-title-block").click(function(e){$(this).siblings().removeClass("was-active"),$(this).addClass("was-active"),$(".gallery-page-img-block-wrapper").removeClass("active");var t=(t=$(this).attr("id")).replace("gallery-title-block-",""),n=".gallery-page-img-block-wrapper-".concat(t);return $(n).addClass("active"),!1}),$(".contact-form-btn").click(function(){$(".contact-form-outer").toggleClass("hidden"),$("body").toggleClass("contact-form-open")}),$(".contact-form-close").click(function(){$(".contact-form-outer").addClass("hidden"),$("body").toggleClass("contact-form-open")}),$(document).mouseup(function(e){var t=$(".contact-form-wrapper"),n=$(".contact-form-btn");t.is(e.target)||0!==t.has(e.target).length||n.is(e.target)||0!==n.has(e.target).length||($(".contact-form-outer").addClass("hidden"),$("body").removeClass("contact-form-open"))}),$(".go-back").click(function(e){e.preventDefault(),window.history.back()}),$(document).on("click",".load-more > a",function(e){e.preventDefault();var t=$(this),n=t.parent(),i=t.parents(".posts-parent").find(".posts"),o=t.attr("href");return n.html('<button class="btn btn-1 loader">Loading...</button>'),jQuery.get(o,function(e){var t=$(".posts .post ",e);i.append(t),$("body").addClass("show-all-news")}),n.load(o+" .load-more-link"),!1}),$(document).on("click",".load-more-multiple > a",function(e){e.preventDefault();var t=$(this),n=t.parent(),i=t[0].getAttribute("id"),o="#posts-".concat(i),a=o.concat(" .post"),s=" #load-more-multiple-".concat(i),r=t[0].getAttribute("href");return t.html('<button class="btn btn-1 loader">Loading...</button>'),jQuery.get(r,function(e){var t=$(a,e);$(o).append(t)}),n.load(r+s),!1}),$(".gallery-title-block").click(function(e){$(this).siblings().removeClass("was-active"),$(this).addClass("was-active"),$(".gallery-page-img-block-wrapper").removeClass("active");var t=(t=$(this).attr("id")).replace("gallery-title-block-",""),n=".gallery-page-img-block-wrapper-".concat(t);return $(n).addClass("active"),!1}),$(document).on("click",".fb-share-btn",function(){var e=$(this);return FB.ui({method:"share",display:"popup",href:e.attr("data-url")},function(e){}),!1}),$(window).width()>e&&$(".jquery-background-video").bgVideo({pauseAfter:0,fadeOnEnd:!1,showPausePlay:!1}),$(".video-play").click(function(){var e=$(this),t=e.get(0),n=e.parent().find(".btn-play");t.paused?(t.play(),n.addClass("hidden")):(t.pause(),n.removeClass("hidden"))}),$(".btn-play").click(function(){var e=$(this),t=e.siblings(".video-play").get(0);t.paused?(t.play(),e.addClass("hidden")):(t.pause(),e.removeClass("hidden"))});var n=$("#video-loader-animation");if(n.length){n.on("loadedmetadata",function(e){$("#video-loader-animation-wrapper").removeClass("loading")});var i=n.get(0);$(window).width()>e&&(i.setAttribute("muted",""),i.setAttribute("loop",""),i.play())}var o=$(window),a=o.scrollTop(),s=$(document),r=$("body");function l(){r.addClass("not--top")}function d(){r.removeClass("not--top")}a>50&&l(),$(window).scroll(function(){var e=o.scrollTop();if(e>a)var t="down";else if(e<a)t="up";a=e,s.scrollTop()>50&&"down"==t?setTimeout(l,150):s.scrollTop()<=100&&"up"==t&&setTimeout(d,150)}),$("#close_announcement").click(function(e){e.preventDefault(),$("#update_browser_container").addClass("hidden")}),Modernizr.svg||$('img[src*="svg"]').attr("src",function(){return $(this).attr("src").replace(".svg",".png")});function c(n){var i=n.find(".marker"),o={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP,disableDefaultUI:!0,zoomControl:!0,styles:[{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#444444"}]},{featureType:"administrative.country",elementType:"geometry.stroke",stylers:[{color:"#787c82"}]},{featureType:"administrative.province",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"administrative.land_parcel",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#c2c0c2"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"poi",elementType:"labels.text",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45},{visibility:"off"}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#ffffff"},{visibility:"on"}]}]},a=new google.maps.Map(n[0],o);return a.markers=[],i.each(function(){!function(e,t){var n=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),i=e.attr("href"),o={url:$("#template-dir-uri-img").attr("href")+"marker.png",anchor:new google.maps.Point(18,48)},a=new google.maps.Marker({position:n,map:t,icon:o,url:i,optimized:!1}),s=new google.maps.OverlayView;if(s.draw=function(){this.getPanes().markerLayer.id="markerLayer"},s.setMap(t),t.markers.push(a),e.html()){new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(a,"click",function(){window.location.href=this.url})}}($(this),a)}),function(n){var i=new google.maps.LatLngBounds;if($.each(n.markers,function(e,t){var n=new google.maps.LatLng(t.position.lat(),t.position.lng());i.extend(n)}),$(window).width()>e)if(1==n.markers.length)n.setCenter(i.getCenter()),n.setZoom(16);else{n.fitBounds(i);var o=google.maps.event.addListener(n,"idle",function(){var e=n.getZoom(),t=e-3;n.setZoom(t),google.maps.event.removeListener(o)}),a=2*-$(window).width();n.panBy(a,0)}else if($(window).width()<=e&&$(window).width()>t)if(1==n.markers.length)n.setCenter(i.getCenter()),n.setZoom(16);else{n.fitBounds(i);var o=google.maps.event.addListener(n,"idle",function(){var e=n.getZoom(),t=e-1;n.setZoom(t),google.maps.event.removeListener(o)})}else if($(window).width()<=t)if(1==n.markers.length)n.setCenter(i.getCenter()),n.setZoom(16);else{n.fitBounds(i);var o=google.maps.event.addListener(n,"idle",function(){var e=n.getZoom(),t=e;n.setZoom(t),google.maps.event.removeListener(o)})}}(a),a}var m=null;$(".acf-map").each(function(){m=c($(this))}),google.maps.event.addDomListener(window,"resize",function(){var n=new google.maps.LatLngBounds;if($.each(m.markers,function(e,t){var i=new google.maps.LatLng(t.position.lat(),t.position.lng());n.extend(i)}),$(window).width()>e)if(1==m.markers.length)m.setCenter(n.getCenter()),m.setZoom(16);else{m.fitBounds(n);var i=google.maps.event.addListener(m,"idle",function(){var e=m.getZoom()-2;m.setZoom(e),google.maps.event.removeListener(i)});m.panBy(-800,0)}else if($(window).width()<=e&&$(window).width()>t)if(1==m.markers.length)m.setCenter(n.getCenter()),m.setZoom(16);else{m.fitBounds(n);i=google.maps.event.addListener(m,"idle",function(){var e=m.getZoom()-1;m.setZoom(e),google.maps.event.removeListener(i)});m.panBy(0,0)}else if($(window).width()<=t)if(1==m.markers.length)m.setCenter(n.getCenter()),m.setZoom(16);else{m.fitBounds(n);i=google.maps.event.addListener(m,"idle",function(){var e=m.getZoom();m.setZoom(e),google.maps.event.removeListener(i)});m.panBy(0,0)}}),$(".lightslider").each(function(){var e=$(this);e.hasClass("with-pager")?e.lightSlider({item:1,auto:!0,loop:!0,pauseOnHover:!0,speed:600,pause:3e3,onSliderLoad:function(){$("#lightSlider").removeClass("cS-hidden")}}):e.lightSlider({item:1,pager:!1,onSliderLoad:function(){$("#lightSlider").removeClass("cS-hidden")}})}),$("a[data-rel^=lightcase]").lightcase({overlayOpacity:1,video:{width:"auto",height:"auto",controls:!0,loop:!0},disableShrink:!0});!function(e){for(var t=function(e){(e=e||window.event).preventDefault?e.preventDefault():e.returnValue=!1;var t=function e(t,n){return t&&(n(t)?t:e(t.parentNode,n))}(e.target||e.srcElement,function(e){return e.tagName&&"FIGURE"===e.tagName.toUpperCase()});if(t){for(var i,o=t.parentNode,a=t.parentNode.childNodes,s=a.length,r=0,l=0;l<s;l++)if(1===a[l].nodeType){if(a[l]===t){i=r;break}r++}return i>=0&&n(i,o),!1}},n=function(e,t,n,i){var o,a,s=document.querySelectorAll(".pswp")[0];if(a=function(e){for(var t,n,i,o,a=e.childNodes,s=a.length,r=[],l=0;l<s;l++)1===(t=a[l]).nodeType&&(i=(n=t.children[0]).getAttribute("data-size").split("x"),o={src:n.getAttribute("href"),w:parseInt(i[0],10),h:parseInt(i[1],10)},t.children.length>1&&(o.title=t.children[1].innerHTML),n.children.length>0&&(o.msrc=n.children[0].getAttribute("data-src")),o.el=t,r.push(o));return r}(t),o={galleryUID:t.getAttribute("data-pswp-uid"),getThumbBoundsFn:function(e){var t=a[e].el.getElementsByTagName("div")[0],n=window.pageYOffset||document.documentElement.scrollTop,i=t.getBoundingClientRect();return{x:i.left,y:i.top+n,w:i.width}},shareEl:!1,fullscreenEl:!1,zoomEl:!1,showHideOpacity:!0,hideAnimationDuration:0,showAnimationDuration:0,barsSize:{top:60,bottom:"auto"},closeOnScroll:!1},i)if(o.galleryPIDs){for(var r=0;r<a.length;r++)if(a[r].pid==e){o.index=r;break}}else o.index=parseInt(e,10)-1;else o.index=parseInt(e,10);isNaN(o.index)||(n&&(o.showAnimationDuration=0),new PhotoSwipe(s,PhotoSwipeUI_Default,a,o).init())},i=document.querySelectorAll(e),o=0,a=i.length;o<a;o++)i[o].setAttribute("data-pswp-uid",o+1),i[o].onclick=t;var s=function(){var e=window.location.hash.substring(1),t={};if(e.length<5)return t;for(var n=e.split("&"),i=0;i<n.length;i++)if(n[i]){var o=n[i].split("=");o.length<2||(t[o[0]]=o[1])}return t.gid&&(t.gid=parseInt(t.gid,10)),t}();s.pid&&s.gid&&n(s.pid,i[s.gid-1],!0,!0)}(".photoswipe-wrapper")}),$(window).resize(function(){var e=$(window).width(),t=$("#site-header .wrapper-for-mobile-menu");if(e<=1199){var n=$(".header-menu .menu-item-has-children > a");n.has(".menu-item-has-children-ghost").length||n.append("<span class='menu-item-has-children-ghost'></span>"),$("#site-header .wrapper-for-mobile-menu").removeClass("block-important")}else $(".menu-item-has-children-ghost").detach(),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""}),$(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),"none"==t.css("display")&&t.addClass("block-important"),$("#mobile-menu-icon").removeClass("open");$(".full-width-img-video-wrapper").length&&function(){var e=$(".full-width-img-video-wrapper"),t=e.find(".container");e.css("padding-top","");var n=(n=e.css("padding-top")).replace("px","");e.height()<t.outerHeight()?e.css("padding-top",.65*n):e.css("padding-top",""),e.css("opacity","1")}()}),function(){for(var e,t=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],i=n.length,o=window.console=window.console||{};i--;)o[e=n[i]]||(o[e]=t)}();