<?php
remove_action('woocommerce_before_single_product', 'wc_print_notices', 10);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_show_product_images', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_action('woocommerce_single_product_summary', 'mm_additional_sp_data', 20);

function mm_additional_sp_data()
{
    global $product;
    echo '<div class="product_data">';
    ?>
    <dl class="product_data_info">
        <div>
            <dt>Производитель:</dt>
            <dd>Украина</dd>
        </div>
        <div>
            <dt>Состав:</dt>
            <dd>Абрикос</dd>
        </div>
        <div>
            <dt>Минимальный заказ:</dt>
            <dd>0,5кг</dd>
        </div>
    </dl>
    <?php

}


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
//add_action('woocommerce_single_product_summary','woocommerce_template_single_price',25);

add_action('woocommerce_before_add_to_cart_quantity', 'mm_sp_before_quantity');
add_action('woocommerce_after_add_to_cart_quantity', 'mm_sp_after_quantity');

function mm_sp_before_quantity()
{
    echo '<div class="product_data_count">';
    echo '<div>Количество:</div>';
}

function mm_sp_after_quantity()
{
    echo '</div>';
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{
    $tabs['test_tab'] = array(
        'title' => __('Рецепты', 'woocommerce'),
        'priority' => 10,
        'callback' => 'woo_new_product_tab_content'
    );
    unset($tabs['additional_information']);    // Remove the additional information tab

    return $tabs;
}

function woo_new_product_tab_content()
{

    // The new tab content

    echo '<div class="recipes_item">
                                <a href="#" class="product_img">
                                    <img src="images/product3.png" alt="">
                                </a>
                                <a href="#" class="product_name">Клубничный торт</a>
                                <a href="#" class="purple_btn">Читать</a>
                                <time datetime="2018-02-23">07.02.2018</time>
         </div>';


}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


remove_action('woocommerce_review_before_comment_meta','woocommerce_review_display_rating',10);



remove_action('woocommerce_review_comment_text','woocommerce_review_display_comment_text',10);
add_action('woocommerce_review_comment_text','mm_review_display_comment_text',10);

function mm_review_display_comment_text(){
    echo '<div class="reviews_message">';
    comment_text();
    echo '</div>';

}
