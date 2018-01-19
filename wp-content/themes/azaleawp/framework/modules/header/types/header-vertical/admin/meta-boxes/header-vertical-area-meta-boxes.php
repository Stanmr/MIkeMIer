<?php

if ( ! function_exists( 'azalea_eltdf_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function azalea_eltdf_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'azalea_eltdf_header_vertical_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'azalea_eltdf_header_vertical_area_meta_options_map' ) ) {
	function azalea_eltdf_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = azalea_eltdf_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		azalea_eltdf_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'azaleawp' )
			)
		);
		
		$azalea_custom_sidebars = azalea_eltdf_get_custom_sidebars();
		if ( count( $azalea_custom_sidebars ) > 0 ) {
			azalea_eltdf_add_meta_box_field(
				array(
					'name'        => 'eltdf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'azaleawp' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'azaleawp' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $azalea_custom_sidebars
				)
			);
		}
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'azaleawp' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'azaleawp' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'azaleawp' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'azaleawp' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'azaleawp' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'azaleawp' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'azaleawp' ),
				'description'   => esc_html__( 'Set border on vertical area', 'azaleawp' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => azalea_eltdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_vertical_header_border_container',
						'no'  => '#eltdf_vertical_header_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_vertical_header_border_container'
					)
				)
			)
		);
		
		$vertical_header_border_container = azalea_eltdf_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'hidden_property' => 'eltdf_vertical_header_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose color of border', 'azaleawp' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'azaleawp' ),
				'description'   => esc_html__( 'Set content in vertical center', 'azaleawp' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'azalea_eltdf_additional_header_area_meta_boxes_map', 'azalea_eltdf_header_vertical_area_meta_options_map', 10, 1 );
}