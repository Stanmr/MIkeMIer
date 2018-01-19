<?php $thumb_size = eltdf_core_proofing_gallery_get_item_image_size($image_proportions); ?>
<div class="eltdf-pgli-image">
	<?php if(has_post_thumbnail()) { ?>
		<?php echo get_the_post_thumbnail(get_the_ID(), $thumb_size); ?>
	<?php }  ?>
</div>