<?php

if(!function_exists('eltdf_core_proofing_gallery_meta_box_functions')) {
    function eltdf_core_proofing_gallery_meta_box_functions($post_types) {
        $post_types[] = 'proofing-gallery';

        return $post_types;
    }

    add_filter('azalea_eltdf_meta_box_post_types_save', 'eltdf_core_proofing_gallery_meta_box_functions');
    add_filter('azalea_eltdf_meta_box_post_types_remove', 'eltdf_core_proofing_gallery_meta_box_functions');
}

if(!function_exists('eltdf_core_proofing_gallery_scope_meta_box_functions')) {
    function eltdf_core_proofing_gallery_scope_meta_box_functions($post_types) {
        $post_types[] = 'proofing-gallery';

        return $post_types;
    }

    add_filter('azalea_eltdf_set_scope_for_meta_boxes', 'eltdf_core_proofing_gallery_scope_meta_box_functions');
}

if(!function_exists('eltdf_core_proofing_gallery_enqueue_meta_box_styles')) {
    function eltdf_core_proofing_gallery_enqueue_meta_box_styles() {
        global $post;

        if($post->post_type == 'proofing-gallery'){
            wp_enqueue_style('eltdf-jquery-ui', get_template_directory_uri().'/framework/admin/assets/css/jquery-ui/jquery-ui.css');
        }
    }

    add_action('azalea_eltdf_enqueue_meta_box_styles', 'eltdf_core_proofing_gallery_enqueue_meta_box_styles');
}

if(!function_exists('eltdf_core_register_proofing_gallery_cpt')) {
    function eltdf_core_register_proofing_gallery_cpt($cpt_class_name) {
        $cpt_class = array(
            'EltdCore\CPT\ProofingGallery\ProofingGalleryRegister'
        );

        $cpt_class_name = array_merge($cpt_class_name, $cpt_class);

        return $cpt_class_name;
    }

    add_filter('eltdf_core_filter_register_custom_post_types', 'eltdf_core_register_proofing_gallery_cpt');
}


if(!function_exists('eltdf_core_proofing_gallery_get_item_image_size')) {
	/**
	 * Generates proofing-gallery image size
	 *
	 * @param $proportions
	 *
	 * @return string
	 */
	function eltdf_core_proofing_gallery_get_item_image_size($proportions = ''){
		$thumb_size = 'full';

		if (!empty($proportions)) {

			switch ($proportions) {
				case 'landscape':
					$thumb_size = 'eltdf_core_landscape';
					break;
				case 'portrait':
					$thumb_size = 'eltdf_core_portrait';
					break;
				case 'square':
					$thumb_size = 'eltdf_core_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
				default :
					$thumb_size = 'full';
					break;
			}
		}

		return $thumb_size;
	}
}

if(!function_exists('eltdf_core_proofing_gallery_item_images_list')) {

	function eltdf_core_proofing_gallery_item_images_list() {

		$gallery = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_image_gallery', true);

		if($gallery !== '') {
			return explode(',', $gallery);
		}

		return false;
	}

}


/**
 * Loads more function for proofing-gallery.
 *
 */
if(!function_exists('eltdf_core_proofing_gallery_ajax_load_more')) {
	function eltdf_core_proofing_gallery_ajax_load_more() {
		$shortcode_params = array();
		
		if(!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				if($key !== '') {
					$addUnderscoreBeforeCapitalLetter = preg_replace('/([A-Z])/', '_$1', $key);
					$setAllLettersToLowercase = strtolower($addUnderscoreBeforeCapitalLetter);
					
					$shortcode_params[$setAllLettersToLowercase] = $value;
				}
			}
		}
		
		$html = '';
		
		$proofing_gallery_list = new \EltdCore\CPT\Shortcodes\ProofingGallery\ProofingGalleryList();
		
		$query_array = $proofing_gallery_list->getQueryArray($shortcode_params);
		$query_results = new \WP_Query($query_array);
		$shortcode_params['this_object'] = $proofing_gallery_list;
		
		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();

				$html .= eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'proofing-gallery-item', '', $shortcode_params);
			endwhile;
		else:
			$html .= eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'parts/posts-not-found');
		endif;
		
		wp_reset_postdata();
		
		$return_obj = array(
			'html' => $html,
		);
		
		echo json_encode($return_obj); exit;
	}
}

