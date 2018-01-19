<?php

if ( ! function_exists( 'azalea_eltdf_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function azalea_eltdf_register_header_vertical_closed_type( $header_types ) {
		$header_type = array(
			'header-vertical-closed' => 'AzaleaEltdf\Modules\Header\Types\HeaderVerticalClosed'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'azalea_eltdf_init_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function azalea_eltdf_init_register_header_vertical_closed_type() {
		add_filter( 'azalea_eltdf_register_header_type_class', 'azalea_eltdf_register_header_vertical_closed_type' );
	}
	
	add_action( 'azalea_eltdf_before_header_function_init', 'azalea_eltdf_init_register_header_vertical_closed_type' );
}

if ( ! function_exists( 'azalea_eltdf_include_header_vertical_closed_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function azalea_eltdf_include_header_vertical_closed_menu( $menus ) {
		if ( ! array_key_exists( 'vertical-navigation', $menus ) ) {
			$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'azaleawp' );
		}
		
		return $menus;
	}
	
	add_filter( 'azalea_eltdf_register_headers_menu', 'azalea_eltdf_include_header_vertical_closed_menu' );
}

if ( ! function_exists( 'azalea_eltdf_check_is_header_vertical_closed_type_enabled' ) ) {
	/**
	 * This function check is header vertical closed type enabled in global option or meta boxes option
	 */
	function azalea_eltdf_check_is_header_vertical_closed_type_enabled() {
		return azalea_eltdf_get_meta_field_intersect( 'header_type', azalea_eltdf_get_page_id() ) === 'header-vertical-closed';
	}
}

if ( ! function_exists( 'azalea_eltdf_disable_behaviors_for_header_vertical_closed' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function azalea_eltdf_disable_behaviors_for_header_vertical_closed( $allow_behavior ) {
		if(azalea_eltdf_check_is_header_vertical_closed_type_enabled()) {
			$allow_behavior = false;
		}
		
		return $allow_behavior;
	}
	
	add_filter( 'azalea_eltdf_allow_sticky_header_behavior', 'azalea_eltdf_disable_behaviors_for_header_vertical_closed' );
	add_filter( 'azalea_eltdf_allow_content_boxed_layout', 'azalea_eltdf_disable_behaviors_for_header_vertical_closed' );
}

if ( ! function_exists( 'azalea_eltdf_register_header_vertical_closed_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function azalea_eltdf_register_header_vertical_closed_widget_areas() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Header Vertical Closed Widget Area', 'azaleawp' ),
				'id'            => 'eltdf-vertical-closed-area',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-vertical-area-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the bottom of header vertical menu', 'azaleawp' )
			)
		);
	}
	
	add_action( 'widgets_init', 'azalea_eltdf_register_header_vertical_closed_widget_areas' );
}

if ( ! function_exists( 'azalea_eltdf_get_header_vertical_closed_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function azalea_eltdf_get_header_vertical_closed_widget_areas() {
		$page_id                            = azalea_eltdf_get_page_id();
		$custom_vertical_header_widget_area = get_post_meta( $page_id, 'eltdf_custom_vertical_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'eltdf-vertical-closed-area' ) && empty( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( 'eltdf-vertical-closed-area' );
		} else if ( ! empty( $custom_vertical_header_widget_area ) && is_active_sidebar( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( $custom_vertical_header_widget_area );
		}
	}
}

if ( ! function_exists( 'azalea_eltdf_get_header_vertical_closed_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function azalea_eltdf_get_header_vertical_closed_main_menu() {
		azalea_eltdf_get_module_template_part( 'templates/vertical-closed-navigation', 'header/types/header-vertical-closed' );
	}
}

if ( ! function_exists( 'azalea_eltdf_vertical_closed_header_holder_class' ) ) {
	/**
	 * Return holder class for this header type html
	 */
	function azalea_eltdf_vertical_closed_header_holder_class() {
		$center_content = azalea_eltdf_get_meta_field_intersect( 'vertical_header_center_content', azalea_eltdf_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'eltdf-vertical-alignment-center' : 'eltdf-vertical-alignment-top';
		
		return $holder_class;
	}
}