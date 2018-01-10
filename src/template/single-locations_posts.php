<?php /* Template Name: Locations Item */ ?>

<?php get_header(); ?>

	<main id="site-content" class="flex-grow flex-vert-c">
	<!-- section -->
	<section id="section-1">
		<div class="location-info-wrapper flex">
	        <div class="location-img-block w-50 max-h-100">

				<?php if( get_field('thumbnail_video') ): ?>
					<video class="fit-parent" autoplay loop muted>
						<source src="<?php the_field('thumbnail_video'); ?>">
					</video>
				<?php elseif( get_field('thumbnail_image') ): ?>
					<div class="fit-parent icon-bg"  style="background-image: url(<?php the_field('thumbnail_image'); ?>)"></div>
				<?php endif; ?>

			</div>
			<div class="location-text-wrapper flex-vert-c w-50">
				<div class="location-text-inner">
					<h1><?php the_title(); ?></h1>
					<div class="editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
