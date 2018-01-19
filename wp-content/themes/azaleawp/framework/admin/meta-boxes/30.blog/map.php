<?php

if ( ! function_exists( 'azalea_eltdf_map_blog_meta' ) ) {
	function azalea_eltdf_map_blog_meta() {
		$eltd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = azalea_eltdf_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'azaleawp' ),
				'name'  => 'blog_meta'
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'azaleawp' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'azaleawp' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'azaleawp' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'azaleawp' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'azaleawp' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'azaleawp' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'azaleawp' ),
					'in-grid'    => esc_html__( 'In Grid', 'azaleawp' ),
					'full-width' => esc_html__( 'Full Width', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'azaleawp' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'azaleawp' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'azaleawp' ),
					'two'   => esc_html__( '2 Columns', 'azaleawp' ),
					'three' => esc_html__( '3 Columns', 'azaleawp' ),
					'four'  => esc_html__( '4 Columns', 'azaleawp' ),
					'five'  => esc_html__( '5 Columns', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'azaleawp' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'azaleawp' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''       => esc_html__( 'Default', 'azaleawp' ),
					'normal' => esc_html__( 'Normal', 'azaleawp' ),
					'small'  => esc_html__( 'Small', 'azaleawp' ),
					'tiny'   => esc_html__( 'Tiny', 'azaleawp' ),
					'no'     => esc_html__( 'No Space', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Featured Image Proportion', 'azaleawp' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on blog lists.', 'azaleawp' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'azaleawp' ),
					'fixed'    => esc_html__( 'Fixed', 'azaleawp' ),
					'original' => esc_html__( 'Original', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'azaleawp' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'azaleawp' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'azaleawp' ),
					'standard'        => esc_html__( 'Standard', 'azaleawp' ),
					'load-more'       => esc_html__( 'Load More', 'azaleawp' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'azaleawp' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'azaleawp' )
				)
			)
		);
		
		azalea_eltdf_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'azaleawp' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'azaleawp' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'azalea_eltdf_meta_boxes_map', 'azalea_eltdf_map_blog_meta', 30 );
}