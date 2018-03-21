<?php /* Template Name: Contacts */ ?>

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
					<div class="map-and-content-wrapper flex-hor-c">
						<div class="contacts-map-wrapper">
							<?php /* address for embedded google maps */
						  		$address_1 = get_field('company_address_1', 'option');
								$address_1_formatted = str_replace(' ', '+', $address_1);
								$address_2 = get_field('company_address_2', 'option');
								$address_2_formatted = str_replace(' ', '+', $address_2);
								$address_formatted = $address_1_formatted . '+' . $address_2_formatted;
							    $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
								    $address_formatted_more = str_replace(array_keys($transliterationTable), array_values($transliterationTable), $address_formatted);
								    $address_formatted_more = str_replace('street', 'iela', $address_formatted_more); 
							?>
				    		<iframe
				    		  class="block-fit-parent fit-parent"
							  style="border:0"
							  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyACx2rbE97_12vObp9zlhmTcBcm9xV77kI&q=<?php
									echo $address_formatted_more ?>"
							  allowfullscreen>
							</iframe>
						</div>
						<div class="title-and-content">
							<div class="title-block bg-default table">
								<h1 class="title td"><?php the_title(); ?></h1>
							</div>
							<div class="main-contacts">
								<h6 class="company-name"><?php the_field('company_name', 'option'); ?></h6>
								<ul class="main-contacts-list company-address-list list-style-none">
									<li class="company-address-1"><?php echo $address_1; ?></li>
									<li class="company-address-2"><?php echo $address_2; ?></li>
									<li class="get-directions-wrapper">
										<a class="get-directions" href="<?php the_field('get_directions_link', 'options'); ?>" target="_blank" rel="nofollow">
											<span class="before"></span>
											<?php _e('Get directions', 'rkmachinery') ?>
										</a>
									</li>
								</ul>
								<ul class="main-contacts-list company-contacts-list list-style-none">
									<li class="company-phone-wrapper">
										<span><?php _e('Phone', 'rkmachinery'); ?>:</span>
										<a class="company-phone text-decor-none" href="tel:<?php $phone = get_field('company_phone', 'option'); echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
									</li>
									<li class="company-fax-wrapper">
										<span><?php _e('Fax', 'rkmachinery'); ?>:</span>
										<a class="company-fax text-decor-none" hef="fax:<?php $fax = get_field('company_fax', 'option'); echo str_replace(' ', '', $fax); ?>"><?php echo $fax; ?></a>
									</li>
									<li class="company-email-wrapper">
										<span><?php _e('E-mail', 'rkmachinery'); ?>:</span>
										<a class="company-email text-decor-none" href="mailto:<?php the_field('company_e-mail', 'option'); ?>"><?php the_field('company_e-mail', 'option'); ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>		
	</main>

<?php get_footer(); ?>
