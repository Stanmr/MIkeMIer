<?php

if(!function_exists('azalea_eltdf_disable_wpml_css')) {
    function azalea_eltdf_disable_wpml_css() {
	    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    }

	add_action('after_setup_theme', 'azalea_eltdf_disable_wpml_css');
}