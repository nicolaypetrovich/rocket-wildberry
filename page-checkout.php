<?php get_header(); ?>

    <div id="content" class="content">
        <div class="container">

            <ul class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </ul>

            <?php while ( have_posts() ) : the_post();
            if( WC()->cart->get_cart_contents_count() !== 0 )
                the_content();
            else{
	            define( 'WOOCOMMERCE_CHECKOUT', true );
	            echo do_shortcode('[woocommerce_checkout]');

            }
            endwhile; // End of the loop.

            ?>

        </div>
    </div>

<?php get_footer();
