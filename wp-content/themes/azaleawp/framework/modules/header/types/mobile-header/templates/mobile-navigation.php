<?php do_action('azalea_eltdf_before_mobile_navigation'); ?>

<nav class="eltdf-mobile-nav">
    <div class="eltdf-grid">
        <?php wp_nav_menu(array(
            'theme_location' => 'mobile-navigation' ,
            'container'  => '',
            'container_class' => '',
            'menu_class' => '',
            'menu_id' => '',
            'fallback_cb' => 'top_navigation_fallback',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'walker' => new AzaleaEltdfMobileNavigationWalker()
        )); ?>
    </div>
</nav>

<?php do_action('azalea_eltdf_after_mobile_navigation'); ?>