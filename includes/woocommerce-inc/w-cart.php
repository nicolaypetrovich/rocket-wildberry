<?php

remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display');//removing action just in case

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {

	$fragments['a.header_cart'] = '<span class="header_cart_count">
								<span class="cart_count">'.WC()->cart->get_cart_contents_count().'</span>'.
	                              true_wordform(WC()->cart->get_cart_contents_count(), 'товар', 'товара', 'товаров').'
							</span>
                            <span class="header_cart_sum">
								<span class="cart_sum">'.WC()->cart->get_cart_total().'</span>
							</span>';

	return $fragments;

}