<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
    <div id="content">
        <div class="container">
            <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');
            ?>
            <div class="catalog_box_inner">
                <aside>
                    <div class="aside_item_inner">
                        <h4 class="title4">Свежие рецепты:</h4>
                        <a href="#" class="aside_item">
                            <span class="name_product">Желе из замороженного кокоса</span>
                            <span class="aside_product_img">
		  					<img src="images/product1.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Желе из замороженного ананаса</span>
                            <span class="aside_product_img">
		  					<img src="images/product2.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Желе из замороженного банана</span>
                            <span class="aside_product_img">
		  					<img src="images/product3.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Желе из замороженного манго</span>
                            <span class="aside_product_img">
		  					<img src="images/product2.png" alt="">
		  				</span>
                        </a>
                    </div>
                    <div class="aside_item_inner">
                        <h4 class="title4">Вы смотрели:</h4>
                        <a href="#" class="aside_item">
                            <span class="name_product">Ананас замороженный 0.5 кг</span>
                            <div class="raty staticStar" data-star="3"></div>
                            <span class="aside_product_img">
		  					<img src="images/product1.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Клубника замороженная 0.5 кг</span>
                            <div class="raty staticStar" data-star="2"></div>
                            <span class="aside_product_img">
		  					<img src="images/product2.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Ананас замороженный 0.5 кг</span>
                            <div class="raty staticStar" data-star="5"></div>
                            <span class="aside_product_img">
		  					<img src="images/product3.png" alt="">
		  				</span>
                        </a>
                    </div>
                </aside>
                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'single-product'); ?>

                <?php endwhile; // end of the loop. ?>

                <?php
                /**
                 * woocommerce_after_main_content hook.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action('woocommerce_after_main_content');
                ?>

                <?php
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action('woocommerce_sidebar');
                ?>
            </div>
        </div>
    </div>
<?php get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
