<?php

if(!function_exists('azalea_eltdf_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function azalea_eltdf_footer_top_general_styles() {
        $item_styles = array();
        $background_color = azalea_eltdf_options()->getOptionValue('footer_top_background_color');

        if(!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo azalea_eltdf_dynamic_css('.eltdf-page-footer .eltdf-footer-top-holder', $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_footer_top_general_styles');
}

if(!function_exists('azalea_eltdf_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function azalea_eltdf_footer_bottom_general_styles() {
        $item_styles = array();
	    $background_color = azalea_eltdf_options()->getOptionValue('footer_bottom_background_color');
	
	    if(!empty($background_color)) {
		    $item_styles['background-color'] = $background_color;
	    }

        echo azalea_eltdf_dynamic_css('.eltdf-page-footer .eltdf-footer-bottom-holder', $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_footer_bottom_general_styles');
}