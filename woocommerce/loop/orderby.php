<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="catalog_sort">
    <span class="sort_title">Отобразить:</span>
    <form class="woocommerce-ordering" method="get">
        <?php foreach ($catalog_orderby_options as $id => $name) : ?>
            <?php if ($id != 'menu_order'): ?>
                <a class="sort_item" href="?orderby=<?php echo esc_attr($id); ?>"><?php echo esc_html($name); ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php wc_query_string_form_fields(null, array('orderby', 'submit')); ?>
    </form>
</div>