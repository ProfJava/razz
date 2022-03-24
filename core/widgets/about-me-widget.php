<?php

/**
 * Adds Social media icons widget.
 */
class razz_about_me extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'razz_about_me', // Base ID
			RAZZ_THEME_NAME . esc_html__( ' About Me', 'razz' ), // Name
			array( 'description' => esc_html__( 'Add about me box (for a personal bloggers)', 'razz' ), ) // Args
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
		$widget_title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<div class="about-widget text-center">
			<?php if ( ! empty( $instance['img_url'] ) ) { ?>
				<div class="about-img">
					<img src="<?php echo esc_url( $instance['img_url'] ); ?>"
					     alt="<?php echo esc_attr( $widget_title ); ?>" class="img-responsive center-block">
				</div>
			<?php } ?>
			<?php if ( ! empty( $instance['about_title'] ) ) { ?>
				<div class="about-title"><?php echo esc_html( $instance['about_title'] ); ?></div>
			<?php } ?>
			<?php if ( ! empty( $instance['about_paragraph'] ) ) { ?>
				<div class="about-paragraph">
					<?php echo htmlspecialchars_decode( wpautop( $instance['about_paragraph'] ) ); ?>
				</div>
			<?php } ?>
		</div>
		<?php
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
		$title           = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$img_url         = ! empty( $instance['img_url'] ) ? $instance['img_url'] : '';
		$about_title     = ! empty( $instance['about_title'] ) ? $instance['about_title'] : '';
		$about_paragraph = ! empty( $instance['about_paragraph'] ) ? $instance['about_paragraph'] : '';
		?>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label
				for="<?php echo $this->get_field_id( 'img_url' ); ?>"><?php esc_html_e( 'Image url:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'img_url' ); ?>"
			       name="<?php echo $this->get_field_name( 'img_url' ); ?>" type="text"
			       value="<?php echo esc_attr( $img_url ); ?>">
		</p>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'about_title' ); ?>"><?php esc_html_e( 'About Title:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_title' ); ?>"
			       name="<?php echo $this->get_field_name( 'about_title' ); ?>" type="text"
			       value="<?php echo esc_attr( $about_title ); ?>">
		</p>

		<p>
			<label
				for="<?php echo $this->get_field_id( 'about_paragraph' ); ?>"><?php esc_html_e( 'About Paragraph:', 'razz' ); ?></label>
			<textarea rows="6" class="widefat" id="<?php echo $this->get_field_id( 'about_paragraph' ); ?>"
			          name="<?php echo $this->get_field_name( 'about_paragraph' ); ?>"><?php echo esc_attr( $about_paragraph ); ?></textarea>
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
		$instance                    = array();
		$instance['title']           = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['about_paragraph'] = ( ! empty( $new_instance['about_paragraph'] ) ) ? strip_tags( $new_instance['about_paragraph'] ) : '';
		$instance['about_title']     = ( ! empty( $new_instance['about_title'] ) ) ? strip_tags( $new_instance['about_title'] ) : '';
		$instance['img_url']         = ( ! empty( $new_instance['img_url'] ) ) ? strip_tags( $new_instance['img_url'] ) : '';

		return $instance;
	}

}