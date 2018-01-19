<?php

if ( ! function_exists( 'azalea_eltdf_logo_meta_box_map' ) ) {
	function azalea_eltdf_logo_meta_box_map() {
		
		$logo_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => apply_filters( 'azalea_eltdf_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'azaleawp' ),
				'name'  => 'logo_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'azaleawp' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'azaleawp' ),
				'parent'      => $logo_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'azaleawp' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'azaleawp' ),
				'parent'      => $logo_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'azaleawp' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'azaleawp' ),
				'parent'      => $logo_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'azaleawp' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'azaleawp' ),
				'parent'      => $logo_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'azaleawp' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'azaleawp' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_logo_meta_box_map', 47 );
}