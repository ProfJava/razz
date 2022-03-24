<?php

/**
 * Adds Social media icons widget.
 */
class razz_category_posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'razz_category_posts', // Base ID
			RAZZ_THEME_NAME . esc_html__( ' Category posts', 'razz' ), // Name
			array( 'description' => esc_html__( 'add posts from specified category', 'razz' ), ) // Args
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
		if ( ! empty( $instance['posts_count'] ) ):
			$posts_count = $instance['posts_count'];
		else:
			$posts_count = 5;
		endif;
		if ( ! empty( $instance['category'] ) ):
			$posts_cat = $instance['category'];
		else:
			$posts_cat = null;
		endif;
		$query_args = array(
			'posts_per_page'      => absint( $posts_count ),
			'cat'                 => $posts_cat,
			'ignore_sticky_posts' => 1,
			'no_found_rows'       => true
		);
		switch ( $instance['style'] ) {
			case 'slider':
				razz_widget_slider_loop( $query_args );
				break;
			case 'small_list' :
				razz_widget_small_list_loop( $query_args );
				break;
			case 'big_list' :
				razz_widget_big_list_loop( $query_args );
				break;
			case 'pics' :
				razz_widget_pics_loop( $query_args );
				break;
			default :
				razz_widget_small_list_loop( $query_args );
		}
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
		$all_cats       = get_categories();
		$title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$popular_number = ! empty( $instance['posts_count'] ) ? absint( $instance['posts_count'] ) : 5;
		$category       = ! empty( $instance['category'] ) ? $instance['category'] : '';
		$style          = ! empty( $instance['style'] ) ? $instance['style'] : '';
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
				for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Select categories :', 'razz' );
				?></label>

			<select name="<?php echo $this->get_field_name( 'category' ); ?>"
			        id="<?php echo $this->get_field_id( 'category' ); ?>" class="widefat"
			        style="margin-bottom:10px">
				<option value=""><?php esc_html_e( 'Not selected', 'razz' ); ?></option>
				<?php foreach ( $all_cats as $cat ) {
					$cat_id = $cat->term_id;
					?>
					<option
						value="<?php echo esc_attr( $cat->term_id ); ?>"<?php if ( $cat_id == $category ) { ?>
						selected="selected"
					<?php } ?>><?php echo esc_html( $cat->name ); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'style' ); ?>"><?php esc_html_e( 'Select style :', 'razz' );
				?></label>

			<select name="<?php echo $this->get_field_name( 'style' ); ?>"
			        id="<?php echo $this->get_field_id( 'style' ); ?>" class="widefat"
			        style="margin-bottom:10px">
				<option value=""><?php esc_html_e( 'Not selected', 'razz' ); ?></option>
				<option value="slider"<?php if ( 'slider' == $style ) { ?> selected="selected"<?php } ?>>
					<?php esc_html_e( 'Slider', 'razz' ); ?>
				</option>
				<option value="pics"<?php if ( 'pics' == $style ) { ?> selected="selected"<?php } ?>>
					<?php esc_html_e( 'Posts Pictures', 'razz' ); ?>
				</option>
				<option value="small_list"<?php if ( 'small_list' == $style ) { ?> selected="selected"<?php } ?>>
					<?php esc_html_e( 'Small list', 'razz' ); ?>
				</option>
				<option value="big_list"<?php if ( 'big_list' == $style ) { ?> selected="selected"<?php } ?>>
					<?php esc_html_e( 'Big list', 'razz' ); ?>
				</option>
			</select>
		</p>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'posts_count' ); ?>"><?php esc_html_e( 'Posts count :', 'razz' );
				?></label>
			<input id="<?php echo $this->get_field_id( 'posts_count' ); ?>"
			       name="<?php echo $this->get_field_name( 'posts_count' ); ?>" type="number" size="3"
			       value="<?php echo esc_attr( $popular_number ); ?>">
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
		$instance                = array();
		$instance['title']       = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_count'] = ( ! empty( $new_instance['posts_count'] ) ) ? strip_tags( $new_instance['posts_count'] ) : '';
		$instance['category']    = ( ! empty( $new_instance['category'] ) ) ? strip_tags( $new_instance['category'] ) : '';
		$instance['style']       = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';

		return $instance;
	}

}