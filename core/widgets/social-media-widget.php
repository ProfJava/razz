<?php

/**
 * Adds Social media icons widget.
 */
class razz_social_media extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'razz_social_media', // Base ID
			RAZZ_THEME_NAME . esc_html__( ' Social media icons', 'razz' ), // Name
			array( 'description' => esc_html__( 'add social media urls to your sidebar', 'razz' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			if ( razz_social_media_urls() ) { ?>
				<div class="social_widget_container">
					<?php razz_social_media_urls( true ); ?>
				</div>
				<?php
			}
			echo $args['after_widget'];
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       placeholder="<?php esc_attr_e( 'Follow us', 'razz' ) ?>"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php if ( function_exists( 'fw_get_db_settings_option' ) ): ?>
			<p>
				<?php esc_html_e( 'There is no options here any more... just go to theme options page and add social media urls to activate them', 'razz' ); ?>
			</p>
			<?php if ( razz_social_media_urls() ): ?>
				<hr>
				<p>
					<?php esc_html_e( 'Active social media icons:', 'razz' ); ?>
				</p>
				<p class="wink-icons"><?php razz_social_media_urls( true ); ?></p>
			<?php endif; ?>
		<?php else: ?>
			<p style="color: red"><?php esc_html_e( 'You must install unyson framework plugin to get the social media urls working properly', 'razz' ); ?></p>
		<?php endif; ?>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}