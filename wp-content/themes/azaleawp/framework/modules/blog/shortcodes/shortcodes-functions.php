<?php

if(!function_exists('azalea_eltdf_include_blog_shortcodes')) {
	function azalea_eltdf_include_blog_shortcodes() {
		include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/blog/shortcodes/blog-list/blog-list.php';
	}
	
	if(azalea_eltdf_core_plugin_installed()) {
		add_action('eltdf_core_action_include_shortcodes_file', 'azalea_eltdf_include_blog_shortcodes');
	}
}

if(!function_exists('azalea_eltdf_add_blog_shortcodes')) {
	function azalea_eltdf_add_blog_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'EltdCore\CPT\Shortcodes\BlogList\BlogList'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	if(azalea_eltdf_core_plugin_installed()) {
		add_filter('eltdf_core_filter_add_vc_shortcode', 'azalea_eltdf_add_blog_shortcodes');
	}
}

if ( ! function_exists( 'azalea_eltdf_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function azalea_eltdf_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( azalea_eltdf_core_plugin_installed() ) {
		add_filter( 'eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'azalea_eltdf_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}