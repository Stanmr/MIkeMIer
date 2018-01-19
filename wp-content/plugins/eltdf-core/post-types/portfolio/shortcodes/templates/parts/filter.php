<?php if($filter == 'yes') {
	$filter_categories = $this_object->getFilterCategories($params);
	$filter_styles = $this_object->getFilterStyles($params);
    $filter_holder_classes  = $this_object->getFilterHolderClasses($params);
	?>
	<div class="eltdf-pl-filter-holder <?php echo esc_attr($filter_holder_classes); ?>">
		<div class="eltdf-plf-inner">
			<?php
			if(is_array($filter_categories) && count($filter_categories)){ ?>
				<ul>
					<li class="eltdf-pl-filter" data-filter="">
						<span <?php azalea_eltdf_inline_style($filter_styles); ?>><?php esc_html_e('Show all', 'eltdf-core')?></span>
					</li>
					<?php foreach($filter_categories as $cat) { ?>
						<li class="eltdf-pl-filter" data-filter=".portfolio-category-<?php echo esc_attr($cat->slug); ?>">
							<span <?php azalea_eltdf_inline_style($filter_styles); ?>><?php echo esc_html($cat->name); ?></span>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
<?php } ?>
