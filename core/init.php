<?php
/**
 * Post and comment like system
 */
require_once RAZZ_THEME_CORE . 'like-system.php';

/**
 * Load Required Plugins
 */
require RAZZ_THEME_CORE . 'required-plugins.php';

/**
 * Load Instagram system
 */
require RAZZ_THEME_CORE . 'instagram.php';

/**
 * Load theme demos
 */
require RAZZ_THEME_CORE . 'theme_demos.php';

/**
 * Load custom widgets
 */
if ( file_exists( RAZZ_THEME_CORE . 'widgets/widgets.php' ) ) {
	require RAZZ_THEME_CORE . 'widgets/widgets.php';
}

/**
 * Set the content width based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 748;/* pixels */
}

add_action( 'after_setup_theme', 'razz_theme_setup' );
if ( ! function_exists( 'razz_theme_setup' ) ) {
	function razz_theme_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		load_theme_textdomain( 'razz', get_template_directory() . '/languages' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'quote', 'gallery', 'video', 'audio', 'link' ) );
		register_nav_menus( array(
			'header_menu' => esc_html__( 'Primary Menu', 'razz' ),
			'footer_menu' => esc_html__( 'Footer Menu', 'razz' ),
		) );
		add_image_size( 'razz_main_slider', 1160, 580, true );
		add_image_size( 'razz_blog_post', 750, 380, true );
		add_image_size( 'razz_big_post', 360, 265, true );
		add_image_size( 'razz_categories_widget', 360, 70, true );
		add_image_size( 'razz_small_post', 100, 70, true );
	}
}

/**
 * Get all theme setting from database when unyson framework plugin is activated
 */
function razz_get_setting( $option_id, $default_value = null ) {
	if ( function_exists( 'fw_get_db_settings_option' ) ) {
		return fw_get_db_settings_option( $option_id, $default_value );
	} else {
		return false;
	}
}

/**
 * Get post meta from database when unyson framework plugin is activated
 */
function razz_get_meta( $post_id, $option_id, $default_value = null ) {
	if ( function_exists( 'fw_get_db_post_option' ) ) {
		return fw_get_db_post_option( $post_id, $option_id, $default_value );
	} else {
		return false;
	}
}

/**
 * Get term meta from database when unyson framework plugin is activated
 */
function razz_get_term_setting( $cat_id, $option_id, $tax = '', $default_value = null ) {
	if ( function_exists( 'fw_get_db_term_option' ) ) {
		if ( is_category() ) {
			$tax = 'category';
		} elseif ( is_tag() ) {
			$tax = 'post_tag';
		}

		return fw_get_db_term_option( $cat_id, $tax, $option_id, $default_value );
	} else {
		return false;
	}
}


/**
 * load theme scripts
 */
add_action( 'wp_enqueue_scripts', 'razz_enqueue_scripts' );
if ( ! function_exists( 'razz_enqueue_scripts' ) ) {
	function razz_enqueue_scripts() {
		// Css files
		$styles = array(
			'font-awesome' => 'font-awesome.css',//font awesome lib
			'bootstrap'    => 'bootstrap.css',//Bootstrap lib
			'magnific'     => 'magnific-popup.css', //Magnific Popup
			'owl-css'      => 'owl.carousel.css'//Owl carousel
		);

		foreach ( $styles as $key => $sc ) {
			wp_enqueue_style( $key, RAZZ_THEME_CSS_URI . $sc );
		}

		//Default theme font
		if ( razz_fonts_url() == '' ) {
			wp_enqueue_style( 'default-font', 'https://fonts.googleapis.com/css?family=Lato' );
		} else {
			wp_enqueue_style( 'google-fonts', razz_fonts_url(), array() );//google Fonts
		}

		//Default stylesheet file (style.css)
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		//Javascript files
		if ( razz_get_setting( 'code_highlight' ) == 'on' ) {
			//Code highlighting lib
			wp_enqueue_script( 'code-highlight', RAZZ_THEME_JS_URI . 'highlight.js', array( 'jquery' ), '1.0', true );
		}

		if ( 'on' === razz_get_setting( 'sticky_nav' ) ) {
			wp_enqueue_script( 'imagesloaded' );
		}

		$scripts = array(
			'bootstrap'      => 'bootstrap.js',
			'magnific-popup' => 'jquery.magnific-popup.js',
			'theia-sticky'   => 'theia-sticky-sidebar.js',
			'slick-nav'      => 'jquery.slicknav.min.js',
			'fitvids'        => 'jquery.fitvids.js',
			'owl-carousel'   => 'owl.carousel.min.js',
			'main'           => 'main.js'
		);

		foreach ( $scripts as $alias => $src ) {
			wp_enqueue_script( $alias, RAZZ_THEME_JS_URI . $src, array( 'jquery' ), '1.0', true );
		}

		if ( is_singular() ) {
			wp_enqueue_script( "comment-reply" );
		}
		razz_meta_data();
	}
}

/**
 * For improving page loading speed
 * Removing Query String From The Static Resources
 */
