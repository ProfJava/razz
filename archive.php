<?php global $wp_query;
get_header(); ?>
	<section class="home-posts">
		<div class="container">
			<div class="row">
				<?php razz_content_area_start( 'archive_layout' ); ?>
				<div class="blog-wrap category-box">
					<?php
					if ( have_posts() ):
						if ( 'show' === razz_get_setting( 'archive_page_description' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
							<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								echo sprintf( '<div class="count">' . esc_html( '%s ' ) . esc_html( _n( 'Post ', 'Posts', $wp_query->found_posts, 'razz' ) ) . '</div>', $wp_query->found_posts );
								?>
							</header><!-- .page-header -->
						<?php endif;
						razz_posts_layout( 'archive' );
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
				<?php razz_content_area_end(); ?>
				<?php
				razz_sidebar_start( 'archive_layout' );
				get_sidebar();
				razz_sidebar_end();
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>