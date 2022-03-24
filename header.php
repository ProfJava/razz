<?php
$razz_title_text = $razz_sticky_nav = $razz_center_logo = $razz_retina = '';
if ( razz_get_setting( 'site_logo/tagline/center_text' ) == true ) {
	$razz_title_text = ' text-center';
}

if ( razz_get_setting( 'site_logo/logo/center_logo' ) ) {
	$razz_center_logo = ' center-block';
}

if ( 'on' === razz_get_setting( 'sticky_nav' ) ) {
	$razz_sticky_nav = ' sticky-nav';
}

if ( razz_get_setting( 'site_logo/logo/retina_select/url' ) ) {
	$razz_retina = razz_get_setting( 'site_logo/logo/retina_select/url' );
}

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<header class="main-header">
		<div class="header-block simple">
			<div class="header-tools">
				<?php if ( 'off' !== razz_get_setting( 'search_header' ) ) { ?>
                    <div class="header-search-form">
						<?php get_search_form(); ?>
                    </div>
				<?php } ?>
				<?php if ( 'off' !== razz_get_setting( 'social_header' ) ) { ?>
                    <div class="social-media-header">
						<?php razz_social_media_urls( true ); ?>
                    </div>
				<?php } ?>
            </div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
						if ( razz_get_setting( 'site_logo/gadget' ) == 'logo' && razz_get_setting( 'site_logo/logo/logo_select/url' ) ) {
							?>
							<div class="site-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
								   title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
									<img
										src="<?php echo esc_url( razz_get_setting( 'site_logo/logo/logo_select/url' ) ) ?>"
										alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"
										class="img-responsive<?php echo esc_attr( $razz_center_logo ); ?>"
										<?php if ( $razz_retina ){ ?>data-at2x="<?php echo esc_url( $razz_retina ); ?>"<?php } ?>>
								</a>
							</div>
						<?php } else {
							if ( get_bloginfo( 'name' ) ) { ?>
								<div class="slogan<?php echo esc_attr( $razz_title_text ); ?>">
									<div class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
										   title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
											<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
										</a>
									</div>
									<?php if ( get_bloginfo( 'description' ) && razz_get_setting('site_logo/tagline/tagline_display') != 'off' ) { ?>
										<p class="site-tagline">
											<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
										</p>
									<?php } ?>
								</div>
							<?php }
						} ?>
					</div>
				</div>

			</div>
		</div>
		<div class="main-menu<?php echo esc_attr( $razz_sticky_nav ); ?>">
			<div class="container">
				<nav id="navbar">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header_menu',
							'depth'          => 3,
							'container'      => false,
							'menu_class'     => 'menu',
							'fallback_cb'    => 'razz_nav_fallback'
						)
					);
					?>
				</nav>
				<div class="menu-mobile"></div>
			</div>
		</div>
		<?php
		if ( 'off' !== razz_get_setting( 'banner_box1/gadget' ) ) { ?>
			<div class="container">
				<?php razz_ads( '1', 'ad-header' ); ?>
			</div>
		<?php } ?>
	</header>

