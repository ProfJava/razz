<?php

/**
 * Adds Social media icons widget.
 */
class razz_facebook_box extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'razz_facebook_box', // Base ID
			RAZZ_THEME_NAME . esc_html__( ' Facebook box', 'razz' ), // Name
			array( 'description' => esc_html__( 'add facebook page box', 'razz' ), ) // Args
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
			$page_url = $instance['page_url'];
			$page_url = esc_url( $page_url );
			?>
			<div class="fb-container"></div>
			<script>
				(function (d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));

				jQuery(document).ready(function () {
					"use strict";
					var container_width = jQuery('.fb-container').width();
					jQuery('.fb-container').html('<div class="fb-like-box" ' +
						'data-href="<?php echo esc_url( $page_url ) ?>" ' +
						'data-width="' + container_width + '" data-height="730" data-show-faces="true" ' +
						'data-stream="false" data-header="true"></div>');
					//FB.XFBML.parse();
				});
			</script>
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
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'razz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       placeholder="<?php esc_attr_e( 'Like us on Facebook', 'razz' ) ?>"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php esc_html_e( 'Page url :', 'razz' );
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