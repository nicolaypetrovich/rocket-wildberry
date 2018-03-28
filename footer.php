<footer class="footer">
    <div class="container">
        <div class="footer_top">
            <div class="footer_item">
                <h4 class="title2">О магазине</h4>
                <ul class="footer_list">
                    <li><a href="">Главная</a></li>
                    <li><a href="">Рецепты</a></li>
                    <li><a href="">Оплата и доставка</a></li>
                    <li><a href="">Контакты</a></li>
                    <li><a href="">Акции</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h4 class="title2">Каталог</h4>
                <ul class="footer_list">
                    <li><a href="#">Ягоды замороженные</a></li>
                    <li><a href="#">Фрукты замороженные</a></li>
                    <li><a href="#">Овощи замороженные</a></li>
                    <li><a href="#">Смеси замороженные</a></li>
                    <li><a href="#">Картофель фри</a></li>
                    <li><a href="#">Хлебобулочные изделия</a></li>
                    <li><a href="#">Полуфабрикаты</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h4 class="title2">Контакты</h4>
				<?php if ( ! empty( get_theme_mod( 'wildberry_theme_email_footer' ) ) ): ?>
                    <a href="mailto: <?php echo get_theme_mod( 'wildberry_theme_email_footer' ); ?>"
                       class="footer_email_lk"> <?php echo get_theme_mod( 'wildberry_theme_email_footer' ); ?></a>
				<?php endif; ?>

                <dl class="footer_list">
                    <div class="footer_list_item">
						<?php if ( ! empty( get_theme_mod( 'wildberry_theme_city1_footer' ) ) ): ?>
                            <dt><?php echo get_theme_mod( 'wildberry_theme_city1_footer' ); ?></dt>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'wildberry_theme_city1_footer_phone' ) ) ): ?>
                            <dd><?php echo get_theme_mod( 'wildberry_theme_city1_footer_phone' ); ?></dd>
						<?php endif; ?>
                    </div>
                    <div class="footer_list_item">
						<?php if ( ! empty( get_theme_mod( 'wildberry_theme_city2_footer' ) ) ): ?>
                            <dt><?php echo get_theme_mod( 'wildberry_theme_city2_footer' ); ?></dt>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'wildberry_theme_city2_footer_phone' ) ) ): ?>
                            <dd><?php echo get_theme_mod( 'wildberry_theme_city2_footer_phone' ); ?></dd>
						<?php endif; ?>
                    </div>
                    <div class="footer_list_item">
						<?php if ( ! empty( get_theme_mod( 'wildberry_theme_city3_footer' ) ) ): ?>
                            <dt><?php echo get_theme_mod( 'wildberry_theme_city3_footer' ); ?></dt>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'wildberry_theme_city3_footer_phone' ) ) ): ?>
                            <dd><?php echo get_theme_mod( 'wildberry_theme_city3_footer_phone' ); ?></dd>
						<?php endif; ?>
                    </div>
                </dl>
				<?php if ( ! empty( get_theme_mod( 'wildberry_theme_workhours' ) ) ): ?>
                    <div class="footer_info"> <?php echo get_theme_mod( 'wildberry_theme_workhours' ); ?></div>
				<?php endif; ?>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="subscription_box">
                <span class="footer_title">Узнавайте о скидках и акциях первыми:</span>
                <div class="subscription_form">
                    <form>
                        <input type="email" placeholder="Введите email"
                               onblur="if(this.placeholder=='') this.placeholder='Введите email'"
                               onfocus="if(this.placeholder =='Введите email' ) this.placeholder=''" name="email">
                        <button type="submit" class="purple_btn">Подписаться</button>
                    </form>
                </div>
            </div>
            <div class="share_box">
                <span class="footer_title">Мы в соцсетях:</span>
                <div class="share_box_inner">
                    <a href="https://<?php echo get_theme_mod( 'wildberry_theme_instagram' ); ?>" class="instag"></a>
                    <a href="https://<?php echo get_theme_mod( 'wildberry_theme_facebook' ); ?>" class="facebook"></a>
                    <a href="https://<?php echo get_theme_mod( 'wildberry_theme_vk' ); ?>" class="vk"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER END-->
<!--modal popup  -->
<!--modal popup  -->
<div class="modal" id="delivery">
    <div class="modal_content">
        <div class="modal_close"></div>
        <div class="modal_title_box">
            <h3 class="title2">Способы доставки</h3>
        </div>
        <div class="modal_box">
            <dl class="modal_delivery_list">
                <dt>-Доставка курьером в квартиру (40 грн)</dt>
                <dd>(график доставки: ПН-ПТ с 10-00 до 16-00)</dd>
                <dt>-Доставка по субботам (40 грн)</dt>
                <dd>(график работы: с 10-00 до 16-00)</dd>
                <dt>-Доставка после 17-00 (40 грн)</dt>
                <dd>(согласовывается в телефонном режиме)</dd>
                <dt>-Самовывоз в точке выдачи</dt>
                <dd>(график работы: ПН-ВС с 8-00 до 20-00. Без выходных.)</dd>
            </dl>

        </div>
    </div>
</div>
<div class="modal" id="payment">
    <div class="modal_content">
        <div class="modal_close"></div>
        <div class="modal_title_box">
            <h3 class="title2">Способы оплаты</h3>
        </div>
        <div class="modal_box">
            <div class="modal_payment_text">-Наличными при получении</div>
            <div class="modal_payment_text">-На карту Приватбанка</div>
        </div>
    </div>
</div>

<div class="modal" id="order">
    <div class="modal_content">
        <div class="modal_close"></div>
        <div class="modal_title_box">
            <h3 class="title2">Добавлено в корзину</h3>
        </div>
        <div class="modal_box_type">
            <div class="modal_box_top">
                <div class="modal_order_img">
                    <img src="images/product_big1.png" alt="">
                </div>
                <div class="modal_order_name">Ананас замороженный</div>
                <div class="modal_order_select">
                    <div class="custom_select main_select">
                        <div class="active_option open_select undefined">0,5 кг</div>
                        <ul class="options dropdown">
                            <li><a href="#" data-value="0,5 кг">0,5 кг</a></li>
                            <li><a href="#" data-value="1 кг">1 кг</a></li>
                            <li><a href="#" data-value="1,5 кг">1,5 кг</a></li>
                        </ul>
                        <select style="display: none;">
                            <option>0,5 кг</option>
                            <option>1 кг</option>
                            <option>1,5 кг</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal_box_bottom">
                <div class="modal_order_price">70 <span>грн.</span></div>
                <div class="al_center">
                    <a href="<?php echo wc_get_cart_url(); ?>" class="purple_btn modal_order_lk">Оформить заказ</a>
                    <a href="#" class="modal_more_lk">Продолжить покупки</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--TMP END  -->
<?php
wp_footer(); ?>
</body>

</html>
<?php
