<?php get_header(); ?>
<section class="home-posts">
	<div class="container">
		<div class="row">
			<?php razz_content_area_start( 'error_sidebar' ); //Start the div ?>
			<div class="blog-column">
				<div class="post-box error-page">
					<div class="error-content">
						<?php
						if ( 'logo' === razz_get_setting( 'error_logo_style/control' ) && razz_get_setting( 'error_logo_style/logo/error_image/url' ) ) {
							$wink_image_url = razz_get_setting( 'error_logo_style/logo/error_image/url' );
							?>
							<div class="error-logo">
								<?php
								echo '<img src="' . esc_url( $wink_image_url ) . '" class="img-responsive center-block error-logo">'
								?>
							</div>
							<?php
						} elseif ( 'text' === razz_get_setting( 'error_logo_style/control' ) or ! razz_get_setting( 'error_logo_style/logo/error_image/url' ) or ! function_exists( 'fw_get_db_settings_option' ) ) {
							?>
							<div class="error-logo">
								<?php
								if ( razz_get_setting( 'error_logo_style/text/error_text' ) ) {
									echo esc_html( razz_get_setting( 'error_logo_style/text/error_text' ) );
								} else {
									esc_html_e( '404!', 'razz' );
								}
								?>
							</div>
							<?php
						}
						if ( razz_get_setting( 'error_message' ) or ! function_exists( 'fw_get_db_settings_option' ) ):
							if ( razz_get_setting( 'error_message' ) ) {
								?>
								<h4 class="text-center error-message">
									<?php
									echo esc_html( razz_get_setting( 'error_message' ) );
									?>
								</h4>
								<?php
							} elseif ( ! function_exists( 'fw_get_db_settings_option' ) ) {
								?>
								<h4 class="text-center error-message">
									<?php
									esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'razz' );
									?>
								</h4>
								<?php
							}
							if ( 'on' === razz_get_setting( 'error_search' ) or ! function_exists( 'fw_get_db_settings_option' ) ) {
								get_search_form();
							}  endif;
						?>
					</div>
				</div>
			</div>
			<?php
			razz_content_area_end(); //Close the div
			razz_sidebar_start( 'error_sidebar' ); //Start sidebar div
			get_sidebar();
			razz_sidebar_end(); //End sidebar div
			?>
		</div>

	</div>
</section>
<?php get_footer(); ?>
