<?php

if ( ! function_exists('azalea_eltdf_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function azalea_eltdf_footer_options_map() {

		azalea_eltdf_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'azaleawp'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = azalea_eltdf_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'azaleawp'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'azaleawp'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'azaleawp'),
				'parent' => $footer_panel,
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'azaleawp'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'azaleawp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = azalea_eltdf_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'parent' => $show_footer_top_container,
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'azaleawp'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'azaleawp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns Alignment', 'azaleawp'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'azaleawp'),
				'options' => array(
					''       => esc_html__('Default', 'azaleawp'),
					'left'   => esc_html__('Left', 'azaleawp'),
					'center' => esc_html__('Center', 'azaleawp'),
					'right'  => esc_html__('Right', 'azaleawp')
				),
				'parent' => $show_footer_top_container,
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'azaleawp'),
			'description' => esc_html__('Set background color for top footer area', 'azaleawp'),
			'parent' => $show_footer_top_container
		));

        azalea_eltdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_skin',
                'default_value' => 'dark',
                'label' => esc_html__('Footer Top Skin', 'azaleawp'),
                'description' => esc_html__('Skin for Footer top', 'azaleawp'),
                'options' => array(
                    'dark'   => esc_html__('Default/Dark', 'azaleawp'),
                    'light'   => esc_html__('Light', 'azaleawp')
                ),
                'parent' => $show_footer_top_container,
            )
        );

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'azaleawp'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'azaleawp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = azalea_eltdf_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Bottom Columns', 'azaleawp'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'azaleawp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'azaleawp'),
			'description' => esc_html__('Set background color for bottom footer area', 'azaleawp'),
			'parent' => $show_footer_bottom_container
		));

        azalea_eltdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_bottom_skin',
                'default_value' => 'dark',
                'label' => esc_html__('Footer Bottom Skin', 'azaleawp'),
                'description' => esc_html__('Skin for Footer Bottom', 'azaleawp'),
                'options' => array(
                    'dark'   => esc_html__('Default/Dark', 'azaleawp'),
                    'light'   => esc_html__('Light', 'azaleawp')
                ),
                'parent' => $show_footer_bottom_container,
            )
        );
	}

	add_action( 'azalea_eltdf_options_map', 'azalea_eltdf_footer_options_map', 14);
}