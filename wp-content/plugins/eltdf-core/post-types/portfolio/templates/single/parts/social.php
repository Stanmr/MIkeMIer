<?php if(azalea_eltdf_options()->getOptionValue('enable_social_share') == 'yes' && azalea_eltdf_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="eltdf-ps-info-item eltdf-ps-social-share">
        <?php echo azalea_eltdf_get_social_share_html(array("title" => 'SHARE:')); ?>
    </div>
<?php endif; ?>