add_filter( 'script_loader_src', 'razz_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'razz_remove_script_version', 15, 1 );
function razz_remove_script_version( $src ) {
	if ( strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

/**
 * Setup selected google fonts from theme options and add the link to database
 */
add_action( 'fw_settings_form_saved', 'razz_process_google_fonts', 999, 2 );
function razz_process_google_fonts() {
	if ( function_exists( 'fw_get_db_settings_option' ) ) {
		$include_from_google = array();
		$google_fonts        = fw_get_google_fonts();

		$fonts = array(
			fw_get_db_settings_option( 'site_title/family' ),
			fw_get_db_settings_option( 'tag_line/family' ),
			fw_get_db_settings_option( 'main_font/family' ),
			fw_get_db_settings_option( 'error_logo_typo/family' ),
			fw_get_db_settings_option( 'error_message_typo/family' ),
		);

		foreach ( $fonts as $font ) {
			if ( isset( $google_fonts[ $font ] ) ) {
				$include_from_google[ $font ] = $google_fonts[ $font ];
			}
		}

		$google_fonts_links = razz_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'google_fonts_include', $google_fonts_links );
	}
}

/**
 * Create the google fonts link tag
 */
if ( ! function_exists( 'razz_get_remote_fonts' ) ) {
	function razz_get_remote_fonts( $include_from_google ) {
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}
		$html = '';
		foreach ( $include_from_google as $font => $styles ) {
			$html .= $font . ':' . implode( ',', $styles['variants'] ) . '|';
		}
		$html = substr( $html, 0, - 1 );

		return $html;
	}
}

/**
 * Register Google Fonts
 * @return string google fonts full url
 */
if ( ! function_exists( 'razz_fonts_url' ) ) {
	function razz_fonts_url() {
		$fonts_url = '';
		/*
		 * Detect if google fonts selected and saved in database
		 */
		if ( get_option( 'google_fonts_include' ) != '' ) {
			/*
			 * Translators: If there are characters in your language that are not supported
			 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Google fonts: on or off (Do not translate this into your own language)', 'razz' ) ) {
				$fonts_url = add_query_arg( 'family', urlencode( get_option( 'google_fonts_include' ) ), "//fonts.googleapis.com/css" );
			}
		}

		return $fonts_url;
	}
}

add_action( 'razz_categories_widget', 'razz_categories_html' );
function razz_categories_html() {
	//razz_get_meta
	$categories = get_categories();
	//fw_print( get_categories() );

	echo '<div class="razz-categories">';
	foreach ( $categories as $category ) {
		$cat_id    = $category->cat_ID;
		$cat_name  = $category->name;
		$cat_count = $category->count;
		$cat_url   = get_category_link( $cat_id );
		$cat_thumb = wp_get_attachment_image_src( razz_get_term_setting( $cat_id, 'image_select/attachment_id', 'category' ), 'razz_categories_widget' );
		echo '<div class="razz-category razz-category-' . esc_attr( $cat_id ) . '">';
		if ( $cat_thumb ) {
			echo '<div class="razz-category-thumb">';
			echo '<img src="' . esc_url( $cat_thumb[0] ) . '" alt="' . esc_attr( $cat_name ) . '" title="' . esc_attr( $cat_name ) . '" class="img-responsive"/>';
			echo '</div>';
		}
		echo '<div class="razz-category-title">';
		echo '<a href="' . esc_url( $cat_url ) . '" title="' . esc_attr( $cat_name ) . '">' . esc_html( $cat_name ) . ' ( ' . esc_html( $cat_count ) . ' )</a>';
		echo '</div>';
		echo '<div class="razz-category-overlay"></div>';
		echo '</div>';
	}
	echo '</div>';
}

/**
 * Print typography properties with css syntax
 *
 * @param $selector string css selector
 * @param $option string theme option id
 * @param string $before string wrapper start
 * @param string $after string wrapper end
 */
function razz_typography( $selector, $option, $before = '', $after = '' ) {
	if ( razz_get_setting( $option ) ) {
		$font_styles  = array( 'normal', 'italic', 'oblique' ); //All available font styles
		$font_weights = array( 'bold', 'bolder', 'lighter', 'regular' ); //All available font weights
		echo esc_html( $before );
		if ( razz_get_setting( $option . '/family' ) ) {
			//Css selector
			echo esc_html( $selector ) . ' {';
			//Font family
			echo esc_html( 'font-family: ' . razz_get_setting( $option . '/family' ) . ';' );
			if ( razz_get_setting( $option . '/size' ) ) {
				//Font size
				echo esc_html( 'font-size: ' . razz_get_setting( $option . '/size' ) . 'px;' );
			}
			if ( razz_get_setting( $option . '/variation' ) ) {
				if ( ctype_digit( razz_get_setting( $option . '/variation' ) ) ) {
					//Numbers only
					echo esc_html( 'font-weight: ' . intval( razz_get_setting( $option . '/variation' ) ) . ';' );
				} elseif ( ctype_alpha( razz_get_setting( $option . '/variation' ) ) ) {
					//Letters only
					if ( in_array( razz_get_setting( $option . '/variation' ), $font_weights ) ) {
						// Font weight
						if ( razz_get_setting( $option . '/variation' ) == 'regular' ) {
							echo esc_html( 'font-weight: normal;' );
						} else {
							echo esc_html( 'font-weight: ' . razz_get_setting( $option . '/variation' ) . ';' );
						}
					} elseif ( in_array( razz_get_setting( $option . '/variation' ), $font_styles ) ) {
						//Font style
						echo esc_html( 'font-style: ' . razz_get_setting( $option . '/variation' ) . ';' );
					}
				} elseif ( ctype_alnum( razz_get_setting( $option . '/variation' ) ) ) {
					//Letters and numbers
					echo esc_html( 'font-weight: ' . intval( substr( razz_get_setting( $option . '/variation' ), 0, 3 ) ) . ';' );
					echo esc_html( 'font-style: ' . substr( razz_get_setting( $option . '/variation' ), 3 ) . ';' );
				}
			}
			if ( razz_get_setting( $option . '/color' ) ) {
				//Font color
				echo esc_html( 'color: ' . sanitize_hex_color( razz_get_setting( $option . '/color' ) ) . ';' );
			}
			if ( ctype_digit( razz_get_setting( $option . '/letter-spacing' ) ) ) {
				//Letter spacing
				echo esc_html( 'letter-spacing: ' . razz_get_setting( $option . '/letter-spacing' ) . 'px;' );
			}
			if ( ctype_digit( razz_get_setting( $option . '/line-height' ) ) ) {
				//Line height
				echo esc_html( 'line-height: ' . razz_get_setting( $option . '/line-height' ) . 'px;' );
			}
			echo '}';
		}
		echo esc_html( $after );
	}
}

add_action( 'wp_head', 'razz_user_custom_scripts' );
if ( ! function_exists( 'razz_user_custom_scripts' ) ) {
	function razz_user_custom_scripts() {
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			echo '<style type="text/css">';
			require RAZZ_THEME_CORE . 'dynamic-style.php';
			echo '</style>';
		}


		if ( razz_get_setting( 'css_min_480' ) ) {
			?>
            <style media="screen and (min-width:480px)">
                <?php echo razz_get_setting( 'css_min_480' ); ?>
            </style>
			<?php
		}
		if ( razz_get_setting( 'css_min_768' ) ) {
			?>
            <style media="screen and (min-width:768px)">
                <?php echo razz_get_setting( 'css_min_768' ); ?>
            </style>
			<?php
		}

		if ( razz_get_setting( 'css_max_768' ) ) {
			?>
            <style media="screen and (max-width:768px)">
                <?php echo razz_get_setting( 'css_max_768' ); ?>
            </style>
			<?php
		}

		if ( razz_get_setting( 'css_min_992' ) ) {
			?>
            <style media="screen and (min-width:992px)">
                <?php echo razz_get_setting( 'css_min_992' ); ?>
            </style>
			<?php
		}

		if ( razz_get_setting( 'css_max_992' ) ) {
			?>
            <style media="screen and (max-width:992px)">
                <?php echo razz_get_setting( 'css_max_992' ); ?>
            </style>
			<?php
		}

		if ( razz_get_setting( 'css_min_1200' ) ) {
			?>
            <style media="screen and (min-width:1200px)">
                <?php echo razz_get_setting( 'css_min_1200' ); ?>
            </style>
			<?php
		}

		if ( razz_get_setting( 'css_max_1200' ) ) {
			?>
            <style media="screen and (max-width:1200px)">
                <?php echo razz_get_setting( 'css_max_1200' ); ?>
            </style>
			<?php
		}

		//Custom Javascript code
		if ( razz_get_setting( 'js' ) ) {
			?>
            <script type="text/javascript">
				<?php echo razz_get_setting( 'js' ); ?>
            </script>
			<?php
		}
		//App icons
		if ( razz_get_setting( 'favicon/attachment_id' ) ): ?>
            <link rel="shortcut icon"
                  href="<?php echo esc_url( wp_get_attachment_image_url( razz_get_setting( 'favicon/attachment_id' ), 'thumbnail', true ) ); ?>"/>
		<?php endif;
		if ( razz_get_setting( 'apple57/url' ) ): ?>
            <link rel="apple-touch-icon-precomposed" sizes="57x57"
                  href="<?php echo esc_url( razz_get_setting( 'apple57/url' ) ); ?>"/>
		<?php endif; ?>
		<?php if ( razz_get_setting( 'apple72/url' ) ): ?>
            <link rel="apple-touch-icon-precomposed" sizes="72x72"
                  href="<?php echo esc_url( razz_get_setting( 'apple72/url' ) ); ?>"/>
		<?php endif;
		if ( razz_get_setting( 'apple114/url' ) ): ?>
            <link rel="apple-touch-icon-precomposed" sizes="114x114"
                  href="<?php echo esc_url( razz_get_setting( 'apple114/url' ) ); ?>"/>
            <meta name="msapplication-TileImage"
                  content="<?php echo esc_url( razz_get_setting( 'apple114/url' ) ); ?>">

		<?php endif; ?>
        <meta name="application-name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
		<?php
		//Google chrome theme color for mobile devices
		$main_color = '#CD483C'; //The Default red color
		if ( razz_get_setting( 'accent_color' ) ) {
			$main_color = razz_get_setting( 'accent_color' );
		}
		?>
        <meta name="theme-color" content="<?php echo sanitize_hex_color( $main_color ); ?>">
		<?php
	}
}

add_action( 'wp_footer', 'razz_footer_js' );
function razz_footer_js() {
	if ( razz_get_setting( 'footer_js' ) ) {
		?>
        <script type="text/javascript">
			<?php echo razz_get_setting( 'footer_js' ); ?>
        </script>
		<?php
	}
}

/**
 * Hex colors sanitize
 */
if ( ! function_exists( 'sanitize_hex_color' ) ) {
	function sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}
		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}
	}
}

