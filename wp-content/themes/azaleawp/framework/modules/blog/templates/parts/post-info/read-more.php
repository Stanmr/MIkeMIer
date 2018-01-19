<div class="eltdf-post-read-more-button">
<?php
    if(azalea_eltdf_core_plugin_installed()) {
        echo azalea_eltdf_get_button_html(
            apply_filters(
                'azalea_eltdf_blog_template_read_more_button',
                array(
                    'type' => 'simple',
                    'size' => 'medium',
                    'link' => get_the_permalink(),
                    'text' => esc_html__('Continue reading', 'azaleawp'),
                    'custom_class' => 'eltdf-blog-list-button'
                )
            )
        );
    } else { ?>
        <a itemprop="url" href="<?php echo esc_attr(get_the_permalink()); ?>" target="_self" class="eltdf-btn eltdf-btn-medium eltdf-btn-simple eltdf-blog-list-button">
            <span class="eltdf-btn-text">
                <?php echo esc_html__('Read more', 'azaleawp'); ?>
            </span>
        </a>
<?php } ?>
</div>
