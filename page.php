<?php get_header(); ?>

    <div id="content" class="content">
        <div class="container">

            <ul class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </ul>



            <?php while (have_posts()) : the_post();
                the_content();
            endwhile; // End of the loop. ?>

        </div>
    </div>

<?php get_footer();
