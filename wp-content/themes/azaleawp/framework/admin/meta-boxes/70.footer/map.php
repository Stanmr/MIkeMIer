<?php

if ( ! function_exists( 'azalea_eltdf_map_footer_meta' ) ) {
	function azalea_eltdf_map_footer_meta() {
		$footer_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => apply_filters( 'azalea_eltdf_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'azaleawp' ),
				'name'  => 'footer_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'azaleawp' ),
				'parent'        => $footer_meta_box
			)
		);

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_footer_in_grid_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Footer in Grid', 'azaleawp' ),
                'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'azaleawp' ),
                'parent'        => $footer_meta_box,
                'options'       => azalea_eltdf_get_yes_no_select_array()
            )
        );
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'azaleawp' ),
				'parent'        => $footer_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_footer_top_skin_meta',
                'type'          => 'select',
                'default_value' => '',
                'label' => esc_html__('Footer Top Skin', 'azaleawp'),
                'description' => esc_html__('Skin for Footer Top', 'azaleawp'),
                'options' => array(
                    'dark'   => esc_html__('Default/Dark', 'azaleawp'),
                    'light'   => esc_html__('Light', 'azaleawp')
                ),
                'parent'        => $footer_meta_box,

            )
        );
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'azaleawp' ),
				'parent'        => $footer_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);
        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_footer_bottom_skin_meta',
                'type'          => 'select',
                'default_value' => '',
                'label' => esc_html__('Footer Bottom Skin', 'azaleawp'),
                'description' => esc_html__('Skin for Footer Bottom', 'azaleawp'),
                'options' => array(
                    'dark'   => esc_html__('Default/Dark', 'azaleawp'),
                    'light'   => esc_html__('Light', 'azaleawp')
                ),
                'parent'        => $footer_meta_box,

            )
        );
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_footer_meta', 70 );
}