<?php
class AzaleaEltdfWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'eltdf_woocommerce_dropdown_cart',
			esc_html__('Elated Woocommerce Dropdown Cart', 'azaleawp'),
			array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'azaleawp' ), )
		);

		$this->setParams();
	}

	protected function setParams() {

		$this->params = array(
			array(
				'type'		  => 'textfield',
				'name'		  => 'woocommerce_dropdown_cart_margin',
				'title'       => esc_html__('Icon Margin', 'azaleawp'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'azaleawp')
			),
			array(
                'type' => 'dropdown',
                'name' => 'woocommerce_enable_cart_info',
                'title' => esc_html__('Enable Cart Info', 'azaleawp'),
                'options' => azalea_eltdf_get_yes_no_select_array(false),
                'description' => esc_html__('Enabling this option will show cart info (products number and price) at the right side of dropdown cart icon', 'azaleawp')
            ),
		);
    }

    /**
     * Generate widget form based on $params attribute
     *
     * @param array $instance
     *
     * @return null
     */
    public function form($instance) {
        if(is_array($this->params) && count($this->params)) {
            foreach($this->params as $param_array) {
                $param_name    = $param_array['name'];
                ${$param_name} = isset($instance[$param_name]) ? esc_attr($instance[$param_name]) : '';
            }

            foreach($this->params as $param) {
                switch($param['type']) {
                    case 'textfield':
                        ?>
                        <p>
                            <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo
                                esc_html($param['title']); ?>:</label>
                            <input class="widefat" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" type="text" value="<?php echo esc_attr(${$param['name']}); ?>"/>
                            <?php if(!empty($param['description'])) : ?>
                                <span class="eltdf-field-description"><?php echo esc_html($param['description']); ?></span>
                            <?php endif; ?>
                        </p>
                        <?php
                        break;
                    case 'dropdown':
                        ?>
                        <p>
                            <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo
                                esc_html($param['title']); ?>:</label>
                            <?php if(isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
                                <select class="widefat" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>">
                                    <?php foreach($param['options'] as $param_option_key => $param_option_val) {
                                        $option_selected = '';
                                        if(${$param['name']} == $param_option_key) {
                                            $option_selected = 'selected';
                                        }
                                        ?>
                                        <option <?php echo esc_attr($option_selected); ?> value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_attr($param_option_val); ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                            <?php if(!empty($param['description'])) : ?>
                                <span class="eltdf-field-description"><?php echo esc_html($param['description']); ?></span>
                            <?php endif; ?>
                        </p>

                        <?php
                        break;    
                }
            }
        } else { ?>
            <p><?php esc_html_e('There are no options for this widget.', 'azaleawp'); ?></p>
        <?php }
    }

    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        foreach($this->params as $param) {
            $param_name = $param['name'];

            $instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
        }

        return $instance;
    }

	public function widget( $args, $instance ) {
		extract( $args );
		
		global $woocommerce;
		
		$icon_styles = array();

		if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
			$icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
		}

		$icon_class = 'eltdf-cart-info-is-disabled';

		if (!empty($instance['woocommerce_enable_cart_info']) && $instance['woocommerce_enable_cart_info'] === 'yes') {
			$icon_class = 'eltdf-cart-info-is-active';
		}
		$cart_image = ELATED_ASSETS_ROOT."/img/cart.png";
		$cart_image_light = ELATED_ASSETS_ROOT."/img/cart-light.png";

		?>
		<div class="eltdf-shopping-cart-holder <?php echo esc_html($icon_class); ?>" <?php azalea_eltdf_inline_style($icon_styles) ?>>
			<div class="eltdf-shopping-cart-inner">
				<?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
				<a itemprop="url" class="eltdf-header-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
					<span class="eltdf-cart-image"><img class="eltdf-cart-image-dark" src="<?php echo esc_html($cart_image); ?> " alt="cart-image"/>
					<img class="eltdf-cart-image-light" src="<?php echo esc_html($cart_image_light); ?> " alt="cart-image"/></span>
					<span class="eltdf-cart-info">
						<span class="eltdf-cart-info-number"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'azaleawp' ), WC()->cart->cart_contents_count ); ?></span>
						<span class="eltdf-cart-info-total"><?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array('span' => array('class' => true,'id' => true))); ?></span>
					</span>			
				</a>
				<?php if ( !$cart_is_empty ) : ?>
					<div class="eltdf-shopping-cart-dropdown">
						<ul>
							<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
									continue;
								}
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : $_product->get_price_including_tax();
								?>
								<li>
									<div class="eltdf-item-image-holder">
										<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
											<?php echo wp_kses($_product->get_image(), array(
												'img' => array(
												'src' => true,
												'width' => true,
												'height' => true,
												'class' => true,
												'alt' => true,
												'title' => true,
												'id' => true
												)
											)); ?>
										</a>
									</div>
									<div class="eltdf-item-info-holder">
										<h5 itemprop="name" class="eltdf-product-title"><a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo apply_filters('azalea_eltdf_woo_widget_cart_product_title', $_product->get_title(), $_product ); ?></a></h5>
										<span class="eltdf-quantity"><?php esc_html_e('Quantity: ','azaleawp'); echo esc_html($cart_item['quantity']); ?></span>
										<?php echo apply_filters( 'azalea_eltdf_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
										<?php echo apply_filters( 'azalea_eltdf_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'azaleawp') ), $cart_item_key ); ?>
									</div>
								</li>
							<?php endforeach; ?>
							<div class="eltdf-cart-bottom">
								<div class="eltdf-subtotal-holder clearfix">
									<span class="eltdf-total"><?php esc_html_e( 'Order Total:', 'azaleawp' ); ?></span>
									<span class="eltdf-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
											'class' => true,
											'id' => true
											)
										)); ?>
									</span>
								</div>
								<div class="eltdf-btn-holder clearfix">
									<a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>" class="eltdf-view-cart" data-title="<?php esc_html_e('VIEW BAG & CHECKOUT','azaleawp'); ?>"><span><?php esc_html_e('VIEW BAG & CHECKOUT','azaleawp'); ?></span></a>
								</div>
							</div>
						</ul>
					</div>
				<?php else : ?>
					<div class="eltdf-shopping-cart-dropdown">
						<ul>
							<li class="eltdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'azaleawp' ); ?></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>	
		</div>
		<?php
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "AzaleaEltdfWoocommerceDropdownCart" );' ) );

