<?php get_header(); ?>

    <div id="content" class="content">
        <div class="container">

            <ul class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </ul>
            <div class="catalog_box_inner">
                <?php
                echo '<aside>';
                if (is_active_sidebar('mm-box-shop-sidebar')) {
                    dynamic_sidebar('mm-box-shop-sidebar');
                }
                echo '</aside>';

                ?>
                <div class="catalog_box">
                    <div class="recipies_box_title">
                        <h1 class="title2 pecipe_name"><?php the_title();?></h1>
                    </div>
                    <?php while (have_posts()) : the_post();

                        echo '<div class="recipes_box">';
                        the_content();
                        echo '</div>';
                    endwhile; // End of the loop.

                    ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer();
