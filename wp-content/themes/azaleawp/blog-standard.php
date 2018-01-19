<?php
    /*
        Template Name: Blog: Standard
    */
?>
<?php
$eltdf_blog_type = 'standard';
azalea_eltdf_include_blog_helper_functions('lists', $eltdf_blog_type);
$eltdf_holder_params = azalea_eltdf_get_holder_params_blog();
?>
<?php get_header(); ?>
<?php azalea_eltdf_get_title(); ?>
<?php get_template_part('slider'); ?>
    <div class="<?php echo esc_attr($eltdf_holder_params['holder']); ?>">
        <?php do_action('azalea_eltdf_after_container_open'); ?>
        <div class="<?php echo esc_attr($eltdf_holder_params['inner']); ?>">
            <?php azalea_eltdf_get_blog($eltdf_blog_type); ?>
        </div>
        <?php do_action('azalea_eltdf_before_container_close'); ?>
    </div>
<?php do_action('azalea_eltdf_blog_list_additional_tags'); ?>
<?php get_footer(); ?>