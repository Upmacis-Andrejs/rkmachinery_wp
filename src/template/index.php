<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<div class="container">
				<div class="row">

					<h1><?php _e( 'Latest Posts', 'rkmachinery' ); ?></h1>

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<!-- article -->
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<!-- post thumbnail -->
							<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
								</a>
							<?php endif; ?>
							<!-- /post thumbnail -->

							<!-- post title -->
							<h2>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h2>
							<!-- /post title -->

							<!-- post details -->
							<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
							<!-- /post details -->

							<?php rkmachinery_wp_excerpt('rkmachinery_wp_index'); // Build your custom callback length in functions.php ?>

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

					<!-- pagination -->
					<div class="pagination">
						<?php rkmachinery_wp_pagination(); ?>
					</div>
					<!-- /pagination -->

				</div>	
			</div>		
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
