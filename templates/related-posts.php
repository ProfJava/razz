<?php
/**
 * Related posts
 * this file is visible in single.php only
 */

global $post, $do_not_duplicate;
$old_post   = $post;
$related_no = $query_type = '';
$related_no = razz_get_setting( 'related_posts_box/on/related_count' ) ? razz_get_setting( 'related_posts_box/on/related_count' ) : 6;
$query_type = razz_get_setting( 'related_posts_box/on/query' );
if ( $query_type == 'author' ) {
	//some posts from the current author
	$args = array(
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => absint( $related_no ),
		'author'         => get_the_author_meta( 'ID' ),
		'no_found_rows'  => 1
	);
} elseif ( $query_type == 'tag' ) {
	//some posts from current post tags
	$tags     = wp_get_post_tags( $post->ID );
	$tags_ids = array();
	foreach ( $tags as $individual_tag ) {
		$tags_ids[] = $individual_tag->term_id;
	}
	$args = array(
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => absint( $related_no ),
		'tag__in'        => $tags_ids,
		'no_found_rows'  => 1
	);
} else {
	//some posts from current post category or unyson framework is not installed
	$categories = get_the_category( $post->ID );
	$cat_ids    = array();
	foreach ( $categories as $individual_cat ) {
		$cat_ids[] = $individual_cat->term_id;
	}
	$args = array(
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => absint( $related_no ),
		'category__in'   => $cat_ids,
		'no_found_rows'  => 1
	);
}
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ): ?>
	<div class="related-posts">
		<?php if ( razz_get_setting( 'related_posts_box/on/related_title' ) ): ?>
			<div class="related-header">
				<h3>
					<span><?php echo razz_get_setting( 'related_posts_box/on/related_title' ); ?></span>
				</h3>
			</div>
		<?php elseif ( ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<div class="related-header">
				<h3>
					<span><?php esc_attr_e( 'You may also like', 'razz' ); ?></span>
				</h3>
			</div>
		<?php endif; ?>
		<div class="row">
			<?php $i = 1;
			while ( $the_query->have_posts() ):
			$the_query->the_post();
			$do_not_duplicate[] = get_the_ID(); ?>
			<div class="col-md-6 col-xs-12">
				<?php get_template_part( 'templates/small', 'post' ); ?>
			</div>
			<?php if ( $i % 2 == 0 ) { ?>
		</div>
		<div class="row">
			<?php } ?>
			<?php $i ++;
			endwhile; ?>
		</div>
	</div>
	<?php
	$post = $old_post;
	wp_reset_postdata();
endif;
