<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php azalea_eltdf_get_module_template_part('templates/parts/image', 'blog', '', $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info-top">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php azalea_eltdf_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-info-bottom clearfix">
                    <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>