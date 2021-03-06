<?php /* Template Name: Privacy Policy */ ?>

<?php get_header(); ?>

	<main id="site-content" class="pt-header-height">

		<section>
			<div class="container">
				<?php get_template_part('breadcrumbs'); ?>
			</div>
		</section>
		
		<section>
			<div class="container">
				<div class="row">

					<h1 class="title"><?php the_title(); ?></h1>
					<?php if( get_field('page_content') ): ?>
					<div class="page-content editor-wrapper">
						<?php the_field('page_content'); ?>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>