<?php
if(!function_exists('azalea_eltdf_design_styles')) {
    /**
     * Generates general custom styles
     */
    function azalea_eltdf_design_styles() {
	    $font_family = azalea_eltdf_options()->getOptionValue('google_fonts');
	    if (!empty($font_family) && azalea_eltdf_is_font_option_valid($font_family)){
		    echo azalea_eltdf_dynamic_css('body', array('font-family' => azalea_eltdf_get_font_option_val($font_family)));
		}

		$first_main_color = azalea_eltdf_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
				'a:hover',
				'h1 a:hover',
				'h2 a:hover',
				'h3 a:hover',
				'h4 a:hover',
				'h6 a:hover',
				'p a:hover',
				'.eltdf-comment-holder .eltdf-comment-text .comment-edit-link:hover',
				'.eltdf-comment-holder .eltdf-comment-text .comment-reply-link:hover',
				'.eltdf-comment-holder .eltdf-comment-text .replay:hover',
				'.eltdf-comment-holder .eltdf-comment-text #cancel-comment-reply-link',
				'.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-next-icon',
				'.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-prev-icon',
				'.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-next-icon',
				'.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-prev-icon',
				'.eltdf-page-footer .eltdf-footer-top-holder .eltdf-subscription-form input.wpcf7-form-control.wpcf7-submit:hover',
				'.eltdf-side-menu-button-opener.opened',
				'.eltdf-side-menu-button-opener:hover',
				'nav.eltdf-fullscreen-menu ul li a:hover',
				'nav.eltdf-fullscreen-menu>ul>li.current-menu-ancestor>a',
				'nav.eltdf-fullscreen-menu>ul>li.current-menu-item>a',
				'nav.eltdf-fullscreen-menu>ul>li.current_page_item>a',
				'nav.eltdf-fullscreen-menu>ul>li.eltdf-active-item>a',
				'nav.eltdf-fullscreen-menu>ul>li>a:hover',
				'.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-submit:hover',
				'.eltdf-search-page-holder article.sticky .eltdf-post-title-area h3 a',
				'.eltdf-search-cover .eltdf-search-close a:hover',
				'.eltdf-blog-holder article.sticky .eltdf-post-title a',
				'.eltdf-blog-holder.eltdf-blog-masonry article .eltdf-post-info-bottom .eltdf-post-info-author a:hover',
				'.eltdf-blog-holder.eltdf-blog-masonry article .eltdf-post-info-bottom .eltdf-blog-like:hover i:first-child',
				'.eltdf-blog-holder.eltdf-blog-masonry article .eltdf-post-info-bottom .eltdf-blog-like:hover span:first-child',
				'.eltdf-blog-holder.eltdf-blog-masonry article .eltdf-post-info-bottom .eltdf-post-info-comments-holder:hover span:first-child',
				'.eltdf-blog-holder.eltdf-blog-masonry article.format-link .eltdf-post-mark .eltdf-link-mark',
				'.eltdf-blog-holder.eltdf-blog-standard article .eltdf-post-info-bottom .eltdf-post-info-author a:hover',
				'.eltdf-blog-holder.eltdf-blog-standard article .eltdf-post-info-bottom .eltdf-blog-like:hover i:first-child',
				'.eltdf-blog-holder.eltdf-blog-standard article .eltdf-post-info-bottom .eltdf-blog-like:hover span:first-child',
				'.eltdf-blog-holder.eltdf-blog-standard article .eltdf-post-info-bottom .eltdf-post-info-comments-holder:hover span:first-child',
				'.eltdf-blog-holder.eltdf-blog-standard article.format-link .eltdf-post-mark .eltdf-link-mark',
				'.eltdf-blog-holder.eltdf-blog-standard article.format-quote .eltdf-post-mark .eltdf-quote-mark',
				'.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-name a:hover',
				'.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-social-icons a:hover',
				'.eltdf-bl-standard-pagination ul li.eltdf-bl-pag-active a',
				'.eltdf-blog-single-navigation .eltdf-blog-single-next:hover',
				'.eltdf-blog-single-navigation .eltdf-blog-single-prev:hover',
				'.eltdf-blog-holder.eltdf-blog-single.eltdf-blog-single-standard article.format-link .eltdf-post-mark .eltdf-link-mark',
				'.eltdf-blog-holder.eltdf-blog-single.eltdf-blog-single-standard article.format-quote .eltdf-post-mark .eltdf-quote-mark',
				'footer .widget ul li a:hover',
				'footer .widget #wp-calendar tfoot a:hover',
				'footer .widget.widget_search .input-holder button:hover',
				'footer .widget.widget_tag_cloud a:hover',
				'.eltdf-side-menu .widget ul li a:hover',
				'.eltdf-side-menu .widget #wp-calendar tfoot a:hover',
				'.eltdf-side-menu .widget.widget_search .input-holder button:hover',
				'.eltdf-side-menu .widget.widget_tag_cloud a:hover',
				'.wpb_widgetised_column .widget ul li a:hover',
				'aside.eltdf-sidebar .widget ul li a:hover',
				'.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
				'aside.eltdf-sidebar .widget #wp-calendar tfoot a:hover',
				'.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
				'aside.eltdf-sidebar .widget.widget_search .input-holder button:hover',
				'.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
				'aside.eltdf-sidebar .widget.widget_tag_cloud a:hover',
				'.widget ul li a:hover',
				'.widget #wp-calendar tfoot a:hover',
				'.widget.widget_search .input-holder button:hover',
				'.widget.widget_tag_cloud a:hover',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text a',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text span',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a:hover',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-twitter-icon i',
				'.eltdf-main-menu ul li a:hover',
				'.eltdf-main-menu>ul>li.eltdf-active-item>a',
				'.eltdf-main-menu>ul>li>a:hover',
				'.eltdf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
				'.eltdf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
				'.eltdf-header-vertical-closed .eltdf-vertical-menu ul li a:hover',
				'.eltdf-header-vertical-closed .eltdf-vertical-menu>ul>li.current-menu-ancestor>a',
				'.eltdf-header-vertical-closed .eltdf-vertical-menu>ul>li.current-menu-item>a',
				'.eltdf-header-vertical-closed .eltdf-vertical-menu>ul>li.current_page_item>a',
				'.eltdf-header-vertical-closed .eltdf-vertical-menu>ul>li.eltdf-active-item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li a:hover',
				'.eltdf-header-vertical .eltdf-vertical-menu>ul>li.current-menu-ancestor>a',
				'.eltdf-header-vertical .eltdf-vertical-menu>ul>li.current-menu-item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu>ul>li.current_page_item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu>ul>li.eltdf-active-item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu>ul>li>a:hover',
				'.eltdf-mobile-header .eltdf-mobile-menu-opener.eltdf-mobile-menu-opened a',
				'.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li.eltdf-active-item>a',
				'.eltdf-mobile-header .eltdf-mobile-nav ul li a:hover',
				'.eltdf-mobile-header .eltdf-mobile-nav ul li h5:hover',
				'.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor>a',
				'.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item>a',
				'.eltdf-btn.eltdf-btn-simple',
				'.eltdf-btn.eltdf-btn-outline',
				'.eltdf-icon-list-holder .eltdf-il-icon-holder>*',
				'.eltdf-social-share-holder.eltdf-list li a:hover',
				'.eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener:hover',
				'.eltdf-team.main-info-below-image.info-below-image-boxed .eltdf-team-social-wrapp .eltdf-icon-shortcode .flip-icon-holder .icon-normal span',
				'.eltdf-team.main-info-below-image.info-below-image-standard .eltdf-team-social-wrapp .eltdf-icon-shortcode .flip-icon-holder .icon-flip span',
				'.eltdf-pl-filter-holder ul li.eltdf-pl-current span',
				'.eltdf-pl-filter-holder ul li:hover span',
				'.eltdf-pl-standard-pagination ul li.eltdf-pl-pag-active a',
				'.eltdf-portfolio-list-holder.eltdf-pl-gallery-indented-overlay article .eltdf-pli-text .eltdf-pli-category-holder a:hover',
				'.eltdf-portfolio-list-holder.eltdf-pl-gallery-overlay-centered article .eltdf-pli-text .eltdf-pli-category-holder a:hover',
				'.eltdf-portfolio-list-holder.eltdf-pl-gallery-overlay-centered article .eltdf-pli-text .eltdf-portfolio-like .eltdf-like.liked i',
				'.eltdf-pgl-filter-holder ul li.eltdf-pgl-current span',
				'.eltdf-pgl-filter-holder ul li:hover span',
				'.eltdf-pgl-standard-pagination ul li.eltdf-pgl-pag-active a',
				'.eltdf-proofing-gallery-single-holder .eltdf-pgs-meta-holder .eltdf-pgs-meta-inner>div span',
				'.eltdf-proofing-gallery-single-holder.eltdf-proofing-gallery-light .eltdf-pgs-gallery-holder .eltdf-pgs-gallery-image.proofing-gallery-image-approved .eltdf-pgs-gallery-image-info .eltdf-pgs-gallery-image-id'
            );

            $woo_color_selector = array();
            if(azalea_eltdf_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
					'.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
					'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
					'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
					'.eltdf-woo-single-page .eltdf-single-product-summary .product_meta>span a:hover',
					'.eltdf-shopping-cart-dropdown .eltdf-item-info-holder .remove:hover',
					'.widget.woocommerce.widget_layered_nav ul li.chosen a',
					'.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
				'.eltdf-fullscreen-menu-opener.eltdf-fm-opened',
				'.eltdf-blog-slider-holder .eltdf-blog-slider-item .eltdf-section-button-holder a:hover'
	        );

            $background_color_selector = array(
				'.eltdf-st-loader .pulse',
				'.eltdf-st-loader .double_pulse .double-bounce1',
				'.eltdf-st-loader .double_pulse .double-bounce2',
				'.eltdf-st-loader .cube',
				'.eltdf-st-loader .rotating_cubes .cube1',
				'.eltdf-st-loader .rotating_cubes .cube2',
				'.eltdf-st-loader .stripes>div',
				'.eltdf-st-loader .wave>div',
				'.eltdf-st-loader .two_rotating_circles .dot1',
				'.eltdf-st-loader .two_rotating_circles .dot2',
				'.eltdf-st-loader .five_rotating_circles .container1>div',
				'.eltdf-st-loader .five_rotating_circles .container2>div',
				'.eltdf-st-loader .five_rotating_circles .container3>div',
				'.eltdf-st-loader .atom .ball-1:before',
				'.eltdf-st-loader .atom .ball-2:before',
				'.eltdf-st-loader .atom .ball-3:before',
				'.eltdf-st-loader .atom .ball-4:before',
				'.eltdf-st-loader .clock .ball:before',
				'.eltdf-st-loader .mitosis .ball',
				'.eltdf-st-loader .lines .line1',
				'.eltdf-st-loader .lines .line2',
				'.eltdf-st-loader .lines .line3',
				'.eltdf-st-loader .lines .line4',
				'.eltdf-st-loader .fussion .ball',
				'.eltdf-st-loader .fussion .ball-1',
				'.eltdf-st-loader .fussion .ball-2',
				'.eltdf-st-loader .fussion .ball-3',
				'.eltdf-st-loader .fussion .ball-4',
				'.eltdf-st-loader .wave_circles .ball',
				'.eltdf-st-loader .pulse_circles .ball',
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'input.wpcf7-form-control.wpcf7-submit',
				'.eltdf-slick-slider .eltdf-slick-dots li.slick-active .eltdf-slick-dot-inner',
				'nav.eltdf-fullscreen-menu ul li a span:before',
				'.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
				'.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
				'.eltdf-main-menu>ul>li>a>span.item_outer .item_text:before',
				'.eltdf-drop-down .second .inner ul li a .item_outer .item_text:before',
				'.eltdf-drop-down .second .inner ul.right li a .item_text:before',
				'.eltdf-header-vertical-closed .eltdf-vertical-menu ul li a .item_outer .item_text:before',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li a .item_outer .item_text:before',
				'.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-active',
				'.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-hover',
				'.eltdf-btn.eltdf-btn-solid',
				'.eltdf-countdown .countdown-row .countdown-section .countdown-amount:after',
				'.eltdf-icon-shortcode.eltdf-circle',
				'.eltdf-icon-shortcode.eltdf-dropcaps.eltdf-circle',
				'.eltdf-icon-shortcode.eltdf-square',
				'.eltdf-progress-bar .eltdf-pb-content-holder .eltdf-pb-content',
				'.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-active a',
				'.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-hover a',
				'.eltdf-tabs.eltdf-tabs-boxed .eltdf-tabs-nav li.ui-state-active a',
				'.eltdf-tabs.eltdf-tabs-boxed .eltdf-tabs-nav li.ui-state-hover a',
				'.eltdf-pgs-gallery-filter-holder .eltdf-pgs-gallery-filter-inner li.eltdf-pgs-filter-current span:after',
				'.eltdf-pgs-gallery-filter-holder .eltdf-pgs-gallery-download-holder .eltdf-btn-dark:hover'
            );

            $woo_background_color_selector = array();
            if(azalea_eltdf_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
					'.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .eltdf-content a.added_to_cart',
					'.woocommerce-page .eltdf-content a.button',
					'.woocommerce-page .eltdf-content button[type=submit]',
					'.woocommerce-page .eltdf-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]',
					'div.woocommerce input[type=submit]',
					'.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
					'.woocommerce-page .eltdf-content a.added_to_cart:hover',
					'.woocommerce-page .eltdf-content a.button:hover',
					'.woocommerce-page .eltdf-content button[type=submit]:hover',
					'.woocommerce-page .eltdf-content input[type=submit]:hover',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
					'div.woocommerce a.added_to_cart:hover',
					'div.woocommerce a.button:hover',
					'div.woocommerce button[type=submit]:hover',
					'div.woocommerce input[type=submit]:hover',
					'.eltdf-woo-single-page .related.products>h2:after',
					'.eltdf-woo-single-page .upsells.products>h2:after',
					'.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .added_to_cart',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .button',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .added_to_cart:hover',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .button:hover',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .button:hover',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .added_to_cart:hover',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .button:hover',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .button:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

			$background_color_important_selector = array(
				'.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-hover-bg):hover'
			);

            $border_color_selector = array(
				'.eltdf-st-loader .pulse_circles .ball',
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'input.wpcf7-form-control.wpcf7-submit',
				'.eltdf-btn.eltdf-btn-solid',
				'.eltdf-btn.eltdf-btn-outline',
				'.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-active a',
				'.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-hover a',
				'.eltdf-pgs-gallery-filter-holder .eltdf-pgs-gallery-download-holder .eltdf-btn-dark:hover'
            );

			$woo_border_color_selector = array();
			if(azalea_eltdf_is_woocommerce_installed()) {
				$woo_border_color_selector = array(
					'.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .eltdf-content a.added_to_cart',
					'.woocommerce-page .eltdf-content a.button',
					'.woocommerce-page .eltdf-content button[type=submit]',
					'.woocommerce-page .eltdf-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]',
					'div.woocommerce input[type=submit]',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .added_to_cart',
					'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .button',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
					'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button'
				);
			}

			$border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);

			$border_color_important_selector = array(
				'.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-border-hover):hover'
			);

            echo azalea_eltdf_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo azalea_eltdf_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo azalea_eltdf_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
			echo azalea_eltdf_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo azalea_eltdf_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
			echo azalea_eltdf_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }

        $page_background_color = azalea_eltdf_options()->getOptionValue('page_background_color');
		if (!empty($page_background_color)) {
			$background_color_selector = array(
				'.eltdf-wrapper-inner',
				'.eltdf-content'
			);
			echo azalea_eltdf_dynamic_css($background_color_selector, array('background-color' => $page_background_color));
		}

		$selection_color = azalea_eltdf_options()->getOptionValue('selection_color');
		if (!empty($selection_color)) {
			echo azalea_eltdf_dynamic_css('::selection', array('background' => $selection_color));
			echo azalea_eltdf_dynamic_css('::-moz-selection', array('background' => $selection_color));
		}

       /* $paspartu_style = array();
	    $paspartu_color = azalea_eltdf_get_meta_field_intersect('paspartu_color');
        if (!empty($paspartu_color)) {
            $paspartu_style['background-color'] = $paspartu_color;
        }

	    $paspartu_width = azalea_eltdf_get_meta_field_intersect('paspartu_width');
        if ($paspartu_width !== '') {
            $paspartu_style['padding'] = $paspartu_width.'%';
        }

        echo azalea_eltdf_dynamic_css('.eltdf-paspartu-enabled .eltdf-wrapper', $paspartu_style);*/
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_design_styles');
}

