

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
                    <a href="mailto:tatartaf@gmail.com" class="footer_email_lk">tatartaf@gmail.com</a>
                    <dl class="footer_list">
                        <div class="footer_list_item">
                            <dt>Николаев</dt>
                            <dd>+38 (096) 504 32 74</dd>
                        </div>
                        <div class="footer_list_item">
                            <dt>Одесса</dt>
                            <dd>+38 (096) 504 32 74</dd>
                        </div>
                        <div class="footer_list_item">
                            <dt>Херсон</dt>
                            <dd>+38 (096) 504 32 74</dd>
                        </div>
                    </dl>
                    <div class="footer_info">Пн-Пт 9:00 - 18:00</div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="subscription_box">
                    <span class="footer_title">Узнавайте о скидках и акциях первыми:</span>
                    <div class="subscription_form">
                        <form>
                            <input type="email" placeholder="Введите email" onblur="if(this.placeholder=='') this.placeholder='Введите email'" onfocus="if(this.placeholder =='Введите email' ) this.placeholder=''" name="email">
                            <button type="submit" class="purple_btn">Подписаться</button>
                        </form>
                    </div>
                </div>
                <div class="share_box">
                    <span class="footer_title">Мы в соцсетях:</span>
                    <div class="share_box_inner">
                        <a href="https://<?php echo get_theme_mod('wildberry_theme_instagram'); ?>" class="instag"></a>
                        <a href="https://<?php echo get_theme_mod('wildberry_theme_facebook'); ?>" class="facebook"></a>
                        <a href="https://<?php echo get_theme_mod('wildberry_theme_vk'); ?>" class="vk"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--FOOTER END-->
    <!--modal popup  -->

    <!--TMP END  -->
    <?php
    wp_footer();?>
    </body>

    </html>
<?php