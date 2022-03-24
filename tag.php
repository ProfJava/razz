<?php global $wp_query;
$razz_tag = get_queried_object();
get_header();
?>
	<section class="home-posts">
		<div class="container">
			<div class="row">
				<?php razz_content_area_start( 'tags_layout' ); ?>
				<div class="blog-wrap category-box">
					<?php
					if ( 'show' === razz_get_setting( 'tags_page_description' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h2 class="page-title">', '</h2>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );

							echo sprintf( '<div class="count">' . esc_html( '%s ' ) . esc_html( _n( 'Post ', 'Posts', $razz_tag->count, 'razz' ) ) . '</div>', $razz_tag->count );
							?>
						</header><!-- .page-header -->
					<?php endif; ?>
					<?php
					if ( have_posts() ):
						if ( razz_get_setting( 'tag_separate' ) ) {
							if ( 'list' === razz_get_term_setting( $razz_tag->term_id, 'tag_posts_layout' ) ) {
								get_template_part( 'recent', 'list' );
							} elseif ( 'blog-list' === razz_get_term_setting( $razz_tag->term_id, 'tag_posts_layout' ) ) {
								get_template_part( 'recent', 'blog-list' );
							} elseif ( 'grid' === razz_get_term_setting( $razz_tag->term_id, 'tag_posts_layout' ) ) {
								get_template_part( 'recent', 'grid' );
							} elseif ( 'blog-grid' === razz_get_term_setting( $razz_tag->term_id, 'tag_posts_layout' ) ) {
								get_template_part( 'recent', 'blog-grid' );
							} else {
								get_template_part( 'recent', 'blog' );
							}
						} else {
							razz_posts_layout( 'tags' );
						}
						if ( $wp_query->max_num_pages > 1 ) :
							if ( 'text' === razz_get_setting( 'pagination_style' ) ) {
								the_posts_navigation();
							} else {
								razz_pagination();
							}
						endif;
					else :
						get_template_part( 'templates/part', 'notfound' );
					endif;
					?>
				</div>
				<?php
				razz_content_area_end();
				razz_sidebar_start( 'tags_layout' );
				get_sidebar();
				razz_sidebar_end();
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>