<li class="eltdf-bl-item clearfix">
	<div class="eltdf-bli-inner">
        <?php azalea_eltdf_get_module_template_part('templates/parts/image', 'blog', '', $params); ?>

        <div class="eltdf-bli-content">
            <?php
            if($post_info_section == 'yes') { ?>
                <div class="eltdf-bli-info">
                    <?php
                    if ($post_info_date == 'yes') {
                        azalea_eltdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                    }
                    if ($post_info_category == 'yes') {
                        azalea_eltdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                    }
                    if ($post_info_author == 'yes') {
                        azalea_eltdf_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
                    }
                    if ($post_info_comments == 'yes') {
                        azalea_eltdf_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
                    }
                    if ($post_info_like == 'yes') {
                        azalea_eltdf_get_module_template_part('templates/parts/post-info/like', 'blog', '', $params);
                    }
                    if ($post_info_share == 'yes') {
                        azalea_eltdf_get_module_template_part('templates/parts/post-info/share', 'blog', '', $params);
                    }
                    ?>
                </div>
            <?php } ?>

            <?php azalea_eltdf_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

            <div class="eltdf-bli-excerpt">
                <?php azalea_eltdf_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
                <?php azalea_eltdf_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
            </div>
        </div>
	</div>
</li>