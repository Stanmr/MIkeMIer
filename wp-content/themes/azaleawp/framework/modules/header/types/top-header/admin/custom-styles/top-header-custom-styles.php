<?php

if ( ! function_exists( 'azalea_eltdf_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function azalea_eltdf_header_top_bar_styles() {
		$top_header_height = azalea_eltdf_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo azalea_eltdf_dynamic_css( '.eltdf-top-bar', array( 'height' => azalea_eltdf_filter_px( $top_header_height ) . 'px' ) );
			echo azalea_eltdf_dynamic_css( '.eltdf-top-bar .eltdf-logo-wrapper a', array( 'max-height' => azalea_eltdf_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo azalea_eltdf_dynamic_css( '.eltdf-top-bar-background', array( 'height' => azalea_eltdf_get_top_bar_background_height() . 'px' ) );
		
		if ( azalea_eltdf_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.eltdf-top-bar .eltdf-grid .eltdf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = azalea_eltdf_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = azalea_eltdf_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = azalea_eltdf_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo azalea_eltdf_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = azalea_eltdf_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = azalea_eltdf_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( azalea_eltdf_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = azalea_eltdf_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = azalea_eltdf_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo azalea_eltdf_dynamic_css( '.eltdf-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( azalea_eltdf_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo azalea_eltdf_dynamic_css( '.eltdf-top-bar', $top_bar_styles );
	}
	
	add_action( 'azalea_eltdf_style_dynamic', 'azalea_eltdf_header_top_bar_styles' );
}