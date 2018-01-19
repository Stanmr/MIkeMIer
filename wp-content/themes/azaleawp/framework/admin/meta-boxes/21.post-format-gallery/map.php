<?php

if ( ! function_exists( 'azalea_eltdf_map_post_gallery_meta' ) ) {
	
	function azalea_eltdf_map_post_gallery_meta() {
		$gallery_post_format_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'azaleawp' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		azalea_eltdf_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'azaleawp' ),
				'description' => esc_html__( 'Choose your gallery images', 'azaleawp' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_post_gallery_meta', 21 );
}
