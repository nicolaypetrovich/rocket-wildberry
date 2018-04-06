<?php get_header(); ?>
    <div id="content">
        <div class="container">
            <section>
                <div class="main_slider">
                    <div class="owl-carousel single">
                        <?php
                        for ($i = 0; $i < 6; $i++):
                            if (!empty(get_theme_mod("wildberry_theme_slider{$i}_link")) ||
                                !empty(get_theme_mod("wildberry_theme_slider{$i}_name")) ||
                                !empty(get_theme_mod("wildberry_theme_slider{$i}_desc")) ||
                                !empty(get_theme_mod("wildberry_theme_slider{$i}_img1")) ||
                                !empty(get_theme_mod("wildberry_theme_slider{$i}_img2"))
                            ): ?>
                                <div class="carousel_item">
                                    <div class="carousel_message">
                                        <div>
                                            <?php if (!empty(get_theme_mod("wildberry_theme_slider{$i}_name"))): ?>
                                                <?php echo get_theme_mod("wildberry_theme_slider{$i}_name"); ?>
                                            <?php endif; ?>
                                        </div>
                                        <span><?php if (!empty(get_theme_mod("wildberry_theme_slider{$i}_desc"))): ?>

                                                <?php echo get_theme_mod("wildberry_theme_slider{$i}_desc"); ?>
                                            <?php endif; ?>
                                        </span>
                                        <div><?php if (!empty(get_theme_mod("wildberry_theme_slider{$i}_link"))): ?>
                                                <a href="<?php echo get_theme_mod("wildberry_theme_slider{$i}_link"); ?>"
                                                   class="red_btn">Подробнее</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty(get_theme_mod("wildberry_theme_slider{$i}_img1"))): ?>
                                        <img src="<?php echo get_theme_mod("wildberry_theme_slider{$i}_img1"); ?>"
                                             alt="" class="visible">
                                    <?php endif; ?>

                                    <?php if (!empty(get_theme_mod("wildberry_theme_slider{$i}_img2"))): ?>
                                        <img src="<?php echo get_theme_mod("wildberry_theme_slider{$i}_img2"); ?>"
                                             alt="" class="hide">

                                    <?php elseif (!empty(get_theme_mod("wildberry_theme_slider{$i}_img1"))): ?>
                                        <img src="<?php echo get_theme_mod("wildberry_theme_slider{$i}_img1"); ?>"
                                             alt="" class="hide">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </section>
            <section>
                <div class="offers_box">
                    <?php for ($i = 0; $i <= 6; $i++):

                        if (!empty(get_theme_mod("wildberry_theme_featured{$i}_link")) ||
                            !empty(get_theme_mod("wildberry_theme_featured{$i}_name")) ||
                            !empty(get_theme_mod("wildberry_theme_featured{$i}_desc")) ||
                            !empty(get_theme_mod("wildberry_theme_featured{$i}_img"))
                        ):
                            ?>

                            <div class="offers_item">
                                <div class="offers_info">
                                    <?php if (!empty(get_theme_mod("wildberry_theme_featured{$i}_name")) &&
                                        !empty(get_theme_mod("wildberry_theme_featured{$i}_link"))): ?>
                                        <a href="<?php echo get_theme_mod("wildberry_theme_featured{$i}_link"); ?>"
                                           class="offers_info_name"><?php echo get_theme_mod("wildberry_theme_featured{$i}_name"); ?></a>
                                    <?php endif; ?>

                                    <?php if (!empty(get_theme_mod("wildberry_theme_featured{$i}_desc"))): ?>
                                        <span><?php echo get_theme_mod("wildberry_theme_featured{$i}_desc"); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty(get_theme_mod("wildberry_theme_featured{$i}_img")) && !empty(get_theme_mod("wildberry_theme_featured{$i}_link"))): ?>
                                    <a href="#" class="offers_item_img">
                                        <img src="<?php echo get_theme_mod("wildberry_theme_featured{$i}_img"); ?>"
                                             alt="">
                                    </a>
                                <?php endif; ?>
                            </div>

                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </section>
            <section>
                <div class="odds_box">
                    <?php for ($i = 0; $i <= 3; $i++): ?>
                        <?php if (!empty(get_theme_mod("wildberry_theme_featured_additional{$i}"))): ?>
                            <div class="odds_item_<?php echo $i ?>"><?php echo get_theme_mod("wildberry_theme_featured_additional{$i}"); ?></div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </section>
            <section>
                <div class="reviwes_box">
                    <h2 class="title1">Отзывы наших клиентов</h2>
                    <?php $number_of_reviews = 5; //How many reviews you want to retrieve
                    $reviews = get_comments(array(
                        'number' => $number_of_reviews,
                        'status' => 'approve',
                        'post_status' => 'publish',
                        'post_type' => 'product'
                    )); ?>
                    <?php
                    if (!empty($reviews)):
                        ?>
                        <div class="owl-carousel">
                            <?php foreach ((array)$reviews as $review): ?>
                                <div class="reviwes_item">
                                    <div class="reviwes_top">
                                        <a href="<?php echo get_permalink($review->comment_post_ID); ?>#reviews"
                                           class="reviwes_product_foto">
                                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($review->comment_post_ID), 'thumbnail')[0]; ?>"
                                                 alt="">
                                        </a>
                                        <span class="author"><?php echo $review->comment_author; ?></span>
                                        <div class="reviwes_product">
                                            О товаре:
                                            <a href="<?php echo get_permalink($review->comment_post_ID); ?>#reviews"
                                               class="reviwes_product_inner"><?php echo wc_get_product($review->comment_post_ID)->name; ?></a>
                                        </div>
                                    </div>
                                    <div class="reviwes_text">
                                        <?php echo substr($review->comment_content,0,120);
                                        echo strlen($review->comment_content)>120?'...':''?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
<?php get_footer();