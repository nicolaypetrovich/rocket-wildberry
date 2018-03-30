<?php


add_filter("woocommerce_checkout_fields", "custom_order_fields");

function custom_order_fields($fields) {

	$order = array(
		"billing_phone",
		"billing_email",
		"billing_first_name",
		"billing_address_1",
		"billing_country",
        "billing_company"
	);
	foreach($order as $field)
	{
		$ordered_fields[$field] = $fields["billing"][$field];
	}

	$fields["billing"] = $ordered_fields;



//    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_country']);
    $fields['billing']['billing_country']['class'][]='invisible';
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_city']);
//    unset($fields['shipping']);

//	var_dump($fields);

    $fields['billing']['billing_custom']['priority']=2;
    $fields['billing']['billing_custom']['type']='radio';

    $fields['billing']['billing_phone']['priority']=10;
    $fields['billing']['billing_phone']['class'][]='form_item';
    $fields['billing']['billing_phone']['input_class'][]='form_item_input';

////    $fields['billing']['billing_phone']['label']='some label';
    $fields['billing']['billing_email']['priority']=20;
    $fields['billing']['billing_email']['class'][]='form_item';
    $fields['billing']['billing_email']['input_class'][]='form_item_input';
////    $fields['billing']['billing_email']['label']='some label';
    $fields['billing']['billing_first_name']['priority']=30;
    $fields['billing']['billing_first_name']['class'][]='form_item';
    $fields['billing']['billing_first_name']['input_class'][]='form_item_input';
////    $fields['billing']['billing_first_name']['label']='some label';
    $fields['billing']['billing_address_1']['priority']=40;
    $fields['billing']['billing_address_1']['class'][]='form_item';
    $fields['billing']['billing_address_1']['input_class'][]='form_item_input';
//    $fields['billing']['billing_address_1']['label']='some label';
   $fields['order']['order_comments']['label']='Комментарий:';
   $fields['order']['order_comments']['priority']=50;
   $fields['order']['order_comments']['class'][]='form_item';
//   $fields['order']['order_comments']['input_class'][]='form_item_input';

    $fields['billing']['billing_company']['class'][]='form_item';
    $fields['billing']['billing_company']['input_class'][]='form_item_input';

    return $fields;
}

remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);




add_action('woocommerce_checkout_process', 'wps_select_checkout_field_process');
function wps_select_checkout_field_process() {
    global $woocommerce;
    // Check if set, if its not set add an error.
    if ($_POST['daypart'] == "blank")
        wc_add_notice( '<strong>Please select a day part under Delivery options</strong>', 'error' );
        wc_add_notice( '<strong>'.print_r($_POST,true).'</strong></br>', 'error' );
        wc_add_notice( '<strong>'.print_r($_FILES,true).'</strong></br>', 'error' );
        wc_add_notice( '<strong>'.print_r($_REQUEST,true).'</strong></br>', 'error' );
}
add_action('woocommerce_checkout_update_order_meta', 'wps_select_checkout_field_update_order_meta');
function wps_select_checkout_field_update_order_meta( $order_id ) {
    
    var_dump($_POST);
    wp_die();
//    if ($_POST['daypart']) update_post_meta( $order_id, 'daypart', esc_attr($_POST['daypart']));
}

add_action( 'wp_ajax_mm_upload_file_checkout','mm_upload_file_checkout' );
add_action( 'wp_ajax_nopriv_mm_upload_file_checkout','mm_upload_file_checkout' );
function mm_upload_file_checkout(){
    var_dump($_POST);
    var_dump($_FILES);
    echo "you are here";
//    wp_upload_bits($_FILES['wild_file']['name'], null, $_FILES['wild_file']['tmp_name']);
    $tempfile=wp_upload_bits($_FILES['wild_file']['name'], null, $_FILES['wild_file']['tmp_name']); //so it doesn't show in media library
    if ( FALSE === $tempfile['error'] ) {
        echo 'There is error uploading your file';
    }
wp_die();

    $upload_file = wp_upload_bits($filename, null, file_get_contents($file));
    if (!$upload_file['error']) {
        $wp_filetype = wp_check_filetype($filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_parent' => $parent_post_id,
            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );
        if (!is_wp_error($attachment_id)) {
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
            wp_update_attachment_metadata( $attachment_id,  $attachment_data );
        }
    }
}
