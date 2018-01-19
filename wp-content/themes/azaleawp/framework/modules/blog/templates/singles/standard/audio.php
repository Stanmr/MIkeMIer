<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php azalea_eltdf_get_module_template_part('templates/parts/image', 'blog', '', $part_params); ?>
            <?php azalea_eltdf_get_module_template_part('templates/parts/post-type/audio', 'blog', '', $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info-top">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php echo azalea_eltdf_execute_shortcode('eltdf_separator', $part_params); ?>
                    <?php the_content(); ?>
                    <?php do_action('azalea_eltdf_single_link_pages'); ?>
                </div>
                <div class="eltdf-post-info-bottom clearfix">
                    <div class="eltdf-post-info-bottom-left">
                        <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltdf-post-info-bottom-right">
                        <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>