add_action('wp_ajax_nopriv_eltdf_core_proofing_gallery_ajax_load_more', 'eltdf_core_proofing_gallery_ajax_load_more');
add_action( 'wp_ajax_eltdf_core_proofing_gallery_ajax_load_more', 'eltdf_core_proofing_gallery_ajax_load_more' );




if(!function_exists('eltdf_core_get_proofing_gallery_list')) {
    function eltdf_core_get_proofing_gallery_list() {

        $number_of_items = 12;
        $number_of_items_option = azalea_eltdf_options()->getOptionValue('proofing_gallery_archive_number_of_items');
        if(!empty($number_of_items_option)) {
            $number_of_items = $number_of_items_option;
        }

        $number_of_columns = 4;
        $number_of_columns_option = azalea_eltdf_options()->getOptionValue('proofing_gallery_archive_number_of_columns');
        if(!empty($number_of_columns_option)) {
            $number_of_columns = $number_of_columns_option;
        }

        $space_between_items = 'normal';
        $space_between_items_option = azalea_eltdf_options()->getOptionValue('proofing_gallery_archive_space_between_items');
        if(!empty($space_between_items_option)) {
            $space_between_items = $space_between_items_option;
        }

        $image_size = 'landscape';
        $image_size_option = azalea_eltdf_options()->getOptionValue('proofing_gallery_archive_image_size');
        if(!empty($image_size_option)) {
            $image_size = $image_size_option;
        }

        $params = array(
            'number_of_items'     => $number_of_items,
            'number_of_columns'   => $number_of_columns,
            'space_between_items' => $space_between_items,
            'image_proportions'   => $image_size,
            'pagination_type'     => 'load-more'
        );

        $html = azalea_eltdf_execute_shortcode('eltdf_proofing_gallery_list', $params);

        print $html;
    }
}


if(!function_exists('eltdf_core_single_proofing_gallery')) {
    function eltdf_core_single_proofing_gallery() {

        $skin  = azalea_eltdf_get_meta_field_intersect('proofing_gallery_skin');
        $number_of_columns  = azalea_eltdf_get_meta_field_intersect('proofing_gallery_number_of_columns');

        $classes = array('eltdf-proofing-gallery-single-holder');
        $classes[] = 'eltdf-proofing-gallery-' . $skin;

        $params = array(
            'classes' => implode(' ', $classes),
            'number_of_columns' => $number_of_columns
        );

        $params['holder_classes'] = eltdf_core_proofing_gallery_holder_classes($params);

        eltdf_core_get_cpt_single_module_template_part('templates/single/holder', 'proofing-gallery', '', $params);
    }
}


if(!function_exists('eltdf_core_get_proofing_gallery_single_media')) {
    function eltdf_core_get_proofing_gallery_single_media() {

        $image_ids = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_image_gallery', true);
        $gallery = array();

        if($image_ids !== '') {
            $image_ids = explode(',', $image_ids);

            foreach($image_ids as $image_id) {
                $media					= array();
                $media['title']			= get_the_title($image_id);
                $media['id']			= $image_id;
                $media['alt']			= get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $image_src				= wp_get_attachment_image_src($image_id, 'full');
                $media['image_url']		= $image_src[0];

                $gallery[] = $media;
            }
        }



        return $gallery;
    }
}

if(!function_exists('eltdf_core_get_proofing_gallery_is_image_approved')) {
    function eltdf_core_get_proofing_gallery_is_image_approved($image_id) {

        $approved_images = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_images_approved', true);
        $is_approved = false;

        if(!empty($approved_images)) {

            if(in_array($image_id, $approved_images)) {
                $is_approved = true;
            }
        }

        return $is_approved;
    }
}

