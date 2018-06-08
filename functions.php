<?php
add_theme_support('custom-logo');
function mm_styles_method()
{

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '20180130', 'all');
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style('style');

    wp_register_style('fonts', get_template_directory_uri() . '/fonts.css', array(), '20180130', 'all');
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style('fonts');


}

add_action('wp_enqueue_scripts', 'mm_styles_method');

function mm_scripts_method()
{
//    wp_deregister_script('jquery');
//    wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery-3.2.1.js', array(), '20180130', true);
//    wp_enqueue_script( 'jquery' );

    wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array(), '3.0.0', true);
    wp_enqueue_script('jquery-migrate');
    wp_register_script('jquery-masked', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array('jquery'), '2.0.0', true);
    wp_enqueue_script('jquery-masked');

    wp_register_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '20180130', true);
    wp_enqueue_script('owl.carousel');

    wp_register_script('jquery.raty', get_template_directory_uri() . '/js/jquery.raty.js', array('jquery'), '20180130', true);
    wp_enqueue_script('jquery.raty');

    wp_register_script('customscript', get_template_directory_uri() . '/js/script.js', array('jquery'), '20180130', true);
    wp_enqueue_script('customscript');
    wp_localize_script('customscript', 'mm_ajax_object',
        array('ajax_url' => admin_url('admin-ajax.php')));

}

add_action('wp_enqueue_scripts', 'mm_scripts_method', 11);


function mm_box_load_widget()
{

    register_sidebar(array(
        'name' => __('Виджеты каталогов'),
        'id' => 'mm-box-shop-sidebar',
        'description' => __('Виджеты для каталога.'),
        'before_title' => '<h4 class="title4">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="aside_item_inner">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Виджет для подписки.'),
        'id' => 'mm-box-subscribe-box',
        'description' => __('Секция с виджетом для подписки.'),
        'before_title' => '<span class="footer_title">',
        'after_title' => '</span>',
        'before_widget' => '<div class="subscription_box">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Ссылки в футере1'),
        'id' => 'mm-box-footer1',
        'description' => __('Секция с ссылками в футере слева.'),
        'before_title' => '<h4 class="title2">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="footer_item">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Ссылки в футере2'),
        'id' => 'mm-box-footer2',
        'description' => __('Секция с ссылками в футере слева.'),
        'before_title' => '<h4 class="title2">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="footer_item">',
        'after_widget' => '</div>',
    ));

}

add_action('widgets_init', 'mm_box_load_widget');


function searchfilter($query)
{

    if ($query->is_search && !is_admin()) {
        if (isset($_GET['search-type'])) {
            $type = $_GET['search-type'];
            if ('normal' == $type) {
                $query->set('post_type', array('post', 'product'));
            } else {
                $query->set('post_type', array('post'));
            }
        } else {
            $query->set('post_type', array('post'));
        }
    }

    return $query;
}

add_filter('pre_get_posts', 'searchfilter');


function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');


add_action('init', 'mm_register_custom_post_type');


function mm_register_custom_post_type()
{
    $type = 'phone_requests';


    $arguments = [
        'public' => false,
        'show_ui' => true,
        'can_export' => false,
        'has_archive' => false,
        'exclude_from_search' => true,
        'query_var' => false,
        'publicly_queryable' => false,
        'register_meta_box_cb' => 'mm_calls_metabox',
        'description' => 'Запросы звонков.',
        'menu_icon' => 'dashicons-phone', // Set icon
        'label' => 'Запросы звонков',
        'supports' => array('title'),

    ];
    register_post_type($type, $arguments);
};


function mm_calls_metabox()
{
    add_meta_box('calls_meta', 'Детали запроса', 'mm_calls_metabox_cb');
}

function mm_calls_metabox_cb($post)
{




    if (!empty(get_post_meta($post->ID, 'wild_request_phone_name'))) {
        $name = get_post_meta($post->ID, 'wild_request_phone_name', true);

        echo 'Имя пользователя запросившего запрос: ' . $name;
        echo '</br>';
    }
    if (!empty(get_post_meta($post->ID, 'wild_request_phone'))) {
        $phone = get_post_meta($post->ID, 'wild_request_phone', true);

        echo 'Пользователь запросил звонок по телефону: ' . $phone;
        echo '</br>';
    }

    if (!empty(get_post_meta($post->ID, 'wild_request_phone')) && get_post_meta($post->ID, 'product_for_requested_call', true) != 0) {
        $product_id = get_post_meta($post->ID, 'product_for_requested_call', true);

        $product = wc_get_product($product_id);
        echo 'Пользователь заинтересован в товаре ' . $product->get_name();
        echo '</br>';
        echo '<a href="' . get_permalink($product_id) . '">Ссылка на товар</a>';

    }


}


add_action('wp_ajax_mm_create_phone_request', 'mm_create_phone_request');
add_action('wp_ajax_nopriv_mm_create_phone_request', 'mm_create_phone_request');
function mm_create_phone_request()
{
    check_ajax_referer('ajax_phone_nonce', 'security');
    $count_posts = wp_count_posts('phone_requests');

    $published_posts = $count_posts->publish + 1;

    $new_post_id = wp_insert_post(array('post_type' => 'phone_requests', 'post_status' => 'publish'));
    wp_update_post(array(
        'ID' => $new_post_id,
        'post_type' => 'phone_requests',
        'post_title' => 'Запрос звонка ' . $published_posts
    ));
    //mail paramareters
    $to = get_option('admin_email');
    $subject = 'Новый запрос на звонок '.$new_post_id;
    $body = '';
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    if (isset($_POST['wild_request_phone_name']) && !empty($_POST['wild_request_phone_name'])) {
        update_post_meta($new_post_id, 'wild_request_phone_name', $_POST['wild_request_phone_name']);
        $body.='Имя пользователя запросившего запрос: ' . $_POST['wild_request_phone_name']."\r\n";
    }
    if (isset($_POST['wild_request_phone']) && !empty($_POST['wild_request_phone'])) {
        update_post_meta($new_post_id, 'wild_request_phone', $_POST['wild_request_phone']);
        $body.='Пользователь запросил звонок по телефону: ' . $_POST['wild_request_phone']."\r\n";
    }

    if (isset($_POST['prod_id']) && $_POST['prod_id'] != 0) {

        update_post_meta($new_post_id, 'product_for_requested_call', $_POST['prod_id']);
        $product = wc_get_product( $_POST['prod_id']);
        $body.= 'Пользователь заинтересован в товаре ' . $product->get_name()."\r\n";
        $body.= 'Ссылка на товар: ' . get_permalink($_POST['prod_id']) ."\r\n";

    }

    $body=wordwrap($body, 70, "\r\n");


    wp_mail( $to, $subject, $body, $headers );

    wp_die('Запрос отправлен.');

}


include 'includes/mm-customizer.php';
include 'includes/usefull-func.php';

if (class_exists('WooCommerce')) {
    include 'includes/woocommerce-hooks-stuff.php';
    include 'includes/mm-new-widgets.php';

    function wc_active_shipping_register_widget()
    {
        register_widget('WP_Widget_Recent_Posts2');
        register_widget('es_widget_register2');
    }

    add_action('widgets_init', 'wc_active_shipping_register_widget');
}
