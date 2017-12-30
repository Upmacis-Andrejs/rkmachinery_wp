<?php /* Template Name: Service */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<!-- section -->
		<section>
			<div class="container">
				<div class="row">

					<h1><?php the_title(); ?></h1>

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'rkmachinery' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>

				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
