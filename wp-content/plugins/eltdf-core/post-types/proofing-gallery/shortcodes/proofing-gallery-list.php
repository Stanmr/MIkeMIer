<?php
namespace EltdCore\CPT\Shortcodes\ProofingGallery;


use EltdCore\Lib;

/**
 * Class GalleryList
 * @package EltdCore\CPT\ProofingGallery\Shortcodes
 */
class ProofingGalleryList implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'eltdf_proofing_gallery_list';

        add_action('vc_before_init', array($this, 'vcMap'));

		//Portfolio selected projects filter
		add_filter( 'vc_autocomplete_eltdf_proofing_gallery_list_selected_projects_callback', array( &$this, 'proofingGalleryIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio selected projects render
		add_filter( 'vc_autocomplete_eltdf_proofing_gallery_list_selected_projects_render', array( &$this, 'proofingGalleryIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)


	}

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map
     */
    public function vcMap() {
	    if(function_exists('vc_map')) {
		    vc_map( array(
				    'name'                      => esc_html__( 'Eltd Proofing Gallery List', 'eltdf-core' ),
				    'base'                      => $this->getBase(),
				    'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
				    'icon'                      => 'icon-wpb-proofing-gallery extended-custom-icon',
				    'allowed_container_element' => 'vc_row',
				    'params'                    => array(
						    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'number_of_columns',
						    'heading'     => esc_html__( 'Number of Columns', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Default', 'eltdf-core' ) => '',
							    esc_html__( 'One', 'eltdf-core' )     => '1',
							    esc_html__( 'Two', 'eltdf-core' )     => '2',
							    esc_html__( 'Three', 'eltdf-core' )   => '3',
							    esc_html__( 'Four', 'eltdf-core' )    => '4',
							    esc_html__( 'Five', 'eltdf-core' )    => '5'
						    ),
						    'description' => esc_html__( 'Default value is Three', 'eltdf-core' ),
						    'admin_label' => true
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'space_between_items',
						    'heading'     => esc_html__( 'Space Between Proofing Gallery Items', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
							    esc_html__( 'Small', 'eltdf-core' )    => 'small',
							    esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
							    esc_html__( 'No Space', 'eltdf-core' ) => 'no'
						    ),
						    'admin_label' => true
					    ),
					    array(
						    'type'        => 'textfield',
						    'param_name'  => 'number_of_items',
						    'heading'     => esc_html__( 'Number of Galleries Per Page', 'eltdf-core' ),
						    'description' => esc_html__( 'Set number of items for your proofing-gallery list. Enter -1 to show all.', 'eltdf-core' ),
						    'value'       => '-1'
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'image_proportions',
						    'heading'     => esc_html__( 'Image Proportions', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Original', 'eltdf-core' )  => 'full',
							    esc_html__( 'Square', 'eltdf-core' )    => 'square',
							    esc_html__( 'Landscape', 'eltdf-core' ) => 'landscape',
							    esc_html__( 'Portrait', 'eltdf-core' )  => 'portrait',
							    esc_html__( 'Medium', 'eltdf-core' )    => 'medium',
							    esc_html__( 'Large', 'eltdf-core' )     => 'large'
						    ),
						    'description' => esc_html__( 'Set image proportions for your proofing-gallery list. Also this option will apply to masonry type if you do not set any option in Proofing Gallery Single page for image proportion.', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'autocomplete',
						    'param_name'  => 'selected_projects',
						    'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'eltdf-core' ),
						    'settings'    => array(
							    'multiple'      => true,
							    'sortable'      => true,
							    'unique_values' => true
						    ),
						    'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'order_by',
						    'heading'     => esc_html__( 'Order By', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'Date', 'eltdf-core' )       => 'date',
							    esc_html__( 'Menu Order', 'eltdf-core' ) => 'menu_order',
							    esc_html__( 'Random', 'eltdf-core' )     => 'rand',
							    esc_html__( 'Slug', 'eltdf-core' )       => 'name',
							    esc_html__( 'Title', 'eltdf-core' )      => 'title'
						    )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'order',
						    'heading'     => esc_html__( 'Order', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'ASC', 'eltdf-core' )  => 'ASC',
							    esc_html__( 'DESC', 'eltdf-core' ) => 'DESC',
						    )
					    ),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'eltdf-core' ),
							'value'       => array_flip(azalea_eltdf_get_title_tag(true))
						),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'pagination_type',
						    'heading'     => esc_html__( 'Pagination Type', 'eltdf-core' ),
						    'value'       => array(
							    esc_html__( 'None', 'eltdf-core' )  => 'no-pagination',
							    esc_html__( 'Standard', 'eltdf-core' ) => 'standard',
							    esc_html__( 'Load More', 'eltdf-core' )    => 'load-more',
							    esc_html__( 'Infinite Scroll', 'eltdf-core' )  => 'infinite-scroll'
						    ),
						    'group'       => esc_html__( 'Additional Features', 'eltdf-core' )
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'enable_article_animation',
						    'heading'     => esc_html__( 'Enable Article Animation', 'eltdf-core' ),
						    'value'       => array_flip(azalea_eltdf_get_yes_no_select_array(false)),
						    'description' => esc_html__( 'Enabling this option you will enable appears animation for your proofing-gallery list items', 'eltdf-core' ),
						    'group'       => esc_html__( 'Additional Features', 'eltdf-core' )
					    )
				    )
			    )
		    );
	    }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {
        $args = array(
	        'number_of_columns'         => '3',
            'space_between_items'       => 'normal',
	        'number_of_items'           => '-1',
            'image_proportions'         => 'full',
            'selected_projects'         => '',
            'order_by'                  => 'date',
            'order'                     => 'ASC',
            'title_tag'              	=> 'h4',
            'pagination_type'           => 'no-pagination',
            'enable_article_animation'  => 'no'
        );

		$params = shortcode_atts($args, $atts);


        $additional_params = array();

		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);
        $additional_params['query_results'] = $query_results;

        $additional_params['holder_data'] = $this->getHolderData($params, $additional_params);
        $additional_params['holder_classes'] = $this->getHolderClasses($params);

	    $params['this_object'] = $this;

        $html = eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'proofing-gallery-holder', '', $params, $additional_params);

        return $html;
	}

	/**
    * Generates proofing-gallery list query attribute array
    *
    * @param $params
    *
    * @return array
    */
	public function getQueryArray($params){
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'proofing-gallery',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['order_by'],
			'order'          => $params['order']
		);

		$project_ids = null;
		if (!empty($params['selected_projects'])) {
			$project_ids = explode(',', $params['selected_projects']);
			$query_array['post__in'] = $project_ids;
		}


		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}

		return $query_array;
	}
	
	/**
	 * Generates data attributes array
	 *
	 * @param $params
	 * @param $additional_params
	 *
	 * @return array
	 */
	public function getHolderData($params, $additional_params){
		$dataString = '';
		
		if(get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

        $query_result = $additional_params['query_results'];
		
		$params['max-num-pages'] = $query_result->max_num_pages;
		
		if(!empty($paged)) {
			$params['next-page'] = $paged+1;
		}

		foreach ($params as $key => $value) {
			if($key !== 'query_results' && $value !== '') {
				$new_key = str_replace( '_', '-', $key );
				$dataString .= ' data-'.$new_key.'="'.esc_attr($value).'"';
			}
		}
		
		return $dataString;
	}

	/**
    * Generates proofing-gallery holder classes
    *
    * @param $params
    *
    * @return string
    */
	public function getHolderClasses($params){
		$classes = array('eltdf-pgl-gallery', 'eltdf-proofing-gallery-list-holder');
		
		$classes[] = !empty($params['space_between_items']) ? 'eltdf-pgl-'.$params['space_between_items'].'-space' : 'eltdf-pgl-normal-space';
		
		$number_of_columns   = $params['number_of_columns'];
		switch ( $number_of_columns ):
			case '1':
				$classes[] = 'eltdf-pgl-one-column';
				break;
			case '2':
				$classes[] = 'eltdf-pgl-two-columns';
				break;
			case '3':
				$classes[] = 'eltdf-pgl-three-columns';
				break;
			case '4':
				$classes[] = 'eltdf-pgl-four-columns';
				break;
			case '5':
				$classes[] = 'eltdf-pgl-five-columns';
				break;
			default:
				$classes[] = 'eltdf-pgl-three-columns';
				break;
		endswitch;

		if(!empty($params['pagination_type'])){
			$classes[] = 'eltdf-pgl-pag-'.$params['pagination_type'];
		}

		if($params['enable_article_animation'] === 'yes'){
			$classes[] = 'eltdf-pgl-has-animation';
		}

		return implode(' ', $classes);
	}


	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function proofingGalleryIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts}
					WHERE post_type = 'proofing-gallery' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'eltdf-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'eltdf-core' ) . ': ' . $value['title'] : '' );
				$results[] = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function proofingGalleryIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {

				$portfolio_id = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'eltdf-core' ) . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__( 'Id', 'eltdf-core' ) . ': ' . $portfolio_id;

				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

}