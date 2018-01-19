<?php

if ( ! function_exists( 'azalea_eltdf_map_general_meta' ) ) {
	function azalea_eltdf_map_general_meta() {
		
		$general_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => apply_filters( 'azalea_eltdf_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'azaleawp' ),
				'name'  => 'general_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'azaleawp' ),
				'parent'        => $general_meta_box,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$eltdf_content_padding_group = azalea_eltdf_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'azaleawp' ),
				'description' => esc_html__( 'Define styles for Content area', 'azaleawp' ),
				'parent'      => $general_meta_box
			)
		);
		
		$eltdf_content_padding_row = azalea_eltdf_add_admin_row(
			array(
				'name'   => 'eltdf_content_padding_row',
				'next'   => true,
				'parent' => $eltdf_content_padding_group
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'   => 'eltdf_page_content_top_padding',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Content Top Padding', 'azaleawp' ),
				'parent' => $eltdf_content_padding_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'    => 'eltdf_page_content_top_padding_mobile',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Set this top padding for mobile header', 'azaleawp' ),
				'parent'  => $eltdf_content_padding_row,
				'options' => azalea_eltdf_get_yes_no_select_array( false )
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'azaleawp' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'azaleawp' ),
				'parent'      => $general_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose background color for page content', 'azaleawp' ),
				'parent'      => $general_meta_box
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'azaleawp' ),
				'parent'  => $general_meta_box,
				'options' => azalea_eltdf_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_boxed_container_meta',
						'no'  => '#eltdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_boxed_container_meta'
					)
				)
			)
		);
		
		$boxed_container_meta = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'boxed_container_meta',
				'hidden_property' => 'eltdf_boxed_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_in_box_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'azaleawp' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_boxed_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'azaleawp' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'azaleawp' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_boxed_pattern_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'azaleawp' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'azaleawp' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'azaleawp' ),
				'description'   => esc_html__( 'Choose background image attachment', 'azaleawp' ),
				'parent'        => $boxed_container_meta,
				'options'       => array(
					''       => esc_html__( 'Default', 'azaleawp' ),
					'fixed'  => esc_html__( 'Fixed', 'azaleawp' ),
					'scroll' => esc_html__( 'Scroll', 'azaleawp' )
				)
			)
		);



        azalea_eltdf_add_meta_box_field(
            array(
                'name'          => 'eltdf_paspartu_meta',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Passepartout', 'azaleawp' ),
                'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'azaleawp' ),
                'parent'        => $general_meta_box,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_paspartu_container"
                )
            )
        );

        $paspartu_container = azalea_eltdf_add_admin_container(
            array(
                'parent'          => $general_meta_box,
                'name'            => 'paspartu_container',
                'hidden_property' => 'eltdf_paspartu_meta',
                'hidden_value'    => 'no'
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'name'        => 'eltdf_paspartu_color_meta',
                'type'        => 'color',
                'label'       => esc_html__( 'Passepartout Color', 'azaleawp' ),
                'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'azaleawp' ),
                'parent'      => $paspartu_container
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'name'        => 'eltdf_paspartu_width_meta',
                'type'        => 'text',
                'label'       => esc_html__( 'Passepartout Size', 'azaleawp' ),
                'description' => esc_html__( 'Enter size amount for passepartout', 'azaleawp' ),
                'parent'      => $paspartu_container,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => '%'
                )
            )
        );

        azalea_eltdf_add_meta_box_field(
            array(
                'parent'        => $paspartu_container,
                'type'          => 'yesno',
                'default_value' => 'no',
                'name'          => 'eltdf_disable_top_paspartu_meta',
                'label'         => esc_html__( 'Disable Top Passepartout', 'azaleawp' )
            )
        );
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'azaleawp' ),
				'parent'        => $general_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transitions_container_meta',
						'no'  => '#eltdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transitions_container_meta'
					)
				)
			)
		);
		
		$page_transitions_container_meta = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'page_transitions_container_meta',
				'hidden_property' => 'eltdf_smooth_page_transitions_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_transition_preloader_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Preloading Animation', 'azaleawp' ),
				'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'azaleawp' ),
				'parent'      => $page_transitions_container_meta,
				'options'     => azalea_eltdf_get_yes_no_select_array(),
				'args'        => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transition_preloader_container_meta',
						'no'  => '#eltdf_page_transition_preloader_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transition_preloader_container_meta'
					)
				)
			)
		);
		
		$page_transition_preloader_container_meta = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $page_transitions_container_meta,
				'name'            => 'page_transition_preloader_container_meta',
				'hidden_property' => 'eltdf_page_transition_preloader_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'azaleawp' ),
				'parent' => $page_transition_preloader_container_meta
			)
		);
		
		$group_pt_spinner_animation_meta = azalea_eltdf_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation_meta',
				'title'       => esc_html__( 'Loader Style', 'azaleawp' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'azaleawp' ),
				'parent'      => $page_transition_preloader_container_meta
			)
		);
		
		$row_pt_spinner_animation_meta = azalea_eltdf_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation_meta',
				'parent' => $group_pt_spinner_animation_meta
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'type'    => 'selectsimple',
				'name'    => 'eltdf_smooth_pt_spinner_type_meta',
				'label'   => esc_html__( 'Spinner Type', 'azaleawp' ),
				'parent'  => $row_pt_spinner_animation_meta,
				'options' => array(
					''                      => esc_html__( 'Default', 'azaleawp' ),
					'rotate_circles'        => esc_html__( 'Rotate Circles', 'azaleawp' ),
					'pulse'                 => esc_html__( 'Pulse', 'azaleawp' ),
					'double_pulse'          => esc_html__( 'Double Pulse', 'azaleawp' ),
					'cube'                  => esc_html__( 'Cube', 'azaleawp' ),
					'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'azaleawp' ),
					'stripes'               => esc_html__( 'Stripes', 'azaleawp' ),
					'wave'                  => esc_html__( 'Wave', 'azaleawp' ),
					'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'azaleawp' ),
					'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'azaleawp' ),
					'atom'                  => esc_html__( 'Atom', 'azaleawp' ),
					'clock'                 => esc_html__( 'Clock', 'azaleawp' ),
					'mitosis'               => esc_html__( 'Mitosis', 'azaleawp' ),
					'lines'                 => esc_html__( 'Lines', 'azaleawp' ),
					'fussion'               => esc_html__( 'Fussion', 'azaleawp' ),
					'wave_circles'          => esc_html__( 'Wave Circles', 'azaleawp' ),
					'pulse_circles'         => esc_html__( 'Pulse Circles', 'azaleawp' ),
					'image_transition'      => esc_html__( 'Background Image Transition', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'type'   => 'colorsimple',
				'name'   => 'eltdf_smooth_pt_spinner_color_meta',
				'label'  => esc_html__( 'Spinner Color', 'azaleawp' ),
				'parent' => $row_pt_spinner_animation_meta
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_transition_fadeout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Fade Out Animation', 'azaleawp' ),
				'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'azaleawp' ),
				'options'     => azalea_eltdf_get_yes_no_select_array(),
				'parent'      => $page_transitions_container_meta
			
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'azaleawp' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'azaleawp' ),
				'parent'      => $general_meta_box,
				'options'     => azalea_eltdf_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_general_meta', 10 );
}