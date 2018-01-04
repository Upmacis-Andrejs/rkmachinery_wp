<?php /* Template Name: Gallery */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="container">
				<div class="row">
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="page-content editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
				</div>
			</div>
		</section>

		<section id="section-2">
			<div class="container">
				<div class="row">

					<?php if ( have_rows('gallery_repeater-content') ) : ?>
						<div class="gallery-title-block-wrapper">
						<?php
						// loop through the rows of data
						$customFieldGroupNumber = 0;
					    while ( have_rows('gallery_repeater-content') ) : the_row(); $customFieldGroupNumber++; ?>

					        <a class="gallery-title-block flex-hor-c
							<?php
								if ($customFieldGroupNumber == 1) : echo 'active';
								endif;
							?>"
							id="<?php echo 'gallery-title-block-' . $customFieldGroupNumber . ' '; ?>"
							href="#">
							    <h5 class="title"><?php the_sub_field('gallery_title'); ?></h5>
							</a>
						<?php endwhile; ?>
						</div>

						<div class="gallery-img-block-wrapper">
						<?php
						// loop through the rows of data
						$customFieldGroupNumber = 0;
					    while ( have_rows('gallery_repeater-content') ) : the_row(); $customFieldGroupNumber++; ?>

					        <div class="gallery-img-block flex-hor-c
							<?php
								if ($customFieldGroupNumber == 1) : echo 'active';
								endif;
								echo ' gallery-img-block-' . $customFieldGroupNumber . ' ';
							?>">
								<?php 

								$images = get_sub_field('gallery_img_items');

								if( $images ): ?>
									<?php foreach( $images as $image ): ?>
								    <div class="gallery-img-block-item section-bg" style="background-image: url(<?php echo $image['url']; ?>)"></div>
								    <?php endforeach; ?>
								<?php endif; ?>
							</div>

						<?php endwhile; ?>
						</div>
					<?php endif; ?>

				</div>
			</div>			
		</section>
	</main>

<?php get_footer(); ?>
