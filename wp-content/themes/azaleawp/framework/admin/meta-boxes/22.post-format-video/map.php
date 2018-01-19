<?php

if ( ! function_exists( 'azalea_eltdf_map_post_video_meta' ) ) {
	function azalea_eltdf_map_post_video_meta() {
		$video_post_format_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'azaleawp' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'azaleawp' ),
				'description'   => esc_html__( 'Choose video type', 'azaleawp' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'azaleawp' ),
					'self'            => esc_html__( 'Self Hosted', 'azaleawp' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_video_self_hosted_container',
						'self'            => '#eltdf_eltdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_video_embedded_container',
						'self'            => '#eltdf_eltdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_video_embedded_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_embedded_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_video_self_hosted_container = azalea_eltdf_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_self_hosted_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'azaleawp' ),
				'description' => esc_html__( 'Enter Video URL', 'azaleawp' ),
				'parent'      => $eltdf_video_embedded_container,
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'azaleawp' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'azaleawp' ),
				'parent'      => $eltdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_post_video_meta', 22 );
}