<?php

if(!function_exists('azalea_eltdf_map_woocommerce_meta')) {
    function azalea_eltdf_map_woocommerce_meta() {
        $woocommerce_meta_box = azalea_eltdf_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'azaleawp'),
                'name' => 'woo_product_meta'
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'azaleawp'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'azaleawp'),
                'parent'        => $woocommerce_meta_box,
                'options'       => azalea_eltdf_get_yes_no_select_array()
            )
        );

        $woocommerce_content_meta_box = azalea_eltdf_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Content Bottom', 'azaleawp'),
                'name' => 'woo_product_content_bottom_meta'
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_enable_content_bottom_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Content Bottom', 'azaleawp'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'azaleawp'),
                'parent'        => $woocommerce_content_meta_box,
                'options'       => azalea_eltdf_get_yes_no_select_array()
            )
        );
    }
	
    add_action('azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_woocommerce_meta', 99);
}