/**
 * utility to convert colors from hex to rgb
 *
 * @param $hex string color in hexadecimal type
 *
 * @return string color in rgb type
 */
function razz_hex2rgb( $hex ) {
	$hex = sanitize_hex_color( $hex );
	$hex = str_replace( "#", "", $hex );
	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );

	return implode( ",", $rgb ); // returns the rgb values separated by commas
	//return $rgb; // returns an array with the rgb values
}

/**
 * Add 'wink-class' class to body tag
 */
add_filter( 'body_class', 'razz_class_name' );
if ( ! function_exists( 'razz_class_name' ) ) {
	function razz_class_name( $classes ) {
		$classes[] = 'razz-class';

		if ( razz_get_setting( 'code_highlight' ) == 'on' ) {
			$classes[] = 'razz-code'; //code highlighting toggle
		}


		return $classes;
	}
}

/**
 * Add theme version in wp-admin footer
 */
add_filter( 'update_footer', 'razz_footer_version', 12 );
function razz_footer_version( $html ) {
	if ( ( current_user_can( 'update_themes' ) || current_user_can( 'update_plugins' ) ) && defined( "FW" ) ) {
		return ( empty( $html ) ? '' : $html . ' | ' ) . fw()->theme->manifest->get( 'name' ) . ' ' . fw()->theme->manifest->get( 'version' );
	} else {
		return $html;
	}
}

/**
 * Add help links to admin bar ( Online documentation, Theme settings page and bbioonThemes profile url )
 */
