<?php

if ( ! function_exists( 'azalea_eltdf_get_hide_dep_for_header_centered_meta_boxes' ) ) {
	function azalea_eltdf_get_hide_dep_for_header_centered_meta_boxes() {
		$hide_dep_options = apply_filters( 'azalea_eltdf_header_centered_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'azalea_eltdf_header_centered_meta_map' ) ) {
	function azalea_eltdf_header_centered_meta_map( $parent ) {
		$hide_dep_options = azalea_eltdf_get_hide_dep_for_header_centered_meta_boxes();
		
		azalea_eltdf_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'logo_wrapper_padding_header_centered',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'azaleawp' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'azaleawp' ),
				'args'            => array(
					'col_width' => 3
				),
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'azalea_eltdf_header_logo_area_additional_meta_boxes_map', 'azalea_eltdf_header_centered_meta_map', 10, 1 );
}