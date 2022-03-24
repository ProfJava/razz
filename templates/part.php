<?php
/*
 * Default post thumbnail for standard and image post format
 * this file is visible in single.php only
 */
$thumbnail_size = 'razz_blog_post';
if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
	<div class="post-feature-box gallery-box normal-thumb">
		<?php if ( has_post_thumbnail() ): ?>
			<?php
			the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-responsive' ) );
			?>
		<?php endif; ?>
		<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
			<i class="fa fa-arrows-alt"></i>
		</a>
	</div>
<?php endif; ?>