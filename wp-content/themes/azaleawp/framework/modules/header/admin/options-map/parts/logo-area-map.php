<?php

if ( ! function_exists( 'azalea_eltdf_get_hide_dep_for_header_logo_area_options' ) ) {
	function azalea_eltdf_get_hide_dep_for_header_logo_area_options() {
		$hide_dep_options = apply_filters( 'azalea_eltdf_header_logo_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'azalea_eltdf_header_logo_area_options_map' ) ) {
	function azalea_eltdf_header_logo_area_options_map( $panel_header ) {
		$hide_dep_options = azalea_eltdf_get_hide_dep_for_header_logo_area_options();
		
		$logo_area_container = azalea_eltdf_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		azalea_eltdf_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__( 'Logo Area', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area In Grid', 'azaleawp' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'azaleawp' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_logo_area_in_grid_container'
				)
			)
		);
		
		$logo_area_in_grid_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_in_grid_container',
				'hidden_property' => 'logo_area_in_grid',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'azaleawp' ),
				'description'   => esc_html__( 'Set grid background color for logo area', 'azaleawp' ),
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'azaleawp' ),
				'description'   => esc_html__( 'Set grid background transparency', 'azaleawp' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'azaleawp' ),
				'description'   => esc_html__( 'Set border on grid area', 'azaleawp' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_logo_area_in_grid_border_container'
				)
			)
		);
		
		$logo_area_in_grid_border_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_container,
				'name'            => 'logo_area_in_grid_border_container',
				'hidden_property' => 'logo_area_in_grid_border',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'logo_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'azaleawp' ),
				'description'   => esc_html__( 'Set border color for grid area', 'azaleawp' ),
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'color',
				'name'          => 'logo_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background color', 'azaleawp' ),
				'description'   => esc_html__( 'Set background color for logo area', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background transparency', 'azaleawp' ),
				'description'   => esc_html__( 'Set background transparency for logo area', 'azaleawp' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area Border', 'azaleawp' ),
				'description'   => esc_html__( 'Set border on logo area', 'azaleawp' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_logo_area_border_container'
				)
			)
		);
		
		$logo_area_border_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'hidden_property' => 'logo_area_border',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_border_container,
				'type'          => 'color',
				'name'          => 'logo_area_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'azaleawp' ),
				'description'   => esc_html__( 'Set border color for logo area', 'azaleawp' ),
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'default_value' => '',
				'label'         => esc_html__( 'Height', 'azaleawp' ),
				'description'   => esc_html__( 'Enter logo area height (default is 90px)', 'azaleawp' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'azalea_eltdf_header_logo_area_additional_options', $logo_area_container );
	}
	
	add_action( 'azalea_eltdf_header_logo_area_options_map', 'azalea_eltdf_header_logo_area_options_map', 10, 1 );
}