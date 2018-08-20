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

        <!--<meta name="google-site-verification" content="5GV3htbGte-ZaZ8Mp5ubMy2wfShvNOdhl1yn9VQ2cmo" />-->

        <?php wp_head(); ?>

        <script>
            /* Configuration for cookies plugin */
            const gaTrackingID = "UA-115770168-1";
            const messageText = "<?php _e('This website uses cookies to ensure you get the best experience on our website.', 'rkmachinery') ?>";
            const allowText = "<?php _e('Accept', 'rkmachinery') ?>";
            const denyText = "<?php _e('Decline', 'rkmachinery') ?>";
            const linkText = "<?php _e('Learn more', 'rkmachinery') ?>";
            const hrefToPrivacyPolicy = "<?php echo get_permalink('1082') ?>";

            var gaScriptAdded = false;

            // enable cookies function
            function enableCookies() {
                // add google analytics script if it has not been added before
                if( gaScriptAdded == false ) {
                    var googleAnalytics = document.createElement("script");
                    googleAnalytics.innerHTML = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', '"+gaTrackingID+"', 'auto');ga('send', 'pageview');";
                    document.head.appendChild(googleAnalytics);
                } else /* if google analytics script is already added, reload the page */ {
                    location.reload();
                }
                gaScriptAdded = true;

                // uncomment below for testing
                //document.cookie = "mansCookie=Mans Cookie";
                //var x = document.cookie;
                //console.log('cookies after enabling: '+x);
            }
            // delete cookies function
            window.cookieconsent.Popup.prototype.deleteCookies = function() {
                // list of essential cookies - set as an empty array to delete everything - i.e. var essential = [];
                var essential = ["cookieconsent_status"];

                // list of cookies with specific domain name that should be specified for deletion
                var cookiesWithDomain = ["_ga", "_gid", "_gat"];
                var theDomain = ".sem.lv";

                // uncomment below for testing
                //var x = document.cookie;
                //console.log('cookies before delete: '+x);

                // create array of cookies set
                var cookies = document.cookie.split(";");

                // loop through the cookies
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];

                    // remove spaces at the beginning of cookie name
                    while (cookie.charAt(0)==' ') {
                        cookie = cookie.substring(1,cookie.length);
                    }
                    // uncomment below for testing
                    //console.log('cookie:'+cookie);

                    // get the cookie name
                    var eqPos = cookie.indexOf("=");
                    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;

                    // delete all cookies except those listed in essential
                    if (essential === undefined || essential.length == 0 || essential.indexOf(name) == -1) {
                        // note assuming path is always = '/'

                        // set specific domain for previously defined cookies in "cookiesWithDomain". Do not set domain for others
                        if (cookiesWithDomain === undefined || cookiesWithDomain.length == 0 || cookiesWithDomain.indexOf(name) == -1) {
                            document.cookie = name + "=;  path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT;";
                        } else {
                            document.cookie = name + "=;  path=/; domain="+theDomain+"; expires=Thu, 01 Jan 1970 00:00:00 GMT;";
                        }

                        // uncomment below for testing
                        //console.log('deleting cookie:'+name);
                    }
                }

                // uncomment below for testing
                //var x = document.cookie;
                //console.log('cookies after delete: '+x);
            };

            window.addEventListener("load", function() {
                window.cookieconsent.initialise({
                    "position": "bottom-right",
                    "type": "opt-in",
                    "revokable": true,
                    content: {
                      message: messageText,
                      allow: allowText,
                      deny: denyText,
                      link: linkText,
                      href: hrefToPrivacyPolicy,
                    },

                    onInitialise: function (status) {
                      var type = this.options.type;
                      var didConsent = this.hasConsented();
                        var x = document.cookie;
                        console.log('cookies on init: '+x);
                      if (type == 'opt-in' && didConsent) {
                        // uncomment below for testing
                        //console.log('add cookies on initialise');
                        enableCookies();
                      }
                    },
                     
                    onStatusChange: function(status, chosenBefore) {
                      var type = this.options.type;
                      var didConsent = this.hasConsented();
                      if (type == 'opt-in' && didConsent) {
                        // uncomment below for testing
                        //console.log('add cookies on status change');
                        enableCookies();
                      }
                    },
                     
                    onRevokeChoice: function() {
                      var type = this.options.type;
                      if (type == 'opt-in') {
                        // uncomment below for testing
                        //console.log('revoke choice');
                        this.deleteCookies();
                      }
                    }
                });
            });
        </script>
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
