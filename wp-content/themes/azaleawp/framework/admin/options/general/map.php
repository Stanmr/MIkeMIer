<?php

if ( ! function_exists( 'azalea_eltdf_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function azalea_eltdf_general_options_map() {
		
		azalea_eltdf_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'azaleawp' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = azalea_eltdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'azaleawp' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'azaleawp' ),
				'parent'        => $panel_design_style
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'azaleawp' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'azaleawp' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'azaleawp' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'azaleawp' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'azaleawp' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'azaleawp' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'azaleawp' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'azaleawp' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'azaleawp' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'azaleawp' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'azaleawp' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'azaleawp' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'azaleawp' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'azaleawp' ),
					'100italic' => esc_html__( '100 Thin Italic', 'azaleawp' ),
					'200'       => esc_html__( '200 Extra-Light', 'azaleawp' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'azaleawp' ),
					'300'       => esc_html__( '300 Light', 'azaleawp' ),
					'300italic' => esc_html__( '300 Light Italic', 'azaleawp' ),
					'400'       => esc_html__( '400 Regular', 'azaleawp' ),
					'400italic' => esc_html__( '400 Regular Italic', 'azaleawp' ),
					'500'       => esc_html__( '500 Medium', 'azaleawp' ),
					'500italic' => esc_html__( '500 Medium Italic', 'azaleawp' ),
					'600'       => esc_html__( '600 Semi-Bold', 'azaleawp' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'azaleawp' ),
					'700'       => esc_html__( '700 Bold', 'azaleawp' ),
					'700italic' => esc_html__( '700 Bold Italic', 'azaleawp' ),
					'800'       => esc_html__( '800 Extra-Bold', 'azaleawp' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'azaleawp' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'azaleawp' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'azaleawp' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'azaleawp' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'azaleawp' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'azaleawp' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'azaleawp' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'azaleawp' ),
					'greek'        => esc_html__( 'Greek', 'azaleawp' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'azaleawp' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'azaleawp' ),
				'parent'      => $panel_design_style
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'azaleawp' ),
				'parent'      => $panel_design_style
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'azaleawp' ),
				'parent'      => $panel_design_style
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'azaleawp' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_boxed_container"
				)
			)
		);
		
		$boxed_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'boxed_container',
				'hidden_property' => 'boxed',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'page_background_color_in_box',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'azaleawp' ),
				'parent'      => $boxed_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'boxed_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'azaleawp' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'azaleawp' ),
				'parent'      => $boxed_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'boxed_pattern_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'azaleawp' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'azaleawp' ),
				'parent'      => $boxed_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'azaleawp' ),
				'description'   => esc_html__( 'Choose background image attachment', 'azaleawp' ),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__( 'Fixed', 'azaleawp' ),
					'scroll' => esc_html__( 'Scroll', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'azaleawp' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_paspartu_container"
				)
			)
		);
		
		$paspartu_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'paspartu_container',
				'hidden_property' => 'paspartu',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'paspartu_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Passepartout Color', 'azaleawp' ),
				'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'azaleawp' ),
				'parent'      => $paspartu_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'paspartu_width',
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
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $paspartu_container,
				'type'          => 'yesno',
				'default_value' => 'no',
				'name'          => 'disable_top_paspartu',
				'label'         => esc_html__( 'Disable Top Passepartout', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'azaleawp' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'azaleawp' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltdf-grid-1300' => esc_html__( '1300px - default', 'azaleawp' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'azaleawp' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'azaleawp' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'azaleawp' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'azaleawp' )
				)
			)
		);
		
		$panel_settings = azalea_eltdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'azaleawp' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transitions_container, #eltdf_pt_loading_logo"
				)
			)
		);
		
		$page_transitions_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $panel_settings,
				'name'            => 'page_transitions_container',
				'hidden_property' => 'smooth_page_transitions',
				'hidden_value'    => 'no'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'page_transition_preloader',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Preloading Animation', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'azaleawp' ),
				'parent'        => $page_transitions_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transition_preloader_container"
				)
			)
		);
		
		$page_transition_preloader_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'page_transition_preloader_container',
				'hidden_property' => 'page_transition_preloader',
				'hidden_value'    => 'no'
			)
		);
		
		
		azalea_eltdf_add_admin_field(
			array(
				'name'   => 'smooth_pt_bgnd_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'azaleawp' ),
				'parent' => $page_transition_preloader_container
			)
		);
		
		$group_pt_spinner_animation = azalea_eltdf_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation',
				'title'       => esc_html__( 'Loader Style', 'azaleawp' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'azaleawp' ),
				'parent'      => $page_transition_preloader_container
			)
		);
		
		$row_pt_spinner_animation = azalea_eltdf_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation',
				'parent' => $group_pt_spinner_animation
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'type'          => 'selectsimple',
				'name'          => 'smooth_pt_spinner_type',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Type', 'azaleawp' ),
				'parent'        => $row_pt_spinner_animation,
				'options'       => array(
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
				),
				'args'          => array(
					"dependence"  => true,
					'show'        => array(
						"image_transition"      => "#eltdf_logo_params_container",
						"rotate_circles"        => "#eltdf_smooth_pt_spinner_color",
						"pulse"                 => "#eltdf_smooth_pt_spinner_color",
						"double_pulse"          => "#eltdf_smooth_pt_spinner_color",
						"cube"                  => "#eltdf_smooth_pt_spinner_color",
						"rotating_cubes"        => "#eltdf_smooth_pt_spinner_color",
						"stripes"               => "#eltdf_smooth_pt_spinner_color",
						"wave"                  => "#eltdf_smooth_pt_spinner_color",
						"two_rotating_circles"  => "#eltdf_smooth_pt_spinner_color",
						"five_rotating_circles" => "#eltdf_smooth_pt_spinner_color",
						"atom"                  => "#eltdf_smooth_pt_spinner_color",
						"clock"                 => "#eltdf_smooth_pt_spinner_color",
						"mitosis"               => "#eltdf_smooth_pt_spinner_color",
						"lines"                 => "#eltdf_smooth_pt_spinner_color",
						"fussion"               => "#eltdf_smooth_pt_spinner_color",
						"wave_circles"          => "#eltdf_smooth_pt_spinner_color",
						"pulse_circles"         => "#eltdf_smooth_pt_spinner_color"
					),
					'hide'        => array(
						"image_transition"      => "#eltdf_smooth_pt_spinner_color",
						"rotate_circles"        => "#eltdf_logo_params_container",
						"pulse"                 => "#eltdf_logo_params_container",
						"double_pulse"          => "#eltdf_logo_params_container",
						"cube"                  => "#eltdf_logo_params_container",
						"rotating_cubes"        => "#eltdf_logo_params_container",
						"stripes"               => "#eltdf_logo_params_container",
						"wave"                  => "#eltdf_logo_params_container",
						"two_rotating_circles"  => "#eltdf_logo_params_container",
						"five_rotating_circles" => "#eltdf_logo_params_container",
						"atom"                  => "#eltdf_logo_params_container",
						"clock"                 => "#eltdf_logo_params_container",
						"mitosis"               => "#eltdf_logo_params_container",
						"lines"                 => "#eltdf_logo_params_container",
						"fussion"               => "#eltdf_logo_params_container",
						"wave_circles"          => "#eltdf_logo_params_container",
						"pulse_circles"         => "#eltdf_logo_params_container"
					)
				)
			)
		);

		$logo_params_container = azalea_eltdf_add_admin_container(
			array(
				'parent'            => $page_transition_preloader_container,
				'name'              => 'logo_params_container',
				'hidden_property'   => 'pt_loading_logo',
				'hidden_value'      => 'no'
			)
		);

		azalea_eltdf_add_admin_field(array(
				'name'          => 'pt_loading_logo',
				'type'          => 'image',
				'label'         => esc_html__('Preloader Logo', 'azaleawp'),
				'description'   => esc_html__('Choose preloader logo to be displayed until the page is loaded', 'azaleawp'),
				'parent'        => $logo_params_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'smooth_pt_spinner_color',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Color', 'azaleawp' ),
				'parent'        => $row_pt_spinner_animation
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'page_transition_fadeout',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Fade Out Animation', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'azaleawp' ),
				'parent'        => $page_transitions_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'azaleawp' ),
				'parent'        => $panel_settings
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'azaleawp' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = azalea_eltdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'azaleawp' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'azaleawp' ),
				'parent'      => $panel_custom_code
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'azaleawp' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'azaleawp' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = azalea_eltdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'azaleawp' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'azaleawp' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'azalea_eltdf_options_map', 'azalea_eltdf_general_options_map', 1 );
}

if ( ! function_exists( 'azalea_eltdf_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function azalea_eltdf_page_general_style( $style ) {
		$current_style = '';
		$class_prefix  = azalea_eltdf_get_unique_page_class( azalea_eltdf_get_page_id() );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = azalea_eltdf_get_meta_field_intersect( 'page_background_color_in_box' );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = azalea_eltdf_get_meta_field_intersect( 'boxed_background_image' );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = azalea_eltdf_get_meta_field_intersect( 'boxed_pattern_background_image' );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = azalea_eltdf_get_meta_field_intersect( 'boxed_background_image_attachment' );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltdf-boxed .eltdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= azalea_eltdf_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'azalea_eltdf_add_page_custom_style', 'azalea_eltdf_page_general_style' );
}