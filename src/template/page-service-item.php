<?php /* Template Name: Service Item */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow">
				<?php if( get_field('text-fwiv') ): ?>
				<div class="text z-6 container">
					<div class="row editor-wrapper">
						<?php the_field('text-fwiv'); ?>
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
				<?php get_template_part('breadcrumbs'); ?>				
				<div class="row">
					<div class="slider-and-content-wrapper flex-hor-c">
						<div class="slider-wrapper">
							<?php 

							$images = get_field('image_gallery');

							if( $images ): ?>
							    <ul class="lightslider">
							        <?php foreach( $images as $image ): ?>
							            <li class="lightslider-item section-bg" style="background-image: url(<?php echo $image['url']; ?>)";></li>
							        <?php endforeach; ?>
							    </ul>
							<?php endif; ?>
						</div>
						<div class="title-and-content">
							<div class="title">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="page-content editor-wrapper">
								<?php the_field('page_content'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="section-3">
			<div class="container">
				<div class="row">
					<video class="content-width-video w-100">
						<source src="<?php the_field('content_width_video'); ?>">
					</video>					
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>