if(!function_exists('azalea_eltdf_content_styles')) {
    /**
     * Generates content custom styles
     */
    function azalea_eltdf_content_styles() {
        $content_style = array();
	    
	    $padding_top = azalea_eltdf_options()->getOptionValue('content_top_padding');
	    if ($padding_top !== '') {
            $content_style['padding-top'] = azalea_eltdf_filter_px($padding_top).'px';
        }

        $content_selector = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        echo azalea_eltdf_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
	    
	    $padding_top_in_grid = azalea_eltdf_options()->getOptionValue('content_top_padding_in_grid');
	    if ($padding_top_in_grid !== '') {
            $content_style_in_grid['padding-top'] = azalea_eltdf_filter_px($padding_top_in_grid).'px';
        }

        $content_selector_in_grid = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
        );

        echo azalea_eltdf_dynamic_css($content_selector_in_grid, $content_style_in_grid);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_content_styles');
}

if (!function_exists('azalea_eltdf_h1_styles')) {

    function azalea_eltdf_h1_styles() {
	    $margin_top = azalea_eltdf_options()->getOptionValue('h1_margin_top');
	    $margin_bottom = azalea_eltdf_options()->getOptionValue('h1_margin_bottom');
	    
	    $item_styles = azalea_eltdf_get_typography_styles('h1');
	    
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = azalea_eltdf_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom).'px';
	    }
	    
	    $item_selector = array(
		    'h1'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_h1_styles');
}

