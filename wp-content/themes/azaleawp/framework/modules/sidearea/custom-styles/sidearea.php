<?php

if (!function_exists('azalea_eltdf_side_area_slide_from_right_type_style')) {

	function azalea_eltdf_side_area_slide_from_right_type_style()	{
		$width = azalea_eltdf_options()->getOptionValue('side_area_width');
		
		if ($width !== '') {
			echo azalea_eltdf_dynamic_css('.eltdf-side-menu-slide-from-right .eltdf-side-menu', array(
				'right' => '-'.azalea_eltdf_filter_px($width) . 'px',
				'width' => azalea_eltdf_filter_px($width) . 'px'
			));
		}
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_side_area_slide_from_right_type_style');
}

if (!function_exists('azalea_eltdf_side_area_icon_color_styles')) {

	function azalea_eltdf_side_area_icon_color_styles() {
		$icon_color             = azalea_eltdf_options()->getOptionValue('side_area_icon_color');
		$icon_hover_color       = azalea_eltdf_options()->getOptionValue('side_area_icon_hover_color');
		$close_icon_color       = azalea_eltdf_options()->getOptionValue('side_area_close_icon_color');
		$close_icon_hover_color = azalea_eltdf_options()->getOptionValue('side_area_close_icon_hover_color');
		
		$icon_hover_selector    = array(
			'.eltdf-side-menu-button-opener:hover',
			'.eltdf-side-menu-button-opener.opened'
		);
		
		if (!empty($icon_color)) {
			echo azalea_eltdf_dynamic_css('.eltdf-side-menu-button-opener', array(
				'color' => $icon_color
			));
		}

		if (!empty($icon_hover_color)) {
			echo azalea_eltdf_dynamic_css($icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			));
		}

		if (!empty($close_icon_color)) {
			echo azalea_eltdf_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu', array(
				'color' => $close_icon_color
			));
		}

		if (!empty($close_icon_hover_color)) {
			echo azalea_eltdf_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu:hover', array(
				'color' => $close_icon_hover_color
			));
		}
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_side_area_icon_color_styles');
}

if (!function_exists('azalea_eltdf_side_area_styles')) {
	function azalea_eltdf_side_area_styles() {
		
		$side_area_styles = array();
		$background_color = azalea_eltdf_options()->getOptionValue('side_area_background_color');
		$padding          = azalea_eltdf_options()->getOptionValue('side_area_padding');
		$text_alignment   = azalea_eltdf_options()->getOptionValue('side_area_aligment');

		if (!empty($background_color)) {
			$side_area_styles['background-color'] = $background_color;
		}

		if (!empty($padding)) {
			$side_area_styles['padding'] = esc_attr($padding);
		}
		
		if (!empty($text_alignment)) {
			$side_area_styles['text-align'] = $text_alignment;
		}

		if (!empty($side_area_styles)) {
			echo azalea_eltdf_dynamic_css('.eltdf-side-menu', $side_area_styles);
		}
		
		if($text_alignment === 'center') {
			echo azalea_eltdf_dynamic_css('.eltdf-side-menu .widget img', array(
				'margin' => '0 auto'
			));
		}
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_side_area_styles');
}