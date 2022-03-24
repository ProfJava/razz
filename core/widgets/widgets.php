<?php

/**
 * Print the posts into the widget with slider style
 */
if ( ! function_exists( 'razz_widget_slider_loop' ) ) {
	function razz_widget_slider_loop( $query_data ) {
		$query_data['meta_key'] = '_thumbnail_id';
		$query_args             = new WP_Query( $query_data );
		if ( $query_args->have_posts() ) { ?>
			<div class="widget-carousel owl-carousel">
				<?php while ( $query_args->have_posts() ) {
					$query_args->the_post();
					?>
					<div class="item">
						<div <?php post_class( 'carousel-post' ) ?> itemscope itemtype="http://schema.org/Article">
							<div class="post-image">
								<a rel="bookmark" href="<?php the_permalink(); ?>"
								   title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'razz_big_post', array( 'class' => 'img-responsive' ) ); ?>
								</a>
							</div>
							<div class="post-content">
								<?php the_title( sprintf( '<h3 class="post-title h5" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
								<?php get_template_part( 'content', 'meta' ); ?>
							</div>
						</div>
					</div>
					<?php
				} ?>
			</div>
			<?php
		}
		wp_reset_postdata();
	}
}

/**
 * Print the posts into the widget with images grid style
 */
if ( ! function_exists( 'razz_widget_pics_loop' ) ) {
	function razz_widget_pics_loop( $query_data ) {
		$i                      = 1;
		$query_data['meta_key'] = '_thumbnail_id';
		$query_args             = new WP_Query( $query_data );
		if ( $query_args->have_posts() ) { ?>
			<div class="pictures-posts">
				<?php while ( $query_args->have_posts() ):$query_args->the_post(); ?>
					<div <?php post_class( 'pic' ); ?> itemscope itemtype="http://schema.org/Article">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
						   data-toggle="tooltip" data-placement="top">
							<?php the_post_thumbnail( 'razz_big_post', array( 'class' => 'img-responsive' ) ); ?>
							<span class="overlay"></span>
						</a>
					</div>
					<?php if ( $i % 3 == 0 ): ?>
						<div class="clearfix"></div>
					<?php endif; ?>
					<?php $i ++; endwhile; ?>
			</div>
			<?php
		}
		wp_reset_postdata();
	}
}

/**
 * Print the posts into the widget with Big list style
 */
if ( ! function_exists( 'razz_widget_big_list_loop' ) ) {
	function razz_widget_big_list_loop( $query_data ) {
		$i          = 1;
		$query_args = new WP_Query( $query_data );
		if ( $query_args->have_posts() ) {
			while ( $query_args->have_posts() ) {
				$query_args->the_post();
				if ( $i == 1 ) {
					?>
					<div <?php post_class( 'big-post' ); ?> itemscope itemtype="http://schema.org/Article">
						<div class="post-image">
							<a rel="bookmark" href="<?php the_permalink(); ?>"
							   title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'razz_big_post', array( 'class' => 'img-responsive' ) ); ?>
							</a>
						</div>
						<div class="post-content">
							<?php the_title( sprintf( '<h3 class="post-title h4" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
							<?php get_template_part( 'content', 'meta' ); ?>
						</div>
					</div>
					<?php
				} else {
					get_template_part( 'templates/small', 'post' );
				}
				$i ++;
			}
		}
		wp_reset_postdata();
	}
}

/**
 * Print the posts into the widget with small list style
 */
if ( ! function_exists( 'razz_widget_small_list_loop' ) ) {
	function razz_widget_small_list_loop( $query_data ) {
		$query_args = new WP_Query( $query_data );
		if ( $query_args->have_posts() ) {
			while ( $query_args->have_posts() ) {
				$query_args->the_post();
				get_template_part( 'templates/small', 'post' );
			}
		}
		wp_reset_postdata();
	}
}

/**
 * Including custom widgets
 */
require_once RAZZ_THEME_CORE . 'widgets/social-media-widget.php';// Social media widget
require_once RAZZ_THEME_CORE . 'widgets/about-me-widget.php';// about me widget
require_once RAZZ_THEME_CORE . 'widgets/author-posts.php'; //Author posts widget
require_once RAZZ_THEME_CORE . 'widgets/category-posts.php'; //Category posts widget
require_once RAZZ_THEME_CORE . 'widgets/recent-posts-widget.php'; //Recent posts widget
require_once RAZZ_THEME_CORE . 'widgets/facebook-widget.php'; // Facebook box widget
require_once RAZZ_THEME_CORE . 'widgets/googleplus-widget.php'; // Google plus widget
require_once RAZZ_THEME_CORE . 'widgets/instagram-photos-widget.php'; // instagram photos widget
require_once RAZZ_THEME_CORE . 'widgets/soundcloud-widget.php'; // Sound cloud widget
require_once RAZZ_THEME_CORE . 'widgets/most-viewed-posts-widget.php'; //Most viewed posts widget
require_once RAZZ_THEME_CORE . 'widgets/most-liked-posts-widget.php'; //Most liked posts widget
require_once RAZZ_THEME_CORE . 'widgets/random-posts-widget.php'; //Random posts widget
require_once RAZZ_THEME_CORE . 'widgets/categories.php'; //Display categories with images

/**
 * Register custom widgets
 */
add_action( 'widgets_init', 'wink_widgets' );
function wink_widgets() {
	register_widget( 'razz_author_posts' );
	register_widget( 'razz_about_me' );
	register_widget( 'razz_category_posts' );
	register_widget( 'razz_facebook_box' );
	register_widget( 'razz_google_plus_box' );
	register_widget( 'razz_most_liked' );
	register_widget( 'razz_random_posts' );
	register_widget( 'razz_most_viewed' );
	register_widget( 'razz_recent_posts' );
	register_widget( 'razz_social_media' );
	register_widget( 'razz_soundcloud_box' );
	register_widget( 'razz_instagram_photos' );
	register_widget( 'razz_categories' );
}