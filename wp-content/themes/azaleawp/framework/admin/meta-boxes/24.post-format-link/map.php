<?php

if ( ! function_exists( 'azalea_eltdf_map_post_link_meta' ) ) {
	function azalea_eltdf_map_post_link_meta() {
		$link_post_format_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'azaleawp' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'azaleawp' ),
				'description' => esc_html__( 'Enter link', 'azaleawp' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_post_link_meta', 24 );
}