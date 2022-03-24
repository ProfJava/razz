<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest                         = array();
$manifest['id']                   = 'bbioonThemes';
$manifest['supported_extensions'] = array(
	'backups'   => array(),
	'sidebars'  => array(),
	'analytics' => array()
);
$manifest['requirements']         = array(
	'wordpress' => array(
		'min_version' => '4.4',
	),
	'framework' => array(
		'min_version' => '2.7.11'
	)
);