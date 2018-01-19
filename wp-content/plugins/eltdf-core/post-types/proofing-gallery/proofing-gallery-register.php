<?php
namespace EltdCore\CPT\ProofingGallery;

use EltdCore\Lib\PostTypeInterface;

/**
 * Class ProofingGalleryRegister
 * @package EltdfCore\CPT\ProofingGallery
 */
class ProofingGalleryRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base		= 'proofing-gallery';



        add_filter('single_template', array($this, 'registerSingleTemplate'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
    }

    /**
     * Registers proofing-gallery single template if one does'nt exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-'.$this->base.'.php')) {
                return ELATED_CORE_CPT_PATH.'/proofing-gallery/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $azalea_eltdf_Framework;

        $menuPosition = 20;
        $menuIcon = 'dashicons-admin-post';
        $slug = $this->base;

        if(eltdf_core_theme_installed()) {
            $menuPosition = $azalea_eltdf_Framework->getSkin()->getMenuItemPosition('proofing-gallery');
            $menuIcon = $azalea_eltdf_Framework->getSkin()->getMenuIcon('proofing-gallery');

			if(azalea_eltdf_options()->getOptionValue('proofing_gallery_single_slug')) {
				$slug = azalea_eltdf_options()->getOptionValue('proofing_gallery_single_slug');
			}

        }



        register_post_type( $this->base,
            array(
                'labels' => array(
                    'name'			=> esc_html__( 'Proofing Galleries','eltdf-core' ),
                    'singular_name'	=> esc_html__( 'Proofing Gallery Item','eltdf-core' ),
                    'add_item'		=> esc_html__( 'New Proofing Gallery Item','eltdf-core' ),
                    'add_new_item'	=> esc_html__( 'Add New Proofing Gallery Item','eltdf-core' ),
                    'edit_item'		=> esc_html__( 'Edit Proofing Gallery Item','eltdf-core' )
                ),
                'public'		=> true,
                'has_archive'	=> true,
                'rewrite'		=> array('slug' => $slug),
                'menu_position'	=> $menuPosition,
                'show_ui'		=> true,
                'supports'		=> array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes'),
                'menu_icon' 	=>  $menuIcon
            )
        );
    }
}