<?php

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

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


add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function mm_show_cart_info(){
    ?>
    <a href="<?php echo wc_get_cart_url(); ?>" class="header_cart">
							<span class="header_cart_count">
								<span class="cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?> </span> <?php echo true_wordform(WC()->cart->get_cart_contents_count(), 'товар', 'товара', 'товаров'); ?>
							</span>
        <span class="header_cart_sum">
								<span class="cart_sum"><?php echo WC()->cart->get_cart_total(); ?></span>
							</span>
    </a>
    <?php
}

function mm_show_info_about_free_shipping()
{
    ?>

    <div class="delivery_free">
        <?php

        //https://businessbloomer.com/woocommerce-add-need-spend-x-get-free-shipping-cart-page/
        // Get Free Shipping Methods for Rest of the World Zone & populate array $min_amounts

        $default_zone = new WC_Shipping_Zone(1); //tutorial shows 0, but 1 is required to get default zone for some reason
        $default_methods = $default_zone->get_shipping_methods();
        foreach ($default_methods as $key => $value) {

            if ($value->id === "free_shipping") {
                if ($value->min_amount > 0) $min_amounts[] = $value->min_amount;
            }
        }
        // Get Free Shipping Methods for all other ZONES & populate array $min_amounts

        $delivery_zones = WC_Shipping_Zones::get_zones();

        foreach ($delivery_zones as $key => $delivery_zone) {
            foreach ($delivery_zone['shipping_methods'] as $key => $value) {
                if ($value->id === "free_shipping") {
                    if ($value->min_amount > 0) $min_amounts[] = $value->min_amount;
                }
            }
        }
        if (is_array($min_amounts))
            $min_amount = min($min_amounts);

        if (WC()->cart->total < $min_amount):?>
            <span>Добавьте товара на<span
                        class="decor"><?php echo $min_amount - WC()->cart->total; ?> грн,</span> чтобы получить бесплатную доставку по Николаеву</span>
        <?php else: ?>
            <span>Вы можете рассчитывать на бесплатную доставку по Николаеву.</span>
        <?php endif; ?>
    </div>
    <?php
}

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

    mm_show_cart_info();
    $fragments['a.header_cart'] = ob_get_clean();

    ob_start();

    mm_show_info_about_free_shipping();
    $fragments['div.delivery_free'] = ob_get_clean();


    return $fragments;
}





include "woocommerce-inc/w-content-product.php";
include "woocommerce-inc/w-single-product.php";