<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * typography options
 */

$options = array(
	'typography_tab' => array(
		'title'   => esc_html__( 'Typography', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'typography_box'        => array(
				'title'   => esc_html__( 'Typography Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'main_font'    => array(
						'label' => esc_html__( 'Primary Font', 'razz' ),
						'type'  => 'typography-v2',
						'components' => array(
							'family'         => true,
							'size'           => false,
							'line-height'    => false,
							'letter-spacing' => false,
							'style' => false,
							'color'          => false
						),
						'value' => array(
							'family'         => 'Lato',
							'variation'      => 'regular',
							'line-height'    => 16,
							'letter-spacing' => 0,
							'size'           => 15,
							'color'          => '#ffffff'
						)
					),
					'site_title'            => array(
						'label' => esc_html__( 'Site Title', 'razz' ),
						'type'  => 'typography-v2',
						'value' => array(
							'family'      => 'Sofadi One',
							'variation'   => '700',
							'size'        => 80,
							'line-height' => 80,
							'letter-spacing' => 15,
							'color'       => '#3d3d3d'
						)

					),
					'tag_line'              => array(
						'label' => esc_html__( 'Site description', 'razz' ),
						'type'  => 'typography-v2',
						'value' => array(
							'family'         => 'Strait',
							'variation'      => 'regular',
							'size'           => 13,
							'line-height'    => 13,
							'letter-spacing' => 4,
							'color'          => '#999999'
						)
					),
					'error_logo_typo'       => array(
						'label' => esc_html__( 'Error 404 logo', 'razz' ),
						'type'  => 'typography-v2',
						'value' => array(
							'family'         => 'Lato',
							'variation'      => 'regular',
							'line-height'    => 185,
							'size'           => 130,
							'letter-spacing' => 0,
							'color'          => '#545454'
						)
					),
					'error_message_typo'    => array(
						'label' => esc_html__( 'Error 404 Message', 'razz' ),
						'type'  => 'typography-v2',
						'value' => array(
							'family'         => 'Lato',
							'variation'      => 'regular',
							'line-height'    => 19,
							'size'           => 18,
							'letter-spacing' => 0,
							'color'          => '#404040'
						)
					)
				)
			)
		)
	)
);