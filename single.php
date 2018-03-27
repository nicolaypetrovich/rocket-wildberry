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

                        <div class="ingredients_use">
                            <h4 class="title5">Используемые товары</h4>
                            <div class="ingredients">
								<?php

								$recipe_products = get_field( 'wild_connection' );
                                if(!empty($recipe_products))
								foreach ( $recipe_products as $recipe_product ) {
									$product = wc_get_product( $recipe_product );
									wc_get_template_part( 'content', 'product' );
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

<?php get_footer();
