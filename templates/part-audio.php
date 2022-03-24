<?php
/**
 * audio view from post meta
 * this file is visible in single.php only
 */
$audio_control = razz_get_meta( get_the_ID(), 'audio-box/gadget' );;
$allowed_files  = array( 'mp3', 'ogg', 'wma', 'm4a', 'wav' );
$thumbnail_size = 'razz_blog_post';
if ( $audio_control or has_post_thumbnail() ):
	?>
	<div class="post-feature-box">
		<?php
		if ( 'remote' === $audio_control ) {
			/**
			 * if the selected audio source is url print out the audio url with the service provider
			 */
			$audio_url = razz_get_meta( get_the_ID(), 'audio-box/remote/audio-url' );
			if ( $audio_url && wp_oembed_get( $audio_url ) ) {
				//display the audio embed with height 250 pixels
				echo wp_oembed_get( esc_url( $audio_url ), array( 'height' => 250 ) );
			} else {
				/**
				 * if the audio url is not valid with the default service providers show the post thumbnail
				 */
				if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
					<div class="gallery-box">
						<?php the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-responsive' ) ); ?>
						<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
							<i class="fa fa-arrows-alt"></i>
						</a>
					</div>
				<?php endif;
			}
		} elseif ( 'local' === $audio_control ) {
			/**
			 * if the selected audio source is file
			 * check the file extension with allowed files
			 * if the file is allowed run it with media element player and make the background of the player using the post thumbnail
			 */
			$audio_file = razz_get_meta( get_the_ID(), 'audio-box/local/audio-file/url' );
			$ext        = pathinfo( esc_url( $audio_file ), PATHINFO_EXTENSION ); //get file extension
			if ( in_array( $ext, $allowed_files ) ) { //make sure it supported in media element player
				$bg_style = $bg_bool = '';
				if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ) {
					$bg       = get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size );
					$bg_style = 'background-image : url(' . esc_url( $bg ) . ')';
					$bg_bool  = 'found_bg';
				}
				?>
				<div class="self-hosted-element gallery-box"<?php if ( $bg_bool === 'found_bg' ) { ?>
					style="<?php echo esc_attr( $bg_style ); ?>"<?php } ?>>
					<?php if ( has_post_thumbnail() ): ?>
						<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
							<i class="fa fa-arrows-alt"></i>
						</a>
					<?php endif; ?>
					<?php
					echo wp_audio_shortcode( array(
						'src' => esc_url( $audio_file )// run the audio player with the given audio file
					) );
					?>
				</div>
			<?php } else {
				/**
				 * if the file is not allowed show the post thumbnail
				 */
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
			/**
			 * if not url or file show the post thumbnail
			 */
			if ( has_post_thumbnail() && razz_get_meta( get_the_ID(), 'post_thumb' ) !== 'off' ): ?>
				<div class="gallery-box">
					<?php the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-responsive' ) );
					?>
					<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="magnific-gallery zoom-in">
						<i class="fa fa-arrows-alt"></i>
					</a>
				</div>
			<?php endif;
		}
		?>
	</div>
<?php endif; ?>