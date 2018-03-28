<?php


add_filter("woocommerce_checkout_fields", "custom_order_fields");

function custom_order_fields($fields) {


    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_country']);
    $fields['billing']['billing_country']['class'][]='invisible';
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_city']);
//    unset($fields['shipping']);


    $fields['billing']['billing_phone']['priority']=10;
    $fields['billing']['billing_phone']['class'][]='form_item';
    $fields['billing']['billing_phone']['input_class'][]='form_item_input';

////    $fields['billing']['billing_phone']['label']='some label';
    $fields['billing']['billing_email']['priority']=20;
    $fields['billing']['billing_email']['class'][]='form_item';
    $fields['billing']['billing_email']['input_class'][]='form_item_input';
////    $fields['billing']['billing_email']['label']='some label';
    $fields['billing']['billing_first_name']['priority']=30;
    $fields['billing']['billing_first_name']['class'][]='form_item';
    $fields['billing']['billing_first_name']['input_class'][]='form_item_input';
////    $fields['billing']['billing_first_name']['label']='some label';
    $fields['billing']['billing_address_1']['priority']=40;
    $fields['billing']['billing_address_1']['class'][]='form_item';
    $fields['billing']['billing_address_1']['input_class'][]='form_item_input';
//    $fields['billing']['billing_address_1']['label']='some label';
   $fields['order']['order_comments']['label']='Комментарий:';
   $fields['order']['order_comments']['priority']=50;
   $fields['order']['order_comments']['class'][]='form_item';
   $fields['order']['order_comments']['input_class'][]='form_item_input';



    return $fields;
}

remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);

//array(4) { ["billing"]=> array(11) {
// ["billing_first_name"]=> array(6) {
// ["label"]=> string(6) "Имя"
// ["required"]=> bool(true)
// ["class"]=> array(1) { [0]=> string(14) "form-row-first" } ["autocomplete"]=> string(10) "given-name" ["autofocus"]=> bool(true) ["priority"]=> int(10) }

