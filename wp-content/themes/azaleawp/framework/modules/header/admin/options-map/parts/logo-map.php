<?php

if ( ! function_exists( 'azalea_eltdf_logo_options_map' ) ) {
	function azalea_eltdf_logo_options_map() {
		
		azalea_eltdf_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'azaleawp' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = azalea_eltdf_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'azaleawp' )
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'azaleawp' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'azaleawp' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#eltdf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_logo_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Light', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image_centered',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Centered', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'name'          => 'logo_image_vertical_closed',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Vertical Closed Bottom', 'azaleawp' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'azalea_eltdf_options_map', 'azalea_eltdf_logo_options_map', 2 );
}