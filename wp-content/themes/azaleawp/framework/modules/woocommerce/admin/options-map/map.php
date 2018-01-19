<?php

if ( ! function_exists('azalea_eltdf_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function azalea_eltdf_woocommerce_options_map() {

		azalea_eltdf_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'azaleawp'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = azalea_eltdf_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'azaleawp'),
			'default_value'	=> 'eltdf-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'azaleawp'),
			'options'		=> array(
				'eltdf-woocommerce-columns-3' => esc_html__('3 Columns', 'azaleawp'),
				'eltdf-woocommerce-columns-4' => esc_html__('4 Columns', 'azaleawp')
			),
			'parent'      	=> $panel_product_list,
		));
		
		azalea_eltdf_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Space Between Products', 'azaleawp'),
			'default_value'	=> 'eltdf-woo-normal-space',
			'description' 	=> esc_html__('Select space between products for product listing and related products on single product', 'azaleawp'),
			'options'		=> array(
				'eltdf-woo-normal-space' => esc_html__('Normal', 'azaleawp'),
				'eltdf-woo-small-space'  => esc_html__('Small', 'azaleawp'),
				'eltdf-woo-no-space'     => esc_html__('No Space', 'azaleawp')
			),
			'parent'      	=> $panel_product_list,
		));

		azalea_eltdf_add_admin_field(array(
			'name'        	=> 'eltdf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'azaleawp'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'azaleawp'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		azalea_eltdf_add_admin_field(array(
			'name'        	=> 'eltdf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'azaleawp'),
			'default_value'	=> 'h6',
			'description' 	=> '',
			'options'       => azalea_eltdf_get_title_tag(),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = azalea_eltdf_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'azaleawp')
			)
		);
			
			azalea_eltdf_add_admin_field(array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'label'         => esc_html__('Set Thumbnail Images Position', 'azaleawp'),
				'default_value' => 'below-image',
				'options'		=> array(
					'below-image'  => esc_html__('Below Featured Image', 'azaleawp'),
					'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'azaleawp')
				),
				'parent'        => $panel_single_product
			));

			azalea_eltdf_add_admin_field(array(
				'name'        	=> 'eltdf_single_product_title_tag',
				'type'        	=> 'select',
				'label'       	=> esc_html__('Single Product Title Tag', 'azaleawp'),
				'default_value'	=> 'h2',
				'description' 	=> '',
				'options'       => azalea_eltdf_get_title_tag(),
				'parent'      	=> $panel_single_product,
			));

            azalea_eltdf_add_admin_field(
                array(
                    'type' => 'select',
                    'name' => 'show_title_area_woo',
                    'default_value' => '',
                    'label'       => esc_html__('Show Title Area', 'azaleawp'),
                    'description' => esc_html__('Enabling this option will show title area on single post pages', 'azaleawp'),
                    'parent'      => $panel_single_product,
                    'options'     => azalea_eltdf_get_yes_no_select_array(),
                    'args' => array(
                        'col_width' => 3
                    )
                )
            );

		$panel_content_bottom_cart = azalea_eltdf_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_content_bottom_woo',
				'title' => esc_html__('Content Bottom', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name'        	=> 'enable_content_bottom_area',
			'default_value' => '',
			'type' => 'select',
			'label'       => esc_html__('Show Content Bottom on Single Product Page', 'azaleawp'),
			'description' => esc_html__('Enabling this option will show content bottom on single post pages', 'azaleawp'),
			'parent'      => $panel_content_bottom_cart,
			'options'     => azalea_eltdf_get_yes_no_select_array(),
			'args' => array(
				'col_width' => 3
			)
		));
	}

	add_action( 'azalea_eltdf_options_map', 'azalea_eltdf_woocommerce_options_map', 21);
}