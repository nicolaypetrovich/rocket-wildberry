<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <!--    <title>--><?php //the_title(); ?><!--</title>-->
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <?php
    wp_head(); ?>
</head>
<body>
<!--=============modal window overlay===============-->
<div id="menu_overlay"></div>
<!--HEADER START-->
<header>
    <div class="header">
        <div class="container">
            <div class="header_top">
                <div class="logo">
                    <a href="<?php echo get_site_url() ?>"></a>
                </div>
                <div class="header_search">

                    <form role="search" method="get" id="searchformnormal" action="<?php echo home_url('/') ?>">
                        <input type="text" placeholder="Поиск по сайту" class="search"
                               onblur="if(this.placeholder=='') this.placeholder='Поиск по сайту'"
                               onfocus="if(this.placeholder =='Поиск по сайту' ) this.placeholder=''"
                               name="s">
                        <input type="hidden" name="search-type" value="normal"/>
                        <button type="submit" id="searchsubmitnormal" class="search_btn"></button>
                    </form>
                </div>
                <div class="header_phone">
                    <?php if (!empty(get_theme_mod('wildberry_theme_phone'))): ?>
                        <span class="phone_icon"></span>
                        <?php echo get_theme_mod('wildberry_theme_phone'); ?>
                    <?php endif; ?>
                </div>
                <div class="header_call">
                    <button class="red_btn">Заказать звонок</button>
                </div>
                <div class="header_info">
                    <?php if (!empty(get_theme_mod('wildberry_theme_workhours'))): ?>
                        <span> <?php echo get_theme_mod('wildberry_theme_workhours'); ?></span>
                    <?php endif; ?>

                    <?php if (!empty(get_theme_mod('wildberry_theme_city_header'))): ?>
                        <span> <?php echo get_theme_mod('wildberry_theme_city_header'); ?></span>
                    <?php endif; ?>

                </div>
            </div>

            <div class="header_bottom">
                <div class="header_catalog_box">
                    <span class="catalog_btn"></span>
                    <span>Каталог товаров</span>
                    <ul class="header_catalog_list">
                        <?php
                        $args = array(
                            'taxonomy' => "product_cat",
                            'hide_empty' => true,
                        );
                        $product_categories = get_terms($args);
                        foreach ($product_categories as $product_category) {
                            ?>
                            <li>
                                <?php
                                $thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
                                $image = wp_get_attachment_url($thumbnail_id); ?>
                                <span class="catalog_icon">
                            <img src="<?php echo $image; ?>"
                                 alt="<?php echo $product_category->name; ?>">
                                </span>
                                <a href="<?php echo get_term_link( $product_category->slug, 'product_cat' ); ?>"><?php echo $product_category->name; ?></a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
                <div class="header_nav">
                    <nav>
                        <ul class="menu">
                            <li class="menu_item_1"><a href="">Главная</a></li>
                            <li class="menu_item_2"><a href="">Рецепты</a></li>
                            <li class="menu_item_3"><a href="">Оплата и доставка</a></li>
                            <li class="menu_item_4"><a href="">Контакты</a></li>
                            <li class="menu_item_5"><a href="">Акции</a></li>
                        </ul>
                    </nav>
                </div>
                <?php mm_show_cart_info();?>

            </div>
        </div>
    </div>
</header>


