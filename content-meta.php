<?php
/*
 * Post meta information
 * visible only on Archive pages and home page
 */
?>
<div class="post-meta">
	<?php if ( 'on' === razz_get_setting( 'general_date_meta' ) or ! function_exists( 'fw_get_db_settings_option' ) ) { ?>
		<span class="post-date" title="<?php esc_attr_e( 'Created on', 'razz' ); ?>">
			<i class="fa fa-calendar"></i>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php razz_time(); ?>
			</a>
			<meta itemprop="datePublished" content="<?php the_date( 'Y-m-d' ) ?>">
		</span>
	<?php } ?>
	<span class="post-category">
		<i class="fa fa-folder-open"></i>
		<?php the_category( ' ', '' ); ?>
	</span>
</div>