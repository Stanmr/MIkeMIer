<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php
$eltdf_sidebar_layout  = azalea_eltdf_sidebar_layout();

get_header();
azalea_eltdf_get_title();
get_template_part('slider');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<div class="eltdf-grid-row">
				<div <?php echo azalea_eltdf_get_content_sidebar_class(); ?>>
					<?php azalea_eltdf_woocommerce_content(); ?>
				</div>
				<?php if($eltdf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo azalea_eltdf_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>			
<?php } else { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<?php azalea_eltdf_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>