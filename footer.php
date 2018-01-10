			<!-- footer -->
			<footer class="footer" id="site-footer">
				<button class="btn contact-form-btn"></button>
				<div class="contact-form-wrapper hidden">
					<button class="contact-form-close z-6"></button>
					<?php dynamic_sidebar('contact-form-widget-area'); ?>
				</div>
				<div class="container">
					<div class="row flex">
						<a class="footer-site-logo" href="<?php echo home_url(); ?>">
							<img src="<?php the_field('site_logo_with_bg', 'option'); ?>" alt="Footer Site Logo">
						</a>
						<div class="footer-company-address">
							<h4 class="all-caps"><?php _e('RK Metāls Office and Production Units', 'rkmachinery') ?></h4>
							<ul class="list-style-none">
								<li><?php the_field('company_address_1', 'option') ?></li>
								<li><?php the_field('company_address_2', 'option') ?></li>
							</ul>
						</div>
						<div class="footer-contacts">
							<h4 class="all-caps"><?php _e('Contacts', 'rkmachinery') ?></h4>
							<ul class="list-style-none">
								<li class="company-phone-wrapper">
									<span><?php _e('Phone number', 'rkmachinery'); ?>:</span>
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
					</div>
					<div class="row flex-vert-c">
						<?php
							$imageArray = get_field('footer_logo_2nd', 'option');
							$imageAlt = esc_attr($imageArray['alt']);
							$imageURL = esc_url($imageArray['url']);
						?>
 
					    <a class="footer-logo-2nd text-decor-none" href="<?php the_field('footer_logo_2nd_link', 'option'); ?>">
							<img src="<?php echo $imageURL; ?>" alt="<?php echo $imageAlt; ?>">
						</a>
						<div class="footer-company-list-wrapper">
						<?php if( have_rows('footer_company_list', 'option') ): ?>

							<div class="footer-company-list flex">
							<?php while ( have_rows('footer_company_list', 'option') ) : the_row(); ?>
								<a class="footer-comapny-block text-decor-none" href="<?php the_sub_field('footer_company_link'); ?>">
									<h6 class="footer-company-name"><?php the_sub_field('footer_company_name'); ?></h6>
									<p class="footer-company-description"><?php the_sub_field('footer_company_description'); ?></p>
								</a>
							<?php endwhile; ?>
							</div>

						<?php endif; ?>
							<ul class="footer-services-wrapper list-style-none flex-vert-c all-caps">
								<li><?php _e('Engineering', 'rkmachinery'); ?></li>
								<li><?php _e('Production', 'rkmachinery'); ?></li>
								<li><?php _e('Delivery', 'rkmachinery'); ?></li>
								<li><?php _e('Assembly', 'rkmachinery'); ?></li>
								<li><?php _e('Service', 'rkmachinery'); ?></li>
							</ul>
						</div>
					</div>
					<div class="row flex-vert-c">
						<p class="copyright">
							<?php _e('Copyright&nbsp;&copy; 2018 RK Metāls group. All rights reserved.', 'rkmachinery'); ?>
						</p>
						<p class="developer">
							<span class="developer-text nbsp-after"><?php _e('Developed by:', 'rkmachinery'); ?></span>
							<span class="developer-logo"></span>
						</p>
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
