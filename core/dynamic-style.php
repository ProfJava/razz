<?php
/**
 * Dynamic stylesheet.
 * Working only when the unyson framework is installed.
 * The output will be in head tag ( wp_head hook ).
 */

$razz_id = $razz_singular_id = '';
if ( is_category() ) { //Get the current category id
	$razz_category = get_category( get_query_var( 'cat' ) );
	$razz_id       = $razz_category->cat_ID;

} elseif ( is_tag() ) { //Get the current tag id
	$razz_tag = get_queried_object();
	$razz_id  = $razz_tag->term_id;
}

if ( is_singular() ) { //Get the current post or page id
	$razz_singular_id = get_the_ID();
}

$accent_color             = razz_get_setting( 'accent_color' );
$scroll_color             = razz_get_setting( 'scroll_color' );
$navbar_links_color       = razz_get_setting( 'navbar_links_color' );
$navbar_links_color_hover = razz_get_setting( 'navbar_links_color_hover' );
$body_style               = razz_get_setting( 'body_style' );
?>
    .header-block {
<?php if ( razz_get_setting( 'header_spacing/padding_top' ) ) { ?>
    padding-top: <?php echo absint( razz_get_setting( 'header_spacing/padding_top' ) ); ?>px;
<?php } ?>
<?php if ( razz_get_setting( 'header_spacing/padding_bottom' ) ) { ?>
    padding-bottom: <?php echo absint( razz_get_setting( 'header_spacing/padding_bottom' ) ); ?>px;
<?php } ?>
    }