// WooCommerce plugin changed hooks in 3.0 version and because of that we have this condition
if ( version_compare( WOOCOMMERCE_VERSION, '3.0' ) >= 0 ) {
    add_filter( 'woocommerce_add_to_cart_fragments', 'azalea_eltdf_woocommerce_header_add_to_cart_fragment' );
} else {
    add_filter( 'add_to_cart_fragments', 'azalea_eltdf_woocommerce_header_add_to_cart_fragment' );
}

function azalea_eltdf_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	$cart_image = ELATED_ASSETS_ROOT."/img/cart.png";
	$cart_image_light = ELATED_ASSETS_ROOT."/img/cart-light.png";

	ob_start();

	?>

	<div class="eltdf-shopping-cart-inner">
		<?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
		<a itemprop="url" class="eltdf-header-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
			<span class="eltdf-cart-image"><img class="eltdf-cart-image-dark" src="<?php echo esc_html($cart_image); ?> " alt="cart-image"/>
					<img class="eltdf-cart-image-light" src="<?php echo esc_html($cart_image_light); ?> " alt="cart-image"/></span>
			<span class="eltdf-cart-info">
				<span class="eltdf-cart-info-number"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'azaleawp' ), WC()->cart->cart_contents_count ); ?></span>
				<span class="eltdf-cart-info-total"><?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array('span' => array('class' => true,'id' => true))); ?></span>
			</span>	
		</a>
		<?php if ( !$cart_is_empty ) : ?>
			<div class="eltdf-shopping-cart-dropdown">
				<ul>
					<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
						$_product = $cart_item['data'];
						// Only display if allowed
						if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
							continue;
						}
						// Get price
						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : $_product->get_price_including_tax();
						?>
						<li>
							<div class="eltdf-item-image-holder">
								<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
									<?php echo wp_kses($_product->get_image(), array(
										'img' => array(
										'src' => true,
										'width' => true,
										'height' => true,
										'class' => true,
										'alt' => true,
										'title' => true,
										'id' => true
										)
									)); ?>
								</a>
							</div>
							<div class="eltdf-item-info-holder">
								<h5 itemprop="name" class="eltdf-product-title"><a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo apply_filters('azalea_eltdf_woo_widget_cart_product_title', $_product->get_title(), $_product ); ?></a></h5>
								<span class="eltdf-quantity"><?php esc_html_e('Quantity: ','azaleawp'); echo esc_html($cart_item['quantity']); ?></span>
								<?php echo apply_filters( 'azalea_eltdf_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
								<?php echo apply_filters( 'azalea_eltdf_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'azaleawp') ), $cart_item_key ); ?>
							</div>
						</li>
					<?php endforeach; ?>
					<div class="eltdf-cart-bottom">
						<div class="eltdf-subtotal-holder clearfix">
							<span class="eltdf-total"><?php esc_html_e( 'Order Total:', 'azaleawp' ); ?></span>
							<span class="eltdf-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
									'class' => true,
									'id' => true
									)
								)); ?>
							</span>
						</div>
						<div class="eltdf-btn-holder clearfix">
							<a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>" class="eltdf-view-cart" data-title="<?php esc_html_e('VIEW BAG & CHECKOUT','azaleawp'); ?>"><span><?php esc_html_e('VIEW BAG & CHECKOUT','azaleawp'); ?></span></a>
						</div>
					</div>
				</ul>
			</div>
		<?php else : ?>
			<div class="eltdf-shopping-cart-dropdown">
				<ul>
					<li class="eltdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'azaleawp' ); ?></li>
				</ul>
			</div>
		<?php endif; ?>
	</div>

	<?php
	$fragments['div.eltdf-shopping-cart-inner'] = ob_get_clean();

	return $fragments;
}
?>