<?php /* Template Name: Quality */ ?>

<?php get_header(); ?>

	<main id="site-content">
		<section id="section-1">
			<div class="full-width-img-video-wrapper shadow jquery-background-video-wrapper
			<?php if( get_field('full_width_video') ): echo ' video loading';
			elseif( get_field('full_width_image') ): echo ' image';
			endif;
			?>" id="video-loader-animation-wrapper">
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
					<video class="full-width-video jquery-background-video no-autoplay video-play-only-on-desktop" id="video-loader-animation" preload="metadata">
						<source src="<?php the_field('full_width_video'); ?>#t=0.5">
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
						<div class="slider-and-gallery-wrapper">
							<div class="slider-wrapper">
								<?php 

								$images = get_field('image_gallery');

								if( $images ): ?>
								    <ul class="lightslider cS-hidden" id="lightSlider">
								        <?php foreach( $images as $image ): ?>
								            <li class="lightslider-item section-bg" data-thumb="<?php echo $image['url']; ?>" style="background-image: url(<?php echo $image['sizes']['gallery']; ?>)";></li>
								        <?php endforeach; ?>
								    </ul>
								<?php endif; ?>
							</div>
							<div class="gallery-img-block photoswipe-wrapper flex-hor-c">
								<?php 
								
								$images_gallery = get_field('gallery');

								if( $images_gallery ): ?>
						        <?php foreach( $images_gallery as $gallery_image ): ?>
						        	<figure class="gallery-img-block-item-wrapper">
									    <a class="gallery-img-block-item" href="<?php echo $gallery_image['url']; ?>" data-size="<?php echo $gallery_image['width']; ?>x<?php echo $gallery_image['height']; ?>">
											<div class="block-fit-parent icon-bg" style="background-image: url(<?php echo $gallery_image['sizes']['quality']; ?>);" data-src="<?php echo $gallery_image['sizes']['quality']; ?>" >
									    </a>
										<figcaption class="visuallyhidden"><?php echo $gallery_image['description']; ?></figcaption>	
									 </figure>
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

	<!-- PhotoSwipe. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="pswp__bg"></div>
	    <div class="pswp__scroll-wrap">
	        <div class="pswp__container">
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	        </div>
	        <div class="pswp__ui pswp__ui--hidden">
	            <div class="pswp__top-bar">
	                <div class="pswp__counter"></div>
	                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
	                <button class="pswp__button pswp__button--share" title="Share"></button>
	                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
	                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
	                <div class="pswp__preloader">
	                    <div class="pswp__preloader__icn">
	                      <div class="pswp__preloader__cut">
	                        <div class="pswp__preloader__donut"></div>
	                      </div>
	                    </div>
	                </div>
	            </div>
	            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	                <div class="pswp__share-tooltip"></div> 
	            </div>
	            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
	            </button>
	            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
	            </button>
	            <div class="pswp__caption">
	            	<div class="container pswp__caption__center"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /PhotoSwipe. -->

<?php get_footer(); ?>