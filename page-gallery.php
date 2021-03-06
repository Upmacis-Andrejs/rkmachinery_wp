<?php /* Template Name: Gallery*/ ?>

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
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="page-content editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
				</div>
			</div>
		</section>

		<section id="section-3">
			<div class="container">
				<div class="row">
					<!-- Loop Through Gallery Titles -->
					<?php if ( have_rows('gallery_block_wrapper') ) : $count_1 = 0; ?>

						<div class="gallery-title-block-wrapper flex switch-active z-6 margin-bottom-small" id="gallery-title-block-wrapper">
						    <?php while ( have_rows('gallery_block_wrapper') ) : the_row(); $count_1++; ?>
						        <a class="gallery-title-block flex-c-column text-decor-none
								<?php
									if ( $count_1 == 1 ) : echo ' active';
									endif;
								?>"
								id="<?php echo 'gallery-title-block-' . $count_1; ?>"
								style="z-index: 9;">
								    <h3 class="title default" data-hover="<?php the_sub_field('gallery_title'); ?>"><?php the_sub_field('gallery_title'); ?></h3>
								</a>
						    <?php endwhile; ?>
						</div>

					<?php endif; ?>
					<!-- /Loop Through Gallery Titles -->
				</div>
				<div class="row">
					<!-- Loop Through Gallery Image Blocks -->
					<?php if ( have_rows('gallery_block_wrapper') ) : $count_2 = 0; ?>
					<?php while ( have_rows('gallery_block_wrapper') ) : the_row(); $count_2++; ?>
					
					<div class="gallery-page-img-block-wrapper posts-parent
						<?php
							if ( $count_2 == 1 ) : echo ' active';
							endif;
							echo ' gallery-page-img-block-wrapper-' . $count_2;
						?>"
						id="<?php echo 'posts-parent-' . $count_2; ?>">
						<h3 class="gallery-title-mobile"><?php the_sub_field('gallery_title'); ?></h3>

							<?php 
							$gallery = get_sub_field('gallery_block');
							$images = array();

							$items_per_page = 16; /* 16 */
							$total_items = count($gallery);
							$total_pages = ceil($total_items / $items_per_page);

							$current_page = isset( $_GET['paged' . $count_2] ) ? (int) $_GET['paged' . $count_2] : 1;


							$starting_point = ( ($current_page - 1) * $items_per_page );

							if( $gallery ) {
								$images = array_slice($gallery,$starting_point,$items_per_page);
							}

							if( !empty($images) ): ?>
					        	<div class="gallery-page-img-block photoswipe-wrapper posts flex-hor-c"
					        		id="<?php echo 'posts-' . $count_2; ?>">

									<?php foreach( $images as $image ): ?>
									<figure class="gallery-page-img-block-item-outer post">
									    <a class="gallery-page-img-block-item" href="<?php echo $image['url']; ?>" data-size="<?php echo $image['width']; ?>x<?php echo $image['height']; ?>">
											<div class="block-fit-parent section-bg" style="background-image: url(<?php echo $image['sizes']['gallery']; ?>);" data-src="<?php echo $image['sizes']['gallery']; ?>"></div>
										</a>
										<figcaption class="visuallyhidden"><?php echo $image['description']; ?></figcaption>	
									</figure>
								    <?php endforeach; ?>

				        		</div>
							<?php endif; ?>
						<?php
						// load more button
						if( $total_pages > 1 ) :
						$page = $current_page; ?>
							<div class="load-more-multiple flex-hor-c" id="<?php echo 'load-more-multiple-' . $count_2; ?>">
								<a class="load-more-link prev" data-id="<?php echo $count_2; ?>" data-href="<?php the_permalink(); echo '?paged' . $count_2; ?>=" data-total-pages="<?php echo $total_pages; ?>" href="#"><span class="icon icon-arrow-right"></span></a>
							<?php while( $page <= $total_pages ): ?>
								<a class="load-more-link <?php if( $page == $current_page ) { echo 'current-page'; } ?>" data-id="<?php echo $count_2; ?>" data-page="<?php echo $page; ?>" href="<?php the_permalink(); echo '?paged' . $count_2; ?>=<?php echo $page ?>/"><?php echo $page; ?></a>
							<?php $page++; endwhile; ?>
								<a class="load-more-link next" data-id="<?php echo $count_2; ?>" href="#"><span class="icon icon-arrow-right"></span></a>
							</div>
						<?php endif; ?>
					</div>
					
					<?php endwhile; endif; ?>
					<!-- /Loop Through Gallery Images -->
				</div>
			</div>			
		</section>
	</main>
	<!-- PhotoSwipe. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="pswp__bg"></div>
	    <div class="pswp__scroll-wrap">
	        <div class="pswp__container">
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	        </div>
	        <div class="pswp__ui pswp__ui--hidden">
	            <div class="pswp__top-bar">
	                <div class="pswp__counter"></div>
	                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
	                <button class="pswp__button pswp__button--share" title="Share"></button>
	                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
	                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
	                <div class="pswp__preloader">
	                    <div class="pswp__preloader__icn">
	                      <div class="pswp__preloader__cut">
	                        <div class="pswp__preloader__donut"></div>
	                      </div>
	                    </div>
	                </div>
	            </div>
	            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	                <div class="pswp__share-tooltip"></div> 
	            </div>
	            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
	            </button>
	            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
	            </button>
	            <div class="pswp__caption">
	            	<div class="container pswp__caption__center"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /PhotoSwipe. -->

<?php get_footer(); ?>
