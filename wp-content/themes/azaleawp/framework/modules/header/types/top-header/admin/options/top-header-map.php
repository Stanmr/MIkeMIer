<?php

if ( ! function_exists( 'azalea_eltdf_get_hide_dep_for_top_header_options' ) ) {
	function azalea_eltdf_get_hide_dep_for_top_header_options() {
		$hide_dep_options = apply_filters( 'azalea_eltdf_top_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'azalea_eltdf_header_top_options_map' ) ) {
	function azalea_eltdf_header_top_options_map( $panel_header ) {
		$hide_dep_options = azalea_eltdf_get_hide_dep_for_top_header_options();
		
		$top_header_container = azalea_eltdf_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'azaleawp' ),
				'parent'        => $top_header_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_top_bar_container"
				)
			)
		);
		
		$top_bar_container = azalea_eltdf_add_admin_container(
			array(
				'name'            => 'top_bar_container',
				'parent'          => $top_header_container,
				'hidden_property' => 'top_bar',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in Grid', 'azaleawp' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'azaleawp' ),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_top_bar_in_grid_container"
				)
			)
		);
		
		$top_bar_in_grid_container = azalea_eltdf_add_admin_container(
			array(
				'name'            => 'top_bar_in_grid_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'top_bar_in_grid',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Set grid background color for top bar', 'azaleawp' ),
				'parent'      => $top_bar_in_grid_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'azaleawp' ),
				'description' => esc_html__( 'Set grid background transparency for top bar', 'azaleawp' ),
				'parent'      => $top_bar_in_grid_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'top_bar_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Set background color for top bar', 'azaleawp' ),
				'parent'      => $top_bar_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'top_bar_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'azaleawp' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'azaleawp' ),
				'parent'      => $top_bar_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar Border', 'azaleawp' ),
				'description'   => esc_html__( 'Set top bar border', 'azaleawp' ),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_top_bar_border_container"
				)
			)
		);
		
		$top_bar_border_container = azalea_eltdf_add_admin_container(
			array(
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'top_bar_border',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'top_bar_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Top Bar Border Color', 'azaleawp' ),
				'description' => esc_html__( 'Set border color for top bar', 'azaleawp' ),
				'parent'      => $top_bar_border_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'top_bar_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Height', 'azaleawp' ),
				'description' => esc_html__( 'Enter top bar height (Default is 37px)', 'azaleawp' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'azalea_eltdf_header_top_options_map', 'azalea_eltdf_header_top_options_map', 10, 1 );
}