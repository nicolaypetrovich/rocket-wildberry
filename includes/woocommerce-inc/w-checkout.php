<?php


add_filter( "woocommerce_checkout_fields", "custom_order_fields" );

function custom_order_fields( $fields ) {

	$order = array(
		"billing_phone",
		"billing_email",
		"billing_first_name",
		"billing_address_1",
		"billing_country",
		"billing_company"
	);
	foreach ( $order as $field ) {
		$ordered_fields[ $field ] = $fields["billing"][ $field ];
	}

	$fields["billing"] = $ordered_fields;


//    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_country']);
	$fields['billing']['billing_country']['class'][] = 'invisible';
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_city']);
//    unset($fields['shipping']);

//	var_dump($fields);

	$fields['billing']['billing_custom']['priority'] = 2;
	$fields['billing']['billing_custom']['type']     = 'radio';

	$fields['billing']['billing_phone']['priority']      = 10;
	$fields['billing']['billing_phone']['class'][]       = 'form_item';
	$fields['billing']['billing_phone']['input_class'][] = 'form_item_input';
	$fields['billing']['billing_phone']['input_class'][] = 'mask';
	$fields['billing']['billing_phone']['placeholder'] = '+38 (096) 504 32 74';
	$fields['billing']['billing_phone']['autofocus'] =true;

////    $fields['billing']['billing_phone']['label']='some label';
	$fields['billing']['billing_email']['priority']      = 20;
	$fields['billing']['billing_email']['class'][]       = 'form_item';
	$fields['billing']['billing_email']['input_class'][] = 'form_item_input';
	$fields['billing']['billing_email']['placeholder'] = 'tatartaf@gmail.com';
////    $fields['billing']['billing_email']['label']='some label';
	$fields['billing']['billing_first_name']['priority']      = 30;
	$fields['billing']['billing_first_name']['class'][]       = 'form_item';
	$fields['billing']['billing_first_name']['input_class'][] = 'form_item_input';
	$fields['billing']['billing_first_name']['placeholder'] = 'Александр';
	$fields['billing']['billing_first_name']['autofocus'] = false;
////    $fields['billing']['billing_first_name']['label']='some label';
	$fields['billing']['billing_address_1']['priority']      = 40;
	$fields['billing']['billing_address_1']['class'][]       = 'form_item';
	$fields['billing']['billing_address_1']['input_class'][] = 'form_item_input';
	$fields['billing']['billing_address_1']['placeholder'] = 'Пр-кт Героев Украины, 20 В кв.7';

//    $fields['billing']['billing_address_1']['label']='some label';
	$fields['order']['order_comments']['label']    = 'Комментарий:';
	$fields['order']['order_comments']['priority'] = 50;
	$fields['order']['order_comments']['class'][]  = 'form_item';
//   $fields['order']['order_comments']['input_class'][]='form_item_input';

	$fields['billing']['billing_company']['class'][]       = 'form_item';
	$fields['billing']['billing_company']['input_class'][] = 'form_item_input';

	return $fields;
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );


add_action( 'woocommerce_checkout_process', 'wps_select_checkout_field_process' );
function wps_select_checkout_field_process() {
	global $woocommerce;
	// Check if set, if its not set add an error.

//	wc_add_notice( '<strong>' . print_r( $_POST, true ) . '</strong></br>', 'error' );
//	wc_add_notice( '<strong>' . print_r( $_FILES, true ) . '</strong></br>', 'error' );
//	wc_add_notice( '<strong>' . print_r( $_REQUEST, true ) . '</strong></br>', 'error' );
}

add_action( 'woocommerce_checkout_update_order_meta', 'wps_select_checkout_field_update_order_meta' );
function wps_select_checkout_field_update_order_meta( $order_id ) {


	if ( ! empty( $_POST['wild_delivery'] ) ) {
		update_post_meta( $order_id, 'wild_delivery', sanitize_text_field( $_POST['wild_delivery'] ) );
	}
	if ( ! empty( $_POST['wild_file_url'] ) ) {
		update_post_meta( $order_id, 'wild_file_url', sanitize_text_field( $_POST['wild_file_url'] ) );
	}
	if ( ! empty( $_POST['wild_payment_method'] ) ) {
		update_post_meta( $order_id, 'wild_payment_method', sanitize_text_field( $_POST['wild_payment_method'] ) );
	}
	if ( ! empty( $_POST['time_for_call'] ) ) {
		update_post_meta( $order_id, 'time_for_call', sanitize_text_field( $_POST['time_for_call'] ) );
	}
	if ( ! empty( $_POST['wild_company_name'] ) ) {
		update_post_meta( $order_id, 'wild_company_name', sanitize_text_field( $_POST['wild_company_name'] ) );
	}

//    if ($_POST['daypart']) update_post_meta( $order_id, 'daypart', esc_attr($_POST['daypart']));
}

add_action( 'wp_ajax_mm_upload_file_checkout', 'mm_upload_file_checkout' );
add_action( 'wp_ajax_nopriv_mm_upload_file_checkout', 'mm_upload_file_checkout' );
function mm_upload_file_checkout() {
	$uploaded_file    = $_FILES['wild_file'];
	$upload_overrites = array( 'action' => 'submit_new_checkout', 'test_form' => false );

	if ( UPLOAD_ERR_INI_SIZE == $_FILES['wild_file']['error'] ) {
		wp_die( 'Размер файла слишком большой' );
	}
	check_ajax_referer( 'ajax_file_nonce', 'nonce' );
	$movefile = wp_handle_upload( $uploaded_file, $upload_overrites ); //load into uploads folder, doesn't add in mediafiles
	if ( isset( $movefile['error'] ) ) {
		wp_die( $movefile['error'] );
	}

	wp_die( $movefile['url'] );

}


function kia_display_order_data_in_admin( $order ) { ?>
    <div class="order_data_column">
        <h4><?php _e( 'Дополнительная информация:', 'woocommerce' ); ?></h4>
		<?php

		if ( ! empty( $order->get_meta( 'wild_delivery' ) ) ) {
			echo '<p><strong>' . __( 'Выбранная доставка' ) . ':</strong>' . $order->get_meta( 'wild_delivery' ) == 'self' ? 'Самовывоз' : 'Доставка курьером' . '</p>';
		}
		if ( ! empty( $order->get_meta( 'wild_payment_method' ) ) ) {
			echo '<p><strong>' . __( 'Выбранный метод оплаты' ) . ':</strong> ';
			switch ( $order->get_meta( 'wild_payment_method' ) ) {
				case 'cash':
					echo 'Наличными';
					break;
				case 'credit':
					echo 'Картой';
					break;
				case 'company':
					echo 'Юр. Лицо';
					break;
			}
			echo ' </p>';
		}
		if ( ! empty( $order->get_meta( 'wild_file_url' ) ) ) {
			echo '<p><strong>' . __( 'Добавленный файл компании' ) . ':</strong> ' . $order->get_meta( 'wild_file_url' ) . ' </p>';
		}
		if ( ! empty( $order->get_meta( 'wild_company_name' ) ) ) {
			echo '<p><strong>' . __( 'Название компании' ) . ':</strong> ' . $order->get_meta( 'wild_company_name' ) . ' </p>';
		}
		if ( ! empty( $order->get_meta( 'time_for_call' ) ) ) {
			echo '<p><strong>' . __( 'Время звонка' ) . ':</strong> ' . $order->get_meta( 'time_for_call' ) . ' </p>';
		}
		?>

    </div>
<?php }

add_action( 'woocommerce_admin_order_data_after_order_details', 'kia_display_order_data_in_admin' );


