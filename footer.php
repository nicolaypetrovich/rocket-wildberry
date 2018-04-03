<footer class="footer">
    <div class="container">
        <div class="footer_top">
            <div class="footer_item">

				<?php
				//		wp_nav_menu(
				//		array( 'theme_location' => 'header-menu', 'items_wrap' => '%3$s' )
				//		);
				if ( is_active_sidebar( 'mm-box-footer1' ) ) {
					dynamic_sidebar( 'mm-box-footer1' );
				} ?>

            </div>
			<?php
			if ( is_active_sidebar( 'mm-box-footer2' ) ) {
				dynamic_sidebar( 'mm-box-footer2' );
			} ?>
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
			<?php
			if ( is_active_sidebar( 'mm-box-subscribe-box' ) ) {
				dynamic_sidebar( 'mm-box-subscribe-box' );
			} ?>
            <!--            <div class="subscription_box">-->
            <!--                <span class="footer_title">Узнавайте о скидках и акциях первыми:</span>-->
            <!--                <div class="subscription_form">-->
            <!--                    <form>-->
            <!--                        <input type="email" placeholder="Введите email"-->
            <!--                               onblur="if(this.placeholder=='') this.placeholder='Введите email'"-->
            <!--                               onfocus="if(this.placeholder =='Введите email' ) this.placeholder=''" name="email">-->
            <!--                        <button type="submit" class="purple_btn">Подписаться</button>-->
            <!--                    </form>-->
            <!--                </div>-->
            <!--            </div>-->
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
				<?php
				for ( $i = 1; $i <= 4; $i ++ ) {
					if ( get_theme_mod( 'wildberry_theme_popup1_name' . $i ) ) {
						echo '<dt>' . get_theme_mod( 'wildberry_theme_popup1_name' . $i ) . '</dt>';
					}
					if ( get_theme_mod( 'wildberry_theme_popup1_desc' . $i ) ) {
						echo '<dd>' . get_theme_mod( 'wildberry_theme_popup1_desc' . $i ) . '</dd>';
					}
				}
				?>

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
	        <?php
	        for ( $i = 1; $i <= 2; $i ++ ) {
		        if ( get_theme_mod( 'wildberry_theme_popup2_desc' . $i ) ) {
			        echo ' <div class="modal_payment_text">' . get_theme_mod( 'wildberry_theme_popup2_desc' . $i ) . '</div>';
		        }
	        }
	        ?>
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

                </div>
                <div class="modal_order_name">Ананас замороженный</div>
                <div class="modal_order_select">
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

<div class="modal" id="phone_call">
    <div class="modal_content">
        <div class="modal_close"></div>
        <div class="modal_title_box">
            <h3 class="title2">Заказать звонок</h3>
        </div>
        <div class="modal_box">
            <form class="formSend request_call_form">
                <div class="form_item">
                    <label for="name_modal_input" class="modal_input_label" >Имя: </label>
                    <div class="for_item_type">
                        <input class="form_item_input input-text" name="wild_request_phone_name" type="text" id="name_modal_input"
                               placeholder="Александр">
                        <span class="bags">Поле должно быть заполнено.</span>
                    </div>
                    <label for="phone_modal_input" class="modal_input_label"> Номер телефона: </label>
                    <div class="for_item_type">
                        <input class="form_item_input input-text" name="wild_request_phone" type="tel" id="phone_modal_input"
                               placeholder="+38 (096) 504 32 74">
                        <input class="invisible" name="prod_id" type="number" value="0">
                        <span class="bags">Поле должно быть заполнено.</span>
                    </div>
                </div>

                <button id="wild_request_call" class="purple_btn sendBtn" type="submit" >Заказать</button>

                <input class="invisible" name="action" type="text" value="mm_create_phone_request">
                <input class="invisible" name="security" id="security" autocomplete="off"
                       type="hidden" value="<?php echo $temp = wp_create_nonce( 'ajax_phone_nonce' ); ?>">
            </form>

        </div>
    </div>
</div>
<!--TMP END  -->
<?php
wp_footer(); ?>
</body>

</html>
<?php
