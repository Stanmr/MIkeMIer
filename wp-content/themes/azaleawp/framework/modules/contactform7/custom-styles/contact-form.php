<?php
if(!function_exists('azalea_eltdf_contact_form7_text_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function azalea_eltdf_contact_form7_text_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = azalea_eltdf_get_typography_styles('cf7_style_1_text');

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_background_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_background_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		$border_width = azalea_eltdf_options()->getOptionValue('cf7_style_1_border_width');
		if($border_width !== ''){
			$styles['border-width'] = azalea_eltdf_filter_px($border_width) . 'px';
		}

		$border_radius = azalea_eltdf_options()->getOptionValue('cf7_style_1_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = azalea_eltdf_filter_px($border_radius) . 'px';
		}

		$padding_top = azalea_eltdf_options()->getOptionValue('cf7_style_1_padding_top');
		if($padding_top !== ''){
			$styles['padding-top'] = azalea_eltdf_filter_px($padding_top) . 'px';
		}

		$padding_right = azalea_eltdf_options()->getOptionValue('cf7_style_1_padding_right');
		if($padding_right !== ''){
			$styles['padding-right'] = azalea_eltdf_filter_px($padding_right) . 'px';
		}

		$padding_bottom = azalea_eltdf_options()->getOptionValue('cf7_style_1_padding_bottom');
		if($padding_bottom !== ''){
			$styles['padding-bottom'] = azalea_eltdf_filter_px($padding_bottom) . 'px';
		}

		$padding_left = azalea_eltdf_options()->getOptionValue('cf7_style_1_padding_left');
		if($padding_left !== ''){
			$styles['padding-left'] = azalea_eltdf_filter_px($padding_left) . 'px';
		}

		$margin_top = azalea_eltdf_options()->getOptionValue('cf7_style_1_margin_top');
		if($margin_top !== ''){
			$styles['margin-top'] = azalea_eltdf_filter_px($margin_top) . 'px';
		}

		$margin_bottom = azalea_eltdf_options()->getOptionValue('cf7_style_1_margin_bottom');
		if($margin_bottom !== ''){
			$styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom) . 'px';
		}

		if(azalea_eltdf_options()->getOptionValue('cf7_style_1_textarea_height')) {
			$textarea_height = azalea_eltdf_options()->getOptionValue('cf7_style_1_textarea_height');
			echo azalea_eltdf_dynamic_css(
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
			array('height' => azalea_eltdf_filter_px($textarea_height).'px')
			);
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_text_styles_1');
}

if(!function_exists('azalea_eltdf_contact_form7_focus_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function azalea_eltdf_contact_form7_focus_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles = array();

		$color = azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_text_color');
		if($color !== ''){
			$styles['color'] = $color;
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus::-webkit-input-placeholder',
					'.cf7_custom_style_1 textarea:focus::-webkit-input-placeholder'
				),
				array('color' => $color)
			);
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus:-moz-placeholder',
					'.cf7_custom_style_1 textarea:focus:-moz-placeholder'
				),
				array('color' => $color)
			);
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus::-moz-placeholder',
					'.cf7_custom_style_1 textarea:focus::-moz-placeholder'
				),
				array('color' => $color)
			);
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_1 input:focus:-ms-input-placeholder',
					'.cf7_custom_style_1 textarea:focus:-ms-input-placeholder'
				),
				array('color' => $color)
			);
		}

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_background_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_background_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_focus_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_focus_styles_1');
}

