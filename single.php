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

					$recipe_products = get_field('wild_connection');
					foreach ($recipe_products as $recipe_product){
						$product=wc_get_product( $recipe_product );
						wc_get_template_part('content', 'product');
					}
					?>
                    <div class="recipies_box_title">
                        <h1 class="title2 pecipe_name">Клубничный торт</h1>
                        <div class="recipe_time">
                            <time datetime="2012-02-23"><?php the_date() ?></time>
                        </div>
                    </div>
                    <div class="recipes_box">

                        <h4 class="title5">Тесто</h4>
                        <div class="recipe_ingredients">
                            <p>2 3/4 стакана муки высшего сорта</p>
                            <p>2 1/2 ч.л. разрыхлителя</p>
                            <p>2 стакана сахара</p>
                            <p>1 пакетик (75 г) порошка для клубничного желе</p>
                            <p>0.5 стакана клубники, размятой в пюре</p>
                        </div>
                        <h4 class="title5">Начинка</h4>
                        <div class="recipe_ingredients">
                            <p>1.5 стакана (350 мл) сливок для взбивания (30% и выше)</p>
                            <p>2 ст.л. сахара</p>
                            <p>1.5 стакана свежей клубники, нарезанной ломтиками</p>
                        </div>
                        <div class="recipe_ingredients_img">
                            <img src="images/recipe.jpg" alt="">
                        </div>
                        <h4 class="title5">Способ приготовления</h4>
                        <div class="recipe_ingredients">
                            <p></p>
                            <ul>
                                <li>1. Разогрейте духовку до 180 С. Смажьте маслом и посыпьте мукой три круглых формы
                                    для выпечки (для 3 коржей). Или выпекайте коржи по очереди. В этом случае тесто
                                    держите в холодильнике.
                                </li>
                                <li>2. В большой миске взбейте сахар, пакетик желе и сливочное масло до пышности.
                                    Добавьте яйца по одному, тщательно взбивая после каждого добавления. Вмешайте муку и
                                    разрыхлитель и добавляйте в тесто, взбивая, поочередно с молоком.
                                </li>
                            </ul>
                        </div>
                        <div class="ingredients_use">
                            <h4 class="title5">Используемые товары</h4>
                            <div class="ingredients">
								<?php
								$recipe_products = get_field( 'wild_connection' );
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
