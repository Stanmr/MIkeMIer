<?php

if ( ! function_exists( 'azalea_eltdf_map_content_bottom_meta' ) ) {
	function azalea_eltdf_map_content_bottom_meta() {
		$content_bottom_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => apply_filters( 'azalea_eltdf_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Content Bottom', 'azaleawp' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'azaleawp' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'azaleawp' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#eltdf_eltdf_show_content_bottom_meta_container',
						'no' => '#eltdf_eltdf_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#eltdf_eltdf_show_content_bottom_meta_container'
					)
				)
			)
		);
		
		$show_content_bottom_meta_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltdf_show_content_bottom_meta_container',
				'hidden_property' => 'eltdf_enable_content_bottom_area_meta',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'azaleawp' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'azaleawp' ),
				'options'       => azalea_eltdf_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args' => array(
					'select2' => true
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'azaleawp' ),
				'options'       => azalea_eltdf_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'azaleawp' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_content_bottom_meta', 71 );
}