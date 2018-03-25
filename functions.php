<?php

function mm_styles_method() {

	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '20180130', 'all' );
	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'style' );

	wp_register_style( 'fonts', get_template_directory_uri() . '/fonts.css', array(), '20180130', 'all' );
	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'fonts' );


}

add_action( 'wp_enqueue_scripts', 'mm_styles_method' );

function mm_scripts_method() {
//    wp_deregister_script('jquery');
//    wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery-3.2.1.js', array(), '20180130', true);
//    wp_enqueue_script( 'jquery' );

	wp_register_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'jquery-migrate' );


	wp_register_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '20180130', true );
	wp_enqueue_script( 'owl.carousel' );

	wp_register_script( 'jquery.raty', get_template_directory_uri() . '/js/jquery.raty.js', array( 'jquery' ), '20180130', true );
	wp_enqueue_script( 'jquery.raty' );

	wp_register_script( 'customscript', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20180130', true );
	wp_enqueue_script( 'customscript' );
}

add_action( 'wp_enqueue_scripts', 'mm_scripts_method', 11 );


function mm_box_load_widget() {

	register_sidebar( array(
		'name'          => __( 'Виджеты каталогов' ),
		'id'            => 'mm-box-shop-sidebar',
		'description'   => __( 'Виджеты для каталога.' ),
//        'before_widget' => ' <div id="%1$s" class="widgetSidebar %2$s" >',
//        'after_widget' => ' </div> ',
		'before_title'  => '<h4 class="title4">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="aside_item_inner">',
		'after_widget'  => '</div>',
	) );

}

add_action( 'widgets_init', 'mm_box_load_widget' );


function searchfilter( $query ) {

	if ( $query->is_search && ! is_admin() ) {
		if ( isset( $_GET['search-type'] ) ) {
			$type = $_GET['search-type'];
			if ( 'normal' == $type ) {
				$query->set( 'post_type', array( 'post', 'product' ) );
			} else {
				$query->set( 'post_type', array( 'post' ) );
			}
		} else {
			$query->set( 'post_type', array( 'post' ) );
		}
	}
	return $query;
}

add_filter( 'pre_get_posts', 'searchfilter' );


include 'includes/mm-customizer.php';
include 'includes/usefull-func.php';

if ( class_exists( 'WooCommerce' ) ) {
	include 'includes/woocommerce-hooks-stuff.php';
	include 'includes/mm-new-widgets.php';

	function wc_active_shipping_register_widget() {
		register_widget( 'WP_Widget_Recent_Posts2' );
	}

	add_action( 'widgets_init', 'wc_active_shipping_register_widget' );
}
