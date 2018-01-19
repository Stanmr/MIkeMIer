<?php if($query_results->max_num_pages > 1) { ?>
	<div class="eltdf-pl-loading">
		<h3 class="eltdf-pl-loading-text"><?php esc_html_e('Loading', 'eltdf-core') ?></h3>
	</div>
	<div class="eltdf-pl-load-more-holder">
		<div class="eltdf-pl-load-more">
			<?php 
				echo azalea_eltdf_get_button_html(array(
					'link' => 'javascript: void(0)',
					'size' => 'large',
					'text' => esc_html__('View more', 'eltdf-core')
				));
			?>
		</div>
	</div>
<?php }