<?php global $wp_query;
get_header(); ?>
	<section class="home-posts">
		<div class="container">
			<div class="row">
				<?php razz_content_area_start( 'author_layout' ); ?>
				<div class="blog-wrap category-box">
					<?php
					if ( have_posts() ):
						if ( 'show' === razz_get_setting( 'author_bio' ) or ! function_exists( 'fw_get_db_settings_option' ) ) {
							get_template_part( 'templates/author', 'box' );
						}
						razz_posts_layout( 'author' );


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
				razz_sidebar_start( 'author_layout' );
				get_sidebar();
				razz_sidebar_end();
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>