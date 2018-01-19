<?php

if ( ! function_exists( 'azalea_eltdf_map_title_meta' ) ) {
	function azalea_eltdf_map_title_meta() {
		$title_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => apply_filters( 'azalea_eltdf_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'azaleawp' ),
				'name'  => 'title_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'azaleawp' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'azaleawp' ),
				'parent'        => $title_meta_box,
				'options'       => azalea_eltdf_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#eltdf_eltdf_show_title_area_meta_container",
						"yes" => ""
					),
					"show"       => array(
						""    => "#eltdf_eltdf_show_title_area_meta_container",
						"no"  => "",
						"yes" => "#eltdf_eltdf_show_title_area_meta_container"
					)
				)
			)
		);
		
		$show_title_area_meta_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $title_meta_box,
				'name'            => 'eltdf_show_title_area_meta_container',
				'hidden_property' => 'eltdf_show_title_area_meta',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Area Type', 'azaleawp' ),
				'description'   => esc_html__( 'Choose title type', 'azaleawp' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => esc_html__( 'Default', 'azaleawp' ),
					'standard'   => esc_html__( 'Standard', 'azaleawp' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'azaleawp' )
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"breadcrumb" => "#eltdf_eltdf_title_area_type_meta_container"
					),
					"show"       => array(
						""           => "#eltdf_eltdf_title_area_type_meta_container",
						"standard"   => "#eltdf_eltdf_title_area_type_meta_container",
						"breadcrumb" => ""
					)
				)
			)
		);
		
		$title_area_type_meta_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'eltdf_title_area_type_meta_container',
				'hidden_property' => 'eltdf_title_area_type_meta',
				'hidden_value'    => 'breadcrumb'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_enable_breadcrumbs_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Breadcrumbs', 'azaleawp' ),
				'description'   => esc_html__( 'This option will display Breadcrumbs in Title Area', 'azaleawp' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => azalea_eltdf_get_yes_no_select_array()
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_vertical_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Vertical Alignment', 'azaleawp' ),
				'description'   => esc_html__( 'Specify title vertical alignment', 'azaleawp' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''              => esc_html__( 'Default', 'azaleawp' ),
					'header_bottom' => esc_html__( 'From Bottom of Header', 'azaleawp' ),
					'window_top'    => esc_html__( 'From Window Top', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_content_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Horizontal Alignment', 'azaleawp' ),
				'description'   => esc_html__( 'Specify title horizontal alignment', 'azaleawp' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''       => esc_html__( 'Default', 'azaleawp' ),
					'left'   => esc_html__( 'Left', 'azaleawp' ),
					'center' => esc_html__( 'Center', 'azaleawp' ),
					'right'  => esc_html__( 'Right', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_title_tag_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Tag', 'azaleawp' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => azalea_eltdf_get_title_tag( true )
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_text_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Title Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose a color for title text', 'azaleawp' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose a background color for title area', 'azaleawp' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_hide_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Background Image', 'azaleawp' ),
				'description'   => esc_html__( 'Enable this option to hide background image in title area', 'azaleawp' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#eltdf_eltdf_hide_background_image_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_background_image_meta_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'eltdf_hide_background_image_meta_container',
				'hidden_property' => 'eltdf_hide_background_image_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'azaleawp' ),
				'description' => esc_html__( 'Choose an Image for title area', 'azaleawp' ),
				'parent'      => $hide_background_image_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_background_image_responsive_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Responsive Image', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image responsive', 'azaleawp' ),
				'parent'        => $hide_background_image_meta_container,
				'options'       => azalea_eltdf_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "",
						"yes" => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta"
					),
					"show"       => array(
						""    => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
						"no"  => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
						"yes" => ""
					)
				)
			)
		);
		
		$title_area_background_image_responsive_meta_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $hide_background_image_meta_container,
				'name'            => 'eltdf_title_area_background_image_responsive_meta_container',
				'hidden_property' => 'eltdf_title_area_background_image_responsive_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_background_image_parallax_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image in Parallax', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image parallax', 'azaleawp' ),
				'parent'        => $title_area_background_image_responsive_meta_container,
				'options'       => array(
					''         => esc_html__( 'Default', 'azaleawp' ),
					'no'       => esc_html__( 'No', 'azaleawp' ),
					'yes'      => esc_html__( 'Yes', 'azaleawp' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_height_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Height', 'azaleawp' ),
				'description' => esc_html__( 'Set a height for Title Area', 'azaleawp' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_subtitle_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle Text', 'azaleawp' ),
				'description'   => esc_html__( 'Enter your subtitle text', 'azaleawp' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					'col_width' => 6
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_subtitle_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Subtitle Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose a color for subtitle text', 'azaleawp' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		azalea_eltdf_add_meta_box_field(array(
			'name' => 'eltdf_subtitle_side_padding_meta',
			'type' => 'text',
			'label' => esc_html__('Subtitle Side Padding', 'azaleawp'),
			'description' => esc_html__('Set left/right padding for subtitle area', 'azaleawp'),
			'parent' => $show_title_area_meta_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => '%'
			)
		));
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_title_meta', 60 );
}