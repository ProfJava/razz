<?php
global $post;
$old_post            = $post;
$count               = $exclude = '';
$wink_thumbnail_size = 'razz_main_slider'; //image size
$wink_query_type     = razz_get_setting( 'carousel_switch/on/carousel_control/query_type' ); //trend-likes-views-category-tag-author
$wink_posts_count    = razz_get_setting( 'carousel_switch/on/posts_count' ); //integer of posts count
$wink_exclude_posts  = razz_get_setting( 'carousel_switch/on/exclude' ); //array of post ids to exclude
$wink_cat_ids        = razz_get_setting( 'carousel_switch/on/carousel_control/category/cat_select' ); //array of categories ids
$wink_tag_ids        = razz_get_setting( 'carousel_switch/on/carousel_control/tag/tag_select' ); //array of tags ids
$wink_author_id      = razz_get_setting( 'carousel_switch/on/carousel_control/author/author_select' ); //integer of author id

//Query
if ( $wink_query_type == 'likes' ) {
	//Query based on Likes
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'no_found_rows'       => 1,
		'ignore_sticky_posts' => 1,
		'orderby'             => 'meta_value_num',
		'post__not_in'        => $wink_exclude_posts,
		'meta_query'          => array(
			array(
				'key' => '_post_like_count'
			),
			array(
				'key' => '_thumbnail_id'
			)
		)
	);
} elseif ( $wink_query_type == 'views' ) {
	//Query based on post views
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'no_found_rows'       => 1,
		'ignore_sticky_posts' => 1,
		'orderby'             => 'meta_value_num',
		'post__not_in'        => $wink_exclude_posts,
		'meta_query'          => array(
			array(
				'key' => 'bbioon_post_views'
			),
			array(
				'key' => '_thumbnail_id'
			)
		)
	);
} elseif ( $wink_query_type == 'author' ) {
	//Query based on Author
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'author'              => $author_id,
		'ignore_sticky_posts' => 1,
		'post__not_in'        => $wink_exclude_posts,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} elseif ( $wink_query_type == 'category' ) {
	//Query based on Categories
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'category__in'        => $wink_cat_ids,
		'ignore_sticky_posts' => 1,
		'post__not_in'        => $wink_exclude_posts,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} elseif ( $wink_query_type == 'tag' ) {
	//Query based on tags
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'tag__in'             => $wink_tag_ids,
		'ignore_sticky_posts' => 1,
		'post__not_in'        => $wink_exclude_posts,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} elseif ( $wink_query_type == 'trend' ) {
	//Query based on Comments count
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'orderby'             => 'comment_count',
		'ignore_sticky_posts' => 1,
		'post__not_in'        => $wink_exclude_posts,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} else {
	//Query based on nothing
	$wink_args = array(
		'posts_per_page'      => absint( $wink_posts_count ),
		'ignore_sticky_posts' => 1,
		'post__not_in'        => $wink_exclude_posts,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
}
$wink_query = new WP_Query( $wink_args );
if ( $wink_query->have_posts() ):
	?>
	<section class="main-slider">
		<div class="container">
			<div class="home-slider owl-carousel center-slide"
			     id="center-slide">
				<?php while ( $wink_query->have_posts() ):$wink_query->the_post(); ?>
					<div <?php post_class( 'main-item' ); ?>>
						<?php
						//the_post_thumbnail( $wink_thumbnail_size, array( 'class' => 'img-responsive' ) );
						if ( has_post_thumbnail() ) {
							$window_mag_image_url = '';
							$window_mag_image_url = get_the_post_thumbnail_url( get_the_ID(), $wink_thumbnail_size );
							?>
							<div class="slide-image" <?php if ( $window_mag_image_url ) {
								echo 'style="background-image: url(' . esc_url( $window_mag_image_url ) . ');"';
							} ?>></div>
						<?php } ?>
						<div class="overlay"></div>
						<div class="post-data">
							<div itemscope itemtype="http://schema.org/Article" class="contents">
								<?php the_title( sprintf( '<h3 class="post-title" itemprop = "name headline" ><a href = "%s" rel = "bookmark" > ', esc_url( get_permalink() ) ), '</a ></h3>' ); ?>
								<div class="slide-post-meta">
									<span class="author" title="<?php esc_attr_e( 'Author', 'razz' ); ?>">
										<i class="fa fa-user"></i>
										<?php the_author_posts_link(); ?>
									</span>
									<span class="date" title="<?php esc_attr_e( 'Created on', 'razz' ); ?>">
										<i class="fa fa-calendar"></i>
										<?php razz_time(); ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php
	$post = $old_post;
	wp_reset_postdata();
endif;
