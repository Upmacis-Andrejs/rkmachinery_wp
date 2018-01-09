<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper mega-size shadow">
				<?php if( get_field('text-fwiv') ): ?>
					<div class="text z-6 container">
						<div class="row editor-wrapper">
							<?php the_field('text-fwiv'); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('full_width_video') ): ?>
					<video class="full-width-video fit-parent" autoplay loop>
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
					<div class="page-block-wrapper flex-hor-c">
						<!-- loop through page_id=24 data -->
						<?php $the_query_24= new WP_Query('page_id=24');
							while ($the_query_24->have_posts()) : $the_query_24->the_post(); ?>
						<a class="page-block shadow text-decor-none 
						<?php if( get_field('full_width_video') ): echo 'video';
						elseif( get_field('full_width_image') ): echo 'image';
						endif;
						?>"
						id="<?php $title = get_the_title(); echo strtolower(str_replace(' ', '-', $title)); ?>"
						href="<?php the_permalink(); ?>">

							<h2 class="title z-6"><?php the_title(); ?></h2>
							<?php if( get_field('full_width_video') ): ?>
								<video class="full-width-video fit-parent" autoplay loop>
									<source src="<?php the_field('full_width_video'); ?>">
								</video>
							<?php elseif( get_field('full_width_image') ): ?>
								<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('full_width_image'); ?>)"></div>
							<?php endif; ?>							
						
						</a>
						<?php endwhile; wp_reset_postdata(); ?>
						<!-- /loop through page_id=24 data -->						
						<!-- loop through page_id=29 data -->
						<?php $the_query_29 = new WP_Query('page_id=29');
							while ($the_query_29->have_posts()) : $the_query_29->the_post(); ?>
						<a class="page-block shadow text-decor-none 
						<?php if( get_field('full_width_video') ): echo 'video';
						elseif( get_field('full_width_image') ): echo 'image';
						endif;
						?>"
						id="<?php $title = get_the_title(); echo strtolower(str_replace(' ', '-', $title)); ?>"
						href="<?php the_permalink(); ?>">

							<h2 class="title z-6"><?php the_title(); ?></h2>
							<?php if( get_field('full_width_video') ): ?>
								<video class="full-width-video fit-parent" autoplay loop>
									<source src="<?php the_field('full_width_video'); ?>">
								</video>
							<?php elseif( get_field('full_width_image') ): ?>
								<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('full_width_image'); ?>)"></div>
							<?php endif; ?>							
						
						</a>
						<?php endwhile; wp_reset_postdata(); ?>
						<!-- /loop through page_id=29 data -->
						<!-- loop through page_id=26 data -->
						<?php $the_query_26 = new WP_Query('page_id=26');
							while ($the_query_26->have_posts()) : $the_query_26->the_post(); ?>
						<a class="page-block shadow text-decor-none 
						<?php if( get_field('full_width_video') ): echo 'video';
						elseif( get_field('full_width_image') ): echo 'image';
						endif;
						?>"
						id="<?php $title = get_the_title(); echo strtolower(str_replace(' ', '-', $title)); ?>"
						href="<?php the_permalink(); ?>">

							<h2 class="title z-6"><?php the_title(); ?></h2>
							<?php if( get_field('full_width_video') ): ?>
								<video class="full-width-video fit-parent" autoplay loop>
									<source src="<?php the_field('full_width_video'); ?>">
								</video>
							<?php elseif( get_field('full_width_image') ): ?>
								<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('full_width_image'); ?>)"></div>
							<?php endif; ?>
						
						</a>
						<?php endwhile; wp_reset_postdata(); ?>
						<!-- /loop through page_id=26 data -->
					</div>
				</div>
			</div>
		</section>

		<section id="section-3">
			<div class="container">
				<div class="row">
					<div class="who-we-are-wrapper float-left z-9">
						<div class="who-we-are editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
						<a class="btn btn-1" href="<?php echo get_permalink('31') ?>"><?php _e('More About Us', 'rkmachinery'); ?></a>
					</div>
				</div>
			</div>
			<div class="advanced-google-maps-wrapper w-100">
			<?php $the_query_locations = new WP_Query( array( 'post_type' => 'locations_posts' ) );                  
			if ( $the_query_locations->have_posts() ) : ?>
				<!-- loop through custom post type 'locations' -->

				<div class="gradient gradient-top"></div>
				<div class="gradient gradient-bottom"></div>
				<div class="gradient gradient-left"></div>
				<div class="acf-map">
			    <?php while ( $the_query_locations->have_posts() ) : $the_query_locations->the_post();
			    	$location = get_field('location_address');?>
			    	<div class="marker" href="<?php the_permalink(); ?>" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"><div class="hidden"></div></div>
			    <?php endwhile; wp_reset_postdata(); ?>
				</div>

				<!-- /loop through custom post type 'locations' -->
			<?php endif; ?>
			</div>
		</section>

		<section class="z-6" id="section-4">
			<div class="container">
				<div class="row">					
					<?php $the_query_news = new WP_Query( array(
						'post_type'	=> 'news_posts',
						'posts_per_page'	=> '3',
					) );                  
					if ( $the_query_news->have_posts() ) : ?>
					<!-- loop through custom post type 'news' -->

					<h2><?php echo get_the_title('33'); ?></h2>
					<div class="news-block-wrapper flex-hor-c">
				    <?php while ( $the_query_news->have_posts() ) : $the_query_news->the_post(); ?>   
				        <a class="news-block shadow text-decor-none
				        <?php if( get_field('thumbnail_video') ): echo 'video';
						elseif( get_field('thumbnail_image') ): echo 'image';
						endif; ?>"
						href="<?php the_permalink(); ?>">
							
							<div class="title-and-date z-6">
								<h5 class="title"><?php the_title(); ?></h5>
								<h6 class="news-post-date"><?php echo get_the_date('F d, Y'); ?></h6>
							</div>
							<?php if( get_field('thumbnail_video') ): ?>
								<video class="full-width-video fit-parent" autoplay loop>
									<source src="<?php the_field('thumbnail_video'); ?>">
								</video>
							<?php elseif( get_field('thumbnail_image') ): ?>
								<div class="full-width-img fit-parent section-bg"  style="background-image: url(<?php the_field('thumbnail_image'); ?>)"></div>
							<?php endif; ?>

						</a>
				    <?php endwhile; wp_reset_postdata(); ?>
					</div>
					<a class="btn btn-1" href="<?php echo get_permalink('33') ?>"><?php _e('View All News', 'rkmachinery'); ?></a>

					<!-- /loop through custom post type 'news' -->
					<?php endif; ?>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>