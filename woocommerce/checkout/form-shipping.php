<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
 * @version 3.0.9
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php if (true === WC()->cart->needs_shipping_address()) : ?>
    <div class="payment_company_box">
        <div class="form_item">
            <label class="payment_company_label">Название компании:</label>
            <div class="form_item_type">
                <span class="payment_company_message">Пожалуйста, заполните реквизиты (необязательно). Затем, в течение ближайшего времени Вам перезвонит менеджер для подтверждения заказа и пришлет счет на оплату в банке</span>
                <input class="form_item_input" name="name" placeholder="Введите название, ЕГРПОУ, адрес или ОКПО" onblur="if(this.placeholder=='') this.placeholder='Введите название, ЕГРПОУ, адрес или ОКПО'" onfocus="if(this.placeholder =='Введите название, ЕГРПОУ, адрес или ОКПО' ) this.placeholder=''" type="email">
                <span class="bags">поле обязательное для заполнения</span>
                <span class="payment_company_text">Введите название компании или загрузите файл с реквизитами</span>
                <label for="file" class="label_file">
                    <span class="file_btn">Прикрепить файл</span>
                    <span class="file_text"></span>
                    <input name="file" id="file" type="file">
                </label>
            </div>
        </div>
    </div>
    <div class="delivery_data">
        <div class="form_item">
            <label>В какое время вам лучше позвонить?</label>
            <div class="form_item_type">
                <input class="form_item_input" name="name" placeholder="c 9:00 до 18:00" onblur="if(this.placeholder=='') this.placeholder='c 9:00 до 18:00'" onfocus="if(this.placeholder =='c 9:00 до 18:00' ) this.placeholder=''" type="text">
            </div>

        </div>
    </div>
    <button class="purple_btn sendBtn">Оформить заказ</button>
    <h3 id="ship-to-different-address">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
            <input id="ship-to-different-address-checkbox"
                   class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked(apply_filters('woocommerce_ship_to_different_address_checked', 'shipping' === get_option('woocommerce_ship_to_destination') ? 1 : 0), 1); ?>
                   type="checkbox" name="ship_to_different_address" value="1"/>
            <span><?php _e('Ship to a different address?', 'woocommerce'); ?></span>
        </label>
    </h3>

    <div class="shipping_address">

        <?php do_action('woocommerce_before_checkout_shipping_form', $checkout); ?>

        <div class="woocommerce-shipping-fields__field-wrapper">
            <?php
            $fields = $checkout->get_checkout_fields('shipping');

            foreach ($fields as $key => $field) {
                if (isset($field['country_field'], $fields[$field['country_field']])) {
                    $field['country'] = $checkout->get_value($field['country_field']);
                }
                woocommerce_form_field($key, $field, $checkout->get_value($key));
            }
            ?>
        </div>

        <?php do_action('woocommerce_after_checkout_shipping_form', $checkout); ?>

    </div>

<?php endif; ?>


<div class="payment_company_box">
    <div class="form_item">
        <label class="payment_company_label">Название компании:</label>
        <div class="form_item_type">
            <span class="payment_company_message">Пожалуйста, заполните реквизиты (необязательно). Затем, в течение ближайшего времени Вам перезвонит менеджер для подтверждения заказа и пришлет счет на оплату в банке</span>
            <input class="form_item_input" name="name" placeholder="Введите название, ЕГРПОУ, адрес или ОКПО" onblur="if(this.placeholder=='') this.placeholder='Введите название, ЕГРПОУ, адрес или ОКПО'" onfocus="if(this.placeholder =='Введите название, ЕГРПОУ, адрес или ОКПО' ) this.placeholder=''" type="email">
            <span class="bags">поле обязательное для заполнения</span>
            <span class="payment_company_text">Введите название компании или загрузите файл с реквизитами</span>
            <label for="file" class="label_file">
                <span class="file_btn">Прикрепить файл</span>
                <span class="file_text"></span>
                <input name="file" id="file" type="file">
            </label>
        </div>
    </div>
</div>
<div class="delivery_data">
    <div class="form_item">
        <label>В какое время вам лучше позвонить?</label>
        <div class="form_item_type">
            <input class="form_item_input" name="name" placeholder="c 9:00 до 18:00" onblur="if(this.placeholder=='') this.placeholder='c 9:00 до 18:00'" onfocus="if(this.placeholder =='c 9:00 до 18:00' ) this.placeholder=''" type="text">
        </div>

    </div>
</div>
<div class="form-row place-order">
    <noscript>
        <?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
        <br/><button type="submit" class="button alt purple_btn sendBtn" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
    </noscript>

    <?php wc_get_template( 'checkout/terms.php' ); ?>

    <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

    <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt purple_btn sendBtn" name="woocommerce_checkout_place_order" id="place_order" value="' . 'Оформить заказ' . '" data-value="' . 'Оформить заказ' . '">' .  'Оформить заказ' . '</button>' ); // @codingStandardsIgnoreLine ?>

    <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

    <?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
</div>