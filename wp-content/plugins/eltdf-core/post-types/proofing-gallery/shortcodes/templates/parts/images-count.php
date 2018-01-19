<?php $gallery = eltdf_core_proofing_gallery_item_images_list();
	if(is_array($gallery) && count($gallery) > 0) { ?>
		<div class="eltdf-pgli-number-of-images-holder">
			<span><?php echo count($gallery) . esc_html__(' pics', 'eltdf-core'); ?></span>
		</div>
	<?php } ?>
