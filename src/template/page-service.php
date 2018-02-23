<?php /* Template Name: Service */ ?>

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
									<a href="<?php the_field('full_width_video'); ?>" class="h3 open-popup-video-btn desktop-hide all-caps text-decor-none" data-rel="lightcase"><?php _e('play video', 'rkmachinery'); ?></a>
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

		<section id="section-3" class="service-section">
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
					
					<!-- Check if this page has children -->
					<?php global $post;
						$pages = get_pages('child_of=' . $post->ID);
						if (count($pages) > 0):
					 ?>
						<!-- If this page has children, display them -->
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
											<?php if( get_field('full_width_image') ): ?>
												<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php echo get_field('full_width_image')['sizes']['gallery']; ?>)"></div>
											<?php elseif( get_field('full_width_video') ): ?>
												<video class="full-width-video jquery-background-video no-autoplay" preload="metadata">
													<source src="<?php the_field('full_width_video'); ?>#t=0.5">
												</video>
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
					<!-- /If this page has children, display them -->
					<?php else: ?>
					<!-- If this page does not has children, display repeater with content -->
						<?php if( have_rows('slider_and_content_group') ):

						    while ( have_rows('slider_and_content_group') ) : the_row(); ?>

								<div class="slider-and-content-wrapper margin flex-hor-c">
									<!-- Image Slider -->
									<?php if( have_rows('group_img_and_video_slider') ): ?>
									<div class="slider-wrapper">
									   <ul class="lightslider cS-hidden">
										<?php while( have_rows('group_img_and_video_slider') ): the_row(); ?>

									        <?php if( get_row_layout() == 'giavs_img_layout' ): ?>
									            <li class="lightslider-item section-bg" style="background-image: url(<?php echo get_sub_field('giavs_image')['sizes']['gallery']; ?>)"></li>
									        <?php endif; ?>

									        <?php if( get_row_layout() == 'giavs_video_layout' ): ?>
									            <li class="lightslider-item section-bg video-slide">
									              <div class="bg-img-for-mobile" style="background-image: url(<?php echo get_sub_field('giavs_poster_img')['sizes']['gallery']; ?>)"></div>
										          <div class="jquery-bg-video-wrapper">
										            <video class="jquery-background-video play-btn" preload="metadata" poster="<?php echo get_sub_field('giavs_poster_img')['sizes']['gallery']; ?>"
										            	<?php if( !get_sub_field('giavs_poster_img')): ?> style="opacity: 1;" <?php endif; ?>
										            >
										              <source src="<?php the_sub_field('giavs_video_file'); ?>#t=0.5">
										            </video>
													<a href="<?php the_sub_field('giavs_video_file'); ?>" class="slider-open-video-popup desktop-hide" data-rel="lightcase"></a>
										          </div>
									            </li>
									        <?php endif; ?>

										<?php endwhile; ?>
									  	</ul>
									</div>
									<?php endif; ?>
									<!-- /Image Slider -->
									<!-- Content Block -->
									<?php if( get_sub_field('group_content_block') ): ?>
									<div class="title-and-content">
										<div class="page-content editor-wrapper">
											<?php the_sub_field('group_content_block'); ?>
										</div>
									</div>
									<?php endif; ?>
									<!-- /Content Block -->
								</div>

						    <?php endwhile; ?>

						<?php endif; ?>
					<!-- /If this page does not has children, display repeater with content -->
					<?php endif; ?>
					<!-- /Check if this page has children -->

				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>