<?php


remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'mm_template_loop_product_link_open', 10 );

//little hack for single product template to work properly on recipe page
function mm_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink( $product->get_id() ), $product );

	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_images', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'mm_additional_sp_data', 20 );

function mm_additional_sp_data() {

	echo '<div class="product_data">';
	?>
    <dl class="product_data_info">
		<?php if ( ! empty( get_post_meta( get_the_ID(), '_mm_manufacturer_field', true ) ) ): ?>
            <div>
                <dt>Производитель:</dt>
                <dd><?php echo get_post_meta( get_the_ID(), '_mm_manufacturer_field', true ); ?></dd>
            </div>
		<?php endif; ?>

		<?php if ( ! empty( get_post_meta( get_the_ID(), '_mm_composition_field', true ) ) ): ?>
            <div>
                <dt>Состав:</dt>
                <dd><?php echo get_post_meta( get_the_ID(), '_mm_composition_field', true ); ?></dd>
            </div>
		<?php endif; ?>
		<?php if ( ! empty( get_post_meta( get_the_ID(), '_mm_min_order_field', true ) ) ): ?>
            <div>
                <dt>Минимальный заказ:</dt>
                <dd><?php echo get_post_meta( get_the_ID(), '_mm_min_order_field', true ); ?></dd>
            </div>
		<?php endif; ?>
    </dl>
	<?php

}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
//add_action('woocommerce_single_product_summary','woocommerce_template_single_price',25);

add_action( 'woocommerce_before_add_to_cart_quantity', 'mm_sp_before_quantity' );
add_action( 'woocommerce_after_add_to_cart_quantity', 'mm_sp_after_quantity' );

function mm_sp_before_quantity() {
	echo '<div class="product_data_count">';
	echo '<div>Количество:</div>';
}

function mm_sp_after_quantity() {
	echo '</div>';
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
	$tabs['test_tab'] = array(
		'title'    => __( 'Рецепты', 'woocommerce' ),
		'priority' => 10,
		'callback' => 'woo_new_product_tab_content'
	);
	unset( $tabs['additional_information'] );    // Remove the additional information tab

	return $tabs;
}

function woo_new_product_tab_content() {

	$recipes = get_posts( array(
		'post_type'  => 'post',
		'meta_query' => array(
			array(
				'key'     => 'wild_connection',
				// name of custom field
				'value'   => '"' . get_the_ID() . '"',
				// matches exactly "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	) );

	if ( ! empty( $recipes ) ) {
		foreach ( $recipes as $recipe ):
			?>
            <div class="recipes_item">
                <a href="<?php the_permalink( $recipe->ID ); ?>" class="product_img">
                    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $recipe->ID ), 'single-post-thumbnail' )[0]; ?>"
                         alt="<?php echo $recipe->post_title; ?>">
                </a>
                <a href="<?php the_permalink( $recipe->ID ); ?>"
                   class="product_name"><?php echo $recipe->post_title; ?></a>
                <a href="<?php the_permalink( $recipe->ID ); ?>" class="purple_btn">Читать</a>
                <time datetime="<?php echo get_the_date( '', $recipe->ID ); ?>"><?php echo get_the_date( '', $recipe->ID ); ?></time>

            </div>
		<?php
		endforeach;
	}else{
	    echo '<p>Не существует рецептов с этим товаром.</p>';
    }
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );


remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
add_action( 'woocommerce_review_comment_text', 'mm_review_display_comment_text', 10 );

function mm_review_display_comment_text() {
	echo '<div class="reviews_message">';
	comment_text();
	echo '</div>';

}
