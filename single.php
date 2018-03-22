<?php get_header(); ?>

	<div id="content" class="content">
		<div class="container">

			<ul class="breadcrumbs">
				<?php woocommerce_breadcrumb(); ?>
			</ul>
            <div class="catalog_box_inner">
                <aside class="">
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
                            <div class="raty staticStar" data-star="3" title="regular"><i data-alt="1" class="star-on-png" title="regular"></i>&nbsp;<i data-alt="2" class="star-on-png" title="regular"></i>&nbsp;<i data-alt="3" class="star-on-png" title="regular"></i>&nbsp;<i data-alt="4" class="star-off-png" title="regular"></i>&nbsp;<i data-alt="5" class="star-off-png" title="regular"></i><input name="score" type="hidden" value="3" readonly=""></div>
                            <span class="aside_product_img">
		  					<img src="images/product1.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Клубника замороженная 0.5 кг</span>
                            <div class="raty staticStar" data-star="2" title="poor"><i data-alt="1" class="star-on-png" title="poor"></i>&nbsp;<i data-alt="2" class="star-on-png" title="poor"></i>&nbsp;<i data-alt="3" class="star-off-png" title="poor"></i>&nbsp;<i data-alt="4" class="star-off-png" title="poor"></i>&nbsp;<i data-alt="5" class="star-off-png" title="poor"></i><input name="score" type="hidden" value="2" readonly=""></div>
                            <span class="aside_product_img">
		  					<img src="images/product2.png" alt="">
		  				</span>
                        </a>
                        <a href="#" class="aside_item">
                            <span class="name_product">Ананас замороженный 0.5 кг</span>
                            <div class="raty staticStar" data-star="5" title="gorgeous"><i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-on-png" title="gorgeous"></i><input name="score" type="hidden" value="5" readonly=""></div>
                            <span class="aside_product_img">
		  					<img src="images/product3.png" alt="">
		  				</span>
                        </a>
                    </div>
                </aside>
                <div class="catalog_box">
                    <div class="recipies_box_title">
                        <h1 class="title2 pecipe_name">Клубничный торт</h1>
                        <div class="recipe_time">
                            <time datetime="2012-02-23">07.02.2018</time>
                        </div>
                    </div>
                    <div class="recipes_box">
	                    <?php while (have_posts()) : the_post();
		                    the_content();
	                    endwhile; // End of the loop. ?>
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
                                <li>1. Разогрейте духовку до 180 С. Смажьте маслом и посыпьте мукой три круглых формы для выпечки (для 3 коржей). Или выпекайте коржи по очереди. В этом случае тесто держите в холодильнике.</li>
                                <li>2. В большой миске взбейте сахар, пакетик желе и сливочное масло до пышности. Добавьте яйца по одному, тщательно взбивая после каждого добавления. Вмешайте муку и разрыхлитель и добавляйте в тесто, взбивая, поочередно с молоком.</li>
                            </ul>
                        </div>
                        <div class="ingredients_use">
                            <h4 class="title5">Используемые товары</h4>
                            <div class="ingredients">
                                <div class="product_item new">
                                    <a href="#" class="product_img">
                                        <img src="images/product1.png" alt="">
                                    </a>
                                    <div class="product_reviews_box">
                                        <div class="raty staticStar" data-star="3" title="regular"><i data-alt="1" class="star-on-png" title="regular"></i>&nbsp;<i data-alt="2" class="star-on-png" title="regular"></i>&nbsp;<i data-alt="3" class="star-on-png" title="regular"></i>&nbsp;<i data-alt="4" class="star-off-png" title="regular"></i>&nbsp;<i data-alt="5" class="star-off-png" title="regular"></i><input name="score" type="hidden" value="3" readonly=""></div>
                                        <div class="product_reviews">
                                            <span>70</span>
                                            <a href="#" class="reviews_lk">Отзывов</a>
                                        </div>
                                    </div>
                                    <a href="#" class="product_name">Клубника замороженная</a>
                                    <div class="product_packing">0,5 кг</div>
                                    <div class="product_price">50<span>грн.</span></div>
                                    <div class="product_cart">
                                        <button class="red_btn">В корзину</button>
                                        <button class="product_call_btn"></button>
                                    </div>
                                </div>
                                <div class="product_item">
                                    <a href="#" class="product_img">
                                        <img src="images/product2.png" alt="">
                                    </a>
                                    <div class="product_reviews_box">
                                        <div class="raty staticStar" data-star="5" title="gorgeous"><i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-on-png" title="gorgeous"></i><input name="score" type="hidden" value="5" readonly=""></div>
                                        <div class="product_reviews">
                                            <span>47</span>
                                            <a href="#" class="reviews_lk">Отзывов</a>
                                        </div>
                                    </div>
                                    <a href="#" class="product_name">Ежевика замороженная</a>
                                    <div class="product_packing">0,5 кг</div>
                                    <div class="product_price">65<span>грн.</span></div>
                                    <div class="product_cart">
                                        <button class="red_btn">В корзину</button>
                                        <button class="product_call_btn"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


		</div>
	</div>

<?php get_footer();
