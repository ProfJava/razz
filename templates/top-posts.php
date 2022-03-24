<?php
/**
 * Top posts carousel (Above header)
 */
global $post;
$old_post        = $post;
$cat_ids         = $tags_ids = $author_id = $top_posts_count = $hidden_class = '';
$query_type      = razz_get_setting( 'top_posts_switch/on/top_posts_query/type' );
$show_mobile     = razz_get_setting( 'top_posts_switch/on/visible_mobile' );
$top_posts_count = razz_get_setting( 'top_posts_switch/on/posts_count' );
$cat_ids         = razz_get_setting( 'top_posts_switch/on/top_posts_query/category/cat_select' );
$tags_ids        = razz_get_setting( 'top_posts_switch/on/top_posts_query/tag/tag_select' );
$author_id       = razz_get_setting( 'top_posts_switch/on/top_posts_query/author/author_select' );
if ( 'off' === $show_mobile ) {
	$hidden_class = ' hidden-xs'; //Hide on mobile devices and small screens
}
if ( $query_type == 'likes' ) {
	//Query based on Likes
	$args = array(
		'posts_per_page' => absint( $top_posts_count ),
		'no_found_rows'  => 1,
		'orderby'        => 'meta_value_num',
		'meta_query'     => array(
			array(
				'key' => '_post_like_count'
			),
			array(
				'key' => '_thumbnail_id'
			)
		)
	);
} elseif ( $query_type == 'views' ) {
	//Query based on post views
	$args = array(
		'posts_per_page' => absint( $top_posts_count ),
		'no_found_rows'  => 1,
		'orderby'        => 'meta_value_num',
		'meta_query'     => array(
			array(
				'key' => 'bbioon_post_views'
			),
			array(
				'key' => '_thumbnail_id'
			)
		)
	);
} elseif ( $query_type == 'author' ) {
	//Query based on Author
	$args = array(
		'posts_per_page'      => absint( $top_posts_count ),
		'author'              => $author_id,
		'ignore_sticky_posts' => 1,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} elseif ( $query_type == 'category' ) {
	//Query based on Categories
	$args = array(
		'posts_per_page'      => absint( $top_posts_count ),
		'category__in'        => $cat_ids,
		'ignore_sticky_posts' => 1,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} elseif ( $query_type == 'tag' ) {
	//Query based on tags
	$args = array(
		'posts_per_page'      => absint( $top_posts_count ),
		'tag__in'             => $tags_ids,
		'ignore_sticky_posts' => 1,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} elseif ( $query_type == 'trend' ) {
	//Query based on Comments count
	$args = array(
		'posts_per_page'      => absint( $top_posts_count ),
		'orderby'             => 'comment_count',
		'ignore_sticky_posts' => 1,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
} else {
	//Query based on nothing (Error handling)
	$args = array(
		'posts_per_page'      => absint( $top_posts_count ),
		'ignore_sticky_posts' => 1,
		'meta_key'            => '_thumbnail_id',
		'no_found_rows'       => 1
	);
}
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ): ?>
	<section class="top-featured-posts<?php echo esc_attr( $hidden_class ); ?>">
		<div class="container">
			<?php if ( razz_get_setting( 'top_posts_switch/on/top_featured_title' ) ) { ?>
				<h3 class="featured-title h4 featured-top">
					<span><?php echo razz_get_setting( 'top_posts_switch/on/top_featured_title' ); ?></span>
				</h3>
			<?php } ?>
			<div class="featured-posts-carousel owl-carousel">
				<?php while ( $the_query->have_posts() ):$the_query->the_post(); ?>
					<div <?php post_class( 'top-post' ) ?>>
						<div class="article" itemscope itemtype="http://schema.org/Article" role="article">
							<?php if ( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'razz_big_post', array( 'class' => 'img-responsive' ) ); ?>
								</a>
							<?php endif; ?>
							<div class="listing-content">
								<?php the_title( sprintf( '<h3 class="post-title h4" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
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
