<?php

/**
 * Theme Demo content
 */
//add_filter( 'fw:ext:backups-demo:demos', 'razz_demo_content' );
function razz_demo_content( $demos ) {
	$demos_array = array(
		'blog-demo' => array(
			'title'        => esc_html__( 'Main Demo', 'razz' ),
			'screenshot'   => 'http://bbioon.com/razz/demos/content/blog.png',
			'preview_link' => 'http://bbioon.com/razz/blog'
		),
	);

	$download_url = 'http://www.bbioon.com/razz/demos/index.php';

	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'     => $download_url,
			'file_id' => $id,
		) );
		$demo->set_title( $data['title'] );
		$demo->set_screenshot( $data['screenshot'] );
		$demo->set_preview_link( $data['preview_link'] );
		$demos[ $demo->get_id() ] = $demo;
		unset( $demo );
	}

	return $demos;
}