<?php /* Template Name: Locations Item */ ?>

<?php get_header(); ?>

	<main id="site-content" class="flex-grow flex-vert-c">
		
		<!-- link to home page / back -->
		<?php if ( $_GET['from'] == 'about-us' ) {
				$from = 'about-us';
				$link = get_permalink('31');
			} else {
				$from = 'home';
				$link = home_url();
			} ?>
		<a href="<?php echo $link; ?>#acf-advanced-map" id="close-location" class="z-99"></a>
		<!-- link to next post -->
		<div id="next-post" class="z-99">
			<?php if( get_adjacent_post(false, "", false) ) : ?>
				<?php if ( $from == 'about-us' ): ?>
					<a href="<?php echo esc_url( add_query_arg( 'from', 'about-us', get_permalink(get_adjacent_post(false,'',false)) ) ); ?>"></a>
				<?php else : ?>
					<a href="<?php echo esc_url( add_query_arg( 'from', 'home', get_permalink(get_adjacent_post(false,'',false)) ) ); ?>"></a>
				<?php endif; ?>
			<?php else : ?>
				<?php
					$last_query = new WP_Query( array(
						'post_type'   => 'locations_posts',
						'orderby'	=> 'menu_order',
						'order' 	=> 'ASC',
						'posts_per_page'	=> '1'
					));
				?>
				<?php while ( $last_query->have_posts() ) : $last_query->the_post(); ?>
					<?php if ( $from == 'about-us' ): ?>
						<a href="<?php echo esc_url( add_query_arg( 'from', 'about-us', get_the_permalink() ) ); ?>"></a>
					<?php else : ?>
						<a href="<?php echo esc_url( add_query_arg( 'from', 'home', get_the_permalink() ) ); ?>"></a>
					<?php endif; ?>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>

		<!-- section -->
		<section id="section-1" class="location-section table">
			<div class="location-info-wrapper tr">
				<div class="slider-outer w-50 td">
					<div class="slider-wrapper big with-pager">
						<?php 

						$images = get_field('image_gallery');

						if( $images ): ?>
						    <ul class="lightslider with-pager cS-hidden" id="lightSlider">
						        <?php foreach( $images as $image ): ?>
						            <li class="lightslider-item section-bg" style="background-image: url(<?php echo $image['url']; ?>)";></li>
						        <?php endforeach; ?>
						    </ul>
						<?php endif; ?>
					</div>
				</div>

				<div class="location-text-wrapper w-50 td">
					<div class="location-text-inner">
						<h1 class="title"><?php the_title(); ?></h1>
						<div class="editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /section -->

	</main>

<?php get_footer(); ?>
