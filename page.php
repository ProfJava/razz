<?php
get_header();
/**
 * Page layout --> sidebar position
 */
$razz_sticky_sidebar = '';
if ( 'on' === razz_get_setting( 'sticky_sidebar' ) ) {
	$razz_sticky_sidebar = ' sticky-sidebar ';
}
$razz_post_layout_meta  = razz_get_meta( get_the_ID(), 'single_sidebar' );
$razz_post_layout_theme = razz_get_setting( 'single_sidebar' );
$razz_content_class     = 'col-md-8 col-xs-12';
$razz_sidebar_class     = 'col-md-4 col-xs-12' . esc_attr( $razz_sticky_sidebar );
if ( $razz_post_layout_meta ) {
	/**
	 * Layout from post metabox
	 */
	if ( $razz_post_layout_meta === 'left' ) {
		$razz_content_class = 'col-md-8 col-xs-12 col-md-push-4';
		$razz_sidebar_class = 'col-md-4 col-xs-12 col-md-pull-8' . esc_attr( $razz_sticky_sidebar );
	} elseif ( $razz_post_layout_meta === 'right' ) {
		$razz_content_class = 'col-md-8 col-xs-12';
		$razz_sidebar_class = 'col-md-4 col-xs-12' . esc_attr( $razz_sticky_sidebar );
	} elseif ( $razz_post_layout_meta === 'none' ) {
		$razz_content_class = 'col-md-8 col-xs-12 col-md-push-2';
		$razz_sidebar_class = 'hide';
	}
} else {
	/**
	 * Layout from theme options page or the default when the unyson framework is not installed
	 */
	if ( $razz_post_layout_theme === 'left_sidebar' ) {
		$razz_content_class = 'col-md-8 col-xs-12 col-md-push-4';
		$razz_sidebar_class = 'col-md-4 col-xs-12 col-md-pull-8' . esc_attr( $razz_sticky_sidebar );
	} elseif ( $razz_post_layout_theme === 'right_sidebar' ) {
		$razz_content_class = 'col-md-8 col-xs-12';
		$razz_sidebar_class = 'col-md-4 col-xs-12' . esc_attr( $razz_sticky_sidebar );
	} elseif ( $razz_post_layout_theme === 'none' ) {
		$razz_content_class = 'col-md-8 col-xs-12 col-md-push-2';
		$razz_sidebar_class = 'hide';
	} else {
		$razz_content_class = 'col-md-8 col-xs-12';
		$razz_sidebar_class = 'col-md-4 col-xs-12' . esc_attr( $razz_sticky_sidebar );
	}
}
?>
	<section class="singular-post">
		<div class="container">
			<?php
			/**
			 * Post Cover block
			 */
			if ( 'on' === razz_get_meta( get_the_ID(), 'post_cover/control' ) ):
				//Post cover image url
				$razz_cover_image = razz_get_meta( get_the_ID(), 'post_cover/on/photo/url' );
				?>
				<div class="post-cover"<?php if ( $razz_cover_image ) { ?>
					style="background-image: url('<?php echo esc_url( $razz_cover_image ); ?>')" <?php } ?>>
					<div class="dark-bg"></div>
					<div class="post-data">
						<?php the_title( '<h1 class="post-box-title h3">', '</h1>' ); ?>
						<?php get_template_part( 'templates/part', 'meta' ); ?>
					</div>
					<?php if ( $razz_cover_image ): ?>
						<a href="<?php echo esc_url( $razz_cover_image ); ?>" class="magnific-gallery zoom-in">
							<i class="fa fa-arrows-alt"></i>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="row">
				<div class="<?php echo esc_attr( $razz_content_class ); ?>">
					<?php
					/**
					 * Post top ads area
					 */
					if ( razz_get_meta( get_the_ID(), 'top_banner' ) != 'off' ):
						razz_ads( 3, 'ad-post-header hidden-xs' );
					endif;
					?>
					<div class="blog-column">
						<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
							<div itemscope itemtype="http://schema.org/Article" role="article"
							     id="post-<?php the_ID(); ?>" <?php post_class( 'category-box singular' ); ?>>
								<?php
								/**
								 * Post title and meta when there is no post cover or not installed unyson framework
								 */
								if ( 'on' !== razz_get_meta( get_the_ID(), 'post_cover/control' ) or ! function_exists( 'fw_get_db_post_option' ) ) {
									the_title( '<h1 class="h3 post-box-title" itemprop="name headline">', '</h1>' );
									get_template_part( 'templates/part', 'meta' );
								}
								get_template_part( 'templates/part' );//Page thumbnail
								?>
								<div class="post-box-content">
									<?php
									edit_post_link( esc_html__( 'Edit Post', 'razz' ), '<div class="edit-link">', '</div>' );
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'razz' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'razz' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
									?>
								</div>
								<?php
								/**
								 * Post share icons file
								 */
								if ( ( 'on' === razz_get_setting( 'share_pages' ) && 'off' !== razz_get_meta( get_the_ID(), 'share_posts' ) ) or ! function_exists( 'fw_get_db_settings_option' ) ) :
									get_template_part( 'templates/part', 'share' );
								endif; ?>
							</div>
						<?php endwhile;
							/**
							 * Post bottom ads area
							 */
							if ( razz_get_meta( get_the_ID(), 'bottom_banner' ) != 'off' ){
								razz_ads( 4, 'ad-post-footer hidden-xs' );
							}
							// get current author info box
							if ( ( 'on' === razz_get_setting( 'author_bio_box' ) && 'on' == razz_get_meta( get_the_ID(), 'author_bio' ) ) or ! function_exists( 'fw_get_db_settings_option' ) ) {
								get_template_part( 'templates/author', 'box' );
							}
							/**
							 * Comments System (Traditional or DisQus or Facebook)
							 */
							razz_comments_system();
						else :
							get_template_part( 'templates/part', 'notfound' );
						endif;
						?>
					</div>
				</div>
				<?php
				/**
				 * Widgets area (Sidebar)
				 */
				if ( $razz_sidebar_class ): ?>
					<div class="<?php echo esc_attr( $razz_sidebar_class ); ?>">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>