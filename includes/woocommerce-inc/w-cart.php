<?php


function wc_empty_cart_redirect_url() {
	return get_home_url();
}

add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url', 10 );


add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function mm_show_cart_info() {
	?>
    <a href="<?php echo wc_get_cart_url(); ?>" class="header_cart">
							<span class="header_cart_count">
								<span class="cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?> </span> <?php echo true_wordform( WC()->cart->get_cart_contents_count(), 'товар', 'товара', 'товаров' ); ?>
							</span>
        <span class="header_cart_sum">
								<span class="cart_sum"><?php echo WC()->cart->get_cart_total(); ?></span>
							</span>
    </a>
	<?php
}

function mm_show_info_about_free_shipping() {
	?>

    <div class="delivery_free">
		<?php

		//https://businessbloomer.com/woocommerce-add-need-spend-x-get-free-shipping-cart-page/
		// Get Free Shipping Methods for Rest of the World Zone & populate array $min_amounts

		$default_zone    = new WC_Shipping_Zone( 1 ); //tutorial shows 0, but 1 is required to get default zone for some reason
		$default_methods = $default_zone->get_shipping_methods();
		foreach ( $default_methods as $key => $value ) {

			if ( $value->id === "free_shipping" ) {
				if ( $value->min_amount > 0 ) {
					$min_amounts[] = $value->min_amount;
				}
			}
		}
		// Get Free Shipping for all zones is not needed
		if ( is_array( $min_amounts ) ) {
			$min_amount = min( $min_amounts );
		}

		if ( WC()->cart->total < $min_amount ):?>
            <span>Добавьте товара на<span
                        class="decor"><?php echo $min_amount - WC()->cart->total; ?> грн,</span> чтобы получить бесплатную доставку по Николаеву</span>
		<?php else: ?>
            <span>Вы можете рассчитывать на бесплатную доставку по Николаеву.</span>
		<?php endif; ?>
    </div>
	<?php
}

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	mm_show_cart_info();
	$fragments['a.header_cart'] = ob_get_clean();

	ob_start();

	mm_show_info_about_free_shipping();
	$fragments['div.delivery_free'] = ob_get_clean();


	return $fragments;
}


remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
add_action( 'woocommerce_cart_collaterals', 'mm_custom_cart_totals', 10 );

function mm_custom_cart_totals() {
	wc_get_template( 'cart/cart-totals.php' );
}