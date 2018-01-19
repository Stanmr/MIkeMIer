<?php

azalea_eltdf_get_single_post_format_html($blog_single_type);

azalea_eltdf_get_module_template_part('templates/parts/single/author-info', 'blog');

azalea_eltdf_get_module_template_part('templates/parts/single/single-navigation', 'blog');

azalea_eltdf_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

azalea_eltdf_get_module_template_part('templates/parts/single/comments', 'blog');