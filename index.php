<?php global $wp_query;
get_header();
//Main Carousel
if ( 'on' === razz_get_setting( 'carousel_switch/query_type' ) ) {
	get_template_part( 'content', 'slider' );
}
//Featured Posts
if ( 'on' == razz_get_setting( 'top_posts_switch/control' ) ) {
	get_template_part( 'templates/top', 'posts' );
}
?>
	<section class="home-posts">
		<div class="container">
			<div class="row">
				<?php razz_content_area_start( 'home_sidebar' ); //Start the content div ?>
				<div class="blog-wrap">
					<?php
					if ( have_posts() ) {
						razz_posts_layout( 'home' );
						if ( $wp_query->max_num_pages > 1 ) {
							if ( 'text' === razz_get_setting( 'pagination_style' ) ) {
								the_posts_navigation(); //Next and previous pages pagination
							} else {
								razz_pagination(); //Numbered pagination
							}
						}
					} else {
						get_template_part( 'templates/part', 'notfound' ); //No posts in the blog
					}
					?>
				</div>
				<?php
				razz_content_area_end(); //Close the div
				razz_sidebar_start( 'home_sidebar' ); //Start sidebar div
				get_sidebar();
				razz_sidebar_end(); //End sidebar div
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>