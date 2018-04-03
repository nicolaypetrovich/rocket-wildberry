<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );

	return;
}

?>

<form name="checkout" method="post" class="formSend checkout woocommerce-checkout"
      action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>


        <div class="delivery_box">
			<?php do_action( 'woocommerce_checkout_billing' ); ?>
        </div>

        <div class="payment_box_inner">
            <h3 class="title3">Способ оплаты:</h3>
            <div class="payment_box_wildberry">
                <div class="payment_item_1 active">
                    <div class="payment_radio_item">
                        <input name="wild_payment_method" id="cash" class="input_radio" type="radio" value="cash"
                               autocomplete="off" checked>
                        <label for="cash" class="label_radio"></label>
                    </div>
                    Наличными
                </div>
                <div class="payment_item_2">
                    <div class="payment_radio_item">
                        <input name="wild_payment_method" id="cart" class="input_radio" type="radio" value="credit"
                               autocomplete="off">
                        <label for="cart" class="label_radio"></label>
                    </div>
                    Картой
                </div>
                <div class="payment_item_3">
                    <div class="payment_radio_item">
                        <input name="wild_payment_method" id="company" class="input_radio" type="radio" value="company"
                               autocomplete="off">
                        <label for="company" class="label_radio"></label>
                    </div>
                    Юр.лицам
                </div>
            </div>
        </div>
        <div class="call_info">
            <div class="payment_company_box">

                <div class="form_item">
                    <label class="payment_company_label">Название компании:</label>
                    <div class="form_item_type">
                        <span class="payment_company_message">Пожалуйста, заполните реквизиты (необязательно). Затем, в течение ближайшего времени Вам перезвонит менеджер для подтверждения заказа и пришлет счет на оплату в банке</span>

                        <input class="form_item_input" name="wild_company_name"
                               placeholder="Введите название, ЕГРПОУ, адрес или ОКПО"
                               onblur="if(this.placeholder=='') this.placeholder='Введите название, ЕГРПОУ, адрес или ОКПО'"
                               onfocus="if(this.placeholder =='Введите название, ЕГРПОУ, адрес или ОКПО' ) this.placeholder=''"
                               type="email">

                        <span class="bags">поле обязательное для заполнения</span>
                        <span class="payment_company_text">Введите название компании или загрузите файл с реквизитами</span>
                        <label for="wild_file" class="label_file">
                            <span class="file_btn">Прикрепить файл</span>
                            <span class="file_text"></span>
                            <input class="input-text" name="security" id="security" autocomplete="off"
                                   type="hidden" value="<?php echo $temp = wp_create_nonce( 'ajax_file_nonce' ); ?>">
                            <input name="somefileuploader" id="wild_file" type="file" autocomplete="off">
							<?php woocommerce_form_field( 'wild_file_url', array(
								'type'     => 'text',
								'class'    => array(
									'invisible'
								),
								'required' => false,
							) ); ?>
                            <span class="bags">файл слишком большой</span>
                        </label>

                    </div>
                </div>
            </div>
            <div class="delivery_data">
                <div class="form_item">
                    <label>В какое время вам лучше позвонить?</label>
                    <div class="form_item_type">
                        <input class="form_item_input" name="time_for_call" placeholder="c 9:00 до 18:00"
                               onblur="if(this.placeholder=='') this.placeholder='c 9:00 до 18:00'"
                               onfocus="if(this.placeholder =='c 9:00 до 18:00' ) this.placeholder=''" type="text">
                    </div>

                </div>
            </div>
            <div class="form-row place-order">
                <noscript>
					<?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
                    <br/>
                    <button type="submit" class="button alt purple_btn sendBtn"
                            name="woocommerce_checkout_update_totals"
                            value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
                </noscript>

				<?php wc_get_template( 'checkout/terms.php' ); ?>

				<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

				<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt purple_btn sendBtn" name="woocommerce_checkout_place_order" id="place_order" value="' . 'Оформить заказ' . '" data-value="' . 'Оформить заказ' . '">' . 'Оформить заказ' . '</button>' ); // @codingStandardsIgnoreLine ?>

				<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

				<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
            </div>
			<?php do_action( 'woocommerce_checkout_shipping' ); ?>
        </div>


		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

    <div style="display: none" id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
    </div>


	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
