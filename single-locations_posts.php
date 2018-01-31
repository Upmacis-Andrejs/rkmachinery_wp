<?php /* Template Name: Locations Item */ ?>

<?php get_header(); ?>

	<main id="site-content" class="flex-grow flex-vert-c">
		
		<!-- link to home page / back -->
		<a href="<?php echo home_url(); ?>" id="close-location" class="z-99"></a>
		<!-- link to next post -->
		<div id="next-post" class="z-99">
			<?php if( get_adjacent_post(false, "", false) ) : ?>
				<?php next_post_link('%link',''); ?>
			<?php else : ?>
				<?php
					$last_query = new WP_Query( array(
						'post_type'   => 'locations_posts',
						'orderby'	=> 'menu_order',
						'order' 	=> 'ASC',
						'posts_per_page'	=> '1'
					));
				?>
				<?php if ( $last_query->have_posts() ) : while ( $last_query->have_posts() ) : $last_query->the_post(); ?>

					<a href="<?php the_permalink(); ?>"></a>

				<?php endwhile; wp_reset_postdata(); endif; ?>
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
						    <ul class="lightslider with-pager">
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
