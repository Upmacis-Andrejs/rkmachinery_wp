<?php /* Template Name: Quality */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow jquery-background-video-wrapper">
				<?php if( get_field('text-fwiv') ): ?>
					<div class="z-6 container">
						<div class="row text">
							<div class="editor-wrapper">
								<?php the_field('text-fwiv'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('full_width_video') ): ?>
					<video class="full-width-video jquery-background-video" autoplay loop muted>
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
			</div>
		</section>

		<section id="section-3">
			<div class="container">
				<div class="row">
					<div class="slider-and-content-wrapper flex-hor-c">
						<div class="slider-and-gallery-wrapper">
							<div class="slider-wrapper">
								<?php 

								$images = get_field('image_gallery');

								if( $images ): ?>
								    <ul class="lightslider">
								        <?php foreach( $images as $image ): ?>
								            <li class="lightslider-item section-bg" data-thumb="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['url']; ?>)";></li>
								        <?php endforeach; ?>
								    </ul>
								<?php endif; ?>
							</div>
							<div class="gallery-img-block flex-hor-c">
								<?php 
								
								$images_gallery = get_field('gallery');

								if( $images_gallery ): ?>
						        <?php foreach( $images_gallery as $gallery_image ): ?>
						        	<div class="gallery-img-block-item-wrapper">
									    <a class="gallery-img-block-item icon-bg" href="<?php echo $gallery_image['url']; ?>" style="background-image: url(<?php echo $gallery_image['url']; ?>)" data-rel="lightcase:qualitySection" title="<?php echo $gallery_image['description']; ?>"></a>
									 </div>
						        <?php endforeach; ?>
						    	<?php endif; ?>
							</div>
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
	</main>

<?php get_footer(); ?>