if(!function_exists('azalea_eltdf_contact_form7_label_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function azalea_eltdf_contact_form7_label_styles_1() {
		$item_styles = azalea_eltdf_get_typography_styles('cf7_style_1_label');
		
		$item_selector = array(
			'.cf7_custom_style_1 p'
		);
		
		echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_label_styles_1');
}

if(!function_exists('azalea_eltdf_contact_form7_button_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function azalea_eltdf_contact_form7_button_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = azalea_eltdf_get_typography_styles('cf7_style_1_button');
		
		$height = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_height');
		if($height !== ''){
			$styles['padding-top'] = '0';
			$styles['padding-bottom'] = '0';
			$styles['height'] = azalea_eltdf_filter_px($height) . 'px';
			$styles['line-height'] = azalea_eltdf_filter_px($height) . 'px';
		}

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_button_background_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_background_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_button_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		$border_width = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_border_width');
		if($border_width !== ''){
			$styles['border-width'] = azalea_eltdf_filter_px($border_width) . 'px';
		}

		$border_radius = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = azalea_eltdf_filter_px($border_radius) . 'px';
		}

		$padding_left_right = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_padding');
		if($padding_left_right !== ''){
			$styles['padding-left'] = azalea_eltdf_filter_px($padding_left_right) . 'px';
			$styles['padding-right'] = azalea_eltdf_filter_px($padding_left_right) . 'px';
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_button_styles_1');
}

if(!function_exists('azalea_eltdf_contact_form7_button_hover_styles_1')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function azalea_eltdf_contact_form7_button_hover_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles = array();

		$color = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_color');
		if($color !== ''){
			$styles['color'] = $color;
		}

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_bckg_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_bckg_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_bckg_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_1_button_hover_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_button_hover_styles_1');
}

if(!function_exists('azalea_eltdf_contact_form7_text_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function azalea_eltdf_contact_form7_text_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = azalea_eltdf_get_typography_styles('cf7_style_2_text');

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_background_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_background_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		$border_width = azalea_eltdf_options()->getOptionValue('cf7_style_2_border_width');
		if($border_width !== ''){
			$styles['border-width'] = azalea_eltdf_filter_px($border_width) . 'px';
		}

		$border_radius = azalea_eltdf_options()->getOptionValue('cf7_style_2_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = azalea_eltdf_filter_px($border_radius) . 'px';
		}

		$padding_top = azalea_eltdf_options()->getOptionValue('cf7_style_2_padding_top');
		if($padding_top !== ''){
			$styles['padding-top'] = azalea_eltdf_filter_px($padding_top) . 'px';
		}

		$padding_right = azalea_eltdf_options()->getOptionValue('cf7_style_2_padding_right');
		if($padding_right !== ''){
			$styles['padding-right'] = azalea_eltdf_filter_px($padding_right) . 'px';
		}

		$padding_bottom = azalea_eltdf_options()->getOptionValue('cf7_style_2_padding_bottom');
		if($padding_bottom !== ''){
			$styles['padding-bottom'] = azalea_eltdf_filter_px($padding_bottom) . 'px';
		}

		$padding_left = azalea_eltdf_options()->getOptionValue('cf7_style_2_padding_left');
		if($padding_left !== ''){
			$styles['padding-left'] = azalea_eltdf_filter_px($padding_left) . 'px';
		}

		$margin_top = azalea_eltdf_options()->getOptionValue('cf7_style_2_margin_top');
		if($margin_top !== ''){
			$styles['margin-top'] = azalea_eltdf_filter_px($margin_top) . 'px';
		}

		$margin_bottom = azalea_eltdf_options()->getOptionValue('cf7_style_2_margin_bottom');
		if($margin_bottom !== ''){
			$styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom) . 'px';
		}

		if(azalea_eltdf_options()->getOptionValue('cf7_style_2_textarea_height')) {
			$textarea_height = azalea_eltdf_options()->getOptionValue('cf7_style_2_textarea_height');
			echo azalea_eltdf_dynamic_css(
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
			array('height' => azalea_eltdf_filter_px($textarea_height).'px')
			);
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_text_styles_2');
}

if(!function_exists('azalea_eltdf_contact_form7_focus_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function azalea_eltdf_contact_form7_focus_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles = array();

		$color = azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_text_color');
		if($color !== ''){
			$styles['color'] = $color;
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus::-webkit-input-placeholder',
					'.cf7_custom_style_2 textarea:focus::-webkit-input-placeholder'
				),
				array('color' => $color)
			);
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus:-moz-placeholder',
					'.cf7_custom_style_2 textarea:focus:-moz-placeholder'
				),
				array('color' => $color)
			);
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus::-moz-placeholder',
					'.cf7_custom_style_2 textarea:focus::-moz-placeholder'
				),
				array('color' => $color)
			);
			echo azalea_eltdf_dynamic_css(
				array(
					'.cf7_custom_style_2 input:focus:-ms-input-placeholder',
					'.cf7_custom_style_2 textarea:focus:-ms-input-placeholder'
				),
				array('color' => $color)
			);
		}

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_background_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_background_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_focus_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_focus_styles_2');
}

