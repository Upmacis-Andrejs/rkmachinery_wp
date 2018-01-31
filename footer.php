			<!-- footer -->
			<footer class="footer z-99" id="site-footer">
				<button class="btn contact-form-btn"></button>
				<div class="contact-form-outer hidden">
					<div class="contact-form-wrapper">
						<button class="contact-form-close z-6"></button>
						<?php dynamic_sidebar('contact-form-widget-area'); ?>
					</div>
				</div>
				<div class="container">
					<div class="row" id="footer-row-1">
						<div class="flex upper-footer-block-wrapper">
							<a class="upper-footer-block footer-site-logo" href="<?php echo home_url(); ?>">
								<img src="<?php the_field('site_logo_footer', 'option'); ?>" alt="Footer Site Logo">
							</a>
							<div class="footer-list-wrapper flex">
								<div class="upper-footer-block footer-company-address">
									<h3 class="title"><?php _e('RK Metāls Office and Production Units', 'rkmachinery') ?></h3>
									<ul class="list-style-none">
										<li><?php the_field('company_address_1', 'option') ?></li>
										<li><?php the_field('company_address_2', 'option') ?></li>
										<li>
											<a class="get-directions" href="https://www.google.com/maps/dir/?api=1&destination=
												<?php $address_1 = get_field('company_address_1', 'option');
												$address_1_formatted = str_replace(' ', '+', $address_1);
												$address_2 = get_field('company_address_2', 'option');
												$address_2_formatted = str_replace(' ', '+', $address_2);
												$address_formatted = $address_1_formatted . '+' . $address_2_formatted;
												echo $address_formatted ?>" target="_blank" rel="nofollow">
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
										<li>
											<a class="social follow-btn-styled facebook text-decor-none h5" href="#" target="_blank"><?php _e('Facebook', 'rkmachinery'); ?></a>
										</li>
										<li>
											<a class="social follow-btn-styled youtube text-decor-none h5" href="#" target="_blank"><?php _e('Youtube', 'rkmachinery'); ?></a>
											<div class="g-ytsubscribe" data-channel="GoogleDevelopers" data-layout="default" data-count="default"></div>
											<script src="https://apis.google.com/js/platform.js"></script>
										</li>
										<li>
											<a class="social follow-btn-styled linkedin text-decor-none h5" href="#" target="_blank"><?php _e('Linkedin', 'rkmachinery'); ?></a>
										</li>
										<li>
											<a class="social follow-btn-styled linkedin text-decor-none h5" href="#" target="_blank"><?php _e('Instagram', 'rkmachinery'); ?></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row flex-vert-c" id="footer-row-2">
					    <a class="footer-logo-2nd text-decor-none flex-vert-c" href="<?php the_field('footer_logo_2nd_link', 'option'); ?>" target="_blank" rel="nofollow">
							<?php
								$footer_logo_2nd_imageArray = get_field('footer_logo_2nd', 'option');
								$footer_logo_2nd_imageAlt = esc_attr($footer_logo_2nd_imageArray['alt']);
								$footer_logo_2nd_imageURL = esc_url($footer_logo_2nd_imageArray['url']);
							?>
							<img src="<?php echo $footer_logo_2nd_imageURL; ?>" alt="<?php echo $footer_logo_2nd_imageAlt; ?>">
						</a>
						<div class="footer-company-list-wrapper">
						<?php if( have_rows('footer_company_list', 'option') ): ?>

							<div class="footer-company-list flex">
							<?php while ( have_rows('footer_company_list', 'option') ) : the_row(); ?>
								<a class="footer-company-block text-decor-none" href="<?php the_sub_field('footer_company_link', 'option'); ?>" target="_blank" rel="nofollow">
								<?php
									if ( get_sub_field('footer_company_img', 'option') ):
										$footer_company_logo_imageArray = get_sub_field('footer_company_img', 'option');
									elseif ( get_sub_field('footer_company_img_backup', 'option') ):
										$footer_company_logo_imageArray = get_sub_field('footer_company_img_backup', 'option');
									endif;
										$footer_company_logo_imageAlt = esc_attr($footer_company_logo_imageArray['alt']);
										$footer_company_logo_imageURL = esc_url($footer_company_logo_imageArray['url']);
								?>
									<img src="<?php echo $footer_company_logo_imageURL; ?>" alt="<?php echo $footer_company_logo_imageAlt; ?>">
								</a>
							<?php endwhile; ?>
							</div>

						<?php endif; ?>
						<?php if ( have_rows('footer_services_list', 'option') ): ?>
							<ul class="footer-services-wrapper list-style-none flex-vert-c">
							<?php while ( have_rows('footer_services_list', 'option') ) : the_row(); ?>
								<?php
									if ( get_sub_field('footer_service_img', 'option') ):
										$footer_service_imageArray = get_sub_field('footer_service_img', 'option');
									elseif ( get_sub_field('footer_service_img_backup', 'option') ):
										$footer_service_imageArray = get_sub_field('footer_service_img_backup', 'option');
									endif;
										$footer_service_imageAlt = esc_attr($footer_service_imageArray['alt']);
										$footer_service_imageURL = esc_url($footer_service_imageArray['url']);
								?>								
								<li class="footer-service-block"><img src="<?php echo $footer_service_imageURL; ?>" alt="<?php echo $footer_service_imageAlt; ?>"></li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						</div>
					</div>
					<div class="row flex-vert-c" id="footer-row-3">
						<h5 class="copyright">
							<?php _e('Copyright&nbsp;&copy; 2018 RK Metāls group. All rights reserved.', 'rkmachinery'); ?>
						</h5>
						<a class="h5 developer flex-vert-c text-decor-none" href="https://sem.lv/" target="_blank">
							<span class="developer-text nbsp-after"><?php _e('Developed by:', 'rkmachinery'); ?></span>
							<img class="developer-logo" src="<?php echo get_template_directory_uri(); ?>/img/sem-logo.png"></img>
						</a>
					</div>
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXtzsptnsBUt60yjh3NTikCbVnPIiL2ws"></script>
	</body>
</html>
