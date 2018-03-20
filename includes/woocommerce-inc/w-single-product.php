<?php
remove_action('woocommerce_before_single_product','wc_print_notices',10);

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
add_action('woocommerce_before_single_product_summary','woocommerce_template_single_title',5);

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
add_action('woocommerce_single_product_summary','woocommerce_show_product_images',5);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);

