<article <?php post_class('eltdf-pgl-item'); ?>>
	<div class="eltdf-pgl-item-inner">
		<?php echo eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'parts/image','', $params); ?>
		<div class="eltdf-pgli-text-holder">
			<div class="eltdf-pgli-text-wrapper">
				<div class="eltdf-pgli-text">
					<?php echo eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'parts/title', '', $params); ?>
					<?php echo eltdf_core_get_cpt_shortcode_module_template_part('proofing-gallery', 'parts/images-count'); ?>
				</div>
			</div>
		</div>

		<a itemprop="url" class="eltdf-pgli-link" href="<?php the_permalink(); ?>"></a>

	</div>
</article>