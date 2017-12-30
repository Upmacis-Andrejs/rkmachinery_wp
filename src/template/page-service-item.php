<?php /* Template Name: Service Item */ ?>

<?php get_header(); ?>

	<main id="site-content">
	<!-- section -->
	<section>
		<div class="container">
			<div class="row">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</a>
					<?php endif; ?>
					<!-- /post thumbnail -->

					<!-- post title -->
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h1>
					<!-- /post title -->

					<!-- post details -->
					<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					<span class="author"><?php _e( 'Published by', 'rkmachinery' ); ?> <?php the_author_posts_link(); ?></span>
					<!-- /post details -->

					<?php the_content(); // Dynamic Content ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'rkmachinery' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</div>
		</div>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
