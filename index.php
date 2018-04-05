<?php get_header(); ?>

    <div id="content">
        <div class="container">

            <ul class="breadcrumbs">
                <?php woocommerce_breadcrumb(); ?>
            </ul>
            <div class="catalog_box_inner">
                <aside>
                    <?php
                    if (is_active_sidebar('mm-box-shop-sidebar')) {
                        dynamic_sidebar('mm-box-shop-sidebar');
                    }
                    ?>
                </aside>
                <div class="catalog_box">
                    <div class="recipies_box_title">
                        <h1 class="title2"><?php wp_title(); ?></h1>
                        <div class="recipies_search">
                            <form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
                                <input type="text" placeholder="Поиск рецепта" value="<?php echo get_search_query() ?>"
                                       name="s" id="s" class="search"
                                       onblur="if(this.placeholder=='') this.placeholder='Поиск рецепта'"
                                       onfocus="if(this.placeholder =='Поиск рецепта' ) this.placeholder=''"
                                />
                                <?php if (isset($_GET['search-type']) && 'recipes' == $_GET['search-type']): ?>
                                    <input type="hidden" name="search-type" value="recipes"/>
                                <?php else: ?>
                                    <input type="hidden" name="search-type" value="normal"/>
                                <?php endif; ?>
                                <button type="submit" id="searchsubmit" class="search_btn"></button>
                            </form>
                        </div>
                    </div>

                    <div class="recipies_flex">
                        <?php
                        if (have_posts()):
                            while (have_posts()) : the_post();

                                if ('post' == get_post_type()):

                                    ?>
                                    <div class="recipes_item">
                                        <a href="<?php the_permalink(); ?>" class="product_img">
                                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail')[0]; ?>"
                                                 alt="<?php the_title(); ?>">
                                        </a>
                                        <a href="<?php the_permalink(); ?>"
                                           class="product_name"><?php the_title(); ?></a>
                                        <a href="<?php the_permalink(); ?>" class="purple_btn">Читать</a>
                                        <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>

                                    </div>
                                <?php
                                elseif ('product' == get_post_type()):
                                    $product = wc_get_product(get_the_ID());
                                    wc_get_template_part('content', 'product');
                                endif;


                            endwhile; // End of the loop.
                        else:?>

                               По вашему запросу нет результатов.

                        <?php
                        endif; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php get_footer();
