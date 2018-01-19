<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * azalea_eltdf_header_meta hook
     *
     * @see azalea_eltdf_header_meta() - hooked with 10
     * @see azalea_eltdf_user_scalable_meta - hooked with 10
     */
    do_action('azalea_eltdf_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
    <?php
    /**
     * azalea_eltdf_after_body_tag hook
     *
     * @see azalea_eltdf_get_side_area() - hooked with 10
     * @see azalea_eltdf_smooth_page_transitions() - hooked with 10
     */
    do_action('azalea_eltdf_after_body_tag'); ?>

    <div class="eltdf-wrapper">
        <div class="eltdf-wrapper-inner">
            <?php azalea_eltdf_get_header(); ?>
	
	        <?php
	        /**
	         * azalea_eltdf_after_header_area hook
	         *
	         * @see azalea_eltdf_back_to_top_button() - hooked with 10
	         * @see azalea_eltdf_get_full_screen_menu() - hooked with 10
	         */
	        do_action('azalea_eltdf_after_header_area'); ?>
	        
            <div class="eltdf-content" <?php azalea_eltdf_content_elem_style_attr(); ?>>
                <div class="eltdf-content-inner">