<?php /* Template Name: About Us */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow jquery-background-video-wrapper
			<?php if( get_field('full_width_video') ): echo ' video loading';
			elseif( get_field('full_width_image') ): echo ' image';
			endif;
			?>" id="video-loader-animation-wrapper">
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
					<video class="full-width-video jquery-background-video no-autoplay video-play-only-on-desktop" id="video-loader-animation" preload="metadata">
						<source src="<?php the_field('full_width_video'); ?>#t=0.5">
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

		<section id="section-3" class="full-section about-us-section">
			<div class="container">
				<div class="row">
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="page-content editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
				</div>
			</div>
			<div class="advanced-google-maps-wrapper w-100">
			<?php $the_query_locations = new WP_Query( array( 'post_type' => 'locations_posts' ) );                  
			if ( $the_query_locations->have_posts() ) : ?>
				<!-- loop through custom post type 'locations' -->

				<div class="acf-map" id="acf-advanced-map">
			    <?php while ( $the_query_locations->have_posts() ) : $the_query_locations->the_post();
			    	$location = get_field('location_address');?>
			    	<div class="marker" href="<?php echo esc_url( add_query_arg( 'from', 'about-us', get_the_permalink() ) ); ?>" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"><div class="hidden"></div></div>
			    <?php endwhile; wp_reset_postdata(); ?>
				</div>
				<div class="gradient gradient-top"></div>
				<div class="gradient gradient-bottom"></div>
				<div class="container gradient-left-wrapper block-hor-c">
					<div class="gradient gradient-left"></div>
				</div>

				<!-- /loop through custom post type 'locations' -->
			<?php endif; ?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