if(!function_exists('azalea_eltdf_contact_form7_label_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function azalea_eltdf_contact_form7_label_styles_2() {
		$item_styles = azalea_eltdf_get_typography_styles('cf7_style_2_label');
		
		$item_selector = array(
			'.cf7_custom_style_2 p'
		);
		
		echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_label_styles_2');
}

if(!function_exists('azalea_eltdf_contact_form7_button_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function azalea_eltdf_contact_form7_button_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit'
		);
		
		$styles = azalea_eltdf_get_typography_styles('cf7_style_2_button');
		
		$height = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_height');
		if($height !== ''){
			$styles['padding-top'] = '0';
			$styles['padding-bottom'] = '0';
			$styles['height'] = azalea_eltdf_filter_px($height) . 'px';
			$styles['line-height'] = azalea_eltdf_filter_px($height) . 'px';
		}

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_background_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_button_background_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_background_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_button_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		$border_width = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_border_width');
		if($border_width !== ''){
			$styles['border-width'] = azalea_eltdf_filter_px($border_width) . 'px';
		}

		$border_radius = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_border_radius');
		if($border_radius !== ''){
			$styles['border-radius'] = azalea_eltdf_filter_px($border_radius) . 'px';
		}

		$padding_left_right = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_padding');
		if($padding_left_right !== ''){
			$styles['padding-left'] = azalea_eltdf_filter_px($padding_left_right) . 'px';
			$styles['padding-right'] = azalea_eltdf_filter_px($padding_left_right) . 'px';
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_button_styles_2');
}

if(!function_exists('azalea_eltdf_contact_form7_button_hover_styles_2')) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function azalea_eltdf_contact_form7_button_hover_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
		);
		$styles = array();

		$color = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_color');
		if($color !== ''){
			$styles['color'] = $color;
		}

		$background_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_bckg_color');
		$background_opacity = 1;
		if($background_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_bckg_transparency') !== ''){
				$background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_bckg_transparency');
			}
			$styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
		}

		$border_color = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_border_color');
		$border_opacity = 1;
		if($border_color !== ''){
			if(azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_border_transparency') !== ''){
				$border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_2_button_hover_border_transparency');
			}
			$styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
		}

		echo azalea_eltdf_dynamic_css($selector, $styles);
	}

	add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_button_hover_styles_2');
}

if(!function_exists('azalea_eltdf_contact_form7_text_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 elements
     */
    function azalea_eltdf_contact_form7_text_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date',
            '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
            '.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz'
        );
	    
	    $styles = azalea_eltdf_get_typography_styles('cf7_style_3_text');

        $background_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_background_transparency') !== ''){
                $background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_background_transparency');
            }
            $styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
        }

        $border_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_border_transparency') !== ''){
                $border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_border_transparency');
            }
            $styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
        }

        $border_width = azalea_eltdf_options()->getOptionValue('cf7_style_3_border_width');
        if($border_width !== ''){
            $styles['border-width'] = azalea_eltdf_filter_px($border_width) . 'px';
        }

        $border_radius = azalea_eltdf_options()->getOptionValue('cf7_style_3_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = azalea_eltdf_filter_px($border_radius) . 'px';
        }

        $padding_top = azalea_eltdf_options()->getOptionValue('cf7_style_3_padding_top');
        if($padding_top !== ''){
            $styles['padding-top'] = azalea_eltdf_filter_px($padding_top) . 'px';
        }

        $padding_right = azalea_eltdf_options()->getOptionValue('cf7_style_3_padding_right');
        if($padding_right !== ''){
            $styles['padding-right'] = azalea_eltdf_filter_px($padding_right) . 'px';
        }

        $padding_bottom = azalea_eltdf_options()->getOptionValue('cf7_style_3_padding_bottom');
        if($padding_bottom !== ''){
            $styles['padding-bottom'] = azalea_eltdf_filter_px($padding_bottom) . 'px';
        }

        $padding_left = azalea_eltdf_options()->getOptionValue('cf7_style_3_padding_left');
        if($padding_left !== ''){
            $styles['padding-left'] = azalea_eltdf_filter_px($padding_left) . 'px';
        }

        $margin_top = azalea_eltdf_options()->getOptionValue('cf7_style_3_margin_top');
        if($margin_top !== ''){
            $styles['margin-top'] = azalea_eltdf_filter_px($margin_top) . 'px';
        }

        $margin_bottom = azalea_eltdf_options()->getOptionValue('cf7_style_3_margin_bottom');
        if($margin_bottom !== ''){
            $styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom) . 'px';
        }

        if(azalea_eltdf_options()->getOptionValue('cf7_style_3_textarea_height')) {
            $textarea_height = azalea_eltdf_options()->getOptionValue('cf7_style_3_textarea_height');
            echo azalea_eltdf_dynamic_css(
                '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
                array('height' => azalea_eltdf_filter_px($textarea_height).'px')
            );
        }

        echo azalea_eltdf_dynamic_css($selector, $styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_text_styles_3');
}

