<?php /* Template Name: Contacts */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow jquery-background-video-wrapper">
				<?php if( get_field('text-fwiv') ): ?>
					<div class="z-6 container">
						<div class="row text">
							<div class="on-top-content-wrapper">
								<div class="editor-wrapper">
									<?php the_field('text-fwiv'); ?>
								</div>
								<?php if( get_field('full_width_video') ): ?>
									<a href="<?php the_field('full_width_video'); ?>" class="h3 open-popup-video-btn desktop-hide all-caps text-decor-none" data-rel="lightcase">Play video</a>
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('full_width_video') ): ?>
					<video class="full-width-video jquery-background-video video-play-only-on-desktop" autoplay loop muted preload="metadata">
						<source src="<?php the_field('full_width_video'); ?>">
					</video>
				<?php elseif( get_field('full_width_image') ): ?>
					<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php echo get_field('full_width_image')['url']; ?>)"></div>
				<?php endif; ?>
			</div>
		</section>

		<section id="section-2">
			<div class="container">
				<?php get_template_part('breadcrumbs'); ?>
			</div>
		</section>

		<section id="section-3">
			<div class="container">
				<div class="row">
					<div class="map-and-content-wrapper flex-hor-c">
						<div class="contacts-map-wrapper">
				    		<iframe
				    		  class="block-fit-parent fit-parent"
							  style="border:0"
							  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAvogWzTWNhsTkw3M0xOSmvgrK94wcgUFc&q=
							  <?php $address_1 = get_field('company_address_1', 'option');
									$address_1_formatted = str_replace(' ', '+', $address_1);
									$address_2 = get_field('company_address_2', 'option');
									$address_2_formatted = str_replace(' ', '+', $address_2);
									$address_formatted = $address_1_formatted . '+' . $address_2_formatted;
									echo $address_formatted ?>"
							  allowfullscreen>
							</iframe>
						</div>
						<div class="title-and-content">
							<div class="title-block bg-default table">
								<h1 class="title td"><?php the_title(); ?></h1>
							</div>
							<div class="main-contacts">
								<h6 class="company-name"><?php the_field('company_name', 'option'); ?></h6>
								<ul class="main-contacts-list company-address-list list-style-none">
									<li class="company-address-1"><?php echo $address_1; ?></li>
									<li class="company-address-2"><?php echo $address_2; ?></li>
									<li class="get-directions-wrapper">
										<a class="get-directions" href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $address_formatted ?>" target="_blank" rel="nofollow">
											<span class="before"></span>
											<?php _e('Get directions', 'rkmachinery') ?>
										</a>
									</li>
								</ul>
								<ul class="main-contacts-list company-contacts-list list-style-none">
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
						</div>
					</div>
				</div>
			</div>
		</section>		
	</main>

<?php get_footer(); ?>
