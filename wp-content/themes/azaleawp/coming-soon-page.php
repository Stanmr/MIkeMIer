<?php
/*
Template Name: Coming Soon Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	    <?php
	    /**
	     * azalea_eltdf_header_meta hook
	     *
	     * @see azalea_eltdf_header_meta() - hooked with 10
	     * @see azalea_eltdf_user_scalable_meta() - hooked with 10
	     */
	    do_action('azalea_eltdf_header_meta');

	    wp_head(); ?>
    </head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<?php
		/**
		 * azalea_eltdf_after_body_tag hook
		 *
		 * @see azalea_eltdf_get_side_area() - hooked with 10
		 * @see azalea_eltdf_smooth_page_transitions() - hooked with 10
		 */
		do_action('azalea_eltdf_after_body_tag'); ?>

		<div class="eltdf-wrapper">
			<div class="eltdf-wrapper-inner">
				<div class="eltdf-content">
		            <div class="eltdf-content-inner">
						<div class="eltdf-full-width">
							<div class="eltdf-full-width-inner">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>