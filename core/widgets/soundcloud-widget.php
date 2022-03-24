<?php

/**
 * Adds Social media icons widget.
 */
class razz_soundcloud_box extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'razz_soundcloud_box', // Base ID
			RAZZ_THEME_NAME . esc_html__( ' Sound cloud track', 'razz' ), // Name
			array( 'description' => esc_html__( 'add a sound cloud track', 'razz' ), ) // Args
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
		$player_color  = '';
		$player_color  = str_replace( '#', '', sanitize_hex_color( razz_get_setting( 'accent_color' ) ) );
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		if ( ! empty( $instance['track_url'] ) ):
			$track_url = $instance['track_url'];
			$track_url = esc_url( $track_url );
			$protocol  = is_ssl() ? 'https' : 'http';
			$autoplay  = 'false';
			if ( ! empty( $instance['autoplay'] ) ) {
				$autoplay = 'true';
			}
			?>
			<iframe height="166"
			        src="<?php echo esc_attr( $protocol ) ?>://w.soundcloud.com/player/?url=<?php echo esc_url( $track_url ) ?>&amp;auto_play=<?php echo esc_attr( $autoplay ); ?>&amp;color=<?php echo esc_attr( $player_color ); ?>&amp;hide_related=false&amp;show_comments=true"></iframe>
			<?php
		else:
			esc_html_e( 'You must provide a sound cloud track url', 'razz' );
		endif;
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title     = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$track_url = ! empty( $instance['track_url'] ) ? $instance['track_url'] : '';
		$autoplay  = ! empty( $instance['autoplay'] ) ? $instance['autoplay'] : '';
		?>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'track_url' ); ?>"><?php esc_html_e( 'Track url:', 'razz' );
				?></label>
			<input id="<?php echo $this->get_field_id( 'track_url' ); ?>"
			       name="<?php echo $this->get_field_name( 'track_url' ); ?>" type="text" class="widefat"
			       value="<?php echo esc_attr( $track_url ); ?>">
		</p>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php esc_html_e( 'Autoplay :', 'razz' ) ?></label>
			<input id="<?php echo $this->get_field_id( 'autoplay' ); ?>"
			       name="<?php echo $this->get_field_name( 'autoplay' ); ?>"
			       value="true" <?php if ( ! empty( $instance['autoplay'] ) ) { ?>
				checked="checked"
			<?php } ?> type="checkbox"/>
		</p>
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
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['track_url'] = ( ! empty( $new_instance['track_url'] ) ) ? strip_tags( esc_url( $new_instance['track_url'] ) ) : '';
		$instance['autoplay']  = ( ! empty( $new_instance['autoplay'] ) ) ? strip_tags( esc_attr( $new_instance['autoplay'] ) ) : '';

		return $instance;
	}

}