add_action( 'admin_bar_menu', 'razz_toolbar_links', 999 );
function razz_toolbar_links( $wp_admin_bar ) {
	if ( current_user_can( 'administrator' ) && defined( "FW" ) && ! is_admin() ) {
		//Theme options
		$args_1 = array(
			'id'    => 'wink_settings',
			'title' => esc_html__( 'Theme Settings', 'razz' ),
			'href'  => admin_url( 'themes.php?page=fw-settings' ),
			'meta'  => array( 'class' => 'setting-page' )
		);
		$wp_admin_bar->add_node( $args_1 );
		//Documentation
		$args_2 = array(
			'id'     => 'wink_doc',
			'title'  => esc_html__( 'Online Documentation', 'razz' ),
			'parent' => 'wink_settings',
			'href'   => 'docs.bbioon.com/wink',
			'meta'   => array( 'class' => 'wink-documentation-page', 'target' => '_blank' )
		);
		$wp_admin_bar->add_node( $args_2 );
		//Link to profile on themeforest
		$args_3 = array(
			'id'     => 'author_profile',
			'title'  => esc_html__( 'By BbioonThemes', 'razz' ),
			'parent' => 'wink_settings',
			'href'   => 'themeforest.net/user/bbioonthemes',
			'meta'   => array( 'target' => '_blank' )
		);
		$wp_admin_bar->add_node( $args_3 );
	}
}

/**
 * add scripts and styles to admin screen
 */
add_action( 'admin_enqueue_scripts', 'razz_admin_scripts' );
if ( ! function_exists( 'razz_admin_scripts' ) ) {
	function razz_admin_scripts() {
		wp_enqueue_style( 'admin_fontawesome', RAZZ_THEME_CSS_URI . 'font-awesome.css' );
		wp_enqueue_style( 'admin_style', RAZZ_THEME_CORE_URI . 'scripts/admin-stylesheet.css' );
		wp_enqueue_script( 'post_format', RAZZ_THEME_CORE_URI . 'scripts/post-formats.js' );
	}
}

/**
 * Set posts layout for certain page
 *
 * @param $page_name --> (string) Page name
 */
if ( ! function_exists( 'razz_posts_layout' ) ) {
	function razz_posts_layout( $page_name ) {
		if ( 'list' === razz_get_setting( $page_name . '_posts_style' ) ) {
			get_template_part( 'recent', 'list' );
		} elseif ( 'blog-list' === razz_get_setting( $page_name . '_posts_style' ) ) {
			get_template_part( 'recent', 'blog-list' );
		} elseif ( 'grid' === razz_get_setting( $page_name . '_posts_style' ) ) {
			get_template_part( 'recent', 'grid' );
		} elseif ( 'blog-grid' === razz_get_setting( $page_name . '_posts_style' ) ) {
			get_template_part( 'recent', 'blog-grid' );
		} else {
			get_template_part( 'recent', 'blog' );
		}
	}
}

/**
 * Content area layout
 *col-md-push-2
 *
 * @param $page_name -- page name in theme options page
 */
if ( ! function_exists( 'razz_content_area_start' ) ) {
	function razz_content_area_start( $page_name ) {
		$sidebar_position = razz_get_setting( $page_name );

		if ( $sidebar_position == 'left_sidebar' ) {
			echo '<div class="col-md-8 col-xs-12 col-md-push-4 with-sidebar left-sidebar">';
		} elseif ( $sidebar_position == 'right_sidebar' ) {
			echo '<div class="col-md-8 col-xs-12 with-sidebar right-sidebar">';
		} elseif ( $sidebar_position == 'none' ) {
			echo '<div class="col-md-8 col-md-push-2 col-xs-12 no-sidebar">';
		} else {
			echo '<div class="col-md-8 col-xs-12">';
		}
	}
}

if ( ! function_exists( 'razz_content_area_end' ) ) {
	function razz_content_area_end() {
		echo '</div>';
	}
}

/**
 * Sidebar area layout
 *
 * @param $page_name -- page name in theme options page
 */
if ( ! function_exists( 'razz_sidebar_start' ) ) {
	function razz_sidebar_start( $page_name ) {
		$sticky_sidebar   = $sidebar_position = '';
		$sidebar_position = razz_get_setting( $page_name );
		if ( 'on' === razz_get_setting( 'sticky_sidebar' ) ) {
			$sticky_sidebar = 'sticky-sidebar ';
		}
		if ( $sidebar_position == 'left_sidebar' ) {
			echo '<div class="' . esc_attr( $sticky_sidebar ) . 'col-md-4 col-xs-12 col-md-pull-8">';
		} elseif ( $sidebar_position == 'right_sidebar' ) {
			echo '<div class="' . esc_attr( $sticky_sidebar ) . 'col-md-4 col-xs-12">';
		} elseif ( $sidebar_position == 'none' ) {
			echo '<div class="hide">';
		} else {
			echo '<div class="' . esc_attr( $sticky_sidebar ) . 'col-md-4 col-xs-12">';
		}
	}
}

if ( ! function_exists( 'razz_sidebar_end' ) ) {
	function razz_sidebar_end() {
		echo '</div>';
	}
}


/**
 * Register our sidebars and widgetized areas.
 */
add_action( 'widgets_init', 'razz_widget_area' );
if ( ! function_exists( 'razz_widget_area' ) ) {
	function razz_widget_area() {
		$args = array(
			array(
				'name'          => esc_html__( 'Primary Sidebar', 'razz' ),
				'id'            => 'home_side_bar',
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title"><span>',
				'after_title'   => '</span></h4>'
			),
			array(
				'name'          => esc_html__( 'Footer one', 'razz' ),
				'id'            => 'footer1',
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title"><span>',
				'after_title'   => '</span></h4>'
			),
			array(
				'name'          => esc_html__( 'Footer two', 'razz' ),
				'id'            => 'footer2',
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title"><span>',
				'after_title'   => '</span></h4>'
			),
			array(
				'name'          => esc_html__( 'Footer three', 'razz' ),
				'id'            => 'footer3',
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title"><span>',
				'after_title'   => '</span></h4>'
			)
		);
		foreach ( $args as $arg ) {
			register_sidebar( $arg );
		}
	}
}


/**
 * @param $exstra_class
 *
 * @return int $i --> determine the count of active widget areas in footer to add bootstrap grid classes
 */
