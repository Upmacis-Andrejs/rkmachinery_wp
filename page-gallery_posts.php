<?php /* Template Name: Gallery Items*/ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="container">
				<div class="row">
					<!-- loop through page_id=26 data -->
					<?php $the_query_26 = new WP_Query('page_id=26');
						while ($the_query_26->have_posts()) : $the_query_26->the_post(); ?>
						<h1 class="title"><?php the_title(); ?></h1>
						<div class="page-content editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
					<!-- /loop through page_id=26 data -->
				</div>
			</div>
		</section>

		<section id="section-2">
			<div class="container">
				<div class="row">
					<!-- Loop Through Gallery Titles -->
					<?php $the_query_gallery = new WP_Query( array( 'post_type' => 'gallery_posts' ) );                  
					if ( $the_query_gallery->have_posts() ) : $count_1 = 0; ?>

					    <?php while ( $the_query_gallery->have_posts() ) : $the_query_gallery->the_post(); $count_1++; ?>
					        <a class="gallery-title-block flex-hor-c
							<?php
								if ($count_1 == 1) : echo 'active';
								endif;
							?>"
							id="<?php echo 'gallery-title-block-' . $count_1; ?>"
							href="<?php the_permalink(); ?>">
							    <h5 class="title"><?php the_title(); ?></h5>
							</a>
					    <?php endwhile; wp_reset_postdata(); ?>

					<?php endif; ?>
					<!-- /Loop Through Gallery Titles -->
				</div>
				<div class="row">
					<div class="gallery-img-block-wrapper">
					    <div class="gallery-img-block-container posts-wrapper">
							<!-- Loop Through Gallery Images -->
					        <div class="gallery-img-block posts flex-hor-c">
								<?php 

								$images = get_field('gallery');

								if( $images ): ?>
							        <?php foreach( $images as $image ): ?>
							            <div class="gallery-img-block-item section-bg post" style="background-image: url(<?php echo $image['url']; ?>)">
							        <?php endforeach; ?>
								<?php endif; ?>
								</div>					        	
					        </div>
							<!-- Loop Through Gallery Images -->
						    <?php if ( $the_query_gallery->max_num_pages > 1 ) : ?>
						    	<div class="load-more"><?php $load_more_text = next_posts_link( __('Load More', 'rkmachinery'), $the_query_gallery->max_num_pages); ?></div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>			
		</section>
	</main>

<?php get_footer(); ?>
