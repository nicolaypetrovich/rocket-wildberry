<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}

wc_print_notices();

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'));
    return;
}
?>

<form name="checkout" method="post" class="formSend checkout woocommerce-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <?php if ($checkout->get_checkout_fields()) : ?>

        <?php do_action('woocommerce_checkout_before_customer_details'); ?>


        <div class="delivery_box">
            <?php do_action('woocommerce_checkout_billing'); ?>
        </div>
        <div class="payment_box_inner">
            <h3 class="title3">Способ оплаты:</h3>
            <div class="payment_box_wildberry">
                <div class="payment_item_1 active">
                    <div class="payment_radio_item">
                        <input name="payment" id="cash" class="input_radio" checked="" type="radio">
                        <label for="cash" class="label_radio"></label>
                    </div>
                    Наличными
                </div>
                <div class="payment_item_2">
                    <div class="payment_radio_item">
                        <input name="payment" id="cart" class="input_radio" type="radio">
                        <label for="cart" class="label_radio"></label>
                    </div>
                    Картой
                </div>
                <div class="payment_item_3">
                    <div class="payment_radio_item">
                        <input name="payment" id="company" class="input_radio" type="radio">
                        <label for="company" class="label_radio"></label>
                    </div>
                    Юр.лицам
                </div>
            </div>
        </div>
        <div class="call_info">
            <?php do_action('woocommerce_checkout_shipping'); ?>
        </div>


        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

    <?php endif; ?>

    <?php do_action('woocommerce_checkout_before_order_review'); ?>

    <div style="display: none" id="order_review" class="woocommerce-checkout-review-order">
        <?php do_action('woocommerce_checkout_order_review'); ?>
    </div>


    <?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
