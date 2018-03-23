<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php the_title(); ?></title>
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
                    <form>
                        <input type="text" placeholder="Поиск по сайту" class="search"
                               onblur="if(this.placeholder=='') this.placeholder='Поиск по сайту'"
                               onfocus="if(this.placeholder =='Поиск по сайту' ) this.placeholder=''">
                        <button class="search_btn"></button>
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
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/cherry.png"
                                        alt=""></span>
                            <a href="#">Ягоды замороженные</a>
                        </li>
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/apple.png" alt=""></span>
                            <a href="#">Фрукты замороженные</a>
                        </li>
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/veg.png"
                                        alt=""></span>
                            <a href="#">Овощи замороженные</a>
                        </li>
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/mix.png"
                                        alt=""></span>
                            <a href="#">Смеси замороженные</a>
                        </li>
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/fries.png" alt=""></span>
                            <a href="#">Картофель фри</a>
                        </li>
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/bakery.png"
                                        alt=""></span>
                            <a href="#">Хлебобулочные изделия</a>
                        </li>
                        <li>
                            <span class="catalog_icon"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/semi.png" alt=""></span>
                            <a href="#">Полуфабрикаты</a>
                        </li>
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
                <a href="cart" class="header_cart">
							<span class="header_cart_count">
								<span class="cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?> </span> <?php echo true_wordform(WC()->cart->get_cart_contents_count(), 'товар', 'товара', 'товаров'); ?>
							</span>
                            <span class="header_cart_sum">
								<span class="cart_sum"><?php echo WC()->cart->get_cart_total(); ?></span>
							</span>
                </a>
            </div>
        </div>
    </div>
</header>


