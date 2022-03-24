<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	fw()->theme->get_options( 'layouts' ),
	fw()->theme->get_options( 'header-settings' ),
	fw()->theme->get_options( 'footer' ),
	fw()->theme->get_options( 'main-carousel' ),
	fw()->theme->get_options( 'featured-posts' ),
	fw()->theme->get_options( 'single-post' ),
	fw()->theme->get_options( 'banners' ),
	fw()->theme->get_options( 'social' ),
	fw()->theme->get_options( 'typography' ),
	fw()->theme->get_options( 'styling-settings' ),
	fw()->theme->get_options( 'custom-code' )
);
