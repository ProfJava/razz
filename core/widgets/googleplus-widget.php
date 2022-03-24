<?php

/**
 * Adds Social media icons widget.
 */
class razz_google_plus_box extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'google_plus_box', // Base ID
			RAZZ_THEME_NAME . esc_html__( ' Google plus box', 'razz' ), // Name
			array( 'description' => esc_html__( 'add a google plus page box', 'razz' ), ) // Args
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		if ( ! empty( $instance['page_url'] ) ):
			$page_url = esc_url( $instance['page_url'] );
			?>
			<div class="google-box">
				<script type="text/javascript">
					(function () {
						var po = document.createElement('script');
						po.type = 'text/javascript';
						po.async = true;
						po.src = 'https://apis.google.com/js/platform.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(po, s);
					})();
				</script>
				<div class="g-page" data-width="200" data-href="<?php echo esc_url( $page_url ) ?>"
				     data-showtagline="false"
				     data-rel="publisher"></div>
				<script>jQuery('.g-page, g-person, g-community').attr('data-width', jQuery('.google-box').width());</script>
			</div>
			<?php
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
		$title    = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$page_url = ! empty( $instance['page_url'] ) ? $instance['page_url'] : '';
		?>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       placeholder="<?php esc_attr_e( 'Google plus', 'razz' ) ?>"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php esc_html_e( 'Page url:', 'razz' );
				?></label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>"
			       name="<?php echo $this->get_field_name( 'page_url' ); ?>" type="text" class="widefat"
			       value="<?php echo esc_attr( $page_url ); ?>">
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
		$instance             = array();
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['page_url'] = ( ! empty( $new_instance['page_url'] ) ) ? strip_tags( esc_url( $new_instance['page_url'] ) ) : '';

		return $instance;
	}

}