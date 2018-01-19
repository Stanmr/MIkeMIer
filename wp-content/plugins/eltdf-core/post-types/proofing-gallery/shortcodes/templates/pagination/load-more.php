<?php if($query_results->max_num_pages > 1){ ?>
	<div class="eltdf-pgl-loading">
		<div class="eltdf-pgl-loading-bounce1"></div>
		<div class="eltdf-pgl-loading-bounce2"></div>
		<div class="eltdf-pgl-loading-bounce3"></div>
	</div>
	<div class="eltdf-pgl-load-more-holder">
		<div class="eltdf-pgl-load-more">
			<?php
				echo azalea_eltdf_get_button_html(array(
					'link' => 'javascript: void(0)',
					'size' => 'medium',
					'text' => esc_html__('Load More', 'eltdf-core')
				));
			?>
		</div>
	</div>
<?php }