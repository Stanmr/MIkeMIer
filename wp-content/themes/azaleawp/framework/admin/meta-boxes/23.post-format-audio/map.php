<?php

if ( ! function_exists( 'azalea_eltdf_map_post_audio_meta' ) ) {
	function azalea_eltdf_map_post_audio_meta() {
		$audio_post_format_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'azaleawp' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'azaleawp' ),
				'description'   => esc_html__( 'Choose audio type', 'azaleawp' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'azaleawp' ),
					'self'            => esc_html__( 'Self Hosted', 'azaleawp' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_audio_self_hosted_container',
						'self'            => '#eltdf_eltdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_audio_embedded_container',
						'self'            => '#eltdf_eltdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_audio_embedded_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_embedded_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_audio_self_hosted_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_self_hosted_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'azaleawp' ),
				'description' => esc_html__( 'Enter audio URL', 'azaleawp' ),
				'parent'      => $eltdf_audio_embedded_container,
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'azaleawp' ),
				'description' => esc_html__( 'Enter audio link', 'azaleawp' ),
				'parent'      => $eltdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_post_audio_meta', 23 );
}