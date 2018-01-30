<?php /* Template Name: News */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="container">
				<?php get_template_part('breadcrumbs'); ?>
			</div>
		</section>

		<section id="section-2" class="news-section">
			<div class="container">
				<div class="row">
					<h1 class="title"><?php the_title(); ?></h1>
					<?php if( get_field('page_content') ): ?>
						<div class="page-content editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="row">	
					<?php
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$the_query_news = new WP_Query( array(
							'post_type'			=> 'news_posts',
							'posts_per_page'	=> '9',
							'paged'				=> $paged,
						) );
					if ( $the_query_news->have_posts() ) : ?>
					<!-- loop through custom post type 'news' -->

					<div class="news-block-wrapper posts flex-hor-c">
				    <?php while ( $the_query_news->have_posts() ) : $the_query_news->the_post(); ?> 
				    	<div class="news-block-outer post"> 
				    		<div class="news-block-inner">
						        <a class="news-block shadow text-decor-none jquery-background-video-wrapper
						        <?php if( get_field('thumbnail_video') ): echo ' video';
								elseif( get_field('thumbnail_image') ): echo ' image';
								endif; ?>"
								href="<?php the_permalink(); ?>">
									
									<div class="title-and-date z-6">
										<h3 class="title"><?php the_title(); ?></h3>
										<h5 class="news-post-date"><?php echo get_the_date('F d, Y'); ?></h5>
										<div class="shape-right-cut">
											<div class="shape-right"></div>
											<div class="shape-upper"></div>
										</div>
									</div>
									<?php if( get_field('thumbnail_video') ): ?>
										<video class="full-width-video jquery-background-video no-autoplay" preload="metadata">
											<source src="<?php the_field('thumbnail_video'); ?>">
										</video>
									<?php elseif( get_field('thumbnail_image') ): ?>
										<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('thumbnail_image'); ?>)"></div>
									<?php endif; ?>
								</a>
							</div>
						</div>
				    <?php endwhile; ?>
					</div>
				    <?php if ( $the_query_news->max_num_pages > 1 ) : ?>
				    	<div class="load-more flex-hor-c"><?php next_posts_link( __('Load More', 'rkmachinery'), $the_query_news->max_num_pages); ?></div>
					<?php endif ?>

				<!-- /loop through custom post type 'news' -->
				<?php wp_reset_postdata(); endif; ?>
				</div>					
			</div>
		</section>
	</main>

<?php get_footer(); ?>
