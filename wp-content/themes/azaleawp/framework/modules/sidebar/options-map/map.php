<?php

if ( ! function_exists('azalea_eltdf_sidebar_options_map') ) {

	function azalea_eltdf_sidebar_options_map() {

		azalea_eltdf_add_admin_page(
			array(
				'slug' => '_sidebar_page',
				'title' => esc_html__('Sidebar Area', 'azaleawp'),
				'icon' => 'fa fa-indent'
			)
		);

		$sidebar_panel = azalea_eltdf_add_admin_panel(
			array(
				'title' => esc_html__('Sidebar Area', 'azaleawp'),
				'name' => 'sidebar',
				'page' => '_sidebar_page'
			)
		);
		
		azalea_eltdf_add_admin_field(array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout', 'azaleawp'),
			'description'   => esc_html__('Choose a sidebar layout for pages', 'azaleawp'),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'        => esc_html__('No Sidebar', 'azaleawp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'azaleawp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'azaleawp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'azaleawp'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'azaleawp')
			)
		));
		
		$azalea_custom_sidebars = azalea_eltdf_get_custom_sidebars();
		if(count($azalea_custom_sidebars) > 0) {
			azalea_eltdf_add_admin_field(array(
				'name' => 'custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'azaleawp'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'azaleawp'),
				'parent' => $sidebar_panel,
				'options' => $azalea_custom_sidebars,
				'args'        => array(
					'select2'	=> true
				)
			));
		}
	}

	add_action('azalea_eltdf_options_map', 'azalea_eltdf_sidebar_options_map', 9);
}