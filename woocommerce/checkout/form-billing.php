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
            <input type="radio" name="wild_delivery" id="runner" value="courier" class="input_radio" autocomplete="off" checked>
            <label for="runner" class="label_radio"></label>
        </div>
        <h5 class="title5">Доставка курьером</h5>
        <div class="delivery_type_text"><?php echo get_theme_mod('wildberry_theme_checkout_desc1');?>
        </div>
    </div>
    <div class="delivery_type_2">
        <div class="delivery_type_left">
            <input type="radio" name="wild_delivery" id="pickup" class="input_radio" value="self" autocomplete="off" >
            <label for="pickup" class="label_radio"></label>
        </div>
        <h5 class="title5">Самовывоз из точки выдачи</h5>
        <div class="delivery_type_text"><?php echo get_theme_mod('wildberry_theme_checkout_desc2');?>
        </div>
    </div>
</div>
<div class="delivery_data_pickup">
    <div class="data_pickup_inner">
        <span class="data_pickup_title">Самовывоз по адресу ул.Енисейская дом 1, оф.3</span>
        <span class="data_pickup_text"> От аляудского района или "Бабушкинская" - садитесь на 17 трамвай, доезжаете до остановки "Комбинат ЛИРА". </span>
    </div>

    <div id="map_box" class="map">
	    <?php echo get_theme_mod('wildberry_theme_checkout_map');?>
    </div>
</div>
<div class="delivery_data">
<!--<div class="woocommerce-billing-fields__field-wrapper delivery_data">-->
    <?php
    $fields = $checkout->get_checkout_fields('billing');
    //maybe DOMDocument::loadHTML will make things easier?
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
