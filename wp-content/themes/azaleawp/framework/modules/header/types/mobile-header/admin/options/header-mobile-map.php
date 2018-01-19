<?php

if ( ! function_exists( 'azalea_eltdf_mobile_header_options_map' ) ) {
	function azalea_eltdf_mobile_header_options_map() {


		$panel_mobile_header = azalea_eltdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'azaleawp' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_header_page'
			)
		);
		
		$mobile_header_group = azalea_eltdf_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'azaleawp' )
			)
		);
		
		$mobile_header_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'azaleawp' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'azaleawp' ),
				'parent' => $mobile_header_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'azaleawp' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = azalea_eltdf_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'azaleawp' )
			)
		);
		
		$mobile_menu_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'azaleawp' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'azaleawp' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'azaleawp' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'azaleawp' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'azaleawp' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'azaleawp' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'azaleawp' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		azalea_eltdf_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'azaleawp' )
			)
		);
		
		$first_level_group = azalea_eltdf_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'azaleawp' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'azaleawp' )
			)
		);
		
		$first_level_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'azaleawp' ),
				'parent' => $first_level_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'azaleawp' ),
				'parent' => $first_level_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'azaleawp' ),
				'parent' => $first_level_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'azaleawp' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'azaleawp' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'    => 'mobile_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'azaleawp' ),
				'parent'  => $first_level_row2,
				'options' => azalea_eltdf_get_text_transform_array()
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'    => 'mobile_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'azaleawp' ),
				'parent'  => $first_level_row2,
				'options' => azalea_eltdf_get_font_style_array()
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'    => 'mobile_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'azaleawp' ),
				'parent'  => $first_level_row2,
				'options' => azalea_eltdf_get_font_weight_array()
			)
		);
		
		$first_level_row3 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'azaleawp' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = azalea_eltdf_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'azaleawp' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'azaleawp' )
			)
		);
		
		$second_level_row1 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'azaleawp' ),
				'parent' => $second_level_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'azaleawp' ),
				'parent' => $second_level_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'azaleawp' ),
				'parent' => $second_level_row1
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'azaleawp' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'azaleawp' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'azaleawp' ),
				'parent'  => $second_level_row2,
				'options' => azalea_eltdf_get_text_transform_array()
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'azaleawp' ),
				'parent'  => $second_level_row2,
				'options' => azalea_eltdf_get_font_style_array()
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'azaleawp' ),
				'parent'  => $second_level_row2,
				'options' => azalea_eltdf_get_font_weight_array()
			)
		);
		
		$second_level_row3 = azalea_eltdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'azaleawp' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		azalea_eltdf_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'azaleawp' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'azaleawp' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'azaleawp' ),
				'parent' => $panel_mobile_header
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'azaleawp' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'azalea_eltdf_mobile_header_options_map', 'azalea_eltdf_mobile_header_options_map', 5 );
}