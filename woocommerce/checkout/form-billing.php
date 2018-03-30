<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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

/** @global WC_Checkout $checkout */

?>


<?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>
<h3 class="title3">Способ доставки:</h3>
<div class="delivery_top">
    <div class="delivery_type_1 active">
        <div class="delivery_type_left">
            <input type="radio" name="delivery" id="runner" value="courier" class="input_radio" autocomplete="off" checked>
            <label for="runner" class="label_radio"></label>
        </div>
        <h5 class="title5">Доставка курьером</h5>
        <div class="delivery_type_text">Заказы от 300 гривен -курьером в Николаеве
            бесплатно, в регионы доставляем транспортными компаниями"
        </div>
    </div>
    <div class="delivery_type_2">
        <div class="delivery_type_left">
            <input type="radio" name="delivery" id="pickup" class="input_radio" value="self" autocomplete="off" >
            <label for="pickup" class="label_radio"></label>
        </div>
        <h5 class="title5">Самовывоз из точки выдачи</h5>
        <div class="delivery_type_text">Из нашего офиса по адресу ул. Аляудская д.1 стр.3,4
            этаж офис. 34-19, в любой деньс 10:00 до 18:00, кроме воскресенья.
        </div>
    </div>
</div>
<div class="delivery_data_pickup">
    <div class="data_pickup_inner">
        <span class="data_pickup_title">Самовывоз по адресу ул.Енисейская дом 1, оф.3</span>
        <span class="data_pickup_text"> От аляудского района или "Бабушкинская" - садитесь на 17 трамвай, доезжаете до остановки "Комбинат ЛИРА". </span>
    </div>

    <div id="map_box" class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5446.1654196474265!2d32.03421323896658!3d46.96006492912926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c5cbb6480f85f7%3A0x51d847ae0b03ab7c!2sMikolay+Leontovich+Square%2C+Mykolaiv%2C+Mykolaivs&#39;ka+oblast%2C+54000!5e0!3m2!1sen!2sua!4v1522405716282" width="720" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<div class="delivery_data">
<!--<div class="woocommerce-billing-fields__field-wrapper delivery_data">-->
    <?php
    $fields = $checkout->get_checkout_fields('billing');

    foreach ($fields as $key => $field) {

        if (isset($field['country_field'], $fields[$field['country_field']])) {
            $field['country'] = $checkout->get_value($field['country_field']);
        }
        if($key=='billing_company')
            continue;
        $field['return'] = true;
        $temp = woocommerce_form_field($key, $field, $checkout->get_value($key));
        $temp = str_replace(array('<p'), '<div', $temp);
        $temp = str_replace(array('/p>'), '/div>', $temp);
        if (strpos($temp, '<input') !== false) {
            $temp = str_replace(array('<input'), '<div class="form_item_type"><input', $temp);
            $temp = str_replace('</div>', '<span class="bags">поле обязательное для заполнения</span></div></div>', $temp);
        }
        echo $temp;
    }

    ?>
    <?php do_action('woocommerce_before_order_notes', $checkout); ?>

    <?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>
            <?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
                <?php
                $field['return'] = true;
                $temp = woocommerce_form_field($key, $field, $checkout->get_value($key));
                $temp = str_replace(array('<p'), '<div', $temp);
                $temp = str_replace(array('/p>'), '/div>', $temp);
                if (strpos($temp, '<textarea') !== false) {
                    $temp = str_replace(array('<textarea'), '<div class="form_item_type"><textarea', $temp);
//                    $temp = str_replace(array('<input'), '<div class="form_item_type"><input', $temp);
                    $temp = str_replace('</textarea>', '</textarea></div>', $temp);
                }
                echo $temp; ?>
            <?php endforeach; ?>
    <?php endif; ?>

    <?php do_action('woocommerce_after_order_notes', $checkout); ?>
</div>

<?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
