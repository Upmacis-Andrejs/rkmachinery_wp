<?php /* Template Name: News Item */ ?>

<?php get_header(); ?>

	<main id="site-content">
	<!-- section -->
	<section id="section-1">
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
						<div class="date-and-title">
							<h6><?php the_date('F d, Y'); ?></h6>
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="page-content editor-wrapper">
							<?php the_field('page_content'); ?>
						</div>
						<div class="share-buttons">
							<div class="tweet">
								<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="true" target="_blank">Tweet</a>
								<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
							<div class="fb-share">
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true">
									<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a>
								</div>
							</div>
						</div>
						<button class="btn btn-1 go-back"><?php _e('Back', 'rkmachinery'); ?></button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
