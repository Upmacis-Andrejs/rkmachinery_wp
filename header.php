<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta name="format-detection" content="telephone=no">
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- add link to fonts CDN -->		

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

    <!--[if lte IE 9]>
    <div id="update_browser_fake_body">
        <div id="update_browser_container">
            <div id="update_browser">
                <div id="update_browser_inner">
                    <h1>Please update your browser!</h1>
                    <p>You are using old browser version, which is not technically supported. That way some functions maybe are not available or aren't working right. Using information below please update or use another browser. </p>
                    <p>Free browsers - all browsers provide the same base functions and are easy to use. Choose which browser do you want to download:</p>
                    <div id="browser_icon_wrap" class="clear">
                        <a href="http://www.mozilla.org/en-US/firefox/new/" id="firefox" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Mozilla Firefox</span>
                        </a>
                        <a href="https://www.google.com/intl/en/chrome/browser/" id="chrome" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Google Chrome</span>
                        </a>
                        <a href="http://www.opera.com/" id="opera" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Opera</span>
                        </a>
                        <a href="https://safari.en.softonic.com/" id="safari" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Safari</span>
                        </a>
                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge" id="edge" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Microsoft Edge</span>
                        </a>
                    </div>
                    <div id="close_announcement_wrap">
                        <a href="#" id="close_announcement">Aizvērt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <![endif]-->

		<!-- wrapper -->
		<div class="wrapper 
            <?php if( get_field('full_width_video') ): echo ' video';
                elseif( get_field('full_width_image') ): echo ' image';
                else: echo 'header-relative';
                endif; ?>"
            id="body-wrapper">

			<!-- header -->
			<header class="z-99 clear" id="site-header">
                <div class="container">
                    <div class="row flex">

                            <a class="visuallyhidden" id="template-dir-uri-img" href="<?php echo get_template_directory_uri(); ?>/img/"></a>
    						<a id="main-site-logo" href="<?php echo home_url(); ?>">
    							<img src="<?php
                                    if( get_field('full_width_video') || get_field('full_width_image') ): the_field('site_logo_with_bg', 'option');
                                    else: the_field('site_logo_wo_bg', 'option');
                                    endif; ?>"
                                alt="Site Logo">
    						</a>
        					<nav class="nav">
        						<?php rkmachinery_nav(); ?>
        					</nav>
                            <?php echo apply_filters('rkmachinery_lang_switcher', ''); ?>

                    </div>
                </div>
			</header>
			<!-- /header -->
