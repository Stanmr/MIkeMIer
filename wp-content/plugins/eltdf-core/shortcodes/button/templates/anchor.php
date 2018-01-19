<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php azalea_eltdf_inline_style($button_styles); ?> <?php azalea_eltdf_class_attribute($button_classes); ?> <?php echo azalea_eltdf_get_inline_attrs($button_data); ?> <?php echo azalea_eltdf_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo azalea_eltdf_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>