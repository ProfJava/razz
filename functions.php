<?php
$razz_theme = wp_get_theme();
define( 'RAZZ_THEME_NAME', $razz_theme->name );
define( 'RAZZ_THEME_DIR', get_template_directory() );
define( 'RAZZ_THEME_URI', get_template_directory_uri() );
define( 'RAZZ_THEME_CSS_URI', RAZZ_THEME_URI . '/assets/css/' );
define( 'RAZZ_THEME_JS_URI', RAZZ_THEME_URI . '/assets/js/' );
define( 'RAZZ_THEME_IMAGES_DIR', RAZZ_THEME_URI . '/assets/images/' );
define( 'RAZZ_THEME_CORE', RAZZ_THEME_DIR . '/core/' );
define( 'RAZZ_THEME_CORE_URI', RAZZ_THEME_URI . '/core/' );
require_once RAZZ_THEME_CORE . 'init.php';