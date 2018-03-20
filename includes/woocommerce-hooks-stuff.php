<?php
add_filter('woocommerce_breadcrumb_defaults', 'mm_box_change_breadcrumb_delimiter');
function mm_box_change_breadcrumb_delimiter($defaults)
{
    // Change the breadcrumb delimeter from '/' to '»'
    $defaults['delimiter'] = ' » ';
    return $defaults;
}

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support()
{
    add_theme_support('woocommerce');
}

remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);

remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);


add_action( 'pre_get_posts', 'custom_pre_get_posts' );

function custom_pre_get_posts($query) {
    if ( is_woocommerce() ) {
        $query->set('posts_per_page', -1);
    }

    return $query;
}

//add additional fields
add_action('woocommerce_product_options_general_product_data', 'mm_box_add_custom_general_fields');

function mm_box_add_custom_general_fields()
{

//    echo '<div class="options_group">';
    woocommerce_wp_text_input(
        array(
            'id' => '_manufacturer_field',
            'label' => __('Производитель', 'woocommerce'),
            'placeholder' => ''
        )
    );
    woocommerce_wp_text_input(
        array(
            'id' => '_composition_field',
            'label' => __('Состав', 'woocommerce'),
            'placeholder' => ''
        )
    );
    woocommerce_wp_text_input(
        array(
            'id' => '_min_order_field',
            'label' => __('Минимальный заказ', 'woocommerce'),
            'placeholder' => ''
        )
    );
//    echo '</div>';
}


// Save Additional fields
add_action('woocommerce_process_product_meta', 'mm_box_add_custom_general_fields_save');

function mm_box_add_custom_general_fields_save($post_id)
{
    // Number Field
    $mm_man_field= $_POST['_manufacturer_field'];
    $mm_composition_field = $_POST['_composition_field'];
    $mm_min_order_field = $_POST['_min_order_field'];

    if (!empty($mm_man_field)) {
        update_post_meta($post_id, '_manufacturer_field', esc_attr($mm_man_field));
    }
    if (!empty($mm_composition_field)) {
        update_post_meta($post_id, '_composition_field', esc_attr($mm_composition_field));
    }
    if (!empty($mm_min_order_field)) {
        update_post_meta($post_id, '_min_order_field', esc_attr($mm_min_order_field));
    }
}




include "woocommerce-inc/w-content-product.php";
include "woocommerce-inc/w-single-product.php";