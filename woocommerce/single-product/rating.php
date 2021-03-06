<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();


//TODO:what is wrong with rating?
//if ( $rating_count > 0 ) : ?>

<div class="raty staticStar" data-star="<?php echo $average;?>"></div>
<div class="product_reviews">
<!--	<div class="woocommerce-product-rating">-->
    <span class="reviews_count"><?php echo $review_count;?> </span>
		<?php //echo wc_get_rating_html( $average, $rating_count ); ?>
		<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link reviews_lk" rel="nofollow"><?php echo true_wordform($review_count,'Отзыв','Отзыва','Отзывов');?></a><?php endif ?>
<!--	</div>-->
</div>
<?php //endif; ?>
</div> <!--end of .product_data_vew-->
