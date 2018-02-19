			<!-- footer -->
			<footer class="footer z-99" id="site-footer">
				<?php if ( !is_404() ): ?>
					<div class="contact-form-outer hidden">
						<div class="contact-form-wrapper">
							<button class="contact-form-close z-6"></button>
							<?php dynamic_sidebar('contact-form-widget-area'); ?>
						</div>
					</div>
					<button class="btn contact-form-btn"></button>
				<?php endif; ?>
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
											<a class="get-directions" href="https://www.google.com/maps/dir/?api=1&destination=
												<?php $address_1 = get_field('company_address_1', 'option');
												$address_1_formatted = str_replace(' ', '+', $address_1);
												$address_2 = get_field('company_address_2', 'option');
												$address_2_formatted = str_replace(' ', '+', $address_2);
												$address_formatted = $address_1_formatted . '+' . $address_2_formatted;
												echo $address_formatted ?>" target="_blank" rel="nofollow">
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

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXtzsptnsBUt60yjh3NTikCbVnPIiL2ws" async=""></script>
	</body>
</html>
