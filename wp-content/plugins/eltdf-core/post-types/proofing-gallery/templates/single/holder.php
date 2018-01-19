<?php if(have_posts()): while(have_posts()) : the_post(); ?>
<?php if(post_password_required()) { ?>
	<div class="eltdf-full-width eltdf-pgs-full-width-no-padding">
		<div class="eltdf-full-width-inner clearfix">
<?php } else { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
<?php } ?>
        <div <?php azalea_eltdf_class_attribute($classes); ?>>
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
	            do_action('azalea_eltdf_proofing_gallery_page_before_content');

				eltdf_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'proofing-gallery');

				eltdf_core_get_cpt_single_module_template_part('templates/single/parts/gallery', 'proofing-gallery', '', array("holder_classes" => $holder_classes));

	            do_action('azalea_eltdf_proofing_gallery_page_after_content');

				eltdf_core_get_cpt_single_module_template_part('templates/single/parts/comments', 'proofing-gallery');
            } ?>
        </div>
    </div>
</div>
<?php
	endwhile;
endif;
?>