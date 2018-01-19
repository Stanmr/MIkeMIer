<div class="eltdf-pgs-gallery-holder eltdf-pgs-gallery-masonry eltdf-pgs-gallery-small-space <?php echo esc_attr($holder_classes); ?>">
	<?php eltdf_core_get_cpt_single_module_template_part('templates/single/parts/filter', 'proofing-gallery'); ?>
	<div class="eltdf-pgs-gallery-inner">
		<div class="eltdf-pgs-grid-sizer"></div>
		<div class="eltdf-pgs-grid-gutter"></div>
		<?php
		$media = eltdf_core_get_proofing_gallery_single_media();
		if(is_array($media) && count($media)) : ?>
			<?php foreach($media as $single_media) : ?>
				<div class="<?php echo eltdf_core_get_proofing_gallery_image_classes(esc_attr($single_media['id'])); ?>" data-image-id="<?php echo esc_attr($single_media['id']); ?>" data-gallery-id="<?php echo get_the_ID(); ?>">
					<div class="eltdf-pgs-gallery-image-inner">
						<a itemprop="image" title="<?php echo esc_attr($single_media['title']); ?>" data-rel="prettyPhoto[eltdf-proofing-gallery-single-pretty-photo]" href="<?php echo esc_url($single_media['image_url']); ?>">
							<img itemprop="image" src="<?php echo esc_url($single_media['image_url']); ?>" alt="<?php echo esc_attr($single_media['alt']); ?>" />
						</a>
						<div class="eltdf-pgs-gallery-image-info">
							<a class="eltdf-pgs-gallery-image-info-pretty-photo" data-rel="prettyPhoto[eltdf-proofing-gallery-single-pretty-photo-expand]" href="<?php echo esc_url($single_media['image_url']); ?>"><i class="arrow_expand"></i></a>
							<span class="eltdf-pgs-gallery-image-id"><?php echo '#' . esc_attr($single_media['id']); ?></span>
							<span class="eltdf-pgs-image-action-icon">
								<i class=" icon_check eltdf-pgs-approve-icon"></i>
								<i class="icon_close eltdf-pgs-reject-icon"></i>
							</span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>