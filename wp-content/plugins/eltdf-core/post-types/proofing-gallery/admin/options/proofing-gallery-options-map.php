<?php

if ( ! function_exists('eltdf_core_proofing_gallery_options_map') ) {
    function eltdf_core_proofing_gallery_options_map() {

        azalea_eltdf_add_admin_page(array(
            'slug'  => '_proofing_gallery',
            'title' => esc_html__('Proofing Gallery', 'eltdf-core'),
            'icon'  => 'fa fa-file-image-o'
        ));

        $panel_archive = azalea_eltdf_add_admin_panel(array(
            'title' => esc_html__('Proofing Gallery Archive', 'eltdf-core'),
            'name'  => 'panel_proofing_gallery_archive',
            'page'  => '_proofing_gallery'
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        => 'proofing_gallery_archive_number_of_items',
            'type'        => 'text',
            'label'       => esc_html__('Number of Items', 'eltdf-core'),
            'description' => esc_html__('Set number of items for your proofing gallery list on archive pages. Default value is 12', 'eltdf-core'),
            'parent'      => $panel_archive,
            'args'        => array(
                'col_width' => 3
            )
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        => 'proofing_gallery_archive_number_of_columns',
            'type'        => 'select',
            'label'       => esc_html__('Number of Columns', 'eltdf-core'),
            'default_value' => '4',
            'description' => esc_html__('Set number of columns for your proofing gallery list on archive pages. Default value is 4 columns', 'eltdf-core'),
            'parent'      => $panel_archive,
            'options'     => array(
                '2' => esc_html__('2 Columns', 'eltdf-core'),
                '3' => esc_html__('3 Columns', 'eltdf-core'),
                '4' => esc_html__('4 Columns', 'eltdf-core'),
                '5' => esc_html__('5 Columns', 'eltdf-core'),
            )
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        => 'proofing_gallery_archive_space_between_items',
            'type'        => 'select',
            'label'       => esc_html__('Space Between Items', 'eltdf-core'),
            'default_value' => 'normal',
            'description' => esc_html__('Set space size between proofing_gallery items for your proofing gallery list on archive pages. Default value is normal', 'eltdf-core'),
            'parent'      => $panel_archive,
            'options'     => array(
                'normal'    => esc_html__('Normal', 'eltdf-core'),
                'small'     => esc_html__('Small', 'eltdf-core'),
                'tiny'      => esc_html__('Tiny', 'eltdf-core'),
                'no'        => esc_html__('No Space', 'eltdf-core')
            )
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        => 'proofing_gallery_archive_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Image Proportions', 'eltdf-core'),
            'default_value' => 'landscape',
            'description' => esc_html__('Set image proportions for your proofing gallery list on archive pages. Default value is landscape', 'eltdf-core'),
            'parent'      => $panel_archive,
            'options'     => array(
                'full'      => esc_html__('Original', 'eltdf-core'),
                'landscape' => esc_html__('Landscape', 'eltdf-core'),
                'portrait'  => esc_html__('Portrait', 'eltdf-core'),
                'square'    => esc_html__('Square', 'eltdf-core')
            )
        ));


        $panel = azalea_eltdf_add_admin_panel(array(
            'title' => esc_html__('Proofing Gallery Single', 'eltdf-core'),
            'name'  => 'panel_proofing_gallery_single',
            'page'  => '_proofing_gallery'
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        	=> 'proofing_gallery_skin',
            'type'        	=> 'select',
            'label'       	=> esc_html__('Skin', 'eltdf-core'),
            'default_value' => 'dark',
            'description'	=> esc_html__('Choose skin for style on single page', 'eltdf-core'),
            'parent'      	=> $panel,
            'options'     	=> array(
                'dark'      => esc_html__('Dark', 'eltdf-core'),
                'light'		=> esc_html__('Light', 'eltdf-core')
            )
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        	=> 'proofing_gallery_number_of_columns',
            'type'        	=> 'select',
            'label'       	=> esc_html__('Number of Columns', 'eltdf-core'),
            'default_value' => '4',
            'parent'      	=> $panel,
            'options'     	=> array(
                '3'      => esc_html__('3 Columns', 'eltdf-core'),
                '4'		 => esc_html__('4 Columns', 'eltdf-core')
            )
        ));

        azalea_eltdf_add_admin_field(array(
            'name'          => 'proofing_gallery_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments', 'eltdf-core'),
            'description'   => esc_html__('Enabling this option will show comments on your page', 'eltdf-core'),
            'parent'        => $panel,
            'default_value' => 'no'
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        => 'proofing_gallery_single_slug',
            'type'        => 'text',
            'label'       => esc_html__('Proofing Gallery Single Slug', 'eltdf-core'),
            'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'eltdf-core'),
            'parent'      => $panel,
            'args'        => array(
                'col_width' => 3
            )
        ));

        $panel_proofing_gallery_single_password_protected = azalea_eltdf_add_admin_panel(array(
            'title' => esc_html__('Proofing Gallery Single - Password Protected', 'eltdf-core'),
            'name'  => 'panel_proofing_gallery_single_password_protected',
            'page'  => '_proofing_gallery'
        ));

        azalea_eltdf_add_admin_field(array(
            'name'        		=> 'proofing_gallery_password_protected_full_screen',
            'type'        		=> 'select',
            'default_value'		=> 'no',
            'label'				=> esc_html__('Proofing Gallery Password Protected Full Screen', 'eltdf-core'),
            'parent'			=> $panel_proofing_gallery_single_password_protected,
            'options'			=> array(
                'no'	=> esc_html__('No', 'eltdf-core'),
                'yes'	=> esc_html__('Yes', 'eltdf-core')
            )
        ));
        $proofing_gallery_password_protected_padding_group = azalea_eltdf_add_admin_group(array(
            'title' => esc_html__('Padding', 'eltdf-core'),
            'name' => 'proofing_gallery_password_protected_padding_group',
            'parent' => $panel_proofing_gallery_single_password_protected,
            'description' => esc_html__('Set padding for password protected page', 'eltdf-core'),
        ));
        azalea_eltdf_add_admin_field(array(
            'name' => 'proofing_gallery_password_protected_padding_top',
            'type' => 'textsimple',
            'label' => esc_html__('Padding Top', 'eltdf-core'),
            'parent' => $proofing_gallery_password_protected_padding_group,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));
        azalea_eltdf_add_admin_field(array(
            'name' => 'proofing_gallery_password_protected_padding_bottom',
            'type' => 'textsimple',
            'label' => esc_html__('Padding Bottom', 'eltdf-core'),
            'parent' => $proofing_gallery_password_protected_padding_group,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));
        azalea_eltdf_add_admin_field(
            array(
                'name'          => 'proofing_gallery_password_protected_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Proofing Gallery Password Protected Background Image', 'eltdf-core'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'eltdf-core'),
                'parent'        => $panel_proofing_gallery_single_password_protected
            )
        );
        azalea_eltdf_add_admin_field(
            array(
                'name'          	=> 'proofing_gallery_password_protected_skin',
                'type'          	=> 'select',
                'default_value'		=> 'dark',
                'label'        		=> esc_html__('Proofing Gallery Password Protected Skin', 'eltdf-core'),
                'parent'        	=> $panel_proofing_gallery_single_password_protected,
                'options'			=> array(
                    'dark'	=> esc_html__('Default/Dark', 'eltdf-core'),
                    'light'	=> esc_html__('Light', 'eltdf-core')
                )
            )
        );
    }

    add_action( 'azalea_eltdf_options_map', 'eltdf_core_proofing_gallery_options_map', 14);
}