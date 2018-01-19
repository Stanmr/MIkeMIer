<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(azalea_eltdf_options()->getOptionValue('enable_social_share') === 'yes' && azalea_eltdf_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="eltdf-blog-share">
        <?php echo azalea_eltdf_get_social_share_html(array('icon_type' => $share_type)); ?>
    </div>
<?php } ?>