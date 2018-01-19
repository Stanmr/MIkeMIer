<?php

if ( ! function_exists('azalea_eltdf_sidearea_options_map') ) {

	function azalea_eltdf_sidearea_options_map() {

		azalea_eltdf_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'azaleawp'),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = azalea_eltdf_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'azaleawp'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = azalea_eltdf_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'azaleawp'),
				'description' => esc_html__('Define styles for Side Area icon', 'azaleawp')
			)
		);

		$side_area_icon_style_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'azaleawp')
			)
		);

		$side_area_icon_style_row2 = azalea_eltdf_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'azaleawp'),
				'description' => esc_html__('Enter a width for Side Area', 'azaleawp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'azaleawp'),
				'description' => esc_html__('Choose a background color for Side Area', 'azaleawp')
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_padding',
				'label' => esc_html__('Padding', 'azaleawp'),
				'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'azaleawp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'azaleawp'),
				'description' => esc_html__('Choose text alignment for side area', 'azaleawp'),
				'options' => array(
					'' => esc_html__('Default', 'azaleawp'),
					'left' => esc_html__('Left', 'azaleawp'),
					'center' => esc_html__('Center', 'azaleawp'),
					'right' => esc_html__('Right', 'azaleawp')
				)
			)
		);
	}

	add_action('azalea_eltdf_options_map', 'azalea_eltdf_sidearea_options_map', 12);
}