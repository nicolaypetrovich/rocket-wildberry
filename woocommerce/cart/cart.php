<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}

//wc_print_notices();

do_action('woocommerce_before_cart'); ?>
<div class="basket_box_inner">
    <h1 class="title2"><?php the_title(); ?></h1>
    <div class="basket_box">
        <div class="basket_info">
            <div class="basket_tb_box">
                <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                    <?php do_action('woocommerce_before_cart_table'); ?>

                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents basket_tb">
                        <tbody>
                        <?php do_action('woocommerce_before_cart_contents'); ?>

                        <?php
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                ?>
                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">


                                    <td class="product-thumbnail cell1">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                        if (!$product_permalink) {
                                            echo $thumbnail;
                                        } else {
                                            printf('<a href="%s"><div class="basket_product_img">%s</div></a>', esc_url($product_permalink), $thumbnail);
                                        }
                                        ?>
                                    </td>

                                    <td class="product-name cell2"
                                        data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>"><?php
                                        if (!$product_permalink) {
                                            echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;';
                                        } else {
                                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a class="basket_product_name" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key);
                                        }

                                        // Meta data.
                                        echo wc_get_formatted_cart_item_data($cart_item);

                                        // Backorder notification.
                                        if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                            echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                                        }
                                        ?>
                                    </td>


                                    <td class="product-quantity cell3"
                                        data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                                        <div class="basket-counter-box">
                                            <span>Количество:</span>
                                            <div class="counter-box">

                                                <?php
                                                if ($_product->is_sold_individually()) {
                                                    $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                                } else {
                                                    $product_quantity = woocommerce_quantity_input(array(
                                                        'input_name' => "cart[{$cart_item_key}][qty]",
                                                        'input_value' => $cart_item['quantity'],
                                                        'max_value' => $_product->get_max_purchase_quantity(),
                                                        'min_value' => '0',
                                                        'product_name' => $_product->get_name(),
                                                    ), $_product, false);
                                                }

                                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                                ?>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-price cell4"
                                        data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                        <div class="basket_price">
                                            <span>Стоимость:</span>
                                            <span class="price-total">
                                            <?php
//                                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                            echo $_product->get_price_html();
                                            ?>
                                                </span>
                                        </div>
                                    </td>


                                    <td class="product-remove cell5">
                                        <?php
                                        // @codingStandardsIgnoreLine
                                        echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                            '<a href="%s" class="remove delete_btn" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            __('Remove this item', 'woocommerce'),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku())
                                        ), $cart_item_key);
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                        <?php do_action('woocommerce_cart_contents'); ?>

                        <tr>
                            <td colspan="6" class="actions">

                                <?php if (wc_coupons_enabled()) { ?>
                                    <div class="coupon">
                                        <label for="coupon_code"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
                                        <input
                                                type="text" name="coupon_code" class="input-text" id="coupon_code"
                                                value=""
                                                placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>"/>
                                        <input
                                                type="submit" class="button" name="apply_coupon"
                                                value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"/>
                                        <?php do_action('woocommerce_cart_coupon'); ?>
                                    </div>
                                <?php } ?>

                                <button style="display: none" type="submit" class="button" name="update_cart"
                                        value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

                                <?php do_action('woocommerce_cart_actions'); ?>

                                <?php wp_nonce_field('woocommerce-cart'); ?>
                            </td>
                        </tr>

                        <?php do_action('woocommerce_after_cart_contents'); ?>
                        </tbody>
                    </table>
                    <?php do_action('woocommerce_after_cart_table'); ?>
                </form>
            </div>
            <?php if (!is_page('checkout')): ?>
                <div class="basket_button">
                    <?php do_action('woocommerce_proceed_to_checkout'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_page('checkout')): ?>
                <?php define( 'WOOCOMMERCE_CHECKOUT', true );
                echo do_shortcode('[woocommerce_checkout]'); ?>
            <?php endif; ?>
        </div>

        <?php
        /**
         * Cart collaterals hook.
         *
         * @hooked woocommerce_cross_sell_display unhooked
         * @hooked woocommerce_cart_totals - 10 unhooked
         */
        do_action('woocommerce_cart_collaterals');
        ?>

    </div>

    <?php mm_show_info_about_free_shipping(); ?>
</div>

<?php do_action('woocommerce_after_cart'); ?>
