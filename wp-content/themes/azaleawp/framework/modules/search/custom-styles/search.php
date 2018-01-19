<?php

if (!function_exists('azalea_eltdf_search_opener_icon_size')) {
	function azalea_eltdf_search_opener_icon_size() {
		$icon_size = azalea_eltdf_options()->getOptionValue('header_search_icon_size');
		
		if (!empty($icon_size)) {
			echo azalea_eltdf_dynamic_css('.eltdf-search-opener', array(
				'font-size' => azalea_eltdf_filter_px($icon_size) . 'px'
			));
		}
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_search_opener_icon_size');
}

if (!function_exists('azalea_eltdf_search_opener_icon_colors')) {
	function azalea_eltdf_search_opener_icon_colors() {
		$icon_color       = azalea_eltdf_options()->getOptionValue('header_search_icon_color');
		$icon_hover_color = azalea_eltdf_options()->getOptionValue('header_search_icon_hover_color');
		
		if (!empty($icon_color)) {
			echo azalea_eltdf_dynamic_css('.eltdf-search-opener', array(
				'color' => $icon_color
			));
		}

		if (!empty($icon_hover_color)) {
			echo azalea_eltdf_dynamic_css('.eltdf-search-opener:hover', array(
				'color' => $icon_hover_color
			));
		}
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_search_opener_icon_colors');
}

if (!function_exists('azalea_eltdf_search_opener_text_styles')) {
	function azalea_eltdf_search_opener_text_styles() {
		$item_styles = azalea_eltdf_get_typography_styles('search_icon_text');
		
		$item_selector = array(
			'.eltdf-search-icon-text'
		);
		
		echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
		
		$text_hover_color = azalea_eltdf_options()->getOptionValue('search_icon_text_color_hover');
		
		if (!empty($text_hover_color)) {
			echo azalea_eltdf_dynamic_css('.eltdf-search-opener:hover .eltdf-search-icon-text', array(
				'color' => $text_hover_color
			));
		}
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_search_opener_text_styles');
}