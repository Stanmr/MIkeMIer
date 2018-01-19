<?php

if ( ! function_exists('azalea_eltdf_like') ) {
	/**
	 * Returns AzaleaEltdfLike instance
	 *
	 * @return AzaleaEltdfLike
	 */
	function azalea_eltdf_like() {
		return AzaleaEltdfLike::get_instance();
	}
}

function azalea_eltdf_get_like() {

	echo wp_kses(azalea_eltdf_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}