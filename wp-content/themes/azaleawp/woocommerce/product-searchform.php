<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text"><?php esc_html_e('Search for:', 'azaleawp'); ?></label>
    <div class="input-holder clearfix">
        <input type="search" class="search-field" placeholder="<?php echo esc_html__('Search Products...', 'azaleawp'); ?>" value="<?php echo get_search_query(); ?>" title="<?php echo esc_html__('Search for:', 'azaleawp'); ?>"/>
        <button type="submit" id="searchsubmit"><span class="icon_search"></span></button>
        <input type="hidden" name="post_type" value="product"/>
    </div>
</form>