<?php
if ( $razz_id ) { // The current page is category or tag
	if ( razz_get_term_setting( $razz_id, 'body_background/control' ) != 'off' ) {
		if ( razz_get_term_setting( $razz_id, 'body_background/control' ) != 'off' ) { ?>
            body {
			<?php if ( razz_get_term_setting( $razz_id, 'body_background/background/color_select' ) ) { ?>
                background-color: <?php echo sanitize_hex_color( razz_get_term_setting( $razz_id, 'body_background/background/color_select' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_term_setting( $razz_id, 'body_background/background/image_select/url' ) ) { ?>
                background-image: url('<?php echo esc_url( razz_get_term_setting( $razz_id, 'body_background/background/image_select/url' ) ); ?>');
				<?php if ( razz_get_term_setting( $razz_id, 'body_background/background/bg_repeat' ) ) { ?>
                    background-repeat: <?php echo esc_html( razz_get_term_setting( $razz_id, 'body_background/background/bg_repeat' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_term_setting( $razz_id, 'body_background/background/bg_size' ) ) { ?>
                    background-size: <?php echo esc_html( razz_get_term_setting( $razz_id, 'body_background/background/bg_size' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_term_setting( $razz_id, 'body_background/background/bg_attach' ) ) { ?>
                    background-attachment: <?php echo esc_html( razz_get_term_setting( $razz_id, 'body_background/background/bg_attach' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_term_setting( $razz_id, 'body_background/background/bg_position' ) ) { ?>
                    background-position: <?php echo esc_html( razz_get_term_setting( $razz_id, 'body_background/background/bg_position' ) ); ?>;
				<?php } ?>
			<?php } ?>
            }
		<?php }
	} else {
		if ( razz_get_setting( 'body_background/control' ) != 'off' ) { ?>
            body {
			<?php if ( razz_get_setting( 'body_background/background/color_select' ) ) { ?>
                background-color: <?php echo sanitize_hex_color( razz_get_setting( 'body_background/background/color_select' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_setting( 'body_background/background/image_select/url' ) ) { ?>
                background-image: url('<?php echo esc_url( razz_get_setting( 'body_background/background/image_select/url' ) ); ?>');
				<?php if ( razz_get_setting( 'body_background/background/bg_repeat' ) ) { ?>
                    background-repeat: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_repeat' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_setting( 'body_background/background/bg_size' ) ) { ?>
                    background-size: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_size' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_setting( 'body_background/background/bg_attach' ) ) { ?>
                    background-attachment: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_attach' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_setting( 'body_background/background/bg_position' ) ) { ?>
                    background-position: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_position' ) ); ?>;
				<?php } ?>
			<?php } ?>
            }
		<?php }
	}
} elseif ( $razz_singular_id ) { //The current page is page or post
	if ( razz_get_meta( $razz_singular_id, 'body_background/control' ) != 'off' ) {
		if ( razz_get_meta( $razz_singular_id, 'body_background/control' ) != 'off' ) { ?>
            body {
			<?php if ( razz_get_meta( $razz_singular_id, 'body_background/background/color_select' ) ) { ?>
                background-color: <?php echo sanitize_hex_color( razz_get_meta( $razz_singular_id, 'body_background/background/color_select' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_meta( $razz_singular_id, 'body_background/background/image_select/url' ) ) { ?>
                background-image: url('<?php echo esc_url( razz_get_meta( $razz_singular_id, 'body_background/background/image_select/url' ) ); ?>');
				<?php if ( razz_get_meta( $razz_singular_id, 'body_background/background/bg_repeat' ) ) { ?>
                    background-repeat: <?php echo esc_html( razz_get_meta( $razz_singular_id, 'body_background/background/bg_repeat' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_meta( $razz_singular_id, 'body_background/background/bg_size' ) ) { ?>
                    background-size: <?php echo esc_html( razz_get_meta( $razz_singular_id, 'body_background/background/bg_size' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_meta( $razz_singular_id, 'body_background/background/bg_attach' ) ) { ?>
                    background-attachment: <?php echo esc_html( razz_get_meta( $razz_singular_id, 'body_background/background/bg_attach' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_meta( $razz_singular_id, 'body_background/background/bg_position' ) ) { ?>
                    background-position: <?php echo esc_html( razz_get_meta( $razz_singular_id, 'body_background/background/bg_position' ) ); ?>;
				<?php } ?>
			<?php } ?>
            }
		<?php }
	} else {
		if ( razz_get_setting( 'body_background/control' ) != 'off' ) { ?>
            body {
			<?php if ( razz_get_setting( 'body_background/background/color_select' ) ) { ?>
                background-color: <?php echo sanitize_hex_color( razz_get_setting( 'body_background/background/color_select' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_setting( 'body_background/background/image_select/url' ) ) { ?>
                background-image: url('<?php echo esc_url( razz_get_setting( 'body_background/background/image_select/url' ) ); ?>');
				<?php if ( razz_get_setting( 'body_background/background/bg_repeat' ) ) { ?>
                    background-repeat: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_repeat' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_setting( 'body_background/background/bg_size' ) ) { ?>
                    background-size: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_size' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_setting( 'body_background/background/bg_attach' ) ) { ?>
                    background-attachment: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_attach' ) ); ?>;
				<?php } ?>
				<?php if ( razz_get_setting( 'body_background/background/bg_position' ) ) { ?>
                    background-position: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_position' ) ); ?>;
				<?php } ?>
			<?php } ?>
            }
		<?php }
	}
} else { //any other page
	if ( razz_get_setting( 'body_background/control' ) != 'off' ) { ?>
        body {
		<?php if ( razz_get_setting( 'body_background/background/color_select' ) ) { ?>
            background-color: <?php echo sanitize_hex_color( razz_get_setting( 'body_background/background/color_select' ) ); ?>;
		<?php } ?>
		<?php if ( razz_get_setting( 'body_background/background/image_select/url' ) ) { ?>
            background-image: url('<?php echo esc_url( razz_get_setting( 'body_background/background/image_select/url' ) ); ?>');
			<?php if ( razz_get_setting( 'body_background/background/bg_repeat' ) ) { ?>
                background-repeat: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_repeat' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_setting( 'body_background/background/bg_size' ) ) { ?>
                background-size: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_size' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_setting( 'body_background/background/bg_attach' ) ) { ?>
                background-attachment: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_attach' ) ); ?>;
			<?php } ?>
			<?php if ( razz_get_setting( 'body_background/background/bg_position' ) ) { ?>
                background-position: <?php echo esc_html( razz_get_setting( 'body_background/background/bg_position' ) ); ?>;
			<?php } ?>
		<?php } ?>
        }
	<?php }
}
if ( razz_get_setting( 'logo_margin_top' ) ): ?>
    .slogan,
    .site-logo img{
    margin-top: <?php echo absint( razz_get_setting( 'logo_margin_top' ) ); ?>px;
    }
<?php endif;
// Scroll to top button color
if ( $scroll_color ): ?>
    #scroll{
    color: <?php echo sanitize_hex_color( $scroll_color ); ?>;
    }
<?php endif; ?>

    ::selection {
    background: <?php echo sanitize_hex_color( $accent_color ); ?>;
    }
    ::-moz-selection {
    background: <?php echo sanitize_hex_color( $accent_color ); ?>;
    }

    /*Border Color*/
    blockquote,
    .singular .post-box-content form input[type=submit],
    .wpcf7-form input[type=text]:focus,
    .wpcf7-form input[type=email]:focus,
    .wpcf7-form input[type=number]:focus,
    .wpcf7-form input[type=date]:focus,
    .wpcf7-form input[type=password]:focus,
    .wpcf7-form textarea:focus,
    #navbar .menu .current-menu-item a,
    #navbar .menu .current_page_item a,
    .comment-form input[type=text]:focus,
    div#comments textarea:focus,
    .widget .tagcloud a:hover{
    border-color: <?php echo sanitize_hex_color( $accent_color ); ?>;
    }

    /*Background Color*/
    .review-system .review-footer .review-score,
    .home-slider.center-slide .owl-dots .owl-dot.active span,
    #scroll{
    background-color: rgba(<?php echo razz_hex2rgb( $accent_color ); ?>, 0.7);
    }

    /*Background*/
    .blog-post.has-post-thumbnail.sticky .post-image:after,
    .list-post.has-post-thumbnail.sticky .post-image:after,
    .singular .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current,
    .singular .gallery-box .owl-prev:hover,
    .singular .gallery-box .owl-next:hover,
    .singular .post-box-content form input[type=submit],
    .widget_wink_subscribe_box .wpnl input[type=submit],
    .wpcf7-form button,
    .wpcf7-form html input[type=button],
    .wpcf7-form input[type=reset],
    .wpcf7-form input[type=submit],
    .post-navigation span:hover,
    div#comments input#submit-comment:hover,
    .CommentHeadLinks a:hover,
    .widget .tagcloud a:hover{
    background: <?php echo sanitize_hex_color( $accent_color ); ?>;
    }

    .mejs-controls .mejs-time-rail .mejs-time-current,
    .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current{
    background: <?php echo sanitize_hex_color( $accent_color ); ?> !important;
    }

    /*background-color*/
    .top-featured-posts .owl-dots .owl-dot.active span,
    .top-featured-posts .owl-dots .owl-dot:hover span,
    .top-post .top-category a,
    .singular .post-feature-box .self-hosted-element,
    .singular .post-feature-box .link-element,
    .singular .gallery-box,
    .singular .gallery-box .owl-dots .owl-dot.active,
    .singular .gallery-box .owl-dots .owl-dot:hover,
    .singular .tags a:hover,
    .singular .share-box .share-icons li a:hover:after,
    .singular .page-links a,
    .review-system .criteria .progress .progress-bar,
    .pagePagination ul .active a,
    .comments-area .navigation a:hover,
    .widget_wink_login_box .login-form .login-button,
    .widget .social_widget_container a:hover{
    background-color: <?php echo sanitize_hex_color( $accent_color ); ?>;
    }

    /*color*/
    body a:hover,
    a.liked,
    .widget a:hover,
    footer .small-post .post-content .post-title a:hover,
    .small-post .post-content .post-meta a:hover,
    .small-post .post-content .post-meta a:focus,
    .small-post .post-content .post-meta a:active,
    #navbar .menu > li > a:hover,
    .read-more .read-more-button,
    .slicknav_nav .current-menu-item a,
    .page-header h1 span,
    .blog-post .post-header .post-title a:hover,
    .blog-post .post-header .post-title a:focus,
    .blog-post .post-header .post-title a:active,
    .blog-post .post-header .post-meta a:hover,
    .blog-post .post-header .post-meta a:focus,
    .blog-post .post-header .post-meta a:active,
    .blog-post .post-header .post-meta i,
    .list-post .post-text .post-content .post-title.h4 a:hover,
    .list-post .post-text .post-content .post-title.h4 a:focus,
    .list-post .post-text .post-content .post-title.h4 a:active,
    .list-post .post-text .post-content .post-meta a:hover,
    .list-post .post-text .post-content .post-meta i,
    .small-post .post-content .post-meta i,
    .small-post .post-content .post-meta a:hover,
    .small-post .post-content .post-meta a:focus,
    .small-post .post-content .post-meta a:active,
    .read-more .read-more-button:hover,
    .read-more .read-more-button:focus,
    .read-more .read-more-button:active,
    .singular .post-box-meta span.like-system:hover i,
    .singular .post-box-meta i,
    .singular .post-box-meta a:hover,
    .singular .post-box-meta a:focus,
    .singular .post-box-meta a:active,
    .singular .edit-link a,
    .singular .post-box-content a,
    .posts-navigation .nav-links a:hover,
    div#comments h3 a:hover,
    .author-bio-box .author-info .author-name .name a:hover,
    .bypostauthor > .comment-wrap > .commentHead > .CommentHeadDetails > .comment-author:before,
    ol.comments_list .commentHead .CommentHeadDetails h4 a,
    .widget .calendar_wrap table tbody td a:hover,
    .widget.widget_recent_comments li a,
    .about-widget .about-paragraph a{
    color: <?php echo sanitize_hex_color( $accent_color ); ?>;
    }

<?php
/**
 * Get the custom typography settings from theme options and output them as css syntax to use them in the browser
 */
$typography_settings = array(
	// option id         => css element selector
	'main_font'          => 'body',
	'site_title'         => 'header .site-title a',
	'tag_line'           => 'header .site-tagline',
	'error_logo_typo'    => '.error-page .error-logo',
	'error_message_typo' => '.error-message'
);
foreach ( $typography_settings as $option => $selector ) {
	razz_typography( $selector, $option );
}

//Custom css code
if ( razz_get_setting( 'css' ) ) {
	echo razz_get_setting( 'css' );
}

