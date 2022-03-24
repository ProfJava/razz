<?php global $wp_query;
$wink_category = get_category( get_query_var( 'cat' ) );
$wink_cat_id   = $wink_category->cat_ID;
get_header();
?>
	<section class="home-posts">
		<div class="container">
			<div class="row">
				<?php razz_content_area_start( 'category_layout' ); ?>
				<div class="blog-wrap category-box">
					<?php
					if ( 'show' === razz_get_setting( 'category_page_description' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h2 class="page-title">', '</h2>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							$wink_cat = get_queried_object();//Posts count
							echo sprintf( '<div class="count">' . esc_html( '%s ' ) . esc_html( _n( 'Post ', 'Posts', $wink_cat->count, 'razz' ) ) . '</div>', $wink_cat->count );
							?>
						</header><!-- .page-header -->
					<?php endif;
					if ( have_posts() ) {
						if ( razz_get_setting( 'category_separate' ) ) {
							if ( 'list' === razz_get_term_setting( $wink_cat_id, 'cat_posts_layout' ) ) {
								get_template_part( 'recent', 'list' );
							} elseif ( 'blog-list' === razz_get_term_setting( $wink_cat_id, 'cat_posts_layout' ) ) {
								get_template_part( 'recent', 'blog-list' );
							} elseif ( 'grid' === razz_get_term_setting( $wink_cat_id, 'cat_posts_layout' ) ) {
								get_template_part( 'recent', 'grid' );
							} elseif ( 'blog-grid' === razz_get_term_setting( $wink_cat_id, 'cat_posts_layout' ) ) {
								get_template_part( 'recent', 'blog-grid' );
							} else {
								get_template_part( 'recent', 'blog' );
							}
						} else {
							razz_posts_layout( 'category' );
						}
						if ( $wp_query->max_num_pages > 1 ) {
							if ( 'text' === razz_get_setting( 'pagination_style' ) ) {
								the_posts_navigation();
							} else {
								razz_pagination();
							}
						}
					} else {
						get_template_part( 'templates/part', 'notfound' );
					}
					?>
				</div>
				<?php
				razz_content_area_end();
				razz_sidebar_start( 'category_layout' );
				get_sidebar();
				razz_sidebar_end();
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>