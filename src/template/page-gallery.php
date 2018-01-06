<?php /* Template Name: Gallery */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="container">
				<div class="row">
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="page-content editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
				</div>
			</div>
		</section>

		<section id="section-2">
			<div class="container">
				<div class="row">
					<!-- Loop Through Gallery Titles -->
					<?php if ( have_rows('gallery_repeater-content') ) : ?>
						<div class="gallery-title-block-wrapper">
						<?php
						// loop through the rows of data
						$count_1 = 0;
					    while ( have_rows('gallery_repeater-content') ) : the_row(); $count_1++; ?>

					        <a class="gallery-title-block flex-hor-c
							<?php
								if ($count_1 == 1) : echo 'active';
								endif;
							?>"
							id="<?php echo 'gallery-title-block-' . $count_1 . ' '; ?>"
							href="#">
							    <h5 class="title"><?php the_sub_field('gallery_title'); ?></h5>
							</a>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<!-- /Loop Through Gallery Titles -->

					<!-- Loop Through Gallery Image Blocks -->
					<?php
						if( get_query_var('page') ) {
							$gallery_block = get_query_var('page');
						} else {
						  	$gallery_block = 1;
						}

						// Variables
						$gb_row           = 0;
						$gb_per_page  	  = 1;
						$gallery_blocks   = get_field('gallery_repeater-content');
						$gb_total         = count( $gallery_blocks );
						$gb_pages         = ceil( $gb_total / $gb_per_page );
						$gb_min           = ( ($gallery_block * $gb_per_page ) - $gb_per_page + 1 );
						$gb_max			  = ( $gb_min + $gb_per_page - 1 );

						if ( have_rows('gallery_repeater-content') ) : ?>
						<div class="gallery-img-block-wrapper">

						<?php
						$count_2 = 0;
					    while ( have_rows('gallery_repeater-content') ) : the_row();
					    	$count_2++;
					    	$gb_row++;
					    	if($gb_row < $gb_min) { continue; }
					    	if($gb_row > $gb_max) { break; }
					    ?>

					    <div class="gallery-img-block-container posts-wrapper
					    <?php
						if ($count_2 == 1) : echo 'active';
						endif;
						echo ' gallery-img-block-container-' . $count_2 . ' ';
						?>">
							<!-- Loop Through Gallery Images -->
					        <div class="gallery-img-block posts flex-hor-c">
								<?php 
								$gallery = get_sub_field('gallery_img_items');
								$images = array();

								$items_per_page = 2;
								$total_items = count($gallery);
								$total_pages = ceil($total_items / $items_per_page);

								if( get_query_var('paged') ) {
									$current_page = get_query_var('paged');
								} else {
									$current_page = 1;
								}
								$starting_point = ( ($current_page - 1) * $items_per_page );

								if( $gallery ) {
									$images = array_slice($gallery,$starting_point,$items_per_page);
								}

								if( !empty($images) ): ?>
									<?php foreach( $images as $image ): ?>
								    <div class="gallery-img-block-item section-bg post" style="background-image: url(<?php echo $image['url']; ?>)"></div>
								    <?php endforeach; ?>
								<?php endif; ?>
							</div>
							<!-- /Loop Through Gallery Images -->
							<?php
							// load more button
							if( $total_pages > 1 && $current_page < $total_pages ) {
							?>
							<div class="load-more">
								<a href="<?php the_permalink(); ?>page/<?php echo $current_page + 1 ?>/"><?php _e('Load More', 'rkmachinery'); ?></a>
							</div>
							<?php } ?>
						</div>

						<?php endwhile;
						// Pagination
						  echo paginate_links( array(
						    'base' => get_permalink() . '%#%' . '/',
						    'format' => '?page=%#%',
						    'current' => $gallery_block,
						    'total' => $gb_total
						  ) );
						?>

						</div>
					<?php endif; ?>
					<!-- /Loop Through Gallery Image Blocks -->

				</div>
			</div>			
		</section>
	</main>

<?php get_footer(); ?>
