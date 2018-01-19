<?php

if ( ! function_exists('azalea_eltdf_blog_options_map') ) {

	function azalea_eltdf_blog_options_map() {

		azalea_eltdf_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'azaleawp'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */
		$panel_blog_lists = azalea_eltdf_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'azaleawp'),
			'description' => esc_html__('Choose a default blog layout for archived blog post lists', 'azaleawp'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'masonry'               => esc_html__('Blog: Masonry', 'azaleawp'),
                'standard'              => esc_html__('Blog: Standard', 'azaleawp'),
			)
		));

		azalea_eltdf_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout for Archive Pages', 'azaleawp'),
			'description' => esc_html__('Choose a sidebar layout for archived blog post lists', 'azaleawp'),
			'default_value' => '',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				''		            => esc_html__('Default', 'azaleawp'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'azaleawp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'azaleawp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'azaleawp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'azaleawp'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'azaleawp')
			)
		));
		
		$azalea_custom_sidebars = azalea_eltdf_get_custom_sidebars();
		if(count($azalea_custom_sidebars) > 0) {
			azalea_eltdf_add_admin_field(array(
				'name' => 'archive_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display for Archive Pages', 'azaleawp'),
				'description' => esc_html__('Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'azaleawp'),
				'parent' => $panel_blog_lists,
				'options' => azalea_eltdf_get_custom_sidebars(),
				'args'        => array(
					'select2'	=> true
				)
			));
		}

        azalea_eltdf_add_admin_field(array(
            'name'        => 'blog_masonry_layout',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Layout', 'azaleawp'),
            'default_value' => 'in-grid',
            'description' => esc_html__('Set masonry layout. Default is in grid.', 'azaleawp'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'in-grid'    => esc_html__('In Grid', 'azaleawp'),
                'full-width' => esc_html__('Full Width', 'azaleawp')
            )
        ));
		
		azalea_eltdf_add_admin_field(array(
			'name'        => 'blog_masonry_number_of_columns',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Number of Columns', 'azaleawp'),
			'default_value' => 'four',
			'description' => esc_html__('Set number of columns for your masonry blog lists. Default value is 4 columns', 'azaleawp'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'two'   => esc_html__('2 Columns', 'azaleawp'),
				'three' => esc_html__('3 Columns', 'azaleawp'),
				'four'  => esc_html__('4 Columns', 'azaleawp'),
				'five'  => esc_html__('5 Columns', 'azaleawp')
			)
		));
		
		azalea_eltdf_add_admin_field(array(
			'name'        => 'blog_masonry_space_between_items',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Space Between Items', 'azaleawp'),
			'default_value' => 'normal',
			'description' => esc_html__('Set space size between posts for your masonry blog lists. Default value is normal', 'azaleawp'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'normal'  => esc_html__('Normal', 'azaleawp'),
				'small'   => esc_html__('Small', 'azaleawp'),
				'tiny'    => esc_html__('Tiny', 'azaleawp'),
				'no'      => esc_html__('No Space', 'azaleawp')
			)
		));

        azalea_eltdf_add_admin_field(array(
            'name'        => 'blog_list_featured_image_proportion',
            'type'        => 'select',
            'label'       => esc_html__('Featured Image Proportion', 'azaleawp'),
            'default_value' => 'fixed',
            'description' => esc_html__('Choose type of proportions you want to use for featured images on blog lists.', 'azaleawp'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'fixed'    => esc_html__('Fixed', 'azaleawp'),
                'original' => esc_html__('Original', 'azaleawp')
            )
        ));

		azalea_eltdf_add_admin_field(array(
			'name'        => 'blog_pagination_type',
			'type'        => 'select',
			'label'       => esc_html__('Pagination Type', 'azaleawp'),
			'description' => esc_html__('Choose a pagination layout for Blog Lists', 'azaleawp'),
			'parent'      => $panel_blog_lists,
			'default_value' => 'standard',
			'options'     => array(
				'standard'		  => esc_html__('Standard', 'azaleawp'),
				'load-more'		  => esc_html__('Load More', 'azaleawp'),
				'infinite-scroll' => esc_html__('Infinite Scroll', 'azaleawp'),
				'no-pagination'   => esc_html__('No Pagination', 'azaleawp')
			)
		));
	
		azalea_eltdf_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '40',
				'label' => esc_html__('Number of Words in Excerpt', 'azaleawp'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'azaleawp'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = azalea_eltdf_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'azaleawp')
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'azaleawp'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'azaleawp'),
			'default_value'	=> '',
			'parent'      => $panel_blog_single,
			'options'     => array(
				''		            => esc_html__('Default', 'azaleawp'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'azaleawp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'azaleawp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'azaleawp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'azaleawp'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'azaleawp')
			)
		));

		if(count($azalea_custom_sidebars) > 0) {
			azalea_eltdf_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'azaleawp'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'azaleawp'),
				'parent' => $panel_blog_single,
				'options' => azalea_eltdf_get_custom_sidebars(),
				'args'        => array(
					'select2'	=> true
				)
			));
		}
		
		azalea_eltdf_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'show_title_area_blog',
				'default_value' => '',
				'label'       => esc_html__('Show Title Area', 'azaleawp'),
				'description' => esc_html__('Enabling this option will show title area on single post pages', 'azaleawp'),
				'parent'      => $panel_blog_single,
				'options'     => azalea_eltdf_get_yes_no_select_array(),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		
		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'full_height_title_area_blog',
				'default_value' => 'no',
				'label'       => esc_html__('Full Height Title', 'azaleawp'),
				'description' => esc_html__('Enabling this option will show standard title area in full height on single post pages', 'azaleawp'),
				'parent'      => $panel_blog_single,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		azalea_eltdf_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'azaleawp'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'azaleawp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		azalea_eltdf_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'azaleawp'),
			'description'   => esc_html__('Enabling this option will show related posts on single post pages', 'azaleawp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		azalea_eltdf_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments Form', 'azaleawp'),
			'description'   => esc_html__('Enabling this option will show comments form on single post pages', 'azaleawp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'azaleawp'),
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'azaleawp'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = azalea_eltdf_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'azaleawp'),
				'description' => esc_html__('Limit your navigation only through current category', 'azaleawp'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'azaleawp'),
				'description' => esc_html__('Enabling this option will display author name and descriptions on single post pages', 'azaleawp'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = azalea_eltdf_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'azaleawp'),
				'description' => esc_html__('Enabling this option will show author email', 'azaleawp'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		azalea_eltdf_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'       => esc_html__('Show Author Social Icons', 'azaleawp'),
				'description' => esc_html__('Enabling this option will show author social icons on single post pages', 'azaleawp'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	}

	add_action( 'azalea_eltdf_options_map', 'azalea_eltdf_blog_options_map', 16);
}