<?php

if ( ! function_exists( 'azalea_eltdf_map_post_quote_meta' ) ) {
	function azalea_eltdf_map_post_quote_meta() {
		$quote_post_format_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'azaleawp' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'azaleawp' ),
				'description' => esc_html__( 'Enter Quote text', 'azaleawp' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'azaleawp' ),
				'description' => esc_html__( 'Enter Quote author', 'azaleawp' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_post_quote_meta', 25 );
}