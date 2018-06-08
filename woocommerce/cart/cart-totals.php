<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="basket_check cart_totals basket_check <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
    <h2 class="title2">Чек</h2>
	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
    <dl class="check_info">
        <div>
            <dt>Сумма:</dt>
            <dd><?php wc_cart_totals_subtotal_html(); ?></dd>
        </div>
        <div>
            <dt>Товары:</dt>
            <dd><?php echo WC()->cart->get_cart_contents_count() ?> шт.</dd>
        </div>
        <div class="invisible">
		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
		<?php endif; ?>
        </div>
    </dl>
    <div class="check_bottom"><?php wc_cart_totals_order_total_html(); ?></div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