if(!function_exists('eltdf_core_get_proofing_gallery_image_classes')) {
    function eltdf_core_get_proofing_gallery_image_classes($image_id) {

        $classes = array('eltdf-pgs-gallery-image');

        if(eltdf_core_get_proofing_gallery_is_image_approved($image_id)) {
            $classes[] = 'proofing-gallery-image-approved';
        } else {
            $classes[] = 'proofing-gallery-image-rejected';
        }

        return implode(' ', $classes);
    }
}

if(!function_exists('eltdf_core_proofing_gallery_approving')) {
    function eltdf_core_proofing_gallery_approving() {

        $status = '';
        $message = '';
        $data = array();

        if(isset($_POST) && isset($_POST['gallery_id']) && isset($_POST['image_id'])) {

            $gallery_id = $_POST['gallery_id'];
            $image_id = $_POST['image_id'];

            $approved_images = get_post_meta($gallery_id, 'eltdf_proofing_gallery_images_approved', true);

            if(!empty($approved_images)) {
                if(in_array($image_id, $approved_images)) {
                    $approved_images = array_diff($approved_images, array($image_id) );
                    $data['image_status'] = 'rejected';
                    $status = 'success';

                } else {
                    $approved_images[] = $image_id;
                    $data['image_status'] = 'approved';
                    $status = 'success';
                }
            } else {
                $approved_images = array($image_id);
                $data['image_status'] = 'approved';
                $status = 'success';
            }
            update_post_meta( $gallery_id,  'eltdf_proofing_gallery_images_approved', $approved_images );
        } else {
            $status = 'error';
            $message = esc_html__('Empty params', 'eltdf-core');
        }

        $response = array (
            'status'	=> $status,
            'message'	=> $message,
            'data'		=> $data
        );

        $output = json_encode($response);

        exit($output);

        wp_die();
    }

    add_action( 'wp_ajax_nopriv_eltdf_core_proofing_gallery_approving', 'eltdf_core_proofing_gallery_approving' );
    add_action( 'wp_ajax_eltdf_core_proofing_gallery_approving', 'eltdf_core_proofing_gallery_approving' );
}
if(!function_exists('eltdf_core_proofing_gallery_password_protected')) {
    function eltdf_core_proofing_gallery_password_protected($html) {
        global $post;

        if(is_singular('proofing-gallery')){

            $style = array();

            $params['classes'] = array('eltdf-password-protected-holder');
            $params['label'] = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
            $full_screen  = azalea_eltdf_get_meta_field_intersect('proofing_gallery_password_protected_full_screen');
            $skin  = azalea_eltdf_get_meta_field_intersect('proofing_gallery_password_protected_skin');
            $bckg_image  = azalea_eltdf_get_meta_field_intersect('proofing_gallery_password_protected_background_image');
            if($full_screen == 'yes'){
                $params['classes'][] = 'eltdf-password-protected-full-height';
            }
            if($skin){
                $params['classes'][] = 'eltdf-password-protected-'.$skin;
            }
            if($bckg_image){
                $style[] = 'background-image:url('. $bckg_image  .')';
            }

            $params['style'] = $style;

            $html = eltdf_core_get_cpt_single_module_template_part('templates/single/parts/password-protected', 'proofing-gallery', '', $params);

        }
        return $html;
    }

    add_filter('the_password_form', 'eltdf_core_proofing_gallery_password_protected');
}

if(!function_exists('eltdf_core_proofing_gallery_holder_classes')) {
    function eltdf_core_proofing_gallery_holder_classes($params){
        $classes = array();

        $number_of_columns   = $params['number_of_columns'];
        switch ( $number_of_columns ):
            case '3':
                $classes[] = 'eltdf-pgs-gallery-three-columns';
                break;
            case '4':
                $classes[] = 'eltdf-pgs-gallery-four-columns';
                break;
            default:
                $classes[] = 'eltdf-pgs-gallery-three-columns';
                break;
        endswitch;

        return implode(' ', $classes);
    }
}