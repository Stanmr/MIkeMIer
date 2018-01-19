<?php

if ( ! function_exists( 'azalea_eltdf_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function azalea_eltdf_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'AzaleaEltdf\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'azalea_eltdf_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function azalea_eltdf_init_register_header_standard_type() {
		add_filter( 'azalea_eltdf_register_header_type_class', 'azalea_eltdf_register_header_standard_type' );
	}
	
	add_action( 'azalea_eltdf_before_header_function_init', 'azalea_eltdf_init_register_header_standard_type' );
}