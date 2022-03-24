<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	fw()->theme->get_options( 'post-formats' ),
	fw()->theme->get_options( 'post-customizations' )
);