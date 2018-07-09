			<!-- footer -->
			<footer class="footer z-666" id="site-footer">
				<div class="container">
					<div class="row" id="footer-row-1">
						<div class="flex upper-footer-block-wrapper">
							<a class="upper-footer-block footer-site-logo" href="<?php echo home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/site-logo-white.svg" style="width: 89px; height: 59.27px;" alt="Footer Site Logo">
							</a>
							<div class="footer-list-wrapper flex">
								<div class="upper-footer-block footer-company-address">
									<h3 class="title"><?php _e('RK Metāls Office and Production Units', 'rkmachinery') ?></h3>
									<ul class="list-style-none">
										<li><?php the_field('company_address_1', 'option') ?></li>
										<li><?php the_field('company_address_2', 'option') ?></li>
										<li>
										<?php /* address for get-directions maps */
									  		$address_1 = get_field('company_address_1', 'option');
											$address_1_formatted = str_replace(' ', '+', $address_1);
											$address_2 = get_field('company_address_2', 'option');
											$address_2_formatted = str_replace(' ', '+', $address_2);
											$address_formatted = $address_1_formatted . '+' . $address_2_formatted;
										    $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
											    $address_formatted_more = str_replace(array_keys($transliterationTable), array_values($transliterationTable), $address_formatted);
											    $address_formatted_more = str_replace('street', 'iela', $address_formatted_more); 
										?>
											<a class="get-directions" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $address_formatted_more; ?>" target="_blank" rel="nofollow">
												<span class="before"></span>
												<?php _e('Get directions', 'rkmachinery') ?>
											</a>
										</li>
									</ul>
								</div>
								<div class="upper-footer-block footer-contacts">
									<h3 class="title"><?php _e('Contacts', 'rkmachinery') ?></h3>
									<ul class="list-style-none">
										<li class="company-phone-wrapper">
											<span><?php _e('Phone', 'rkmachinery'); ?>:</span>
											<a class="company-phone text-decor-none" href="tel:<?php $phone = get_field('company_phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
										</li>
										<li class="company-fax-wrapper">
											<span><?php _e('Fax', 'rkmachinery'); ?>:</span>
											<a class="company-fax text-decor-none" hef="fax:<?php $fax = get_field('company_fax', 'option'); echo str_replace(' ', '', $fax); ?>"><?php echo $fax; ?></a>
										</li>
										<li class="company-email-wrapper">
											<span><?php _e('E-mail', 'rkmachinery'); ?>:</span>
											<a class="company-email text-decor-none" href="mailto:<?php the_field('company_e-mail', 'option'); ?>"><?php the_field('company_e-mail', 'option'); ?></a>
										</li>
									</ul>
								</div>
								<div class="upper-footer-block footer-follow-us">
									<h3 class="title"><?php _e('Follow Us', 'rkmachinery') ?></h3>
									<ul class="list-style-none">
										<?php if( get_field('facebook_follow_link', 'option') ): ?>
										<li>
											<a class="social follow-btn-styled facebook text-decor-none h5" href="<?php the_field('facebook_follow_link', 'option'); ?>" target="_blank"><?php _e('Facebook', 'rkmachinery'); ?></a>
										</li>
										<?php endif; ?>
										<?php if( get_field('youtube_follow_link', 'option') ): ?>
										<li>
											<a class="social follow-btn-styled youtube text-decor-none h5" href="<?php the_field('youtube_follow_link', 'option'); ?>" target="_blank"><?php _e('Youtube', 'rkmachinery'); ?></a>
										</li>
										<?php endif; ?>
										<?php if( get_field('linkedin_follow_link', 'option') ): ?>
										<li>
											<a class="social follow-btn-styled linkedin text-decor-none h5" href="<?php the_field('linkedin_follow_link', 'option'); ?>" target="_blank"><?php _e('Linkedin', 'rkmachinery'); ?></a>
										</li>
										<?php endif; ?>
										<?php if( get_field('instagram_follow_link', 'option') ): ?>
										<li>
											<a class="social follow-btn-styled instagram text-decor-none h5" href="<?php the_field('instagram_follow_link', 'option'); ?>" target="_blank"><?php _e('Instagram', 'rkmachinery'); ?></a>
										</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row flex-vert-c" id="footer-row-2">
					    <a class="footer-logo-2nd text-decor-none flex-vert-c" id="upb-logo-link" href="<?php the_field('upb_logo_link', 'option'); ?>" target="_blank" rel="nofollow">
							<img src="<?php echo get_template_directory_uri(); ?>/img/upb-logo.svg" alt="UPB Logo">
						</a>
						<div class="footer-company-list-wrapper">
							<div class="footer-company-list flex">
								<a class="footer-company-block text-decor-none" id="aile-group" href="<?php the_field('aile_group_link', 'option'); ?>" target="_blank" rel="nofollow">
									<img src="<?php echo get_template_directory_uri(); ?>/img/Aile group.svg" alt="AILE group">
								</a>
								<a class="footer-company-block text-decor-none" id="rk-metals-group" href="<?php the_field('rk_metals_group_link', 'option'); ?>" target="_blank" rel="nofollow">
									<img src="<?php echo get_template_directory_uri(); ?>/img/RK Metals.svg" alt="RK METĀLS group">
								</a>
								<a class="footer-company-block text-decor-none" id="mb-betons-group" href="<?php the_field('mb_betons_group_link', 'option'); ?>" target="_blank" rel="nofollow">
									<img src="<?php echo get_template_directory_uri(); ?>/img/MB Betons Group.svg" alt="MB BETONS group">
								</a>
								<a class="footer-company-block text-decor-none" id="upb-energy-group" href="<?php the_field('upb_energy_group_link', 'option'); ?>" target="_blank" rel="nofollow">
									<img src="<?php echo get_template_directory_uri(); ?>/img/UPB Energy group.svg" alt="UPB ENERGY group">
								</a>
								<a class="footer-company-block text-decor-none" id="upb-nams-group" href="<?php the_field('upb_nams_group_link', 'option'); ?>" target="_blank" rel="nofollow">
									<img src="<?php echo get_template_directory_uri(); ?>/img/UPB Nams group.svg" alt="UPB NAMS group">
								</a>
							</div>
							<ul class="footer-services-wrapper list-style-none flex-vert-c">
								<li class="footer-service-block" id="engineering"><img src="<?php echo get_template_directory_uri(); ?>/img/engineering.svg" alt="Engineering"></li>
								<li class="footer-service-block" id="production"><img src="<?php echo get_template_directory_uri(); ?>/img/production.svg" alt="Production"></li>
								<li class="footer-service-block" id="delivery"><img src="<?php echo get_template_directory_uri(); ?>/img/delivery.svg" alt="Delivery"></li>
								<li class="footer-service-block" id="assembly"><img src="<?php echo get_template_directory_uri(); ?>/img/assembly.svg" alt="Assembly"></li>
								<li class="footer-service-block" id="service"><img src="<?php echo get_template_directory_uri(); ?>/img/service.svg" alt="Service"></li>
							</ul>
						</div>
					</div>
					<div class="row flex-vert-c" id="footer-row-3">
						<h5 class="copyright">
							<?php _e('Copyright&nbsp;&copy; 2018 RK Metāls group. All rights reserved.', 'rkmachinery'); ?>
						</h5>
						<h5 class="developer flex-vert-c text-decor-none">
							<span class="developer-text nbsp-after"><?php _e('Developed by:', 'rkmachinery'); ?></span>
							<a href="https://sem.lv/" target="_blank" class="developer-link"><img class="developer-logo" src="<?php echo get_template_directory_uri(); ?>/img/sem-logo.svg" style="width: 61px; height: 24px;"></img></a>
						</h5>
					</div>
				</div>
			</footer>
			<!-- /footer -->

			<!-- cookies -->
			<div class="cf-super-wrapper">
			<?php if ( !is_404() ): ?>
				<div class="contact-form-outer hidden">
					<div class="contact-form-wrapper">
						<button class="contact-form-close z-6"></button>
						<?php dynamic_sidebar('contact-form-widget-area'); ?>
					</div>
				</div>
				<button class="btn contact-form-btn"></button>
			<?php endif; ?>
			</div>
			<!-- end of cookies -->
			<div id="klaro"><div class="klaro"><div></div></div></div>

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<?php /* Scripts for google maps */ if( is_front_page() || is_home() || is_page_template('page-about-us.php') ): ?>
			<script>
				  // Google Maps API script
				/* -------------------------------------------------------------------------------------- */
				  /*
				  *  new_map
				  *
				  *  This function will render a Google Map onto the selected jQuery element
				  *
				  *  @type  function
				  *  @date  8/11/2013
				  *  @since 4.3.0
				  *
				  *  @param $el (jQuery element)
				  *  @return  n/a
				  */

				  function new_map( $el ) {
				    
				    // var
				    var $markers = $el.find('.marker');
				    
				    
				    // vars
				    var args = {
				      zoom    : 6,
				      center    : new google.maps.LatLng(0, 0),
				      mapTypeId : google.maps.MapTypeId.ROADMAP,
				      disableDefaultUI: true,
				      zoomControl: true,
				      // gestureHandling: 'greedy',
				      // gestureHandling: 'none',
				      styles    : [
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
				  *  @type  function
				  *  @date  8/11/2013
				  *  @since 4.3.0
				  *
				  *  @param map (Google Map object)
				  *  @return  n/a
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
				          map.setZoom( 6 );

				          var $pan_distance = - $(window).width() * 0.22;
				          // change the center of map
				          map.panBy($pan_distance,0);
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
				          map.panBy(-800,0);
				      }

				    } else if ( $(window).width() <= $tablet_width && $(window).width() > $mobile_width ) {

				      // only 1 marker?
				      if( map.markers.length == 1 ) {
				        // set center of map
				          map.setCenter( bounds.getCenter() );
				          map.setZoom( 6 );
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
				          map.setZoom( 6 );
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
				  *  @type  function
				  *  @date  8/11/2013
				  *  @since 4.3.0
				  *
				  *  @param $marker (jQuery element)
				  *  @param map (Google Map object)
				  *  @return  n/a
				  */

				  function add_marker( $marker, map ) {

				    // var
				    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
				    var marker_href = $marker.attr('href');
				    var marker_img_base = $('#template-dir-uri-img').attr('href');
				    var marker_img = {
				      url     : marker_img_base + 'marker.png',
				      anchor    : new google.maps.Point(18, 48)
				    }

				    // create marker
				    var marker = new google.maps.Marker({
				      position  : latlng,
				      map     : map,
				      icon    : marker_img,
				      url     : marker_href,
				      optimized : false
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
				        content   : $marker.html()
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
				  *  @type  function
				  *  @date  8/11/2013
				  *  @since 5.0.0
				  *
				  *  @param n/a
				  *  @return  n/a
				  */
				  // global var
				  var map = null;

				  function initMap() {
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
				            map.setZoom( 6 );

				          var $pan_distance = - $(window).width() * 0.22;
				          // change the center of map
				          map.panBy($pan_distance,0);
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
				          map.panBy(-800,0);
				        }

				      } else if ( $(window).width() <= $tablet_width && $(window).width() > $mobile_width ) {

				        // only 1 marker?
				        if( map.markers.length == 1 ) {
				          // set center of map
				            map.setCenter( bounds.getCenter() );
				            map.setZoom( 6 );

				          // change the center of map
				          map.panBy(0,0);
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
				            map.setZoom( 6 );

				          // change the center of map
				          map.panBy(0,0);
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
				  }

				/* -------------------------------------------------------------------------------------- */
				  // /Google Maps API script
			</script>
			<?php /* Show map according to site's lang code */
				if( defined( 'ICL_LANGUAGE_CODE' ) ):
			?>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQun48c3nJHsJizC-M6L7_NImA6MfyzfU&language=<?php echo ICL_LANGUAGE_CODE; ?>&callback=initMap" async=""></script>
			<?php else: ?>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQun48c3nJHsJizC-M6L7_NImA6MfyzfU&language=en&callback=initMap" async=""></script>
			<?php endif; ?>
		<?php endif; ?>
	</body>
</html>
