<?php

if ( ! function_exists( 'azalea_eltdf_sticky_header_meta_boxes_options_map' ) ) {
	function azalea_eltdf_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'eltdf_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'azaleawp' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'azaleawp' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'azalea_eltdf_additional_header_area_meta_boxes_map', 'azalea_eltdf_sticky_header_meta_boxes_options_map', 10, 1 );
}