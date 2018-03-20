<?php
add_action('woocommerce_before_shop_loop_item_title','mm_loop_product_review_box',15);

function mm_loop_product_review_box(){
    global $product;
    ?>
    <div class="product_reviews_box">
        <div class="raty staticStar" data-star="5"></div>
        <div class="product_reviews">
            <span><?php echo $product->get_review_count();?></span>
            <a href="#" class="reviews_lk">Отзывов</a>
        </div>
    </div>
    <?php
}

remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

add_action('woocommerce_shop_loop_item_title','mm_loop_product_title',10);
add_action('woocommerce_shop_loop_item_title','mm_loop_product_weight',15);

function mm_loop_product_title(){
        echo '<h2 class="woocommerce-loop-product__title product_name">' . get_the_title() . '</h2>';

}

function mm_loop_product_weight(){
    echo '<div class="product_packing">0,5 кг</div>';
}

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);