if ( ! function_exists( 'razz_active_widgets' ) ) {
	function razz_active_widgets( $exstra_class = null ) {
		$i = 0;
		if ( is_active_sidebar( 'footer1' ) ) {
			$i ++;
		}
		if ( is_active_sidebar( 'footer2' ) ) {
			$i ++;
		}
		if ( is_active_sidebar( 'footer3' ) ) {
			$i ++;
		}
		switch ( $i ) {
			case 3:
				echo 'class="col-md-4 col-xs-12 ' . esc_attr( $exstra_class ) . '"';
				break;
			case 2:
				echo 'class="col-md-6 col-xs-12 ' . esc_attr( $exstra_class ) . '"';
				break;
			case 1:
				echo 'class="col-md-12 col-sm-12 col-xs-12 ' . esc_attr( $exstra_class ) . '"';
				break;
			default :
				echo 'class="col-md-4 col-xs-12 no-active-widgets ' . esc_attr( $exstra_class ) . '"';
		}
	}
}

/**
 * WordPress Excerpt Length
 * */
if ( ! function_exists( 'razz_excerpt_global_length' ) ) {
	function razz_excerpt_global_length( $length ) {
		$len = absint( razz_get_setting( 'post_excerpt' ) );
		if ( $len ) {
			return $len;
		} else {
			return 40;
		}

	}
}

function razz_excerpt() {
	add_filter( 'excerpt_length', 'razz_excerpt_global_length', 999 );
	echo get_the_excerpt();
}

/**
 * Read More text
 *
 */
add_filter( 'excerpt_more', 'razz_remove_excerpt' );
if ( ! function_exists( 'razz_remove_excerpt' ) ) {
	function razz_remove_excerpt( $more ) {
		return '...';
	}
}

/**
 * Read on button html
 *
 */
add_action( 'razz_read_more', 'razz_read_more_button' );
function razz_read_more_button() {
	if ( razz_get_setting( 'read_more' ) !== 'off' ) {
		?>
        <div class="read-more">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
               class="read-more-button">
				<?php esc_html_e( 'Read On', 'razz' ); ?>
            </a>
        </div>
		<?php
	}
}

/**
 * Posts Pagination
 */
if ( ! function_exists( 'razz_pagination' ) ) {
	function razz_pagination() {
		if ( is_singular() ) {
			return;
		}
		global $wp_query;
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		echo '<div class="pagePagination"><ul>' . "\n";
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
			if ( ! in_array( 2, $links ) ) {
				echo '<li><span>...</span></li>';
			}
		}
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) ) {
				echo '<li><span>...</span></li>' . "\n";
			}

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}
		echo '</ul></div>' . "\n";
	}
}

/**
 * this function returns array of social media urls (in html) with it's fontawesome icon
 * or print them if $echo is true
 *
 * @param $echo bool
 *
 * @return mixed array of social media html anchors or print them if $echo is true
 */
if ( ! function_exists( 'razz_social_media_urls' ) ) {
	function razz_social_media_urls( $echo = false ) {
		$icons = razz_get_setting( 'social_icon' );
		if ( ! $icons ) {
			return false;
		}
		$icon_html = array();
		foreach ( $icons as $icon ) {
			if ( $icon['url'] && $icon['icon'] ) {
				//create icon and add it to the array
				$tab         = $icon['tab'] ? '_blank' : '';
				$icon_html[] = '<a href="' . esc_url( $icon['url'] ) . '" ' . 'class="social-icon ' . esc_attr( strtolower( str_replace( ' ', '-', $icon['title'] ) ) ) . '" ' . 'title="' . $icon['title'] . '" target="' . esc_attr( $tab ) . '"><i class="fa ' . esc_attr( $icon['icon'] ) . '"></i></a>';
			}
		}
		// print the given icons
		if ( $echo && $icon_html ) {
			foreach ( $icon_html as $one_icon ) {
				echo $one_icon;
			}

			//Return the given icons into array
		} elseif ( $echo == false && $icon_html ) {
			return $icon_html;
		}

	}
}

/*
 * Set open graph meta data
 */
if ( ! function_exists( 'razz_meta_data' ) ) {
	function razz_meta_data() {
		global $post;
		$post_thumb = '';
		if ( function_exists( "has_post_thumbnail" ) && has_post_thumbnail() ) {
			$post_thumb = get_the_post_thumbnail_url( $post->ID );
		}
		$title       = get_bloginfo( 'name' );
		$description = get_bloginfo( 'description' );
		$type        = 'website';
		if ( is_singular() ) {
			$title       = strip_shortcodes( strip_tags( ( get_the_title() ) ) ) . ' - ' . get_bloginfo( 'name' );
			$description = strip_tags( $post->post_content );
			$type        = 'article';
			?>
            <meta property="og:url" content="<?php the_permalink(); ?>"/>
			<?php
		}
		?>
        <meta property="og:title" content="<?php echo esc_attr( $title ); ?>"/>
        <meta property="og:type" content="<?php echo esc_attr( $type ); ?>"/>
        <meta property="og:description" content="<?php echo esc_attr( wp_html_excerpt( $description, 100 ) ); ?>"/>
        <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"/>
		<?php
		if ( ! empty( $post_thumb ) && is_singular() ) {
			echo '<meta property="og:image" content="' . esc_url( $post_thumb ) . '" />' . "\n";
		} elseif ( razz_get_setting( 'site_logo/gadget' ) == 'logo' && razz_get_setting( 'site_logo/logo/logo_select/url' ) ) {
			echo '<meta property="og:image" content="' . esc_url( razz_get_setting( 'site_logo/logo/logo_select/url' ) ) . '" />' . "\n";
		}
		//App ID for facebook Comments
		if ( 'facebook' === razz_get_setting( 'comments_system/control' ) && razz_get_setting( 'comments_system/facebook/app_id' ) ) {
			echo '<meta property="fb:app_id" content="' . esc_attr( razz_get_setting( 'comments_system/facebook/app_id' ) ) . '" />';
		}
	}
}

/**
 * Ads area ids -> header(1) - footer(2) - top_article(3) - bottom_article(4)
 *
 * @param $ads_id int Ad area -> header(1) - footer(2) - top_article(3) - bottom_article(4)
 * @param $class_attr string html class attr
 *
 */
