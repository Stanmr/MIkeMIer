<?php

if($display_category === 'yes') {
	$product = azalea_eltdf_return_woocommerce_global_variable();
	$product_categories = $product->wc_get_product_category_list(', ');
	
	if (!empty($product_categories)) { ?>
		<p class="eltdf-<?php echo esc_attr($class_name); ?>-category"><?php print $product_categories; ?></p>
	<?php } ?>
<?php } ?>