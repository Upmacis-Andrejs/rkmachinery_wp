<?php /* Template Name: Gallery Items*/ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="container">
				<?php get_template_part('breadcrumbs'); ?>
			</div>
		</section>

		<section id="section-2" class="full-section gallery-section-top">
			<div class="container">
				<div class="row">
					<!-- loop through page_id=26 data -->
					<?php $the_query_26 = new WP_Query( array(
						'page_id'	=> 26,
						'orderby'	=> 'menu_order',
						'order' 	=> 'ASC'
					) );
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

		<section id="section-3">
			<div class="container">
				<div class="row">
					<!-- Loop Through Gallery Titles -->
					<?php $the_query_gallery = new WP_Query( array( 
							'post_type' => 'gallery_posts',
							'orderby'	=> 'date',
							'order'		=> 'ASC'
						) );
						$this_page_title = get_the_title(); ?>
					<?php if ( $the_query_gallery->have_posts() ) : $count_1 = 0; ?>
						<div class="gallery-title-block-wrapper flex z-6 margin-bottom-small">
						    <?php while ( $the_query_gallery->have_posts() ) : $the_query_gallery->the_post(); $count_1++; ?>
						        <a class="gallery-title-block flex-c-column text-decor-none
								<?php
									if ( $this_page_title == get_the_title() ) : echo ' active';
									endif;
								?>"
								id="<?php echo 'gallery-title-block-' . $count_1; ?>"
								href="<?php the_permalink(); ?>"
								style="z-index: 9;">
								    <h3 class="title default" data-hover="<?php the_title(); ?>"><?php the_title(); ?></h3>
								</a>
						    <?php endwhile; wp_reset_postdata(); ?>
						</div>

					<?php endif; ?>
					<!-- /Loop Through Gallery Titles -->
				</div>
				<div class="row">
					<div class="gallery-page-img-block-wrapper">
						<!-- Loop Through Gallery Images -->
				        <div class="gallery-page-img-block posts flex-hor-c">
							<?php 
							if ( have_posts() ) : while ( have_posts() ) : the_post();
							$gallery = get_field('gallery');
							$images = array();

							$items_per_page = 8;
							$total_items = count($gallery);
							$total_pages = ceil($total_items / $items_per_page);

							if( get_query_var('paged') ) {
								$current_page = get_query_var('paged');
							} elseif ( get_query_var('page') ) {
								$current_page = get_query_var('page');
							} else {
								$current_page = 1;
							}

							$starting_point = ( ($current_page - 1) * $items_per_page );

							if( $gallery ) {
								$images = array_slice($gallery,$starting_point,$items_per_page);
							}

							if( !empty($images) ): ?>
								<?php foreach( $images as $image ): ?>
								<div class="gallery-page-img-block-item-outer post">
								    <a class="gallery-page-img-block-item section-bg" href="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['url']; ?>)" data-rel="lightcase:gallerySection" title="<?php echo $image['description']; ?>"></a>
								</div>
							    <?php endforeach; ?>
							<?php endif; ?>

							<?php endwhile; endif; wp_reset_postdata(); ?>
				        </div>
						<!-- /Loop Through Gallery Images -->					        
						<?php
						// load more button
						if( $total_pages > 1 && $current_page < $total_pages ) :
						?>
						<div class="load-more flex-hor-c">
							<a class="btn btn-1" href="<?php the_permalink(); echo $current_page+1 ?>/"><?php _e('Load More', 'rkmachinery'); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>			
		</section>
	</main>

<?php get_footer(); ?>
