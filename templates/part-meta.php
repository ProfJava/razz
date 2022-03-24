<?php
/*
 * visible only on singular pages
 */
global $post;
$author_id = $post->post_author;
?>
<div class="post-box-meta">
	<?php
	//If unyson plugin is not installed
	if ( ! function_exists( 'fw_get_db_settings_option' ) ) { ?>
        <span class="author" itemprop="author" title="<?php esc_attr_e( 'Author', 'razz' ); ?>">
				<i class="fa fa-user"></i>
			<?php the_author_posts_link(); ?>
			</span>
		<?php if ( is_single() ) { ?>
            <span class="category" title="<?php esc_attr_e( 'Category', 'razz' ); ?>">
				<i class="fa fa-folder-open-o"></i>
				<?php the_category( ' ', '' ); ?>
			</span>
		<?php } ?>
        <span class="post-date" title="<?php esc_attr_e( 'Created on', 'razz' ); ?>">
			<i class="fa fa-calendar"></i>
			<?php razz_time(); ?>
            <meta itemprop="datePublished" content="<?php the_date( 'Y-m-d' ) ?>">
		</span>
        <span class="like-system">
			<?php echo razz_get_likes_button( get_the_ID() ); ?>
		</span>
	<?php } else { //Unyson plugin is installed and activated ?>
		<?php if ( 'on' === razz_get_setting( 'author_name' ) && 'off' !== razz_get_meta( get_the_ID(), 'author_name' ) ) { ?>
            <span class="author" itemprop="author" title="<?php esc_attr_e( 'Author', 'razz' ); ?>">
				<i class="fa fa-user"></i>
				<a href="<?php echo get_author_posts_url( $author_id ); ?>">
					<?php the_author_meta( 'display_name', $author_id ); ?>
				</a>
			</span>
		<?php } ?>
		<?php if ( 'on' === razz_get_setting( 'date_meta' ) && 'off' !== razz_get_meta( get_the_ID(), 'date_meta' ) ) { ?>
            <span class="post-date" title="<?php esc_attr_e( 'Created on', 'razz' ); ?>">
					<i class="fa fa-calendar"></i>
				<?php razz_time(); ?>
                <meta itemprop="datePublished" content="<?php the_date( 'Y-m-d' ) ?>">
				</span>
		<?php } ?>
		<?php if ( is_single() && 'on' === razz_get_setting( 'categories_meta' ) && 'off' !== razz_get_meta( get_the_ID(), 'categories_meta' ) ) { ?>
            <span class="category" title="<?php esc_attr_e( 'Category', 'razz' ); ?>">
				<i class="fa fa-folder-open"></i>
				<?php the_category( ' ', '' ); ?>
			</span>
		<?php } ?>
		<?php if ( 'on' === razz_get_setting( 'views_meta' ) && 'off' !== razz_get_meta( get_the_ID(), 'views_meta' ) ) { ?>
            <span class="views" title="<?php esc_attr_e( 'Views', 'razz' ); ?>">
					<i class="fa fa-bolt""></i>
				<?php echo esc_html( razz_getPostViews( get_the_ID() ) ); ?>
				</span>
		<?php } ?>
		<?php if ( 'on' === razz_get_setting( 'like_meta' ) && 'off' !== razz_get_meta( get_the_ID(), 'like_meta' ) ) { ?>
            <span class="like-system">
			<?php echo razz_get_likes_button( get_the_ID() ); ?>
		</span>
		<?php } ?>
	<?php } ?>
</div>