<?php

if ( ! function_exists( 'azalea_eltdf_register_header_centered_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function azalea_eltdf_register_header_centered_type( $header_types ) {
		$header_type = array(
			'header-centered' => 'AzaleaEltdf\Modules\Header\Types\HeaderCentered'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'azalea_eltdf_init_register_header_centered_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function azalea_eltdf_init_register_header_centered_type() {
		add_filter( 'azalea_eltdf_register_header_type_class', 'azalea_eltdf_register_header_centered_type' );
	}
	
	add_action( 'azalea_eltdf_before_header_function_init', 'azalea_eltdf_init_register_header_centered_type' );
}

if ( ! function_exists( 'azalea_eltdf_override_logo_image' ) ) {
	function azalea_eltdf_override_logo_image($params) {
		$default_params = $params;
		if(azalea_eltdf_get_meta_field_intersect('header_type', azalea_eltdf_get_page_id()) === 'header-centered') {
			$logo_image = azalea_eltdf_options()->getOptionValue('logo_image_centered');

			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = azalea_eltdf_get_image_dimensions($logo_image);

			$logo_height = '';
			$logo_styles = '';
			if (is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval($logo_height / 2) . 'px;'; //divided with 2 because of retina screens
			}

			$default_params['logo_image'] = $logo_image;
			$default_params['logo_styles'] = $logo_styles;
		}

		return $default_params;
	}

	add_filter('azalea_eltdf_get_logo_html_parameters', 'azalea_eltdf_override_logo_image');
}