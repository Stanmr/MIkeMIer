<?php

/*** Post Settings ***/

if ( ! function_exists( 'azalea_eltdf_map_post_meta' ) ) {
	function azalea_eltdf_map_post_meta() {
		
		$post_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'azaleawp' ),
				'name'  => 'post-meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'azaleawp' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'azaleawp' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'azaleawp' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'azaleawp' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'azaleawp' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'azaleawp' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'azaleawp' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'azaleawp' )
				)
			)
		);
		
		$azalea_custom_sidebars = azalea_eltdf_get_custom_sidebars();
		if ( count( $azalea_custom_sidebars ) > 0 ) {
			azalea_eltdf_add_meta_box_field( array(
				'name'        => 'eltdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'azaleawp' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'azaleawp' ),
				'parent'      => $post_meta_box,
				'options'     => azalea_eltdf_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'azaleawp' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'azaleawp' ),
				'parent'      => $post_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'azaleawp' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'azaleawp' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'azaleawp' ),
					'large-width'        => esc_html__( 'Large Width', 'azaleawp' ),
					'large-height'       => esc_html__( 'Large Height', 'azaleawp' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'azaleawp' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'azaleawp' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'azaleawp' ),
					'large-width' => esc_html__( 'Large Width', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'azaleawp' ),
				'parent'        => $post_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_full_height_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Full Height Title', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will show title area in full height on your single post page standard title', 'azaleawp' ),
				'parent'        => $post_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_post_meta', 20 );
}
