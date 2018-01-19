<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * azalea_eltdf_header_meta hook
     *
     * @see azalea_eltdf_header_meta() - hooked with 10
     * @see azalea_eltdf_user_scalable_meta - hooked with 10
     */
    do_action('azalea_eltdf_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * azalea_eltdf_after_body_tag hook
	 *
	 * @see azalea_eltdf_get_side_area() - hooked with 10
	 * @see azalea_eltdf_smooth_page_transitions() - hooked with 10
	 */
	do_action('azalea_eltdf_after_body_tag'); ?>
	
	<div class="eltdf-wrapper eltdf-404-page">
	    <div class="eltdf-wrapper-inner">
		    <?php azalea_eltdf_get_header(); ?>
		    
			<div class="eltdf-content" <?php azalea_eltdf_content_elem_style_attr(); ?>>
	            <div class="eltdf-content-inner">
					<div class="eltdf-page-not-found">
						<?php
							$eltdf_title_image_404 = azalea_eltdf_options()->getOptionValue('404_page_title_image');
							$eltdf_title_404       = azalea_eltdf_options()->getOptionValue('404_title');
							$eltdf_subtitle_404    = azalea_eltdf_options()->getOptionValue('404_subtitle');
							$eltdf_text_404        = azalea_eltdf_options()->getOptionValue('404_text');
							$eltdf_button_label    = azalea_eltdf_options()->getOptionValue('404_back_to_home');
						?>

						<?php if (!empty($eltdf_title_image_404)) { ?>
							<div class="eltdf-404-title-image"><img src="<?php echo esc_url($eltdf_title_image_404); ?>" alt="<?php esc_html_e('404 Title Image', 'azaleawp'); ?>" /></div>
						<?php } ?>

						<h1 class="eltdf-page-not-found-title">
							<?php if(!empty($eltdf_title_404)) {
								echo esc_html($eltdf_title_404);
							} else {
								esc_html_e('404', 'azaleawp');
							} ?>
						</h1>

						<h3 class="eltdf-page-not-found-subtitle">
							<?php if(!empty($eltdf_subtitle_404)){
								echo esc_html($eltdf_subtitle_404);
							} else {
								esc_html_e('Page not found', 'azaleawp');
							} ?>
						</h3>

						<p class="eltdf-page-not-found-text">
							<?php if(!empty($eltdf_text_404)){
								echo esc_html($eltdf_text_404);
							} else {
								esc_html_e('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'azaleawp');
							} ?>
						</p>

						<?php
							$eltdf_params = array();
							$eltdf_params['text'] = !empty($eltdf_button_label) ? $eltdf_button_label : esc_html__('Back to home', 'azaleawp');
							$eltdf_params['link'] = esc_url(home_url('/'));
							$eltdf_params['target'] = '_self';
							$eltdf_params['size'] = 'large';

						echo azalea_eltdf_execute_shortcode('eltdf_button',$eltdf_params);?>
					</div>
				</div>	
			</div>
		</div>
	</div>		
	<?php wp_footer(); ?>
</body>
</html>