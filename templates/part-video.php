<?php
/**
 * video view from post meta
 * this file is visible in single.php only
 */
$thumbnail_size = 'razz_blog_post';
$video_control  = razz_get_meta( get_the_ID(), 'video-box/gadget' );
$allowed_files  = array( 'mp4', 'm4v', 'webm', 'ogv', 'wmv', 'flv' );
if ( $video_control or ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ) ) {
	?>
	<div class="post-feature-box">
		<?php
		if ( 'remote' === $video_control ) {
			$video_url = razz_get_meta( get_the_ID(), 'video-box/remote/video-url' );
			if ( $video_url && wp_oembed_get( $video_url ) ) {
				echo wp_oembed_get( esc_url( $video_url ) );
			} else {
				if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
					<div class="gallery-box">
						<?php the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-responsive' ) ); ?>
						<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
							<i class="fa fa-arrows-alt"></i>
						</a>
					</div>
				<?php endif;
			}
		} elseif ( 'local' === $video_control ) {
			$video_file = razz_get_meta( get_the_ID(), 'video-box/local/video-file/url' );
			$ext        = pathinfo( esc_url( $video_file ), PATHINFO_EXTENSION ); //get file extension
			if ( $video_file && in_array( $ext, $allowed_files ) ) {
				echo wp_video_shortcode( array(
					'src' => esc_url( $video_file )// run the video player with the given video file
				) );
			} else {
				if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
					<div class="gallery-box">
						<?php the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-responsive' ) ); ?>
						<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
							<i class="fa fa-arrows-alt"></i>
						</a>
					</div>
				<?php endif;
			}
		} else {
			if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
				<div class="gallery-box">
					<?php the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-responsive' ) ); ?>
					<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
						<i class="fa fa-arrows-alt"></i>
					</a>
				</div>
			<?php endif;
		} ?>
	</div>
<?php } ?>