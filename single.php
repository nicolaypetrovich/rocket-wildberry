<?php get_header(); ?>

    <div id="content" class="content">
        <div class="container">

            <div class="breadcrumbs">
				<?php woocommerce_breadcrumb(); ?>
            </div>
            <div class="catalog_box_inner">
				<?php
				echo '<aside>';
				if ( is_active_sidebar( 'mm-box-shop-sidebar' ) ) {
					dynamic_sidebar( 'mm-box-shop-sidebar' );
				}
				echo '</aside>';
				?>
                <div class="catalog_box">
                    <div class="recipies_box_title">
                        <h1 class="title2 pecipe_name"><?php the_title(); ?></h1>
                        <div class="recipe_time">
                            <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                        </div>
                    </div>
                    <div class="recipes_box">
						<?php while ( have_posts() ) : the_post();
							the_content();
						endwhile; // End of the loop.

						?>
                    </div>
					<?php

					$recipe_products = get_field( 'wild_connection' );
					if ( ! empty( $recipe_products ) ):?>
                        <div class="ingredients_use">
                            <h4 class="title5">Используемые товары</h4>
                            <div class="ingredients">
								<?php
								foreach ( $recipe_products as $recipe_product ) {
									$product = wc_get_product( $recipe_product );
									wc_get_template_part( 'content', 'product' );
								}
								?>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>


    </div>
    </div>

<?php get_footer();
