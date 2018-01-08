<?php /* Template Name: Contacts */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow">
				<?php if( get_field('text-fwiv') ): ?>
					<div class="text z-6 container">
						<div class="row editor-wrapper">
							<?php the_field('text-fwiv'); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('full_width_video') ): ?>
					<video class="full-width-video fit-parent" autoplay>
						<source src="<?php the_field('full_width_video'); ?>">
					</video>
				<?php elseif( get_field('full_width_image') ): ?>
					<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('full_width_image'); ?>)"></div>
				<?php endif; ?>
			</div>
		</section>

		<section id="section-2">
			<div class="container">
				<?php get_template_part('breadcrumbs'); ?>
				<div class="row">
					<div class="map-and-content-wrapper flex-hor-c">
						<div class="contacts-map-wrapper">
				    		<iframe
				    		  class="fit-parent"
							  style="border:0"
							  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDXtzsptnsBUt60yjh3NTikCbVnPIiL2ws
							  &q=<?php $address_1 = get_field('company_address_1', 'option');
									$address_1_formatted = strtolower(str_replace(' ', '+', $address_1));
									$address_2 = get_field('company_address_2', 'option');
									$address_2_formatted = strtolower(str_replace(' ', '+', $address_2));
									$address_formatted = $address_1_formatted . '+' . $address_2_formatted;
									echo $address_formatted ?>"
							  allowfullscreen>
							</iframe>
						</div>
						<div class="title-and-content">
							<div class="title">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="main-contacts">
								<h6 class="company-name"><?php the_field('company_name', 'option'); ?></h6>
								<ul class="main-contacts-list list-style-none">
									<li class="company-address-wrapper">
										<a class="company-address" href="https://www.google.com/maps/dir/?api=1&destination=
										<?php echo $address_formatted; ?>"
										target="_blank" rel="nofollow">
											<span><?php echo $address_1; ?></span>
											<span><?php echo $address_2; ?></span>
										</a>
									</li>
									<li class="company-phone-wrap">
										<span><?php _e('Phone number', 'rkmachinery'); ?>:</span>
										<a class="company-phone text-decor-none" href="tel:<?php $phone = get_field('company_phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
									</li>
									<li class="company-fax-wrap">
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
					</div>
				</div>
			</div>
		</section>		
	</main>

<?php get_footer(); ?>
