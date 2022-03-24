<?php
$wink_footer_class = '';
if ( razz_get_setting( 'footer_widgets' ) === 'on' and ( is_active_sidebar( 'footer1' ) or is_active_sidebar( 'footer2' ) or is_active_sidebar( 'footer3' ) ) ) {
	$wink_footer_class = ' has-widgets';
}
if ( 'off' !== razz_get_setting( 'banner_box2/gadget' ) ) {
	razz_ads( '2', 'ad-footer' );
} ?>
<footer class="footer<?php echo esc_attr( $wink_footer_class ); ?>">
    <div class="overlay">
		<?php if ( razz_get_setting( 'footer_widgets' ) === 'on' ) { //Footer widgets
			get_sidebar( 'footer' );
		}
		//Instagram carousel
		if ( 'on' === razz_get_setting( 'footer_instagram/control' ) && razz_get_setting( 'footer_instagram/on/insta_user' ) ) {
			?>
            <div class="insta-carousel owl-carousel">
				<?php
				razz_instagram_photos_views( razz_get_setting( 'footer_instagram/on/insta_user' ), razz_get_setting( 'footer_instagram/on/limit' ) );
				?>
            </div>
			<?php
		}
		if ( razz_get_setting( 'footer_rights' ) or razz_get_setting( 'footer_rights_block' ) === 'on' ) {
		$wink_column_class = 'col-md-6';
		if ( razz_get_setting( 'footer_rights_block' ) == 'off' ) {
			$wink_column_class = 'col-md-12 text-center';
		}
		?>
    </div>
    <div class="rights">
        <div class="container">
            <div class="rights-wrapper">
                <div class="row">
                    <div class="<?php echo esc_attr( $wink_column_class ); ?>">
						<?php echo razz_get_setting( 'footer_rights' ); ?>
                    </div>
					<?php if ( razz_get_setting( 'footer_rights_block' ) != 'off' ) { ?>
                        <div class="col-md-6">
							<?php
							if ( razz_social_media_urls() && 'social' === razz_get_setting( 'footer_rights_block' ) ) { ?>
                                <div class="social-footer-icons">
									<?php razz_social_media_urls( true ); ?>
                                </div>
								<?php
							} elseif ( 'navbar' === razz_get_setting( 'footer_rights_block' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'footer_menu',
										'depth'          => - 1,
										'container'      => false,
										'menu_class'     => 'footer-menu',
										'fallback_cb'    => 'wink_nav_fallback'
									)
								);
							} ?>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
	<?php } elseif ( ! function_exists( 'fw_get_db_settings_option' ) ) { ?>
        <div class="rights">
            <div class="container">
                <div class="rights-wrapper text-center">
					<?php echo esc_html__( 'All rights reserved to', 'razz' ) . ' ' . esc_html( get_bloginfo( 'name' ) ); ?>
                </div>
            </div>
        </div>
	<?php }
	if ( razz_get_setting( 'scroll_top' ) != 'off' ) { ?>
        <div class="scroll visible-md visible-lg">
            <button id="scroll" class="razz-bob">
                <i class="fa fa-rocket fa-rotate-45"></i>
            </button>
        </div>
	<?php } ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>