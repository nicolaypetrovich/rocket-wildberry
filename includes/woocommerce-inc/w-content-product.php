<?php
add_action( 'woocommerce_before_shop_loop_item_title', 'mm_loop_product_review_box', 15 );

function mm_loop_product_review_box() {
	global $product;
	?>
    <div class="product_reviews_box">
		<?php if ( ! empty( $product->get_average_rating() ) ): ?>
            <div class="raty staticStar" data-star="<?php echo $product->get_average_rating(); ?>"></div>
		<?php endif; ?>
        <div class="product_reviews">
            <span><?php echo $product->get_review_count(); ?></span>
            <a href="<?php echo $product->get_permalink(); ?>#reviews"
               class="reviews_lk"><?php echo true_wordform( $product->get_review_count(), 'Отзыв', 'Отзыва', 'Отзывов' ); ?></a>
        </div>
    </div>
	<?php
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'mm_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'mm_loop_product_weight', 15 );

function mm_loop_product_title() {
	echo '<h2 class="woocommerce-loop-product__title product_name">' . get_the_title() . '</h2>';

}

function mm_loop_product_weight() {

	global $product;
	if ( ! empty( get_post_meta( $product->get_id(), '_mm_min_order_field', true ) ) ) {
		echo '<div class="product_packing">' . get_post_meta( $product->get_id(), '_mm_min_order_field', true ) . '</div>';
	}

}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
