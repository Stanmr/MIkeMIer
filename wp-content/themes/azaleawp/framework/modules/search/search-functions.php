<?php

if( !function_exists('azalea_eltdf_load_search') ) {
    function azalea_eltdf_load_search() {
        $search_type_meta = azalea_eltdf_options()->getOptionValue('search_type');
	    $search_type = !empty($search_type_meta) ? $search_type_meta : 'fullscreen';
	    
        if ( azalea_eltdf_active_widget( false, false, 'eltdf_search_opener' ) ) {
            include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '.php';
        }
    }

    add_action('init', 'azalea_eltdf_load_search');
}