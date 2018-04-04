<?php
/**
 * Widget API: WP_Widget_Recent_Posts2 class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Recent_Posts2 extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_entries',
			'description' => __( 'Последние рецепты опубликованные на сайте' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recent-posts2', __( 'Свежие рецепты' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		), $instance ) );

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$post_title = get_the_title( $recent_post->ID );
				$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
				?>
				<li>
					<a href="<?php the_permalink( $recent_post->ID ); ?>" class="aside_item">
                        <span class="name_product"><?php echo $title ; ?></span>
                        <span class="aside_product_img">
		  					<?php echo get_the_post_thumbnail($recent_post);?>
		  				</span>
                    </a>
					<?php if ( $show_date ) : ?>
						<span class="post-date"><?php echo get_the_date( '', $recent_post->ID ); ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
		<?php
	}
}


class es_widget_register2 extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_text elp-widget', 'description' => __( ES_PLUGIN_DISPLAY, ES_TDOMAIN ), ES_PLUGIN_NAME);
		parent::__construct(ES_PLUGIN_NAME.'2', __( ES_PLUGIN_DISPLAY, ES_TDOMAIN ).' wildberry', $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		$es_title   = apply_filters( 'widget_title', empty( $instance['es_title'] ) ? '' : $instance['es_title'], $instance, $this->id_base );
		$es_desc    = $instance['es_desc'];
		$es_name    = $instance['es_name'];
		$es_group   = $instance['es_group'];

		echo $args['before_widget'];
		if ( ! empty( $es_title ) ) {
			echo $args['before_title'] . $es_title . $args['after_title'];
		}

		// display widget method
		$url = home_url();

		global $es_includes;
		if (!isset($es_includes) || $es_includes !== true) {
			$es_includes = true;
		}
		?>

        <div class="subscription_form">
            <form class="es_widget_form" data-es_form_id="es_widget_form">

				<?php if( $es_desc != "" ) { ?>
                    <div class="es_caption"><?php echo $es_desc; ?></div>
				<?php } ?>
				<?php if( $es_name == "YES" ) { ?>
                    <div class="es_lablebox"><label class="es_widget_form_name"><?php echo __( 'Name', ES_TDOMAIN ); ?></label></div>
                    <div class="es_textbox">
                        <input type="text" id="es_txt_name" class="" name="es_txt_name" value="" maxlength="225">
                    </div>
				<?php } ?>
                    <input type="email" id="es_txt_email" class="mm_subs_input" name="es_txt_email" placeholder="Введите email" onblur="if(this.placeholder=='') this.placeholder='Введите email'" onfocus="if(this.placeholder =='Введите email' ) this.placeholder=''" onkeypress="if(event.keyCode==13) es_submit_page(event,'<?php echo $url; ?>')" value="" maxlength="225">

                    <input type="hidden" id="es_txt_buttonfirst" class="purple_btn" name="es_txt_button" onClick="return es_submit_page(event,'<?php echo $url; ?>')" value="<?php echo __( 'Subscribe', ES_TDOMAIN ); ?>">
                <button type="submit" id="es_txt_button" class="purple_btn" name="es_txt_button_submit" onClick=" event.preventDefault(); return es_submit_page(event,'<?php echo $url; ?>')"><?php echo __( 'Subscribe', ES_TDOMAIN ); ?></button>

                <div class="es_msg" id="es_widget_msg">
                    <span id="es_msg"></span>
                </div>
				<?php if( $es_name != "YES" ) { ?>
                    <input type="hidden" id="es_txt_name" name="es_txt_name" value="">
				<?php } ?>
                <input type="hidden" id="es_txt_group" name="es_txt_group" value="<?php echo $es_group; ?>">
            </form>
        </div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['es_title']   = ( ! empty( $new_instance['es_title'] ) ) ? strip_tags( $new_instance['es_title'] ) : '';
		$instance['es_desc']    = ( ! empty( $new_instance['es_desc'] ) ) ? strip_tags( $new_instance['es_desc'] ) : '';
		$instance['es_name']    = ( ! empty( $new_instance['es_name'] ) ) ? strip_tags( $new_instance['es_name'] ) : '';
		$instance['es_group']   = ( ! empty( $new_instance['es_group'] ) ) ? strip_tags( $new_instance['es_group'] ) : '';
		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'es_title' => '',
			'es_desc'   => '',
			'es_name'   => '',
			'es_group'  => ''
		);
		$instance       = wp_parse_args( (array) $instance, $defaults);
		$es_title       = $instance['es_title'];
		$es_desc        = $instance['es_desc'];
		$es_name        = $instance['es_name'];
		$es_group       = $instance['es_group'];
		?>
        <p>
            <label for="<?php echo $this->get_field_id('es_title'); ?>"><?php echo __( 'Widget Title', ES_TDOMAIN ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('es_title'); ?>" name="<?php echo $this->get_field_name('es_title'); ?>" type="text" value="<?php echo $es_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('es_desc'); ?>"><?php echo __( 'Short description about subscription form', ES_TDOMAIN ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('es_desc'); ?>" name="<?php echo $this->get_field_name('es_desc'); ?>" type="text" value="<?php echo $es_desc; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('es_name'); ?>"><?php echo __( 'Display Name Field', ES_TDOMAIN ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('es_name'); ?>" name="<?php echo $this->get_field_name('es_name'); ?>">
                <option value="YES" <?php $this->es_selected($es_name == 'YES'); ?>><?php echo __( 'YES', ES_TDOMAIN ); ?></option>
                <option value="NO" <?php $this->es_selected($es_name == 'NO'); ?>><?php echo __( 'NO', ES_TDOMAIN ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('es_group'); ?>"><?php echo __( 'Subscriber Group', ES_TDOMAIN ); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('es_group'); ?>" id="<?php echo $this->get_field_id('es_group'); ?>">
				<?php
				$groups = array();
				$groups = es_cls_dbquery::es_view_subscriber_group();
				if(count($groups) > 0) {
					$i = 1;
					foreach ($groups as $group) {
						?>
                        <option value="<?php echo esc_html(stripslashes($group["es_email_group"])); ?>" <?php if(stripslashes($es_group) == $group["es_email_group"]) { echo 'selected="selected"' ; } ?>>
							<?php echo stripslashes($group["es_email_group"]); ?>
                        </option>
						<?php
					}
				}
				?>
            </select>
        </p>
		<?php
	}

	function es_selected($var) {
		if ($var==1 || $var==true) {
			echo 'selected="selected"';
		}
	}
}