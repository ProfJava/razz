<?php global $wp_query;
get_header(); ?>
	<section class="home-posts">
		<div class="container">
			<div class="row">
				<?php razz_content_area_start( 'search_layout' ); ?>
				<div class="blog-wrap category-box">
					<?php
					if ( have_posts() ): ?>
						<header class="page-header">
							<?php
							echo sprintf( '<h2 class="page-title">' . esc_html__( 'Search Results for: %s', 'razz' ) . '</h2>', '<span>' . get_search_query() . '</span>' );
							echo sprintf( '<div class="count">' . esc_html( '%s ' ) . esc_html( _n( 'Post ', 'Posts', $wp_query->found_posts, 'razz' ) ) . '</div>', $wp_query->found_posts );
							?>
						</header><!-- .page-header -->
						<?php
						razz_posts_layout( 'search' );
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
				razz_sidebar_start( 'search_layout' );
				get_sidebar();
				razz_sidebar_end();
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>