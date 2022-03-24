<?php
$q_author   = razz_get_meta( get_the_ID(), 'quote-author' );
$q_text     = razz_get_meta( get_the_ID(), 'quote-body' );
$image_size = 'razz_blog_post';
if ( $q_text ) {
	$bg = $found = '';
	if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ) {
		$bg    = 'background-image: url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), $image_size ) ) . ');';
		$found = 'found';
	}
	?>
	<div class="post-feature-box quote-box gallery-box link-box text-center">
		<?php if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ) { ?>
			<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
				<i class="fa fa-arrows-alt"></i>
			</a>
		<?php } ?>
		<div class="link-element"<?php if ( $found === 'found' ): ?>
			style="<?php echo esc_attr( $bg ); ?>" <?php endif; ?>>
			<div class="link">
				<i class="fa fa-quote-left"></i>
				<p>
					<?php echo esc_html( $q_text ); ?>
				</p>
				<?php if ( $q_author ): ?>
					<cite><?php echo esc_html( $q_author ); ?></cite>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php } else {
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
} ?>
