<?php get_header(); ?>

    <div id="content" class="content">
        <div class="container">

            <ul class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </ul>
            <div class="catalog_box_inner">
                <?php
                echo '<aside>';
                if ( is_active_sidebar( 'mm-box-shop-sidebar' ) ) {
                    dynamic_sidebar( 'mm-box-shop-sidebar' );
                }
                echo '</aside>';

                ?>
                <div class="catalog_box">
                    <?php while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; // End of the loop.

                    ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer();
