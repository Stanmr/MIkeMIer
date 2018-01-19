<div class="eltdf-pgs-gallery-filter-holder">
	<div class="eltdf-pgs-gallery-filter-inner">
		<ul>
			<li class="eltdf-pgs-gallery-filter" data-filter="">
				<span><?php esc_html_e('All', 'eltdf-core')?></span>
			</li>
			<li class="eltdf-pgs-gallery-filter" data-filter=".proofing-gallery-image-approved">
				<span><?php esc_html_e('Approved', 'eltdf-core')?></span>
			</li>
			<li class="eltdf-pgs-gallery-filter" data-filter=".proofing-gallery-image-rejected">
				<span><?php esc_html_e('Rejected', 'eltdf-core')?></span>
			</li>
		</ul>
		<?php eltdf_core_get_cpt_single_module_template_part('templates/single/parts/download-button', 'proofing-gallery'); ?>
	</div>
</div>

