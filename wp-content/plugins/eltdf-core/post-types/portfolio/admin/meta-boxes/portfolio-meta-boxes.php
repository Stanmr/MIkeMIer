<?php

if (!function_exists('eltdf_core_map_portfolio_meta')) {
    function eltdf_core_map_portfolio_meta() {
        global $azalea_eltdf_Framework;

        $eltd_pages = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            $eltd_pages[$page->ID] = $page->post_title;
        }

        //Portfolio Images

        $eltdPortfolioImages = new AzaleaEltdfMetaBox('portfolio-item', esc_html__('Portfolio Images (multiple upload)', 'eltdf-core'), '', '', 'portfolio_images');
        $azalea_eltdf_Framework->eltdMetaBoxes->addMetaBox('portfolio_images', $eltdPortfolioImages);

        $eltdf_portfolio_image_gallery = new AzaleaEltdfMultipleImages('eltdf-portfolio-image-gallery', esc_html__('Portfolio Images', 'eltdf-core'), esc_html__('Choose your portfolio images', 'eltdf-core'));
        $eltdPortfolioImages->addChild('eltdf-portfolio-image-gallery', $eltdf_portfolio_image_gallery);

        //Portfolio Images/Videos 2

        $eltdPortfolioImagesVideos2 = new AzaleaEltdfMetaBox('portfolio-item', esc_html__('Portfolio Images/Videos (single upload)', 'eltdf-core'));
        $azalea_eltdf_Framework->eltdMetaBoxes->addMetaBox('portfolio_images_videos2', $eltdPortfolioImagesVideos2);

        $eltdf_portfolio_images_videos2 = new AzaleaEltdfImagesVideosFramework('', '');
        $eltdPortfolioImagesVideos2->addChild('eltd_portfolio_images_videos2', $eltdf_portfolio_images_videos2);

        //Portfolio Additional Sidebar Items

        $eltdAdditionalSidebarItems = azalea_eltdf_add_meta_box(
            array(
                'scope' => array('portfolio-item'),
                'title' => esc_html__('Additional Portfolio Sidebar Items', 'eltdf-core'),
                'name' => 'portfolio_properties'
            )
        );

        $eltd_portfolio_properties = azalea_eltdf_add_options_framework(
            array(
                'label' => esc_html__('Portfolio Properties', 'eltdf-core'),
                'name' => 'eltd_portfolio_properties',
                'parent' => $eltdAdditionalSidebarItems
            )
        );
    }

    add_action('azalea_eltdf_meta_boxes_map', 'eltdf_core_map_portfolio_meta', 40);
}