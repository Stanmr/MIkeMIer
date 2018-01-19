<?php if(azalea_eltdf_options()->getOptionValue('proofing_gallery_single_comments') == 'yes') : ?>
    <?php comments_template('', true); ?>
<?php endif; ?>