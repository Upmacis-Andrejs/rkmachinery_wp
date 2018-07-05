<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
        <!-- Google Analytics -->
        <script  type="opt-in" data-type="application/javascript" data-name="analytics">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-115770168-1', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
        <meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta name="format-detection" content="telephone=no">
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

        <script type="text/javascript">
            // Privacy policy page link for cookies plugin
            window.privacy_policy_page = "<?php echo get_the_permalink('1082'); ?>";
            // Transform lang attribute value for cookies plugin
            window.lang_attr = document.documentElement.lang.replace('-', '_');
        </script>

        <script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/klaro/config.js"></script>
        <script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/klaro/klaro.js"></script>


        <!--<meta name="google-site-verification" content="5GV3htbGte-ZaZ8Mp5ubMy2wfShvNOdhl1yn9VQ2cmo" />-->

        <?php wp_head(); ?>

	</head>
	<body <?php body_class('opacity-0'); ?>>

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
			<header class="clear flex-vert-c opacity-0" id="site-header">
                <div class="container">
                    <div class="row flex-vert-c">

                            <a class="visuallyhidden" id="template-dir-uri-img" href="<?php echo get_template_directory_uri(); ?>/img/"></a>
    						<a id="main-site-logo" href="<?php echo home_url(); ?>">
    							<img src="<?php echo get_template_directory_uri(); ?>/img/site-logo-black.svg" alt="Site Logo">
    						</a>
                            <a id="mobile-menu-icon" href="#">
                                <div class="inner">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <div class="wrapper-for-mobile-menu">
                                <div class="inner flex-vert-c">
                					<nav class="nav">
                						<?php rkmachinery_nav(); ?>
                					</nav>
                                    <div class="lang-switcher-wrapper">
                                       <?php echo apply_filters('rkmachinery_lang_switcher', ''); ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
			</header>
			<!-- /header -->
