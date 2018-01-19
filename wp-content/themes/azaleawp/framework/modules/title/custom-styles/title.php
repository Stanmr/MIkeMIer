<?php

if (!function_exists('azalea_eltdf_title_area_typography_style')) {

    function azalea_eltdf_title_area_typography_style(){

        // title default/small style
	    
	    $item_styles = azalea_eltdf_get_typography_styles('page_title');
	
	    $item_selector = array(
		    '.eltdf-title .eltdf-title-holder .eltdf-page-title'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
	
	    // subtitle style
	
	    $item_styles = azalea_eltdf_get_typography_styles('page_subtitle');
	
	    $item_selector = array(
		    '.eltdf-title .eltdf-title-holder .eltdf-subtitle'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
	
	    // breadcrumb style
	
	    $item_styles = azalea_eltdf_get_typography_styles('page_breadcrumb');
	
	    $item_selector = array(
		    '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs a',
		    '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs span'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
	    

	    $breadcrumb_hover_color = azalea_eltdf_options()->getOptionValue('page_breadcrumb_hovercolor');
	    
        $breadcrumb_hover_styles = array();
        if(!empty($breadcrumb_hover_color)) {
            $breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
        }

        $breadcrumb_hover_selector = array(
            '.eltdf-title .eltdf-title-holder .eltdf-breadcrumbs a:hover'
        );

        echo azalea_eltdf_dynamic_css($breadcrumb_hover_selector, $breadcrumb_hover_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_title_area_typography_style');
}