if (!function_exists('azalea_eltdf_h2_styles')) {

    function azalea_eltdf_h2_styles() {
	    $margin_top = azalea_eltdf_options()->getOptionValue('h2_margin_top');
	    $margin_bottom = azalea_eltdf_options()->getOptionValue('h2_margin_bottom');
	
	    $item_styles = azalea_eltdf_get_typography_styles('h2');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = azalea_eltdf_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h2'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_h2_styles');
}

if (!function_exists('azalea_eltdf_h3_styles')) {

    function azalea_eltdf_h3_styles() {
	    $margin_top = azalea_eltdf_options()->getOptionValue('h3_margin_top');
	    $margin_bottom = azalea_eltdf_options()->getOptionValue('h3_margin_bottom');
	
	    $item_styles = azalea_eltdf_get_typography_styles('h3');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = azalea_eltdf_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h3'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_h3_styles');
}

if (!function_exists('azalea_eltdf_h4_styles')) {

    function azalea_eltdf_h4_styles() {
	    $margin_top = azalea_eltdf_options()->getOptionValue('h4_margin_top');
	    $margin_bottom = azalea_eltdf_options()->getOptionValue('h4_margin_bottom');
	
	    $item_styles = azalea_eltdf_get_typography_styles('h4');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = azalea_eltdf_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h4'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_h4_styles');
}

