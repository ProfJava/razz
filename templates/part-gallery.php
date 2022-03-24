<?php
/**
 * image gallery (carousel)
 * this file is visible in single.php only
 */
$images     = razz_get_meta( get_the_ID(), 'gallery-box' );
$image_size = 'razz_blog_post'; //thumbnail size

if ( $images or has_post_thumbnail() ):
	?>
	<div class="post-feature-box gallery-box">
		<?php
		if ( $images ) {
			//Run the carousel
			?>
			<div class="owl-carousel single-slide">
				<?php
				if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): //add post thumb to carousel
					?>
					<div class="item">
						<?php the_post_thumbnail( $image_size, array( 'class' => 'img-responsive' ) ); ?>
						<a href="<?php the_post_thumbnail_url( 'full' ); ?>" title="<?php the_title_attribute(); ?>"
						   class="magnific-gallery">
							<i class="fa fa-arrows-alt"></i>
						</a>
					</div>
				<?php endif;
				foreach ( $images as $image ) {
					$file_url = wp_get_attachment_image_url( $image['attachment_id'], $image_size ); // get image url
					if ( $file_url ) {
						$caption = get_post( $image['attachment_id'] );
						?>
						<div class="item">
							<img src="<?php echo esc_url( $file_url ); ?>" alt="<?php the_title_attribute(); ?>"
							     class="img-responsive">
							<a href="<?php echo esc_url( $image['url'] ); ?>" class="magnific-gallery"
							   title="<?php echo esc_attr( $caption->post_excerpt ); ?>">
								<i class="fa fa-arrows-alt"></i>
							</a>
						</div>
						<?php
					}
				}
				?>
			</div>
			<?php
		} else {
			//if no images selected in gallery
			if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
				<?php the_post_thumbnail( $image_size, array( 'class' => 'img-responsive' ) ); ?>
				<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery">
					<i class="fa fa-arrows-alt"></i>
				</a>
			<?php endif;
		}
		?>
	</div>
<?php endif; ?>