function razz_ads( $ads_id, $class_attr = 'ads-banner' ) {
	$control = razz_get_setting( 'banner_box' . $ads_id . '/gadget' );
	if ( 'code' == $control ) {
		if ( razz_get_setting( 'banner_box' . $ads_id . '/code/code_block' ) ) { ?>
            <div class="<?php echo esc_attr( $class_attr ) ?>">
				<?php echo do_shortcode( htmlspecialchars_decode( razz_get_setting( 'banner_box' . $ads_id . '/code/code_block' ) ) ); ?>
            </div>
		<?php }
	} elseif ( 'image' == $control ) {
		if ( razz_get_setting( 'banner_box' . $ads_id . '/image/img' ) ) {
			$target = $nofollow = false;
			if ( razz_get_setting( 'banner_box' . $ads_id . '/image/tab' ) ) {
				$target = true;
			}
			if ( razz_get_setting( 'banner_box' . $ads_id . '/image/follow' ) ) {
				$nofollow = true;
			}
			?>
            <div class="<?php echo esc_attr( $class_attr ) ?>">
                <a href="<?php echo esc_url( razz_get_setting( 'banner_box' . $ads_id . '/image/url' ) ); ?>"
                   title="<?php echo esc_attr( razz_get_setting( 'banner_box' . $ads_id . '/image/alt' ) ); ?>"<?php if ( $target ) { ?> target="_blank"<?php } ?><?php if ( $nofollow ) { ?> rel="nofollow"<?php } ?>>
                    <img
                            src="<?php echo esc_url( razz_get_setting( 'banner_box' . $ads_id . '/image/img/url' ) ); ?>"
                            alt="<?php echo esc_attr( razz_get_setting( 'banner_box' . $ads_id . '/image/alt' ) ); ?>"
                            class="img-responsive"/>
                </a>
            </div>
			<?php
		}
	}
}

/**
 * This function returns the views count for the current post id
 *
 * @param $postID -> The current post id
 *
 * @return string -> post views count
 */
function razz_getPostViews( $postID ) {
	if ( razz_get_setting( 'views_key' ) ) {
		$count_key = razz_get_setting( 'views_key' );
	} else {
		$count_key = 'bbioon_post_views';
	}

	$count = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );

		return esc_html__( '0 view', 'razz' );
	} else {
		return $count;
	}
}


function razz_setPostViews( $postID ) {
	if ( razz_get_setting( 'views_key' ) ) {
		$count_key = razz_get_setting( 'views_key' );
	} else {
		$count_key = 'bbioon_post_views';
	}
	$count = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}

}

/**
 * This function set post view count for the current post id only for visitor not the logged-in user
 *
 * @param $post_id -> The current post id
 */
