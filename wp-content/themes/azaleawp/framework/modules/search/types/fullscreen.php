<?php

if( !function_exists('azalea_eltdf_search_body_class') ) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function azalea_eltdf_search_body_class($classes) {
        $classes[] = 'eltdf-fullscreen-search';
        $classes[] = 'eltdf-search-fade';

        return $classes;
    }

    add_filter('body_class', 'azalea_eltdf_search_body_class');
}

if ( ! function_exists('azalea_eltdf_get_search') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function azalea_eltdf_get_search() {
        azalea_eltdf_load_search_template();
    }

    add_action('azalea_eltdf_before_page_header', 'azalea_eltdf_get_search');
}

if ( ! function_exists('azalea_eltdf_load_search_template') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function azalea_eltdf_load_search_template() {
        azalea_eltdf_get_module_template_part('templates/types/fullscreen', 'search');
    }
}