// ["billing_last_name"]=> array(5) { ["label"]=> string(14) "Фамилия" ["required"]=> bool(true) ["class"]=> array(1) { [0]=> string(13) "form-row-last" }
// ["autocomplete"]=> string(11) "family-name" ["priority"]=> int(20) }
//
// ["billing_company"]=> array(4) { ["label"]=> string(33) "Название компании" ["class"]=> array(1) { [0]=> string(13) "form-row-wide" } ["autocomplete"]=> string(12) "organization" ["priority"]=> int(30) }
// ["billing_country"]=> array(6) { ["type"]=> string(7) "country" ["label"]=> string(12) "Страна" ["required"]=> bool(true) ["class"]=> array(3) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" [2]=> string(23) "update_totals_on_change" } ["autocomplete"]=> string(7) "country" ["priority"]=> int(40) }
// ["billing_address_1"]=> array(6) { ["label"]=> string(10) "Адрес" ["placeholder"]=> string(50) "Номер дома и название улицы" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["autocomplete"]=> string(13) "address-line1" ["priority"]=> int(50) }
// ["billing_address_2"]=> array(5) { ["placeholder"]=> string(112) "Квартира, апартаменты, жилое помещение и т. д. (не обязательно)" ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["required"]=> bool(false) ["autocomplete"]=> string(13)
// "address-line2" ["priority"]=> int(60) } ["billing_city"]=> array(5) { ["label"]=> string(31) "Населённый пункт" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["autocomplete"]=> string(14) "address-level2" ["priority"]=> int(70) }
// ["billing_state"]=> array(8) { ["type"]=> string(5) "state" ["label"]=> string(27) "Область/регион" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["validate"]=> array(1) { [0]=> string(5) "state" } ["autocomplete"]=> string(14) "address-level1" ["priority"]=> int(80)
// ["country_field"]=> string(15) "billing_country" }
//
// ["billing_postcode"]=> array(6) { ["label"]=> string(29) "Почтовый индекс" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["validate"]=> array(1) { [0]=> string(8) "postcode" } ["autocomplete"]=> string(11) "postal-code" ["priority"]=> int(90) }
// ["billing_phone"]=> array(7) { ["label"]=> string(14) "Телефон" ["required"]=> bool(true) ["type"]=> string(3) "tel" ["class"]=> array(1) { [0]=> string(13) "form-row-wide" } ["validate"]=> array(1) { [0]=> string(5) "phone" } ["autocomplete"]=> string(3) "tel" ["priority"]=> int(100) }
// ["billing_email"]=> array(7) { ["label"]=> string(5) "Email" ["required"]=> bool(true) ["type"]=> string(5) "email" ["class"]=> array(1) { [0]=> string(13) "form-row-wide" } ["validate"]=> array(1) { [0]=> string(5) "email" } ["autocomplete"]=> string(14) "email username" ["priority"]=> int(110) } }
//
// ["shipping"]=> array(9) {
// ["shipping_first_name"]=> array(6) { ["label"]=> string(6) "Имя" ["required"]=> bool(true) ["class"]=> array(1) { [0]=> string(14) "form-row-first" } ["autocomplete"]=> string(10) "given-name" ["autofocus"]=> bool(true) ["priority"]=> int(10) } ["shipping_last_name"]=> array(5) { ["label"]=> string(14) "Фамилия" ["required"]=> bool(true) ["class"]=> array(1) { [0]=> string(13) "form-row-last" } ["autocomplete"]=> string(11) "family-name" ["priority"]=> int(20) } ["shipping_company"]=> array(4) { ["label"]=> string(33) "Название компании" ["class"]=> array(1) { [0]=> string(13) "form-row-wide" } ["autocomplete"]=> string(12) "organization" ["priority"]=> int(30) } ["shipping_country"]=> array(6) { ["type"]=> string(7) "country" ["label"]=> string(12) "Страна" ["required"]=> bool(true) ["class"]=> array(3) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" [2]=> string(23) "update_totals_on_change" } ["autocomplete"]=> string(7) "country" ["priority"]=> int(40) } ["shipping_address_1"]=> array(6) { ["label"]=> string(10) "Адрес" ["placeholder"]=> string(50) "Номер дома и название улицы" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["autocomplete"]=> string(13) "address-line1" ["priority"]=> int(50) } ["shipping_address_2"]=> array(5) { ["placeholder"]=> string(112) "Квартира, апартаменты, жилое помещение и т. д. (не обязательно)" ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["required"]=> bool(false) ["autocomplete"]=> string(13) "address-line2" ["priority"]=> int(60) } ["shipping_city"]=> array(5) { ["label"]=> string(31) "Населённый пункт" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["autocomplete"]=> string(14) "address-level2" ["priority"]=> int(70) } ["shipping_state"]=> array(8) { ["type"]=> string(5) "state" ["label"]=> string(27) "Область/регион" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["validate"]=> array(1) { [0]=> string(5) "state" } ["autocomplete"]=> string(14) "address-level1" ["priority"]=> int(80) ["country_field"]=> string(16) "shipping_country" } ["shipping_postcode"]=> array(6) { ["label"]=> string(29) "Почтовый индекс" ["required"]=> bool(true) ["class"]=> array(2) { [0]=> string(13) "form-row-wide" [1]=> string(13) "address-field" } ["validate"]=> array(1) { [0]=> string(8) "postcode" } ["autocomplete"]=> string(11) "postal-code" ["priority"]=> int(90) } } ["account"]=> array(1) { ["account_password"]=> array(4) { ["type"]=> string(8) "password" ["label"]=> string(55) "Создать пароль учетной записи" ["required"]=> bool(true) ["placeholder"]=> string(12) "Пароль" } }
//
// ["order"]=> array(1) {
// ["order_comments"]=> array(4) { ["type"]=> string(8) "textarea" ["class"]=> array(1) { [0]=> string(5) "notes" } ["label"]=> string(36) "Примечание к заказу" ["placeholder"]=> string(131) "Примечания к вашему заказу, например, особые пожелания отделу доставки." } } }