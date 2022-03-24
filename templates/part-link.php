<?php
$url        = razz_get_meta( get_the_ID(), 'link-box' );
$image_size = 'razz_blog_post';
if ( $url ):
	$url = esc_url( $url );
	$bg     = $bg_bool = '';
	if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ) {
		$bg      = 'background-image: url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), $image_size ) ) . ')';
		$bg_bool = 'bg_found';
	}
	?>
	<div class="post-feature-box gallery-box link-box text-center">
		<?php if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ):  ?>
			<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
				<i class="fa fa-arrows-alt"></i>
			</a>
		<?php endif; ?>
		<div
			class="link-element"<?php if ( $bg_bool === 'bg_found' ): ?> style="<?php echo esc_attr( $bg ); ?>"<?php endif; ?>>
			<div class="link">
				<i class="fa fa-link"></i>
				<a href="<?php echo esc_url( $url ); ?>">
					<h3><?php echo esc_html( $url ); ?></h3>
				</a>
			</div>
		</div>
	</div>
<?php else :
	if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
		<div class="post-feature-box">
			<div class="gallery-box">
				<?php the_post_thumbnail( $image_size, array( 'class' => 'img-responsive' ) ); ?>
				<a href="<?php the_post_thumbnail_url( 'full' ); ?>" title="<?php the_title_attribute(); ?>"
				   class="magnific-gallery">
					<i class="fa fa-arrows-alt"></i>
				</a>
			</div>
		</div>
	<?php endif;
endif; ?>