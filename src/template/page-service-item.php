<?php /* Template Name: Service Item */ ?>

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
					<video class="full-width-video jquery-background-video video-play-only-on-desktop" autoplay loop muted preload="metadata">
						<source src="<?php the_field('full_width_video'); ?>">
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
		<section id="section-3">
			<div class="container">		
				<div class="row">
					<div class="slider-and-content-wrapper flex-hor-c">
						<div class="slider-wrapper">
							<?php 

							$images = get_field('image_gallery');

							if( $images ): ?>
							    <ul class="lightslider">
							        <?php foreach( $images as $image ): ?>
							            <li class="lightslider-item section-bg" style="background-image: url(<?php echo $image['sizes']['gallery']; ?>)";></li>
							        <?php endforeach; ?>
							    </ul>
							<?php endif; ?>
						</div>
						<div class="title-and-content">
							<div class="title-block bg-default table">
								<h1 class="title td"><?php the_title(); ?></h1>
							</div>
							<div class="page-content editor-wrapper">
								<?php the_field('page_content'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php if( get_field('content_width_video') ) : ?> 
		<section id="section-3">
			<div class="container">
				<div class="row">
					<div class="cw-video-wrapper jquery-background-video-wrapper">
						<video class="content-width-video video-play jquery-background-video no-autoplay w-100 z-9" preload="metadata">
							<source src="<?php the_field('content_width_video'); ?>">
						</video>
						<button class="btn-play z-66"></button>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
	</main>

<?php get_footer(); ?>