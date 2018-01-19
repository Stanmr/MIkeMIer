<?php do_action('azalea_eltdf_before_page_header'); ?>

<aside class="eltdf-vertical-menu-area <?php echo esc_html($holder_class); ?>">
	<div class="eltdf-vertical-menu-area-inner">
		<div class="eltdf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			azalea_eltdf_get_logo();
		} ?>
		<?php azalea_eltdf_get_header_vertical_main_menu(); ?>
		<div class="eltdf-vertical-area-widget-holder">
			<?php azalea_eltdf_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('azalea_eltdf_after_page_header'); ?>