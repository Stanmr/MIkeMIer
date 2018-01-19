<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-text-main">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                    <div class="eltdf-post-mark">
                        <span class="fa fa-link eltdf-link-mark"></span>
                    </div>
                </div>
                <?php azalea_eltdf_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                <div class="eltdf-post-info-bottom clearfix">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>