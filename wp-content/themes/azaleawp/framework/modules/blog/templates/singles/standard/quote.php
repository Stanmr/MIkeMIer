<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-text-main">
                    <div class="eltdf-post-mark">
                        <span class="icon_quotations eltdf-quote-mark"></span>
                    </div>
                    <?php azalea_eltdf_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                    <?php echo azalea_eltdf_execute_shortcode('eltdf_separator', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eltdf-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="eltdf-post-info-bottom clearfix">
        <div class="eltdf-post-info-bottom-left">
            <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
        <div class="eltdf-post-info-bottom-right">
            <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>