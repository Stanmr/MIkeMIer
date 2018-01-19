<div class="<?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<div class="eltdf-pgl-inner clearfix">
		<?php
		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				echo eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'proofing-gallery-item', '', $params);
			endwhile;
		else:
			echo eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'parts/posts-not-found');
		endif;

		wp_reset_postdata();
		?>
	</div>

	<?php echo eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'pagination/'.$pagination_type, '', array(), $additional_params); ?>
</div>