<?php $i = 0; ?>
<div class="eltdf-image-gallery <?php echo esc_attr($gallery_classes); ?>">
    <div class="eltdf-ig-carousel eltdf-slick-slider <?php echo esc_attr($gallery_classes); ?>" <?php echo azalea_eltdf_get_inline_attrs($slider_data); ?>>
        <?php foreach ($images as $image) { ?>
        <div class="eltdf-igc-image-holder">
        <?php if ($pretty_photo) { ?>
        <a itemprop="image" class="eltdf-ig-lightbox" href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
            <?php } else if($enable_links){ ?>
            <a itemprop="url" class="eltdf-ig-link" href="<?php echo esc_url($links[$i++]) ?>" title="<?php echo esc_attr($image['title']); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
                <?php } ?>
                <?php if(is_array($image_size) && count($image_size)) : ?>
                    <?php echo azalea_eltdf_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
                <?php else: ?>
                    <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
                <?php endif; ?>
                <?php if ($pretty_photo || $enable_links) { ?>
            </a>
        <?php } ?>
            <?php if ($image_info !== 'no') { ?>
                <div class="eltdf-igc-text-holder">
                    <div class="eltdf-igc-text-wrapper">
                        <div class="eltdf-igc-image-title">
                            <div class="eltdf-igc-image-title-inner">
                                <?php echo esc_attr($image['title']); ?>
                            </div>
                        </div>
                        <div class="eltdf-igc-image-description">
                            <div class="eltdf-igc-image-description-inner">
                                <?php echo esc_attr($image['description']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>