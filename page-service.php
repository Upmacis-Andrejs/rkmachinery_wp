<?php /* Template Name: Service */ ?>

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
					<video class="full-width-video jquery-background-video no-autoplay video-play-only-on-desktop" preload="metadata">
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

		<section id="section-3" class="service-section">
			<div class="container">

				<div class="row">
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="page-content editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
				</div>

				<div class="row">
					<?php global $post;
						$the_query = new WP_Query( array(
						    'post_type'   => 'page',
						    'post_parent' => $post->ID,
							'orderby'	=> 'menu_order',
							'order' 	=> 'ASC'
						));
					?>
					
					<?php if( $the_query->have_posts() ) : ?>
					<!-- loop through children pages of this post -->						
					<div class="service-block-wrapper flex-hor-c">	 
						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="service-block-outer">
							<div class="service-block-inner">
								<a class="service-block shadow text-decor-none jquery-background-video-wrapper
								<?php if( get_field('full_width_video') ): echo ' video';
								elseif( get_field('full_width_image') ): echo ' image';
								endif;
								?>"
								id="<?php $title = get_the_title(); echo strtolower(str_replace(' ', '-', $title)); ?>"
								href="<?php the_permalink(); ?>">

										<h2 class="title z-6"><?php the_title(); ?></h2>
										<?php if( get_field('full_width_video') ): ?>
											<video class="full-width-video jquery-background-video no-autoplay" preload="metadata">
												<source src="<?php the_field('full_width_video'); ?>#t=0.5">
											</video>
										<?php elseif( get_field('full_width_image') ): ?>
											<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php echo get_field('full_width_image')['sizes']['gallery']; ?>)"></div>
										<?php endif; ?>

										<?php 
											$post_children_query = new WP_Query( array(
											    'post_type'   => 'page',
											    'post_parent' => $post->ID,
												'orderby'	=> 'menu_order',
												'order' 	=> 'ASC',
												'posts_per_page'	=> '4'
											));
										?>

										<?php if ( $post_children_query->have_posts() ) : ?>
										<!-- loop through children of child page of this post -->									
										<ul class="page-children-list list-style-none z-6">
											<?php while ( $post_children_query->have_posts() ) : $post_children_query->the_post(); ?>
											<li><?php the_title(); ?></li>
											<?php endwhile; ?>
											<?php if ( $post_children_query->found_posts > 4 ): ?>
											<li class="more">...<?php _e('more', 'rkmachinery'); ?></li>
											<?php endif; ?>
										</ul>	
										<!-- /loop through children of child page of this post -->									
										<?php else: ?>
											<!-- if page child does not have children and template file is page-service-item.php, display excerpt -->
											<?php if( get_page_template_slug($post->ID) == 'page-service-item.php' ): ?>
											<ul class="page-excerpt-wrapper list-style-none z-6">
												<li class="excerpt">
													<?php
														if ( !empty(get_the_excerpt()) ) : rkmachinery_wp_excerpt('', 'rkmachinery_no_read_more');
														else : echo custom_field_excerpt();
														endif;
													?>
												</li>
												<li class="more">...<?php _e('more', 'rkmachinery'); ?></li>
											</ul>
											<?php endif; ?>
											<!-- /if page child does not have children, display excerpt -->									
										<?php wp_reset_postdata(); endif; ?>
										
								</a>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<!-- /loop through children pages of this post -->
					<?php endif; ?>

				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>