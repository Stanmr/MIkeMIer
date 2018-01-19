<?php

if ( ! function_exists('azalea_eltdf_error_404_options_map') ) {

	function azalea_eltdf_error_404_options_map() {

		azalea_eltdf_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'azaleawp'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_header = azalea_eltdf_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_header',
			'title'	=> esc_html__('Header', 'azaleawp')
		));

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_background_color_header',
				'label' => esc_html__('Background Color', 'azaleawp'),
				'description' => esc_html__('Choose a background color for header area', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'text',
				'name' => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'azaleawp'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'azaleawp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_border_color_header',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'azaleawp'),
				'description' => esc_html__('Choose a border bottom color for header area', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'select',
				'name' => '404_header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'azaleawp'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'azaleawp'),
				'options' => array(
					'' => esc_html__('Default', 'azaleawp'),
					'light-header' => esc_html__('Light', 'azaleawp'),
					'dark-header' => esc_html__('Dark', 'azaleawp')
				)
			)
		);

		$panel_404_options = azalea_eltdf_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Options', 'azaleawp')
		));

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'color',
				'name' => '404_page_background_color',
				'label' => esc_html__('Background Color', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_image',
				'label' => esc_html__('Background Image', 'azaleawp'),
				'description' => esc_html__('Choose a background image for 404 page', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_pattern_image',
				'label' => esc_html__('Pattern Background Image', 'azaleawp'),
				'description' => esc_html__('Choose a pattern image for 404 page', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_title_image',
				'label' => esc_html__('Title Image', 'azaleawp'),
				'description' => esc_html__('Choose a background image for displaying above 404 page Title', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'azaleawp'),
			'description' => esc_html__('Enter title for 404 page. Default label is "404".', 'azaleawp')
		));

		$first_level_group = azalea_eltdf_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'first_level_group',
				'title' => esc_html__('Title Style', 'azaleawp'),
				'description' => esc_html__('Define styles for 404 page title', 'azaleawp')
			)
		);

		$first_level_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => '404_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'azaleawp'),
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'fontsimple',
				'name' => '404_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'azaleawp'),
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row2 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'azaleawp'),
				'options' => azalea_eltdf_get_font_style_array()
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'azaleawp'),
				'options' => azalea_eltdf_get_font_weight_array()
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'textsimple',
				'name' => '404_title_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'azaleawp'),
				'options' => azalea_eltdf_get_text_transform_array()
			)
		);

		azalea_eltdf_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_subtitle',
			'default_value' => '',
			'label' => esc_html__('Subtitle', 'azaleawp'),
			'description' => esc_html__('Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'azaleawp')
		));

		$second_level_group = azalea_eltdf_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'second_level_group',
				'title' => esc_html__('Subtitle Style', 'azaleawp'),
				'description' => esc_html__('Define styles for 404 page subtitle', 'azaleawp')
			)
		);

		$second_level_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => '404_subtitle_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'azaleawp'),
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'fontsimple',
				'name' => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'azaleawp'),
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'textsimple',
				'name' => '404_subtitle_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'textsimple',
				'name' => '404_subtitle_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row2 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'azaleawp'),
				'options' => azalea_eltdf_get_font_style_array()
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'azaleawp'),
				'options' => azalea_eltdf_get_font_weight_array()
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'azaleawp'),
				'options' => azalea_eltdf_get_text_transform_array()
			)
		);

		azalea_eltdf_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'azaleawp'),
			'description' => esc_html__('Enter text for 404 page.', 'azaleawp')
		));

		$third_level_group = azalea_eltdf_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => '$third_level_group',
				'title' => esc_html__('Text Style', 'azaleawp'),
				'description' => esc_html__('Define styles for 404 page text', 'azaleawp')
			)
		);

		$third_level_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row1'
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => '404_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'azaleawp'),
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'fontsimple',
				'name' => '404_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'azaleawp'),
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row2 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row2',
				'next' => true
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'azaleawp'),
				'options' => azalea_eltdf_get_font_style_array()
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'azaleawp'),
				'options' => azalea_eltdf_get_font_weight_array()
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => '404_text_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'azaleawp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'azaleawp'),
				'options' => azalea_eltdf_get_text_transform_array()
			)
		);

		azalea_eltdf_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'label' => esc_html__('Back to Home Button Label', 'azaleawp'),
			'description' => esc_html__('Enter label for "BACK TO HOME" button', 'azaleawp')
		));
	}

	add_action( 'azalea_eltdf_options_map', 'azalea_eltdf_error_404_options_map', 19);
}