add_action( 'wp_head', 'razz_count_popular_posts' );
function razz_count_popular_posts( $post_id ) {
	if ( ! is_singular() ) {
		return;
	}
	if ( ! is_user_logged_in() ) {
		if ( empty ( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}
		razz_setPostViews( $post_id );
	}
}


// Add it to a column in WP-Admin
add_filter( 'manage_posts_columns', 'razz_posts_column_views' );
function razz_posts_column_views( $defaults ) {
	$defaults['post_views'] = esc_html__( 'Views Count', 'razz' );

	return $defaults;
}

add_action( 'manage_posts_custom_column', 'razz_posts_custom_column_views', 5, 2 );
function razz_posts_custom_column_views( $column_name ) {
	if ( $column_name === 'post_views' ) {
		echo (int) get_post_meta( get_the_ID(), 'bbioon_post_views', true );
	}
}

/**
 * Navbar Fallback
 */
if ( ! function_exists( 'razz_nav_fallback' ) ) {
	function razz_nav_fallback() {
		echo '<ul class="navbar-alert"><li><span class="fall-back">' . esc_html__( 'Use WP menu builder to build menus', 'razz' ) . '</span></li></ul>';
	}
}

/**
 * Display html code for login form or logged in user data
 */
if ( ! function_exists( 'razz_login_form' ) ) {
	function razz_login_form( $login_only = 0 ) {
		global $user_ID, $user_level, $user_identity;
		$redirect = site_url();

		if ( $user_ID ) : ?>
			<?php if ( empty( $login_only ) ): ?>
                <div class="user-login">
                    <div class="author-avatar"><?php echo get_avatar( $user_ID, $size = '80' ); ?></div>
                    <p class="welcome-text"><?php esc_html_e( 'Welcome', 'razz' ); ?>
                        <strong><?php echo $user_identity ?></strong> .</p>
                    <ul>
                        <li><a href="<?php echo admin_url(); ?>"><?php esc_html_e( 'Dashboard', 'razz' ); ?> </a></li>
                        <li>
                            <a href="<?php echo admin_url(); ?>profile.php"><?php esc_html_e( 'Your Profile', 'razz' ); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo wp_logout_url( $redirect ); ?>"><?php esc_html_e( 'Logout', 'razz' ); ?> </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
			<?php endif; ?>
		<?php else: ?>
            <div class="login-form">
                <form name="loginform"
                      action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                    <p class="log-username">
                        <input type="text" name="log" class="log"
                               title="<?php esc_html_e( 'Username', 'razz' ); ?>"
                               placeholder="<?php esc_html_e( 'Username', 'razz' ); ?>"
                               size="33"/>
                    </p>
                    <p class="log-pass">
                        <input type="password" name="pwd" class="pwd"
                               title="<?php esc_html_e( 'Password', 'razz' ); ?>"
                               placeholder="<?php esc_html_e( 'Password', 'razz' ); ?>"
                               size="33"/>
                    </p>
                    <input type="submit" name="submit" value="<?php esc_html_e( 'Log in', 'razz' ) ?>"
                           class="login-button"/>
                    <label for="rememberme"><input id="rememberme" name="rememberme" class="rememberme" type="checkbox"
                                                   checked="checked"
                                                   value="forever"/> <?php esc_html_e( 'Remember Me', 'razz' ); ?>
                    </label>
                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
                </form>
                <ul class="login-links">
					<?php echo wp_register(); ?>
                    <li>
                        <a href="<?php echo wp_lostpassword_url( $redirect ) ?>"><?php esc_html_e( 'Lost your password?', 'razz' ); ?></a>
                    </li>
                </ul>
            </div>
		<?php endif;
	}
}

/**
 * Add user's social accounts
 *
 */
add_action( 'show_user_profile', 'razz_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'razz_show_extra_profile_fields' );
if ( ! function_exists( 'razz_show_extra_profile_fields' ) ) {
	function razz_show_extra_profile_fields( $user ) {
		?>
        <h3><?php esc_html_e( 'Social Networking', 'razz' ) ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="facebook"><?php esc_html_e( 'FaceBook URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="facebook" id="facebook"
                           value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="twitter"><?php esc_html_e( 'Twitter URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="twitter" id="twitter"
                           value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="google"><?php esc_html_e( 'Google + URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="google" id="google"
                           value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="dribbble"><?php esc_html_e( 'Dribbble URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="dribbble" id="dribbble"
                           value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="github"><?php esc_html_e( 'Github URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="github" id="github"
                           value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="instagram"><?php esc_html_e( 'Instagram URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="instagram" id="instagram"
                           value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="linkedin"><?php esc_html_e( 'linkedIn URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="linkedin" id="linkedin"
                           value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="tumblr"><?php esc_html_e( 'Tumblr URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="tumblr" id="tumblr"
                           value="<?php echo esc_attr( get_the_author_meta( 'tumblr', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="flickr"><?php esc_html_e( 'Flickr URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="flickr" id="flickr"
                           value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="pinterest"><?php esc_html_e( 'Pinterest URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="pinterest" id="pinterest"
                           value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="vimeo"><?php esc_html_e( 'Vimeo URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="vimeo" id="vimeo"
                           value="<?php echo esc_attr( get_the_author_meta( 'vimeo', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr>
                <th><label for="youtube"><?php esc_html_e( 'YouTube URL', 'razz' ); ?></label></th>
                <td>
                    <input type="text" name="youtube" id="youtube"
                           value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
        </table>
		<?php
	}
}


/**
 * Save user's social accounts
 * */
add_action( 'personal_options_update', 'razz_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'razz_save_extra_profile_fields' );
if ( ! function_exists( 'razz_save_extra_profile_fields' ) ) {
	function razz_save_extra_profile_fields( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}
		update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
		update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
		update_user_meta( $user_id, 'google', $_POST['google'] );
		update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
		update_user_meta( $user_id, 'github', $_POST['github'] );
		update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
		update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
		update_user_meta( $user_id, 'tumblr', $_POST['tumblr'] );
		update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
		update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
		update_user_meta( $user_id, 'vimeo', $_POST['vimeo'] );
		update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
	}
}


/**
 * print social urls for current user
 * or return bool for check if the user added his social links
 *
 * @param $user_id --> current user id
 * @param $bool --> for return bool
 *
 * @return mixed --> for print icons with links or bool for found links
 */
if ( ! function_exists( 'razz_author_socials' ) ) {
	function razz_author_socials( $user_id, $bool = false ) {
		$user_meta = array(
			'fa-facebook'    => get_the_author_meta( 'facebook', $user_id ),
			'fa-twitter'     => get_the_author_meta( 'twitter', $user_id ),
			'fa-google-plus' => get_the_author_meta( 'google', $user_id ),
			'fa-dribbble'    => get_the_author_meta( 'dribbble', $user_id ),
			'fa-github'      => get_the_author_meta( 'github', $user_id ),
			'fa-instagram'   => get_the_author_meta( 'instagram', $user_id ),
			'fa-linkedin'    => get_the_author_meta( 'linkedin', $user_id ),
			'fa-tumblr'      => get_the_author_meta( 'tumblr', $user_id ),
			'fa-flickr'      => get_the_author_meta( 'flickr', $user_id ),
			'fa-pinterest-p' => get_the_author_meta( 'pinterest', $user_id ),
			'fa-vimeo'       => get_the_author_meta( 'vimeo', $user_id ),
			'fa-youtube'     => get_the_author_meta( 'youtube', $user_id )
		);
		if ( $bool ) {
			$i = 0;
			foreach ( $user_meta as $key => $value ) {
				if ( $value == true ) {
					$i ++;
				}
			}
			if ( $i > 0 ) {
				return true;
			} else {
				return false;
			}
		} else {
			foreach ( $user_meta as $key => $value ) {
				if ( $value ) {
					echo '<a class="author-social" href="' . esc_url( $value ) . '" target="_blank"><i class="fa ' . esc_attr( $key ) . '"></i></a>';
				}
			}
		}
	}
}


/**
 * remove parentheses from category list and add span class to post count
 */
add_filter( 'wp_list_categories', 'razz_categories_count' );
if ( ! function_exists( 'razz_categories_count' ) ) {
	function razz_categories_count( $variable ) {
		$variable = str_replace( '(', '<span class="post-count">', $variable );
		$variable = str_replace( ')', '</span>', $variable );

		return $variable;
	}
}

/**
 * remove parentheses and ( &nbsp; ) from category list and add span class to post count
 */
add_filter( 'get_archives_link', 'razz_archive_count' );
if ( ! function_exists( 'razz_archive_count' ) ) {
	function razz_archive_count( $links ) {
		$links = str_replace( '&nbsp;(', '<span class="post-count">', $links );
		$links = str_replace( ')', '</span>', $links );

		return $links;
	}
}

/**
 * Exclude posts from search query
 */
add_filter( 'pre_get_posts', 'razz_search_filter' );
function razz_search_filter( $query ) {
	if ( is_search() && $query->is_main_query() ) {
		if ( 'yes' === razz_get_setting( 'search_exclude' ) && ! is_admin() ) {
			$post_types = get_post_types( array( 'public' => true, 'exclude_from_search' => false ) );
			unset( $post_types['page'] );
			$query->set( 'post_type', $post_types );
		}
	}

	return $query;
}

/**
 * Get all users data to select it in theme options and custom widgets
 * the output is array key->author_id, Value->Author_name ordered by posts count of each user
 */
function razz_users() {
	$users     = array();
	$args      = array(
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'fields'  => array( 'ID', 'display_name' )
	);
	$all_users = get_users( $args );
	$i         = 1;
	foreach ( $all_users as $user_data ) {
		if ( $i == 1 ) {
			$users[''] = esc_html__( 'Please select an author...', 'razz' );
		}
		$users[ $user_data->ID ] = $user_data->display_name;
		$i ++;
	}

	return $users;
}

/**
 * Comments system
 * Choose between Traditional comments or DisQus comments or facebook comments
 */
if ( ! function_exists( 'razz_comments_system' ) ) {
	function razz_comments_system() {
		if ( 'disqus' === razz_get_setting( 'comments_system/control' ) && razz_get_setting( 'comments_system/disqus/id' ) ) {
			if ( comments_open() ) {
				?>
                <div class="disqusWrap">
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        var disqus_shortname = '<?php echo esc_js( razz_get_setting( 'comments_system/disqus/id' ) ); ?>';
                        (function () {
                            var dsq = document.createElement('script');
                            dsq.type = 'text/javascript';
                            dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                </div>
				<?php
			}
		} elseif ( 'facebook' === razz_get_setting( 'comments_system/control' ) ) {
			if ( comments_open() ) {
				?>
                <!--Facebook comments-->
                <div class="fb-comments-warp">
                    <div id="fb-root"></div>
                    <script
                            src="http://connect.facebook.net/<?php echo esc_attr( razz_get_setting( 'comments_system/facebook/lang' ) ); ?>/all.js#xfbml=1"></script>
                    <fb:comments href="<?php the_permalink(); ?>"
					             <?php if ( 'dark' == razz_get_setting( 'scheme' ) ){ ?>data-colorscheme="dark"<?php } ?>
                                 num_posts="<?php echo esc_attr( razz_get_setting( 'comments_system/facebook/count' ) ); ?>"
                                 width="100%">
                    </fb:comments>
                </div>
				<?php
			}
		} else {
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
	}
}

/**
 * Get Time
 * @return string time format with the selected style in theme options
 */
if ( ! function_exists( 'razz_time' ) ) {
	function razz_time( $bool = false ) {
		$since = '';
		if ( razz_get_setting( 'blog_time' ) == 'ago' ) {
			$to   = current_time( 'timestamp' ); //time();
			$from = get_the_time( 'U' );
			$diff = (int) abs( $to - $from );
			if ( $diff <= 3600 ) {
				$mins = round( $diff / 60 );
				if ( $mins <= 1 ) {
					$mins = 1;
				}
				$since = sprintf( _n( '%s Min', '%s Mins', $mins, 'razz' ), $mins ) . ' ' . esc_html__( 'ago', 'razz' );
			} else if ( ( $diff <= 86400 ) && ( $diff > 3600 ) ) {
				$hours = round( $diff / 3600 );
				if ( $hours <= 1 ) {
					$hours = 1;
				}
				$since = sprintf( _n( '%s Hour', '%s Hours', $hours, 'razz' ), $hours ) . ' ' . esc_html__( 'ago', 'razz' );
			} elseif ( $diff >= 86400 ) {
				$days = round( $diff / 86400 );
				if ( $days <= 1 ) {
					$days  = 1;
					$since = sprintf( _n( '%s Day', '%s Days', $days, 'razz' ), $days ) . ' ' . esc_html__( 'ago', 'razz' );
				} elseif ( $days > 29 ) {
					$since = get_the_time( get_option( 'date_format' ) );
				} else {
					$since = sprintf( _n( '%s Day', '%s Days', $days, 'razz' ), $days ) . ' ' . esc_html__( 'ago', 'razz' );
				}
			}
		} else {
			$since = get_the_time( get_option( 'date_format' ) );
		}
		if ( $bool != false ) {
			return esc_html( $since );
		} else {
			echo esc_html( $since );
		}
	}
}

/**
 * Comments callback
 */
if ( ! function_exists( 'razz_comment' ) ) {
	function razz_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
                <li <?php comment_class( 'single-comment base-box' ); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e( 'Pingback:', 'razz' );
					comment_author_link();
					edit_comment_link( esc_html__( '(Edit)', 'razz' ), '<span class="edit-link">', '</span>' ); ?>
                </p>
				<?php
				break;
			default :
				global $wpdb;
				?>
            <li <?php comment_class( 'single-comment' ); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment-wrap base-box">
					<?php if ( '0' == $comment->comment_approved ) : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'razz' ); ?></em>
					<?php endif; ?>
                    <div class="commentHead">
						<?php echo get_avatar( $comment, 80 ); ?>
                        <div class="CommentHeadDetails">
							<?php
							printf( '<h4 class="comment-author fn">%1$s %2$s</h4>', get_comment_author_link(),
								// If current post author is also comment author, make it known visually.
								( $comment->user_id ) ? '' : ''
							);
							printf( '<span class="comment-meta commentmetadata "><a href="%1$s"><time datetime="%2$s">%3$s</time></a></span>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s at %2$s', 'razz' ), get_comment_date(), get_comment_time() )
							);
							?>
                        </div>
                        <div class="CommentHeadLinks">
							<?php
							echo razz_get_likes_button( get_comment_ID(), 1 );
							comment_reply_link( array_merge( $args, array(
								'reply_text' => esc_html__( 'Reply', 'razz' ),
								'before'     => '<span>',
								'after'      => '</span>',
								'depth'      => $depth,
								'max_depth'  => $args['max_depth']
							) ) );
							edit_comment_link( esc_html__( 'Edit', 'razz' ) ); ?>
                        </div>
                    </div>
                    <div class="comment-content">
                        <div class="comment-text"><?php comment_text(); ?></div>
                    </div>
                </div>
				<?php
				break;
		endswitch;
	}
}