if(!function_exists('azalea_eltdf_contact_form7_focus_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 elements focus
     */
    function azalea_eltdf_contact_form7_focus_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text:focus',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number:focus',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date:focus',
            '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea:focus',
            '.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select:focus',
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz:focus'
        );
        $styles = array();

        $color = azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_text_color');
        if($color !== ''){
            $styles['color'] = $color;
            echo azalea_eltdf_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_3 textarea:focus::-webkit-input-placeholder'
                ),
                array('color' => $color)
            );
            echo azalea_eltdf_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus:-moz-placeholder',
                    '.cf7_custom_style_3 textarea:focus:-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo azalea_eltdf_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus::-moz-placeholder',
                    '.cf7_custom_style_3 textarea:focus::-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo azalea_eltdf_dynamic_css(
                array(
                    '.cf7_custom_style_3 input:focus:-ms-input-placeholder',
                    '.cf7_custom_style_3 textarea:focus:-ms-input-placeholder'
                ),
                array('color' => $color)
            );
        }

        $background_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_background_transparency') !== ''){
                $background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_background_transparency');
            }
            $styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
        }

        $border_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_border_transparency') !== ''){
                $border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_focus_border_transparency');
            }
            $styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
        }

        echo azalea_eltdf_dynamic_css($selector, $styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_focus_styles_3');
}

if(!function_exists('azalea_eltdf_contact_form7_label_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 label
     */
    function azalea_eltdf_contact_form7_label_styles_3() {
	    $item_styles = azalea_eltdf_get_typography_styles('cf7_style_3_label');
	
	    $item_selector = array(
		    '.cf7_custom_style_3 p'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_label_styles_3');
}

if(!function_exists('azalea_eltdf_contact_form7_button_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function azalea_eltdf_contact_form7_button_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-submit'
        );
	
	    $styles = azalea_eltdf_get_typography_styles('cf7_style_3_button');
	    
	    $height = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_height');
	    if($height !== ''){
		    $styles['padding-top'] = '0';
		    $styles['padding-bottom'] = '0';
		    $styles['height'] = azalea_eltdf_filter_px($height) . 'px';
		    $styles['line-height'] = azalea_eltdf_filter_px($height) . 'px';
	    }

        $background_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_button_background_transparency') !== ''){
                $background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_background_transparency');
            }
            $styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
        }

        $border_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_button_border_transparency') !== ''){
                $border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_border_transparency');
            }
            $styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
        }

        $border_width = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_border_width');
        if($border_width !== ''){
            $styles['border-width'] = azalea_eltdf_filter_px($border_width) . 'px';
        }

        $border_radius = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = azalea_eltdf_filter_px($border_radius) . 'px';
        }

        $padding_left_right = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_padding');
        if($padding_left_right !== ''){
            $styles['padding-left'] = azalea_eltdf_filter_px($padding_left_right) . 'px';
            $styles['padding-right'] = azalea_eltdf_filter_px($padding_left_right) . 'px';
        }

        echo azalea_eltdf_dynamic_css($selector, $styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_button_styles_3');
}

if(!function_exists('azalea_eltdf_contact_form7_button_hover_styles_3')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function azalea_eltdf_contact_form7_button_hover_styles_3() {
        $selector = array(
            '.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
        );
        $styles = array();

        $color = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $background_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_bckg_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_bckg_transparency') !== ''){
                $background_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_bckg_transparency');
            }
            $styles['background-color'] = azalea_eltdf_rgba_color($background_color,$background_opacity);
        }

        $border_color = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_border_transparency') !== ''){
                $border_opacity = azalea_eltdf_options()->getOptionValue('cf7_style_3_button_hover_border_transparency');
            }
            $styles['border-color'] = azalea_eltdf_rgba_color($border_color,$border_opacity);
        }

        echo azalea_eltdf_dynamic_css($selector, $styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_contact_form7_button_hover_styles_3');
}