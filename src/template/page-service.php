<?php /* Template Name: Service */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow
				<?php if( get_field('full_width_video') ): echo 'video';
					elseif( get_field('full_width_image') ): echo 'image';
					endif; ?>">
				<?php if( get_field('text-fwiv') ): ?>
				<div class="text z-6 container">
					<div class="row editor-wrapper">
						<?php the_field('text-fwiv'); ?>
					</div>
				</div>
				<?php else: ?>
					<div class="title z-6 container">
						<div class="row">
							<h2><?php the_title(); ?></h2>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('full_width_video') ): ?>
					<video class="full-width-video fit-parent" autoplay>
						<source src="<?php the_field('full_width_video'); ?>">
					</video>
				<?php elseif( get_field('full_width_image') ): ?>
					<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('full_width_image'); ?>)"></div>
				<?php endif; ?>
			</div>
		</section>

		<section id="section-2">
			<div class="container">
				<div class="row">
					<!-- loop through children pages of this post -->
					<?php global $post;
						$the_query = new WP_Query( array(
						    'post_type'   => 'page',
						    'post_parent' => $post->ID,
							'orderby'	=> 'menu_order',
							'order' 	=> 'ASC'
						));
					?>
					
					<?php if( $the_query->have_posts() ) : ?>
					<div class="service-block-wrapper flex-hor-c">	 
						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<a class="service-block shadow text-decor-none 
						<?php if( get_field('full_width_video') ): echo 'video';
						elseif( get_field('full_width_image') ): echo 'image';
						endif;
						?>"
						id="<?php $title = get_the_title(); echo strtolower(str_replace(' ', '-', $title)); ?>"
						href="<?php the_permalink(); ?>">

								<h2 class="title z-6"><?php the_title(); ?></h2>
								<?php if( get_field('full_width_video') ): ?>
									<video class="full-width-video fit-parent" autoplay>
										<source src="<?php the_field('full_width_video'); ?>">
									</video>
								<?php elseif( get_field('full_width_image') ): ?>
									<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('full_width_image'); ?>)"></div>
								<?php endif; ?>

								<!-- loop through children of child page of this post -->
								<?php 
									$custom_post_children_query = new WP_Query( array(
									    'post_type'   => 'page',
									    'post_parent' => $post->ID,
										'orderby'	=> 'menu_order',
										'order' 	=> 'ASC'
									));
								?>

								<?php if ( $custom_post_children_query->have_posts() ) : ?>
								<ul class="page-children-list list-style-none z-6">
									<?php while ( $custom_post_children_query->have_posts() ) : $custom_post_children_query->the_post(); ?>
									<li><?php the_title(); ?></li>
									<?php endwhile; wp_reset_postdata(); ?>
								</ul>
								<?php endif; ?>
								<!-- /loop through children of child page of this post -->

						</a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<?php endif; ?>
					<!-- /loop through children pages of this post -->

				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>