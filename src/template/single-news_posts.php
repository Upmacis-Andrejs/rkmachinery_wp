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
							<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
							<div class="tweet">
								<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="true" target="_blank">Tweet</a>
								<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
							<div class="fb-share">
								<!-- Load Facebook SDK for JavaScript -->
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								  <!-- Your share button code -->
								<div class="fb-share-button" data-href="http://rkmachinery/?news_posts=upb-engineers-receive-awards-construction-industry-grand-awards-4" data-layout="box_count" data-size="large" data-mobile-iframe="false"></div>
							</div>
							<?php endwhile; endif; ?>
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
