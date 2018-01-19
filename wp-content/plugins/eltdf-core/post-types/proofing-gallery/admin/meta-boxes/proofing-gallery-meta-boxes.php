<?php

if(!function_exists('eltdf_core_map_proofing_gallery_meta_fields')) {

    function eltdf_core_map_proofing_gallery_meta_fields() {

        $proofing_gallery_meta_box = azalea_eltdf_add_meta_box(array(
            'scope' => 'proofing-gallery',
            'title' => esc_html__('Gallery', 'eltdf-core'),
            'name'  => 'proofing_gallery_settings_meta_box'
        ));

        $eltdf_gallery_image_gallery = new AzaleaEltdfMultipleImages("eltdf_proofing_gallery_image_gallery", esc_html__('Gallery Images', 'eltdf-core'), esc_html__('Choose your gallery images', 'eltdf-core'));
        $proofing_gallery_meta_box->addChild("eltdf_proofing_gallery_image_gallery",$eltdf_gallery_image_gallery);

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_proofing_gallery_skin_meta',
                'type'          => 'select',
                'label'         => esc_html__('Skin', 'eltdf-core'),
                'parent'        => $proofing_gallery_meta_box,
                'default_value' => '',
                'options'     => array(
                    ''		=> esc_html__('Default', 'eltdf-core'),
                    'dark'	=> esc_html__('Dark', 'eltdf-core'),
                    'light'	=> esc_html__('Light', 'eltdf-core')

                )
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_proofing_gallery_number_of_columns_meta',
                'type'          => 'select',
                'label'         => esc_html__('Number of Columns', 'eltdf-core'),
                'parent'        => $proofing_gallery_meta_box,
                'default_value' => '4',
                'options'     => array(
                    '' 		=> esc_html__('Default', 'eltdf-core'),
                    '3'		=> esc_html__('3 Columns', 'eltdf-core'),
                    '4'		=> esc_html__('4 Columns', 'eltdf-core')

                )
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'name' => 'eltdf_proofing_gallery_client_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Client', 'eltdf-core'),
                'parent' => $proofing_gallery_meta_box
            )
        );
        azalea_eltdf_add_meta_box_field(
            array(
                'name' => 'eltdf_proofing_gallery_date_meta',
                'type' => 'date',
                'default_value' => '',
                'label' => esc_html__('Date', 'eltdf-core'),
                'parent' => $proofing_gallery_meta_box
            )
        );
        azalea_eltdf_add_meta_box_field(
            array(
                'name' => 'eltdf_proofing_gallery_subject_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Subject', 'eltdf-core'),
                'parent' => $proofing_gallery_meta_box
            )
        );
        azalea_eltdf_add_meta_box_field(
            array(
                'name' => 'eltdf_proofing_gallery_download_link_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Download Link', 'eltdf-core'),
                'parent' => $proofing_gallery_meta_box
            )
        );

        azalea_eltdf_add_meta_box_field(array(
            'name'        		=> 'eltdf_proofing_gallery_password_protected_full_screen_meta',
            'type'        		=> 'select',
            'default_value'		=> '',
            'label'				=> esc_html__('Proofing Gallery Password Protected Full Screen', 'eltdf-core'),
            'parent'			=> $proofing_gallery_meta_box,
            'options'			=> array(
                ''		=> esc_html__('Default', 'eltdf-core'),
                'no'	=> esc_html__('No', 'eltdf-core'),
                'yes'	=> esc_html__('Yes', 'eltdf-core')
            )
        ));

        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_proofing_gallery_password_protected_background_image_meta',
                'type'          => 'image',
                'label'         => esc_html__('Proofing Gallery Password Protected Background Image', 'eltdf-core'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'eltdf-core'),
                'parent'        => $proofing_gallery_meta_box
            )
        );
        azalea_eltdf_add_meta_box_field(
            array(
                'name'          	=> 'eltdf_proofing_gallery_password_protected_skin_meta',
                'type'          	=> 'select',
                'default_value'		=> '',
                'label'        		=> esc_html__('Proofing Gallery Password Protected Skin', 'eltdf-core'),
                'parent'        	=> $proofing_gallery_meta_box,
                'options'			=> array(
                    ''		=> esc_html__('Default', 'eltdf-core'),
                    'dark'	=> esc_html__('Dark', 'eltdf-core'),
                    'light'	=> esc_html__('Light', 'eltdf-core')
                )
            )
        );


    }

    add_action('azalea_eltdf_meta_boxes_map', 'eltdf_core_map_proofing_gallery_meta_fields', 45);
}