<?php do_action('azalea_eltdf_before_page_header'); ?>

<aside class="eltdf-vertical-menu-area <?php echo esc_html($holder_class); ?>">
    <div class="eltdf-vertical-menu-area-inner">
		<a href="#" class="eltdf-vertical-area-opener">
            <span class="eltdf-vertical-area-opener-line eltdf-line-1"></span>
            <span class="eltdf-vertical-area-opener-line eltdf-line-2"></span>
            <span class="eltdf-vertical-area-opener-line eltdf-line-3"></span>
        </a>
        <div class="eltdf-vertical-area-background"></div>
        <?php if(!$hide_logo) {
			azalea_eltdf_get_logo();
        } ?>
        <?php azalea_eltdf_get_header_vertical_closed_main_menu(); ?>
        <div class="eltdf-vertical-area-widget-holder">
			<?php azalea_eltdf_get_header_vertical_closed_widget_areas(); ?>
        </div>
    </div>
</aside>
<?php if(azalea_eltdf_options()->getOptionValue('logo_image_vertical_closed')): ?>
<div class="eltdf-vertical-area-bottom-logo">
	<div class="eltdf-vertical-area-bottom-logo-inner">
		<?php if(!$hide_logo) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo azalea_eltdf_options()->getOptionValue('logo_image_vertical_closed'); ?>" alt="<?php esc_html_e('Vertical Closed Bottom Logo','azaleawp'); ?>"/>
			</a>
		<?php } ?>
	</div>
</div>
<?php endif;?>

<?php do_action('azalea_eltdf_after_page_header'); ?>