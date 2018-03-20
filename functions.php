<?php

function mm_styles_method()
{

    wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '20180130', 'all' );
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'style' );

    wp_register_style( 'fonts', get_template_directory_uri() . '/fonts.css', array(), '20180130', 'all' );
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'fonts' );


}
add_action( 'wp_enqueue_scripts', 'mm_styles_method' );

function mm_scripts_method() {

    wp_register_script( 'jquery-migrate', get_template_directory_uri().'/js/jquery-migrate-1.2.1.min.js',array('jquery'),'3.0.0',true);
    wp_enqueue_script( 'jquery-migrate' );


    wp_register_script( 'owl.carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array(), '20180130', true);
    wp_enqueue_script( 'owl.carousel' );

//    wp_register_script( 'jquery.raty', get_template_directory_uri().'/js/jquery.raty.js', array(), '20180130', true);
//    wp_enqueue_script( 'jquery.raty' );

    wp_register_script( 'customscript', get_template_directory_uri().'/js/script.js',array('jquery','jquery-migrate','jquery-arcticmodal','owl.carousel','ion.rangeSlider'),'20180130',true);
    wp_enqueue_script( 'customscript' );

}

add_action( 'wp_enqueue_scripts', 'mm_scripts_method', 11 );


function mm_box_load_widget() {

    register_sidebar( array(
        'name' => __( 'Виджеты каталогов'),
        'id' => 'mm-box-shop-sidebar',
        'description' => __( 'Виджеты для каталога.'),
//        'before_widget' => ' <div id="%1$s" class="widgetSidebar %2$s" >',
//        'after_widget' => ' </div> ',
        'before_widget' => '<div class="aside_item_inner">',
        'after_widget' => '</div>',
    ) );

}

add_action( 'widgets_init', 'mm_box_load_widget' );

include 'includes/customizer.php';
include 'includes/usefull-func.php';
include 'includes/woocommerce-hooks-stuff.php';