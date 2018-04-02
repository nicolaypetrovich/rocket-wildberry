<?php

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'UAH': $currency_symbol = ' грн'; break;
	}
	return $currency_symbol;
}

add_filter('woocommerce_breadcrumb_defaults', 'mm_box_change_breadcrumb_delimiter');
function mm_box_change_breadcrumb_delimiter($defaults)
{
    // Change the breadcrumb delimeter from '/' to '»'
    $defaults['delimiter'] = ' » ';

    $defaults['wrap_before'] = '<div class="woocommerce-breadcrumb">';
    $defaults['wrap_after'] = '</div>';
    return $defaults;
}

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support()
{
    add_theme_support('woocommerce');
}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);


add_action('pre_get_posts', 'custom_pre_get_posts');

function custom_pre_get_posts($query)
{
    if (is_woocommerce()) {
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
            'id' => '_mm_manufacturer_field',
            'label' => __('Производитель', 'woocommerce'),
            'placeholder' => ''
        )
    );
    woocommerce_wp_text_input(
        array(
            'id' => '_mm_composition_field',
            'label' => __('Состав', 'woocommerce'),
            'placeholder' => ''
        )
    );
    woocommerce_wp_text_input(
        array(
            'id' => '_mm_min_order_field',
            'label' => __('Минимальный заказ', 'woocommerce'),
            'placeholder' => ''
        )
    );

    woocommerce_wp_checkbox(
        array(
            'id' => '_mm_product_new',
            'label' => __('Новый товар', 'woocommerce'),
            'description' => __('Показывает, что товар новый в каталоге.', 'woocommerce')
        )
    );
//    echo '</div>';
}


// Save Additional fields
add_action('woocommerce_process_product_meta', 'mm_box_add_custom_general_fields_save');

function mm_box_add_custom_general_fields_save($post_id)
{
    // Number Field
    $mm_man_field = $_POST['_mm_manufacturer_field'];
    $mm_composition_field = $_POST['_mm_composition_field'];
    $mm_min_order_field = $_POST['_mm_min_order_field'];
    $mm_product_new = $_POST['_mm_product_new'];

    if (!empty($mm_man_field)) {
        update_post_meta($post_id, '_mm_manufacturer_field', esc_attr($mm_man_field));
    }
    if (!empty($mm_composition_field)) {
        update_post_meta($post_id, '_mm_composition_field', esc_attr($mm_composition_field));
    }
    if (!empty($mm_min_order_field)) {
        update_post_meta($post_id, '_mm_min_order_field', esc_attr($mm_min_order_field));
    }
    if (!empty($mm_product_new)) {
        update_post_meta($post_id, '_mm_product_new', esc_attr($mm_product_new));
    }
}


add_action('wp_footer', 'cart_update_qty_script');
function cart_update_qty_script()
{
    if (is_cart()) :
        ?>
        <script>

            jQuery('div.woocommerce').on('click', '.qty', function () {
                jQuery("[name='update_cart']").removeAttr('disabled');
            });
            jQuery('div.woocommerce').on('change', '.qty', function () {
                jQuery("[name='update_cart']").trigger("click");
            });

        </script>
    <?php
    endif;
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );

function custom_woocommerce_get_catalog_ordering_args( $args ) {
	$orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

	if ( 'alphabetical' == $orderby_value ) {
		$args['orderby'] = 'title';
		$args['order'] = 'ASC';
	}

	return $args;
}

add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {

    unset($sortby['popularity']);
    unset($sortby['rating']);
    unset($sortby['price-desc']);
	$sortby['date'] = 'По умолчанию';
	$sortby['price'] = 'По цене';
	$sortby['alphabetical'] = 'По названию';
	return $sortby;
}





include "woocommerce-inc/w-content-product.php";
include "woocommerce-inc/w-single-product.php";
include "woocommerce-inc/w-cart.php";
include "woocommerce-inc/w-checkout.php";