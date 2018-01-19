<?php

if ( ! function_exists( 'azalea_eltdf_map_sidebar_meta' ) ) {
	function azalea_eltdf_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => apply_filters( 'azalea_eltdf_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'azaleawp' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'azaleawp' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'azaleawp' ),
				'parent'      => $eltdf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'azaleawp' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'azaleawp' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'azaleawp' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'azaleawp' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'azaleawp' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'azaleawp' )
				)
			)
		);
		
		$eltdf_custom_sidebars = azalea_eltdf_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			azalea_eltdf_add_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'azaleawp' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'azaleawp' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2'	=> true
					)
				)
			);
		}
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_sidebar_meta', 31 );
}