if (!function_exists('azalea_eltdf_h5_styles')) {

    function azalea_eltdf_h5_styles() {
	    $margin_top = azalea_eltdf_options()->getOptionValue('h5_margin_top');
	    $margin_bottom = azalea_eltdf_options()->getOptionValue('h5_margin_bottom');
	
	    $item_styles = azalea_eltdf_get_typography_styles('h5');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = azalea_eltdf_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h5'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_h5_styles');
}

if (!function_exists('azalea_eltdf_h6_styles')) {

    function azalea_eltdf_h6_styles() {
	    $margin_top = azalea_eltdf_options()->getOptionValue('h6_margin_top');
	    $margin_bottom = azalea_eltdf_options()->getOptionValue('h6_margin_bottom');
	
	    $item_styles = azalea_eltdf_get_typography_styles('h6');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = azalea_eltdf_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = azalea_eltdf_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h6'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_h6_styles');
}

if (!function_exists('azalea_eltdf_text_styles')) {

    function azalea_eltdf_text_styles() {
	    $item_styles = azalea_eltdf_get_typography_styles('text');
	
	    $item_selector = array(
		    'p'
	    );
	
	    echo azalea_eltdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_text_styles');
}

if (!function_exists('azalea_eltdf_link_styles')) {

    function azalea_eltdf_link_styles() {
        $link_styles = array();

        if(azalea_eltdf_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = azalea_eltdf_options()->getOptionValue('link_color');
        }
        if(azalea_eltdf_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = azalea_eltdf_options()->getOptionValue('link_fontstyle');
        }
        if(azalea_eltdf_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = azalea_eltdf_options()->getOptionValue('link_fontweight');
        }
        if(azalea_eltdf_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = azalea_eltdf_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo azalea_eltdf_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_link_styles');
}

if (!function_exists('azalea_eltdf_link_hover_styles')) {

    function azalea_eltdf_link_hover_styles() {
        $link_hover_styles = array();

        if(azalea_eltdf_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = azalea_eltdf_options()->getOptionValue('link_hovercolor');
        }
        if(azalea_eltdf_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = azalea_eltdf_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo azalea_eltdf_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(azalea_eltdf_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = azalea_eltdf_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo azalea_eltdf_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('azalea_eltdf_style_dynamic', 'azalea_eltdf_link_hover_styles');
}

if (!function_exists('azalea_eltdf_smooth_page_transition_styles')) {

    function azalea_eltdf_smooth_page_transition_styles($style) {
        $id = azalea_eltdf_get_page_id();
    	$loader_style = array();
		$current_style = '';

        if(azalea_eltdf_get_meta_field_intersect('smooth_pt_bgnd_color',$id) !== '') {
            $loader_style['background-color'] = azalea_eltdf_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.eltdf-smooth-transition-loader');

        if (!empty($loader_style)) {
			$current_style .= azalea_eltdf_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(azalea_eltdf_get_meta_field_intersect('smooth_pt_spinner_color',$id) !== '') {
            $spinner_style['background-color'] = azalea_eltdf_get_meta_field_intersect('smooth_pt_spinner_color',$id);
        }

        $spinner_selectors = array(
            '.eltdf-st-loader .eltdf-rotate-circles > div', 
            '.eltdf-st-loader .pulse', 
            '.eltdf-st-loader .double_pulse .double-bounce1', 
            '.eltdf-st-loader .double_pulse .double-bounce2', 
            '.eltdf-st-loader .cube', 
            '.eltdf-st-loader .rotating_cubes .cube1', 
            '.eltdf-st-loader .rotating_cubes .cube2', 
            '.eltdf-st-loader .stripes > div', 
            '.eltdf-st-loader .wave > div', 
            '.eltdf-st-loader .two_rotating_circles .dot1', 
            '.eltdf-st-loader .two_rotating_circles .dot2', 
            '.eltdf-st-loader .five_rotating_circles .container1 > div', 
            '.eltdf-st-loader .five_rotating_circles .container2 > div', 
            '.eltdf-st-loader .five_rotating_circles .container3 > div', 
            '.eltdf-st-loader .atom .ball-1:before', 
            '.eltdf-st-loader .atom .ball-2:before', 
            '.eltdf-st-loader .atom .ball-3:before', 
            '.eltdf-st-loader .atom .ball-4:before', 
            '.eltdf-st-loader .clock .ball:before', 
            '.eltdf-st-loader .mitosis .ball', 
            '.eltdf-st-loader .lines .line1', 
            '.eltdf-st-loader .lines .line2', 
            '.eltdf-st-loader .lines .line3', 
            '.eltdf-st-loader .lines .line4', 
            '.eltdf-st-loader .fussion .ball', 
            '.eltdf-st-loader .fussion .ball-1', 
            '.eltdf-st-loader .fussion .ball-2', 
            '.eltdf-st-loader .fussion .ball-3', 
            '.eltdf-st-loader .fussion .ball-4', 
            '.eltdf-st-loader .wave_circles .ball', 
            '.eltdf-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
			$current_style .= azalea_eltdf_dynamic_css($spinner_selectors, $spinner_style);
        }

		$current_style = $current_style . $style;

		return $current_style;
    }

    add_filter('azalea_eltdf_add_page_custom_style', 'azalea_eltdf_smooth_page_transition_styles');
}

if (!function_exists('azalea_eltdf_paspartu_styles')) {
	function azalea_eltdf_paspartu_styles($style) {
		$id             = azalea_eltdf_get_page_id();
		$paspartu_style = array();
		$current_style  = '';

		if(azalea_eltdf_get_meta_field_intersect('paspartu_color', $id) !== '') {
			$paspartu_style['background-color'] = azalea_eltdf_get_meta_field_intersect('paspartu_color', $id);
		}

		if(azalea_eltdf_get_meta_field_intersect('paspartu_width', $id) !== '') {
			$paspartu_style['padding'] = azalea_eltdf_get_meta_field_intersect('paspartu_width', $id).'%';
		}


		if(!empty($paspartu_style)) {
			$current_style .= azalea_eltdf_dynamic_css('.eltdf-paspartu-enabled .eltdf-wrapper', $paspartu_style);
		}

		$current_style = $current_style.$style;

		return $current_style;
	}

	add_filter('azalea_eltdf_add_page_custom_style', 'azalea_eltdf_paspartu_styles');
}

