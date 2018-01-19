<?php

if(!function_exists('azalea_eltdf_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function azalea_eltdf_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'azalea_eltdf_theme_version_class');
}

if(!function_exists('azalea_eltdf_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function azalea_eltdf_boxed_class($classes) {
	    $allow_boxed_layout = true;
	    $allow_boxed_layout = apply_filters('azalea_eltdf_allow_content_boxed_layout', $allow_boxed_layout);
	
	    if($allow_boxed_layout && azalea_eltdf_get_meta_field_intersect('boxed') === 'yes') {
            $classes[] = 'eltdf-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'azalea_eltdf_boxed_class');
}

if(!function_exists('azalea_eltdf_paspartu_class')) {
    /**
     * Function that adds classes on body for paspartu layout
     */
    function azalea_eltdf_paspartu_class($classes) {

        //is paspartu layout turned on?
        if(azalea_eltdf_get_meta_field_intersect('paspartu') === 'yes') {
            $classes[] = 'eltdf-paspartu-enabled';

            if(azalea_eltdf_get_meta_field_intersect('disable_top_paspartu') === 'yes') {
                $classes[] = 'eltdf-top-paspartu-disabled';
            }
        }

        return $classes;
    }

    add_filter('body_class', 'azalea_eltdf_paspartu_class');
}

if(!function_exists('azalea_eltdf_smooth_page_transitions_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function azalea_eltdf_smooth_page_transitions_class($classes) {
		$id = azalea_eltdf_get_page_id();

        if(azalea_eltdf_get_meta_field_intersect('smooth_page_transitions',$id) == 'yes') {
            $classes[] = 'eltdf-smooth-page-transitions';

			if(azalea_eltdf_get_meta_field_intersect('page_transition_preloader',$id) == 'yes') {
				$classes[] = 'eltdf-smooth-page-transitions-preloader';
			}

			if(azalea_eltdf_get_meta_field_intersect('page_transition_fadeout',$id) == 'yes') {
				$classes[] = 'eltdf-smooth-page-transitions-fadeout';
			}

        }

        return $classes;
    }

    add_filter('body_class', 'azalea_eltdf_smooth_page_transitions_class');
}

if(!function_exists('azalea_eltdf_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function azalea_eltdf_content_initial_width_body_class($classes) {
		$initial_content_width = azalea_eltdf_options()->getOptionValue('initial_content_width');
		
        if(!empty($initial_content_width)) {
            $classes[] = $initial_content_width;
        }

        return $classes;
    }

    add_filter('body_class', 'azalea_eltdf_content_initial_width_body_class');
}