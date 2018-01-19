<?php

if (!function_exists('azalea_eltdf_register_widgets')) {
	function azalea_eltdf_register_widgets() {
		$widgets = array(
			'AzaleaEltdfBlogListWidget',
			'AzaleaEltdfButtonWidget',
			'AzaleaEltdfImageWidget',
			'AzaleaEltdfImageSliderWidget',
			'AzaleaEltdfRawHTMLWidget',
			'AzaleaEltdfSearchOpener',
			'AzaleaEltdfSeparatorWidget',
			'AzaleaEltdfSideAreaOpener',
			'AzaleaEltdfSocialIconWidget',
			'AzaleaEldtfAuthorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
	
	add_action('widgets_init', 'azalea_eltdf_register_widgets');
}