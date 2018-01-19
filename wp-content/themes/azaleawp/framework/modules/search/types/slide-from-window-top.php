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
        $classes[] = 'eltdf-search-slides-from-window-top';

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
	
	add_action( 'azalea_eltdf_before_page_header', 'azalea_eltdf_get_search');
}

if ( ! function_exists('azalea_eltdf_load_search_template') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function azalea_eltdf_load_search_template() {
        $search_in_grid = azalea_eltdf_options()->getOptionValue('search_in_grid') == 'yes' ? true : false;
        $search_icon = '';
        $search_icon_close = '';
        
        if ( azalea_eltdf_options()->getOptionValue('search_icon_pack') !== '' ) {
            $search_icon .= azalea_eltdf_icon_collections()->getSearchIcon( azalea_eltdf_options()->getOptionValue('search_icon_pack'), true );
            $search_icon_close .= azalea_eltdf_icon_collections()->getSearchClose( azalea_eltdf_options()->getOptionValue('search_icon_pack'), true );
        }

        $parameters = array(
            'search_in_grid'		=> $search_in_grid,
            'search_icon'			=> $search_icon,
            'search_icon_close'		=> $search_icon_close
        );
	    
        azalea_eltdf_get_module_template_part('templates/types/slide-from-window-top', 'search', '', $parameters);
    }
}