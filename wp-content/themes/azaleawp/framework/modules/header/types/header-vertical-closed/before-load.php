<?php

if ( ! function_exists( 'azalea_eltdf_set_header_vertical_closed_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function azalea_eltdf_set_header_vertical_closed_type_global_option( $header_types ) {
		$header_types['header-vertical-closed'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-vertical-closed/assets/img/header-vertical-closed.png',
			'label' => esc_html__( 'Vertical - Closed', 'azaleawp' )
		);
		
		return $header_types;
	}
	
	add_filter( 'azalea_eltdf_header_type_global_option', 'azalea_eltdf_set_header_vertical_closed_type_global_option' );
}

if ( ! function_exists( 'azalea_eltdf_set_header_vertical_closed_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function azalea_eltdf_set_header_vertical_closed_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-vertical-closed'] = esc_html__( 'Vertical - Closed', 'azaleawp' );
		
		return $header_type_options;
	}
	
	add_filter( 'azalea_eltdf_header_type_meta_boxes', 'azalea_eltdf_set_header_vertical_closed_type_meta_boxes_option' );
}

if ( ! function_exists( 'azalea_eltdf_set_show_dep_options_for_header_vertical_closed' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function azalea_eltdf_set_show_dep_options_for_header_vertical_closed( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltdf_header_vertical_area_container';
		$show_containers[] = '#eltdf_panel_vertical_main_menu';
		
		$show_containers = apply_filters( 'azalea_eltdf_show_dep_options_for_header_vertical_closed', $show_containers );
		
		$show_dep_options['header-vertical-closed'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'azalea_eltdf_header_type_show_global_option', 'azalea_eltdf_set_show_dep_options_for_header_vertical_closed' );
}

if ( ! function_exists( 'azalea_eltdf_set_hide_dep_options_for_header_vertical_closed' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function azalea_eltdf_set_hide_dep_options_for_header_vertical_closed( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltdf_header_behaviour';
		$hide_containers[] = '#eltdf_menu_area_container';
		$hide_containers[] = '#eltdf_logo_area_container';
		$hide_containers[] = '#eltdf_panel_fullscreen_menu';
		$hide_containers[] = '#eltdf_panel_main_menu';
		$hide_containers[] = '#eltdf_panel_sticky_header';
		$hide_containers[] = '#eltdf_panel_fixed_header';
		
		$hide_containers = apply_filters( 'azalea_eltdf_hide_dep_options_for_header_vertical_closed', $hide_containers );
		
		$hide_dep_options['header-vertical-closed'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'azalea_eltdf_header_type_hide_global_option', 'azalea_eltdf_set_hide_dep_options_for_header_vertical_closed' );
}

if ( ! function_exists( 'azalea_eltdf_set_show_dep_options_for_header_vertical_closed_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function azalea_eltdf_set_show_dep_options_for_header_vertical_closed_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltdf_header_vertical_area_container';
		
		$show_containers = apply_filters( 'azalea_eltdf_show_dep_options_for_header_vertical_closed_meta_boxes', $show_containers );
		
		$show_dep_options['header-vertical-closed'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'azalea_eltdf_header_type_show_meta_boxes', 'azalea_eltdf_set_show_dep_options_for_header_vertical_closed_meta_boxes' );
}

if ( ! function_exists( 'azalea_eltdf_set_hide_dep_options_for_header_vertical_closed_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function azalea_eltdf_set_hide_dep_options_for_header_vertical_closed_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltdf_logo_area_container';
		$hide_containers[] = '#eltdf_menu_area_container';
		
		$hide_containers = apply_filters( 'azalea_eltdf_hide_dep_options_for_header_vertical_closed_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-vertical-closed'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'azalea_eltdf_header_type_hide_meta_boxes', 'azalea_eltdf_set_hide_dep_options_for_header_vertical_closed_meta_boxes' );
}

if ( ! function_exists( 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function azalea_eltdf_set_hide_dep_options_header_vertical_closed( $hide_dep_options ) {
		$hide_dep_options[] = 'header-vertical-closed';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'azalea_eltdf_header_logo_area_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_header_menu_area_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_header_main_menu_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_top_header_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	
	// header global panel meta boxes
	add_filter( 'azalea_eltdf_header_logo_area_hide_meta_boxes', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_header_menu_area_hide_meta_boxes', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_top_header_hide_meta_boxes', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	
	// header behavior panel options
	add_filter( 'azalea_eltdf_header_behavior_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_fixed_header_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_sticky_header_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	
	// header behavior panel meta boxes
	add_filter( 'azalea_eltdf_header_behavior_hide_meta_boxes', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	
	// header types panel options
	add_filter( 'azalea_eltdf_header_centered_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'azalea_eltdf_full_screen_menu_hide_global_option', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
	
	// header types panel meta boxes
	add_filter( 'azalea_eltdf_header_centered_hide_meta_boxes', 'azalea_eltdf_set_hide_dep_options_header_vertical_closed' );
}