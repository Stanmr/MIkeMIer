<?php
	$eltdf_proofing_gallery_client = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_client_meta', true);
	$eltdf_proofing_gallery_date = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_date_meta', true);
	$eltdf_proofing_gallery_subject = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_subject_meta', true);

	if($eltdf_proofing_gallery_client || $eltdf_proofing_gallery_subject || $eltdf_proofing_gallery_subject) : ?>
		<div class="eltdf-pgs-meta-holder">
			<div class="eltdf-pgs-meta-inner">
				<?php if($eltdf_proofing_gallery_client) : ?>
					<div class="eltdf-pgs-meta-client">
						<?php esc_html_e('Client:', 'eltdf-core'); ?>
						<span><?php echo esc_attr($eltdf_proofing_gallery_client); ?></span>
					</div>
				<?php endif; ?>
				<?php if($eltdf_proofing_gallery_subject) : ?>
					<div class="eltdf-pgs-meta-subject">
						<?php esc_html_e('Subject:', 'eltdf-core'); ?>
						<span><?php echo esc_attr($eltdf_proofing_gallery_subject); ?></span>
					</div>
				<?php endif; ?>
				<?php if($eltdf_proofing_gallery_date) : ?>
					<div class="eltdf-pgs-meta-date">
						<?php esc_html_e('Date:', 'eltdf-core'); ?>
						<span><?php echo esc_attr($eltdf_proofing_gallery_date); ?></span>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

