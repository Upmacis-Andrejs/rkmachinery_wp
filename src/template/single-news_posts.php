<?php /* Template Name: News Item */ ?>

<?php get_header(); ?>

	<main id="site-content">
	<!-- section -->
	<section id="section-1">
		<div class="container">
			<div class="row">
				<div class="slider-and-content-wrapper flex-hor-c">
					<div class="slider-wrapper">
						<?php 

						$images = get_field('image_gallery');

						if( $images ): ?>
						    <ul class="bxslider">
						        <?php foreach( $images as $image ): ?>
						            <li class="bxslider-item section-bg" style="background-image: url(<?php echo $image['url']; ?>)";></li>
						        <?php endforeach; ?>
						    </ul>
						<?php endif; ?>
					</div>
					<div class="title-and-content">
						<div class="date-and-title">
							<h6><?php the_date('F d, Y'); ?></h6>
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="page-content editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
					</div>
					<button class="btn btn-1 go-back"><?php _e('Back', 'rkmachinery'); ?></button>
				</div>
			</div>
		</div>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
